<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\HomeController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    // $router->get('/home', 'HomeController@index')->name('admin_home');

    $router->resource('categories', CategoryController::class);

    $router->resource('tags', TagController::class);

    $router->resource('articles', ArticlesController::class);

    $router->resource('users', UserController::class);

    $router->resource('comments', CommentController::class);

    $router->get('/', [HomeController::class,'index'])->name('admin_home');

});
