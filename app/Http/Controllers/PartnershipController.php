<?php

namespace App\Http\Controllers;

use App\Models\Partnership;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partnerships = Partnership::paginate(15);
        return view('partnership.index', ['partnerships' => $partnerships]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('partnership.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $partnership = new Partnership;
        $partnership->user_id = auth()->id(); 
        $partnership->partnership_title_en = $request -> input('partnership_title_en'); 
        $partnership->partnership_title_kh = $request -> input('partnership_title_kh'); 
        $partnership->partnership_description_en = $request -> input('partnership_description_en'); 
        $partnership->partnership_description_kh = $request -> input('partnership_description_kh'); 
        $partnership->partnership_type = $request -> input('partnership_type'); 
        $partnership->partnership_link = $request -> input('partnership_link'); 
        $partnership->partnership_logo = $request -> input('partnership_logo'); 
        $partnership->signed_date = $request -> input('signed_date'); 
        $partnership->save();
        return redirect()->route('partnership.index')->with('status', 'Partnership Added Successfully');
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
        $partnerships = Partnership::findOrFail($id);
        return view('partnership.edit', ['partnerships' => $partnerships]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $partnership = Partnership::findOrFail($id);
        $partnership->user_id = auth()->id(); 
        $partnership->partnership_title_en = $request -> input('partnership_title_en'); 
        $partnership->partnership_title_kh = $request -> input('partnership_title_kh'); 
        $partnership->partnership_description_en = $request -> input('partnership_description_en'); 
        $partnership->partnership_description_kh = $request -> input('partnership_description_kh'); 
        $partnership->partnership_type = $request -> input('partnership_type'); 
        $partnership->partnership_link = $request -> input('partnership_link'); 
        $partnership->partnership_logo = $request -> input('partnership_logo'); 
        $partnership->signed_date = $request -> input('signed_date'); 
        $partnership->save();
        return redirect()->route('partnership.index')->with('status', 'Partnership Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $partnership = Partnership::findOrFail($id);
        $partnership->delete();
        return redirect()->route('partnership.index')->with('status', 'Partnership Deleted');

    }
}
