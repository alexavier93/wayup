<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SolutionItemsController;
use App\Http\Controllers\Admin\SolutionsController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/admin', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin');
Route::post('/admin/do_login', [App\Http\Controllers\Admin\AuthController::class, 'do_login'])->name('admin.do_login');
Route::get('/admin/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('admin.logout');
Route::get('/admin/password', [App\Http\Controllers\Admin\AuthController::class, 'password'])->name('admin.password');

Route::group(['middleware' => 'auth'], function () {

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::prefix('dashboard')->name('dashboard.')->group(function () {
            Route::get('', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('index');
        });

        Route::resources([
            'users' => UserController::class,
            'banners' => BannerController::class,
            'solutions' => SolutionsController::class,
            'solution_items' => SolutionItemsController::class,
            'categories' => CategoryController::class,
            'posts' => PostController::class,
        ]);

        // SOLUTIONS
        Route::prefix('solutions')->name('solutions.')->group(function () {
            Route::get('/solution/{solution}', [SolutionsController::class, 'solution'])->name('solution');
            Route::post('/delete', [SolutionsController::class, 'delete'])->name('delete');
        });

        // SOLUTION ITEMS
        Route::prefix('solution_items')->name('solution_items.')->group(function () {
            Route::get('/create/{solution_id}', [SolutionItemsController::class, 'create'])->name('create');
            Route::post('/delete', [SolutionItemsController::class, 'delete'])->name('delete');
        });

        // CATEGORIES
        Route::prefix('categories')->name('categories.')->group(function () {
            Route::post('/delete', [CategoryController::class, 'delete'])->name('delete');
        });

        // POSTS
        Route::prefix('posts')->name('posts.')->group(function () {
            Route::post('/delete', [PostController::class, 'delete'])->name('delete');
        });

        // BANNERS
        Route::prefix('banners')->name('banners.')->group(function () {
            Route::post('/delete', [BannerController::class, 'delete'])->name('delete');
        });

        // USUÁRIOS
        Route::prefix('users')->name('users.')->group(function () {
            Route::post('/delete', [UserController::class, 'delete'])->name('delete');
        });

        // MESSAGES
        Route::prefix('messages')->name('messages.')->group(function () {
            Route::get('', [MessageController::class, 'index'])->name('index');
            Route::get('/{message}', [MessageController::class, 'show'])->name('show');
            Route::post('/delete', [MessageController::class, 'delete'])->name('delete');
        });
    });
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('grupo-grotta')->name('quemsomos.')->group(function () {
    Route::get('/', [App\Http\Controllers\QuemSomosController::class, 'index'])->name('index');
});

Route::prefix('solucoes')->name('solucoes.')->group(function () {
    Route::get('/', [App\Http\Controllers\SolucoesController::class, 'index'])->name('index');
    Route::get('/{solucao}', [App\Http\Controllers\SolucoesController::class, 'info'])->name('info');
});

// BLOG
Route::prefix('blog')->name('blog.')->group(function(){
    Route::get('/', [App\Http\Controllers\BlogController::class, 'index'])->name('index');
    Route::get('/{post}', [App\Http\Controllers\BlogController::class, 'posts'])->name('posts');
});

Route::prefix('contato')->name('contato.')->group(function () {
    Route::get('/', [App\Http\Controllers\ContatoController::class, 'index'])->name('index');
    Route::post('/enviaEmail', [App\Http\Controllers\ContatoController::class, 'enviaEmail'])->name('enviaEmail');
});
