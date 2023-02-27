<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Article, Comment, Tag};
use Exception;

class PostArticleController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'body' => 'required',
                'tags' => 'required|array',
                'tags.*' => 'required|string'
            ]);

            $article = new Article();
            $article->title = $request->input('title');
            $article->body = $request->input('body');
            $article->save();

            foreach ($request->input('tags') as $tag) {
                $tag = Tag::firstOrCreate(['name' => $tag]);
                $article->tags()->attach($tag);
            }

            return APIResponse::success('Article has been successfully posted.');

        } catch (Exception $exception) {
            return APIResponse::error($exception->getMessage(), 500);
        }

    }
}
