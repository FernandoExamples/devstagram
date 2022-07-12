<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', HomeController::class)->name('index')->middleware('auth');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/crear-cuenta', [RegisterController::class, 'index'])->name('register');
Route::post('/crear-cuenta', [RegisterController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::post('/images', [ImageController::class, 'store'])->name('images.store');
    Route::delete('/images', [ImageController::class, 'destroy']);

    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/edit-profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/{user:username}', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/{user:username}/follow', [FollowerController::class, 'toggleFollow'])->name('follow.toggle');
