<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scholarships = Scholarship::paginate(15);
        return view('scholarship.index', ['scholarships' => $scholarships]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('scholarship.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $facIcons = $request->input('fac_icon');

        $scholarships = new Scholarship;
        $scholarships -> scholarship_title_en = $request -> input('scholarship_title_en');
        $scholarships -> scholarship_title_kh = $request -> input('scholarship_title_kh');
        $scholarships -> scholarship_description_en = $request -> input('scholarship_description_en');
        $scholarships -> scholarship_description_kh = $request -> input('scholarship_description_kh');
        $scholarships -> categories_id = $request -> input('categories_id');
        $scholarships->save();
        return redirect()->route('scholarship.index')->with('status', 'Scholarship Added Successfully');
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
        $scholarships = Scholarship::findOrFail($id);
        return view('scholarship.edit', ['scholarships' => $scholarships]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $scholarships = Scholarship::findOrFail($id);
        $scholarships -> scholarship_title_en = $request -> input('scholarship_title_en');
        $scholarships -> scholarship_title_kh = $request -> input('scholarship_title_kh');
        $scholarships -> scholarship_description_en = $request -> input('scholarship_description_en');
        $scholarships -> scholarship_description_kh = $request -> input('scholarship_description_kh');
        $scholarships -> categories_id = $request -> input('categories_id');
        $scholarships->save();
        return redirect()->route('scholarship.index')->with('status', 'Scholarship Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $scholarships = Scholarship::findOrFail($id);
        $scholarships->delete();
        return redirect()->route('scholarship.index')->with('status', 'Scholarship Deleted');
    }
    
}
