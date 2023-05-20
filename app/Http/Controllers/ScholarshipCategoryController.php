<?php

namespace App\Http\Controllers;

use App\Models\ScholarshipCategory;
use Illuminate\Http\Request;

class ScholarshipCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ScholarshipCategory::paginate(15);
        return view('scholarship.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('scholarship.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categories = new ScholarshipCategory;
        $categories -> categories_title_en =  $request -> input('categories_title_en');
        $categories -> categories_title_kh =  $request -> input('categories_title_kh');
        $categories -> group_id =  $request -> input('group_id');
        $categories->save();
        return redirect()->route('scholarship.categories.index')->with('status', 'Scholarship Category Added Successfully');
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
        $categories = ScholarshipCategory::findOrfail($id);
        return view('scholarship.categories.edit', ['categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = ScholarshipCategory::findOrfail($id);
        $categories -> categories_title_en =  $request -> input('categories_title_en');
        $categories -> categories_title_kh =  $request -> input('categories_title_kh');
        $categories -> group_id =  $request -> input('group_id');
        $categories ->save();
        return redirect()->route('scholarship.categories.index')->with('status', 'Scholarship Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = ScholarshipCategory::findOrfail($id);
        $categories->delete();
        return redirect()->route('scholarship.categories.index')->with('status', 'Scholarship Deleted!');
    }
}
