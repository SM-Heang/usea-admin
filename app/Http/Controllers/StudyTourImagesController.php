<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyTourImages;

class StudyTourImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = StudyTourImages::paginate(15);
        return view('study-tour.images.index', ['images' => $images]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('study-tour.images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $images = new StudyTourImages;
        $images -> tour_id = $request ->input('tour_id');
        $images -> image_name = $request ->input('image_name');
        $images -> image_title = $request ->input('image_title');
        $images -> image_title_kh = $request ->input('image_title_kh');
        $images -> image_style = $request ->input('image_style');
        $images ->save();
        return redirect()->route('study-tour.images.index')->with('status', 'Image Added Successfully!');
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
        $images = StudyTourImages::findOrFail($id);
        return view('study-tour.images.edit', ['images'=> $images]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $images = StudyTourImages::findOrFail($id);
        $images -> tour_id = $request ->input('tour_id');
        $images -> image_name = $request ->input('image_name');
        $images -> image_title = $request ->input('image_title');
        $images -> image_title_kh = $request ->input('image_title_kh');
        $images -> image_style = $request ->input('image_style');
        $images ->save();
        return redirect()->route('study-tour.images.index')->with('status', 'Image Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $images = StudyTourImages::findOrFail($id);
        $images -> delete();
        return redirect()->route('study-tour.images.index')->with('status', 'Image Deleted Successfully!');
    }
}
