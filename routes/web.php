<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [ArticleController::class, 'index_view'])->name('index_view');
Route::get('/article/{id}', [ArticleController::class, 'show_view'])->name('show_view');
Route::get('/article/{id}/like', [ArticleController::class, 'like_views'])->name('like');
Route::get('/article/{id}/view', [ArticleController::class, 'view_views'])->name('view');

Route::get('/article/{id}/dislike', [ArticleController::class, 'dislike_views'])->name('dislike');
Route::get('/article/{id}/comment', [ArticleController::class, 'comment_views'])->name('comment');

