<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleCategory;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ArticleCategory::paginate(15);
        return view('articles.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categories = new ArticleCategory;
        $categories->user_id = auth()->id(); 
        $categories->categories_title_en = $request->input('categories_title_en');
        $categories->categories_title_kh = $request->input('categories_title_kh');
        $categories->group_id = $request->input('group_id');
        $categories->save();
        return redirect()->route('articles.categories.index')->with('status', 'Article Categories Added Successfully');
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
        $categories = ArticleCategory::findOrFail($id);
        return view('articles.categories.edit', ['categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = ArticleCategory::findOrFail($id);
        $categories->user_id = auth()->id(); 
        $categories->categories_title_en = $request->input('categories_title_en');
        $categories->categories_title_kh = $request->input('categories_title_kh');
        $categories->group_id = $request->input('group_id');
        $categories->save();
        return redirect()->route('articles.categories.index')->with('status', 'Article Categories  Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = ArticleCategory::findOrFail($id);
        $categories->delete();
        return redirect()->route('articles.categories.index')->with('status', 'Article Category Deleted');
    }
}
