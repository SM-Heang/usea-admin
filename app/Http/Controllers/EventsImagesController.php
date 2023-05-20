<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventsImages;

class EventsImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = EventsImages::paginate(15);
        return view('events.images.index', ['images' => $images]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $images = new EventsImages;
        $images -> event_id = $request->input('event_id');
        $images -> images_title = $request->input('images_title');
        $images -> images_name = $request->input('images_name');
        $images -> images_style= $request->input('images_style');
        $images->save();
        return redirect()->route('events.images.index')->with('status', 'Events Images Added Successfully');
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
        $images = EventsImages::findOrFail($id);
        return view('events.images.edit', ['images'=> $images]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $images = EventsImages::findOrFail($id);
        $images -> event_id = $request->input('event_id');
        $images -> images_title = $request->input('images_title');
        $images -> images_name = $request->input('images_name');
        $images -> images_style= $request->input('images_style');
        $images->save();
        return redirect()->route('events.images.index')->with('status', 'Events Images Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $images = EventsImages::findOrFail($id);
        $images->delete();
        return redirect()->route('events.images.index')->with('status', 'Events Images Deleted');
    }
}
