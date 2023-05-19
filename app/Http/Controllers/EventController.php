<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Tags;
use App\Models\User;
use App\Models\Event;
use App\Models\Likes;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Attending;
use App\Models\Event_Tags;
use App\Models\SavedEvents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('EventPages.dashboard',[
            'events' => $events,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tags::all();
        $country = Country::all();
        $city = City::all();
        
        return view('EventPages.create', [
            'tags' => $tags,
            'country' => $country,
            'city' => $city
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'tags' => 'required',
            'title' => 'required|max:155|min:2',
            'address' => 'required|max:155|min:2',
            'image' => 'image|required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'event_desc' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
        ]);


        if($request->hasfile('image')){
            $file = $request['image']->getClientOriginalName();
            $image = time()."_".pathinfo($file, PATHINFO_FILENAME) . "." . pathinfo($file, PATHINFO_EXTENSION);
            Storage::putFileAs('public/events/', $request['image'], $image);
        
            $eventData = [
                'title' => $request->title, 
                'description' => $request->event_desc, 
                'time' => $request->start_time, 
                'start_date' => $request->start_date,
                'end_date' => $request->end_date, 
                'user_id' => auth()->id(),
                'address' => $request->address, 
                'image' => $image, 
                'country_id' => (int)$request->country_id,
                'city_id' => (int)$request->city_id
            ];

            // $event = Event::create($eventData);
            if($event = Event::create($eventData)) {
                $event->tags()->attach($request->input('tags'));
                return redirect()->route('home.index')->with('status', 'Event was created successfully.');
            }
            
            return redirect()->back()->with('status', 'Something want wrong!');
            
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        return view('singleEvent', [
            'event' => $event,
        ]);
    }
    

    // Like functionality
    public function likeSystem(string $id)
    {
        $event = Event::findOrFail($id);
        $like = Likes::where('user_id', auth()->id())->where('event_id', $event->id)->first();

        if(!is_null($like)){
            $like->like = ($like->like == 1) ? 0 : 1;
            $like->save();
        }else{
            Likes::create([
                'user_id' => auth()->id(),
                'event_id' => $event->id,
                'like' => 1
            ]);
        }


        return redirect()->route('home.show', ['event_id' => $event->id]);
    }

    // Save Functionality
    public function saveSystem(string $id)
    {
        $event = Event::findOrFail($id);
        $saves = SavedEvents::where('user_id', auth()->id())->where('event_id', $event->id)->first();

        if(!is_null($saves)){
            $saves->delete();
        }else{
            SavedEvents::create([
                'user_id' => auth()->id(),
                'event_id' => $event->id,
            ]);
        }

        return redirect()->route('home.show', ['event_id' => $event->id]);
    }

    // Attend Functionality
    public function attendSystem(string $id)
    {
        $event = Event::findOrFail($id);
        $attends = Attending::where('user_id', auth()->id())->where('event_id', $event->id)->first();

        if(!is_null($attends)){
            $attends->delete();
        }else{
                Attending::create([
                'user_id' => auth()->id(),
                'event_id' => $event->id,
            ]);
        }

        return redirect()->route('home.show', ['event_id' => $event->id]);
    }

    // Event Comment Functionality
    public function commentEvent(Request $req ,$id){
        $req->validate([
            'comment' => ['string', 'max:255', 'required'],
        ]);


        if(Comment::create(['content' => $req->comment, 'user_id' => auth()->id(), 'event_id' => intval($id)])){
            return redirect()->back();
        }

        return redirect()->back()->with('status', 'Something went wrong');
    }
    // Remove Comment
    public function removeComment($id){

        $comment = Comment::findOrFail($id);
        if($comment->delete()){
            return redirect()->back();
        }

        return redirect()->back()->with('status', 'Something went wrong');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tags = Tags::all();
        $event = Event::findOrFail($id);
        $country = Country::all();
        $city = City::all();
        return view('EventPages.edit', [
            'event' => $event,
            'country' => $country,
            'city' => $city,
            'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);
    
        $request->validate([
            'title' => 'required|max:155|min:2',
            'address' => 'required|max:155|min:2',
            'image' => 'image',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'event_desc' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id', // Assuming 'tags' is a relationship on the Event model
        ]);
    
        $event->title = $request->input('title');
        $event->description = $request->input('event_desc');
        $event->time = $request->input('start_time');
        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');
        $event->address = $request->input('address');
        $event->country_id = (int) $request->input('country_id');
        $event->city_id = (int) $request->input('city_id');
    
        if ($request->hasFile('image')) {
            if ($event->image && Storage::exists('public/events/' . $event->image)) {
                Storage::delete('public/events/' . $event->image);
            }
            $file = $request->file('image');
            $image = time() . '_' . $file->getClientOriginalName();
            $event->image = $image;
            Storage::putFileAs('public/events/', $file, $image);
        }
    
        if ($event->save()) {
            $event->tags()->sync($request->input('tags'));
    
            return redirect()->route('home.edit', ['event_id' => $event->id])->with('success', 'Event updated successfully.');
        } else {
            return redirect()->route('home.edit', ['event_id' => $event->id])->with('error', 'Something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        $event->tags()->detach();
        $event->attending()->detach();
        $event->comments()->delete();
        $event->likes()->delete();
        $event->savedEvents()->detach();

        if($event->delete()){
            return redirect()->route('home.index')->with('success', 'Event deleted successfully.');
        }else{
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
