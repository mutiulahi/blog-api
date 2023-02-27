<?php

use App\Http\Controllers\{ArticleController, CommentController};
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(ArticleController::class)->group(function () {
    Route::get('articles', 'index')->name('index');            

    Route::get('articles/{id}', 'show')->name('show');

    Route::get('articles/{id}/like', 'like')->name('like');

    Route::get('articles/{id}/view', 'view')->name('view');


});

Route::controller(CommentController::class)->group(function () {
    Route::post('articles/{id}/comments', 'store')->name('store_comment');
});
