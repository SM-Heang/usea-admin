<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::paginate(15);
        return view('articles.index', ['articles' => $articles]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $article = new Article;
        $article->user_id = auth()->id();
        $article->article_title_en = $request -> input('article_title_en');
        $article->article_title_kh = $request -> input('article_title_kh');
        $article->article_description_en = $request -> input('article_description_en');
        $article->article_description_kh = $request -> input('article_description_kh');
        $article->categories_id = $request -> input('categories_id');
        $article->keywords = $request -> input('keywords');
        $article->sitemap = $request -> input('sitemap');
        $article->save();
        return redirect()->route('articles.index')->with('status', 'Article Added Successfully');
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
        $articles = Article::findOrFail($id);
        return view('articles.edit', ['articles' => $articles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::findOrFail($id);
        $article->user_id = auth()->id();
        $article->article_title_en = $request -> input('article_title_en');
        $article->article_title_kh = $request -> input('article_title_kh');
        $article->article_description_en = $request -> input('article_description_en');
        $article->article_description_kh = $request -> input('article_description_kh');
        $article->categories_id = $request -> input('categories_id');
        $article->keywords = $request -> input('keywords');
        $article->sitemap = $request -> input('sitemap');
        $article->save();
        return redirect()->route('articles.index')->with('status', 'Article Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $articles = Article::findOrFail($id);
        $articles->delete();
        return redirect()->route('articles.index')->with('status', 'Article Deleted');
    }
}
