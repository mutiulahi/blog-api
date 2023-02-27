<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Article, Comment, Tag};
use Exception;

class ArticleController extends Controller
{
    public function index()
    {
        try {
            $articles = Article::orderByDesc('created_at')
                ->with(['comments'])
                ->paginate(10);
            return APIResponse::success('Articles', $articles);
        } catch (Exception $exception) {
            return APIResponse::error($exception->getMessage(), 500);
        }
    }

    public function show($id)
    {
        try {
            $article = Article::where('id', $id)
                ->with(['comments'])
                ->get();
            return APIResponse::success('Article', $article);
        } catch (Exception $exception) {
            return APIResponse::error($exception->getMessage(), 500);
        }
    }

    public function like($id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->increment('likes');
            return APIResponse::success('Likes', $article->likes);
        } catch (Exception $exception) {
            return APIResponse::error($exception->getMessage(), 500);
        }
    }


    public function view($id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->increment('views');
            return APIResponse::success('Views', $article->views);
        } catch (Exception $exception) {
            return APIResponse::error($exception->getMessage(), 500);
        }
    }
}
