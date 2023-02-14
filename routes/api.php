<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('posts/recent', function() {
    $query = Post::orderBy('created_at', 'desc')->take(12)->get();
    return $query;
});

Route::get('posts/{user}', function(User $user) {
    //$query = Post::where('user_id', '=', $user->id)->get();
    $query = $user->posts()->get();
    return $query;
});
