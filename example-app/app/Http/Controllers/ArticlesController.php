<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')->orderBy('created_at', 'desc')->get();

        return view('layouts.articles', compact('articles'));
    }
    public function noArticles()
    {
        return view('partials.no-articles');
    }
    public function article()
    {
        return view('partials.article');
    }
    public function create()
    {
        return view('articles.create');
    }
    public function article_form()
    {
        return view('partials.article_form');
    }
        public function show(Article $article)
    {
        // $article = Article::with('user')->where('id', $id)->firstOrFail();
        // dd($article);
        // ddd($article);
        return view('articles.show', compact('article'));
    }
    /* public function show($id)
    {
        $article = Article::with('user')->with([
            'comments' => function ($query) {
                $query->with('user');
            }
        ])->findOrFail($id);

        return view('articles.show', compact('article'));
    } */
}
