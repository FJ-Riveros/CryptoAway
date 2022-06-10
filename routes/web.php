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

Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/posts', [App\Http\Controllers\PostController::class, 'index']);

// Route::get('/timeline', function (){
//     return view('header');
// });

Route::get('/timeline', [App\Http\Controllers\TimelineController::class, 'index'])->name('timeline');

Route::get('/friends', [App\Http\Controllers\FriendsController::class, 'index']);

Route::get('/edit_profile', [App\Http\Controllers\EditProfileController::class, 'index']);

Route::get('/timeline/{userId}', [App\Http\Controllers\TimelineController::class, 'observeTimeline']);


//Only available to the admin role
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin_dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
});







