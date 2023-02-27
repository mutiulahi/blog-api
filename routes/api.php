<?php

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

Route::controller(Article::class)->group(function () {
    Route::get('articles', 'index')
        ->name('index');            

    Route::get('articles/{id}', 'show')
        ->name('show');

    Route::post('articles/{id}/like', 'like')->
        name('like');

    Route::post('articles/{id}/view', 'view')->
        name('view');

    Route::post('articles/{id}/comments', 'store')->name('store_comment');


});
