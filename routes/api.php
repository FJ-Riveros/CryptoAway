<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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


/*  Posts  */
//Get al posts
Route::get('posts', [PostController::class, 'index'])
->name('allPosts');;


//Get posts from the selected user
Route::get('user/{idUser}/posts', [UserController::class, 'user_posts']);

//Add Post
Route::post('posts/create_post', [PostController::class, 'create_post']);

//Delete Post

//Get last Post

//Get Post likes

//Get the number of comments from a Post




