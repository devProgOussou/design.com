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
Route::get('/','WelcomeController@welcome');
Route::get('/home', 'ViewPost@showPost');
Route::get('/affiche', 'ViewPost@showList');
Route::post('/home', 'WelcomeController@store')->name('addComments');

Auth::routes();

Route::post('/post', 'PostController@store')->name('addImage');
Route::get('/post', 'WelcomeController@showPost');
Route::get('/like/{id}/{likes?}', 'HomeController@likePost')->name('like');
Route::post('/like/{id}/{likes?}', 'HomeController@likePost')->name('like');
Route::get('/removeLike/{id}/{dislikes?}', 'RemoveLikeController@removeLike')->name('removeLike');
Route::post('/removeLike/{id}/{dislikes?}', 'RemoveLikeController@removeLike')->name('removeLike');
