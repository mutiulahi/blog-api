<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Article, Comment, Tag};
use Exception;

class ArticleController extends Controller
{
    // Swagger Documentation 
    /**
     * @OA\Get(
     *     path="/api/articles",
     *     tags={"Article"},
     *     summary="Get list of Articles",
     *     description="Returns list of Articles",
     *     operationId="index",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ), 
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     */
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

    /**
     * @OA\Get(
     *     path="/api/articles/{id}",
     *     tags={"Article"},
     *     summary="Find a Article by ID",
     *     description="Returns a single Article",
     *     operationId="show",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of Article to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ), 
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     */

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

    /**
     * @OA\Post(
     *     path="/api/articles/{id}/like",
     *     tags={"Article"},
     *     summary="Increase article likes count and return new count",
     *     description="Article ID to like and return new likes count",
     *     operationId="like",
     *     @OA\RequestBody(
     *         description="Provide article ID to like",
     *         required=true,
     *     ),
     *  @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of Article to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ), 
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     */

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


    /**
     * @OA\Post(
     *     path="/api/articles/{id}/view",
     *     tags={"Article"},
     *     summary="Increase article views count and return new count",
     *     description="Article ID to view and return new views count",
     *     operationId="view",
     *     @OA\RequestBody(
     *         description="Provide article ID to view",
     *         required=true,
     *     ),
     *  @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of Article to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ), 
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     */

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


    public function index_view()
    {
        $articles = $this->index();
        $articles = json_decode($articles->getContent(), true);
        $articles_data = $articles['data']['data'];
        $articles_link = $articles['data']['links'];
        return view('index', compact('articles_data', 'articles_link'));
    }

    public function show_view($id)
    {
        $article = $this->show($id);
        $article = json_decode($article->getContent(), true);
        $article_data = $article['data'][0];
        $article_comments = $article_data['comments'];
        return view('article_details', compact('article_data', 'article_comments'));
    }

    public function view_views($id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->increment('views');
            return redirect()->back();
        } catch (Exception $exception) {
            return APIResponse::error($exception->getMessage(), 500);
        }
    }

    public function like_views($id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->increment('likes');
            return redirect()->back();
        } catch (Exception $exception) {
            return APIResponse::error($exception->getMessage(), 500);
        }
    }

    public function dislike_views($id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->decrement('likes');
            return redirect()->back();
        } catch (Exception $exception) {
            return APIResponse::error($exception->getMessage(), 500);
        }
    }
}
