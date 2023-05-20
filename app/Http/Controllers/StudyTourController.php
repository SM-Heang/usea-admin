<?php

namespace App\Http\Controllers;

use App\Models\StudyTour;
use Illuminate\Http\Request;

class StudyTourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours = StudyTour::paginate(15);
        return view('study-tour.index', ['tours' => $tours]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('study-tour.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tours = new StudyTour;
        $tours -> tour_title = $request -> input('tour_title');
        $tours -> tour_title_kh = $request -> input('tour_title_kh');
        $tours -> tour_date  = $request -> input('tour_date');
        $tours -> tour_style  = $request -> input('tour_style');
        $tours -> save();
        return redirect()->route('study-tour.index')->with('status', 'Study Tour Added Successfully');
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
        $tours = StudyTour::findOrFail($id);
        return view('study-tour.edit', ['tours' => $tours]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tours = StudyTour::findOrFail($id);
        $tours -> tour_title = $request -> input('tour_title');
        $tours -> tour_title_kh = $request -> input('tour_title_kh');
        $tours -> tour_date   = $request -> input('tour_date');
        $tours -> tour_style  = $request -> input('tour_style');
        $tours -> save();
        return redirect()->route('study-tour.index')->with('status', 'Study Tour Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tours = StudyTour::findOrFail($id);
        $tours->delete();
        return redirect()->route('study-tour.index')->with('status', 'Study Tour Deleted Successfully');

    }
}
