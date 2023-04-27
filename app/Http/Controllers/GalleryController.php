<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery = Gallery::all();
        return view('galleryPages.index', [
            'gallery' => $gallery,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('galleryPages.create');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('galleryPages.edit', [
            'gallery' => $gallery,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::findOrFail($id);
        $request->validate([
            'caption' => ['string', 'max:255'],
            'image' => ['image']
        ]);
        if($request->hasfile('image')){
            if($gallery->image && Storage::exists('public/gallery/' . $gallery->image)) {
                Storage::delete('public/gallery/' . $gallery->image);
            }
            $file = $request['image']->getClientOriginalName();
            $image = time()."_".pathinfo($file, PATHINFO_FILENAME) . "." . pathinfo($file, PATHINFO_EXTENSION);
            $gallery->image = $image;
            Storage::putFileAs('public/gallery/', $request['image'], $image);
        }
        if($gallery->update(['caption' => $request->caption])){
            dd($request->caption, $gallery->caption);
            return redirect()->route('gallery-forum.edit', ['gallery_id' => $gallery->id])->with('success', 'Gallery updated successfully.');
        }else{
            return redirect()->route('gallery-forum.edit', ['gallery_id' => $gallery->id])->with('error', 'Something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
