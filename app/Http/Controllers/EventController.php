<?php

namespace App\Http\Controllers;

use App\Models\Attending;
use App\Models\City;
use App\Models\Event;
use App\Models\Likes;
use App\Models\Country;
use App\Models\SavedEvents;
use Illuminate\Http\Request;

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
        return view('EventPages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        $country = Country::all();
        $city = City::all();
        return view('EventPages.edit', [
            'event' => $event,
            'country' => $country,
            'city' => $city,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
