<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\TagsController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Client\ArticlesController;
use App\Http\Controllers\Client\CategoryController;
use App\Admin\Controllers\HomeController as AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function() {
    Route::post('/register', 'store')->name('register');
    Route::post('/login', 'login')->name('login');
    // Route::post('/authenticate', 'authenticate')->name('authenticate');
    // Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/blogs', [HomeController::class,'get_all_blogs'])->name('get_all_blogs');

Route::get('/search', [HomeController::class,'search'])->name('view_search');

Route::post('/search', [HomeController::class,'search'])->name('search');

Route::get('/news', [HomeController::class,'news'])->name('news');

Route::post('/comments', [CommentController::class,'store'])->name('comments');

Route::get('/categories', [CategoryController::class,'index'])->name('categories');

Route::get('/tags', [TagsController::class,'index'])->name('tags');

Route::middleware(['checklogin'])->group(function () {
    Route::get('/articles', [ArticlesController::class,'index'])->name('articles');
    Route::get('/articles/create', [ArticlesController::class,'create'])->name('articles.create');
    Route::post('/articles/create', [ArticlesController::class,'store'])->name('articles.store');
    Route::get('/articles/update/{id}', [ArticlesController::class,'edit'])->name('articles.edit');
    Route::post('/articles/update/{id}', [ArticlesController::class,'update'])->name('articles.update');
    Route::delete('/articles/delete/{id}', [ArticlesController::class,'destroy'])->name('articles.delete');
});

Route::get('/{slug}', [HomeController::class,'show'])->name('show_blog');
