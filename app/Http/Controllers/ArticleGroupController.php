<?php

namespace App\Http\Controllers;
use App\Models\ArticleGroup;
use Illuminate\Http\Request;

class ArticleGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = ArticleGroup::paginate(15);
        return view('articles.group.index', ['groups' => $groups]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.group.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $groups = new ArticleGroup;
        $groups->group_title_en = $request->input('group_title_en');
        $groups->group_title_kh = $request->input('group_title_kh');
        // $groups->group_id = $request->input('group_id');
        $groups->save();
        return redirect()->route('articles.group.index')->with('status', 'Article Group Added Successfully');
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
        $groups = ArticleGroup::findOrFail($id);
        return view('articles.group.edit', ['groups' => $groups]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $groups = ArticleGroup::findOrFail($id);
        $groups->group_title_en = $request->input('group_title_en');
        $groups->group_title_kh = $request->input('group_title_kh');
        // $groups->group_id = $request->input('group_id');
        $groups->save();
        return redirect()->route('articles.group.index')->with('status', 'Article Group Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $groups = ArticleGroup::findOrFail($id);
        $groups->delete();
        return redirect()->route('articles.group.index')->with('status', 'Article Group Deleted');
    }
}
