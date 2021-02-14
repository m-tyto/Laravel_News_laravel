<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "ArticleController@index")->name('home');
Route::post('/',"ArticleController@add")->name('article_add');
Route::get('/comment/{id}',"CommentController@index")->name('comment_home');
Route::post('/comment/{id}',"CommentController@add")->name('comment_add');
Route::delete('/comment/{id}',"CommentController@delete")->name('comment_del');