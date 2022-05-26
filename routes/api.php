<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BlogController;

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
->name('allPosts');


//Get Post likes
Route::get('posts/{idPost}/likes_post', [PostController::class, 'likes_post']);

//Get the number of comments from a Post
Route::get('posts/{idPost}/number_comments_post', [PostController::class, 'number_comments_post']);





  
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
  
//Login the user using the API
Route::post('login', [AuthController::class, 'signin']);

//Registers the user using the API
Route::post('register', [AuthController::class, 'signup']);
     
//The user needs to login in order to use this endpoints
Route::middleware('auth:sanctum')->group( function () {
    Route::get('/user/userId', [UserController::class, 'userId']);

    //Get posts from the selected user
    Route::get('user/{idUser}/posts', [UserController::class, 'user_posts']);

    //Add Post
    Route::post('posts/create_post', [PostController::class, 'store']);

    //Delete Post
    Route::post('posts/delete_post/', [PostController::class, 'delete_post']);

    //Get last Post from user
    Route::get('user/{idUser}/last_post', [UserController::class, 'last_post']);

    //User Endpoints
    Route::get('user/{idUser}', [UserController::class, 'get_user_by_id']);

    //Update User
    Route::put('user/update', [UserController::class, 'update']);

    //Get user by username
    Route::get('user/by_username/{username}', [UserController::class, 'get_user_by_username']);

    //Is the user already a friend?
    Route::get('user/is_friend/{currentUserId}/{userToAddId}', [UserController::class, 'get_is_already_friend']);

    //Send friend request
    Route::post('user/send_friend_request', [UserController::class, 'send_friend_request']);
    
    //Get friend requests
    Route::get('user/get_friend_requests/{userId}', [UserController::class, 'get_friend_requests']);
    
    //Get friends
    Route::get('user/get_friends/{userId}', [UserController::class, 'get_friends']);
    
    //Like a post
    Route::get('user/like_post/{userId}/{postId}', [UserController::class, 'like_post']);
    

});





