<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderByDesc('created_at')->paginate(10);
        return response()->json($articles);
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return response()->json($article);
    }

    public function like($id)
    {
        $article = Article::findOrFail($id);
        $article->increment('likes');
        return response()->json(['likes' => $article->likes]);
    }

    public function view($id)
    {
        $article = Article::findOrFail($id);
        $article->increment('views');
        return response()->json(['views' => $article->views]);
    }
}
