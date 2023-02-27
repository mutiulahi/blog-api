<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Article,Comment};
use App\Http\Controllers\APIResponse;
use Exception;

class CommentController extends Controller
{
    public function store($id, Request $request)
    {
        try {
            $request->validate([
                'subject' => 'required',
                'body' => 'required',
                'article_id' => 'required|exists:articles,id'
            ]);
    
            $comment = new Comment();
            $comment->subject = $request->input('subject');
            $comment->body = $request->input('body');
            $comment->article_id = $id;
            $comment->save();
    
            dispatch(function () {
                sleep(600);
            });

            return APIResponse::success('Your message has been successfully sent.');

        } catch (Exception $exception) {
            return APIResponse::error($exception->getMessage(), 500);
        }

    }
}
