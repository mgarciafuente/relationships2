<?php

use App\Http\Controllers\UserController;
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

Route::controller(UserController::class)->group(function() {
    Route::get('/users', 'show')->name('users');

    Route::get('/user-create', 'create')->name('user-create');
    Route::post('/user-store', 'store')->name('user-store');

    Route::post('/user-edit/{id}', 'edit')->name('user-edit');
    Route::put('/user-update/{id}', 'update')->name('user-update');

    Route::delete('/user-delete/{id}', 'delete')->name('user-delete');
});