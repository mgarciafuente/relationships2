<?php

use App\Http\Controllers\UserController;
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
    Route::get('/users', 'show')->name('users');

    Route::get('/user-create', 'create')->name('user-create');
    Route::post('/user-store', 'store')->name('user-store');

    Route::get('/user-edit/{user}', 'edit')->name('user-edit');
    Route::put('/user-update/{user}', 'update')->name('user-update');

    Route::delete('/user-delete/{user}', 'delete')->name('user-delete');
});

Route::controller(DirectionController::class)->group(function() {
    Route::get('/directions', 'show')->name('directions');

    Route::get('/direction-create', 'create')->name('direction-create');
    Route::post('/direction-store', 'store')->name('direction-store');

    Route::get('/direction-edit/{direction}', 'edit')->name('direction-edit');
    Route::put('/direction-update/{direction}', 'update')->name('direction-update');

    Route::delete('/direction-delete/{direction}', 'delete')->name('direction-delete');
});