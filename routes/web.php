<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DirectionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Redirect;
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

Route::view('/', 'home')->name('home');

/* Route::get('locale/{lang}', function($lang) {
    session()->put('locale', $lang);
    return Redirect::back();
}); */

Route::controller(UserController::class)->group(function() {
    Route::get('/users', 'index')->name('users');

    Route::get('/user-create', 'create')->name('user-create');
    Route::post('/user-store', 'store')->name('user-store');

    Route::get('/user-edit/{user}', 'edit')->name('user-edit');
    Route::put('/user-update/{user}', 'update')->name('user-update');

    Route::delete('/user-delete/{user}', 'delete')->name('user-delete');
});

Route::controller(DirectionController::class)->group(function() {
    Route::get('/directions', 'index')->name('directions');

    Route::get('/direction-create', 'create')->name('direction-create');
    Route::post('/direction-store', 'store')->name('direction-store');

    Route::get('/direction-edit/{direction}', 'edit')->name('direction-edit');
    Route::put('/direction-update/{direction}', 'update')->name('direction-update');

    Route::delete('/direction-destroy/{direction}', 'destroy')->name('direction-destroy');
});

Route::controller(PostController::class)->group(function() {
    Route::get('/posts', 'index')->name('posts');

    Route::get('/post-create', 'create')->name('post-create');
    Route::post('/post-store', 'store')->name('post-store')->middleware('checkName');

    Route::get('/post-edit/{post}', 'edit')->name('post-edit');
    Route::put('/post-update/{post}', 'update')->name('post-update');

    Route::delete('/post-delete/{post}', 'destroy')->name('post-destroy');
});

Route::controller(TopicController::class)->group(function() {
    Route::get('topics', 'index')->name('topics');

    Route::get('/topic-create', 'create')->name('topic-create');
    Route::post('/topic-store', 'store')->name('topic-store');

    Route::get('/topic-edit/{topic}', 'edit')->name('topic-edit');
    Route::put('/topic-update/{topic}', 'update')->name('topic-update');

    Route::delete('/topic-destroy/{topic}', 'destroy')->name('topic-destroy');
});