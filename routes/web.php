<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Auth\UserController;
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

Route::group(['middleware' =>['auth']],function() {
    Route::get('dashboard', [HomeController::class, 'index'])->name('index.admin');
    Route::prefix('/rack')->group(function () {
        Route::get('/index', [HomeController::class, 'rack_index'])->name('rack.index');
        Route::post('/add', [HomeController::class, 'rack_add'])->name('rack.add');
        Route::get('/fetch/{id}', [HomeController::class, 'rack_edit'])->name('rack.edit');
        Route::post('/update/{id}', [HomeController::class, 'rack_update'])->name('rack.update');
        Route::get('/delete/{id}', [HomeController::class, 'rack_delete'])->name('rack.delete');


        Route::get('/details', [HomeController::class, 'rack_details'])->name('rack.details');
        Route::get('/{id}/items', [HomeController::class, 'rack_items'])->name('rack.items');


    });
    Route::prefix('/book')->group(function () {
        Route::get('/index', [BookController::class, 'book_index'])->name('book.index');
        Route::post('/add', [BookController::class, 'book_add'])->name('book.add');
        Route::get('/fetch/{id}', [BookController::class, 'book_edit'])->name('book.edit');
        Route::post('/update/{id}', [BookController::class, 'book_update'])->name('book.update');
        Route::get('/delete/{id}', [BookController::class, 'book_delete'])->name('book.delete');
        Route::get('/search', [BookController::class, 'books_search'])->name('books.search');
    });


    Route::prefix('/users')->group(function () {
        Route::get('/all', [HomeController::class, 'all'])->name('all.users');
        Route::get('/delete/{id}', [HomeController::class, 'user_del'])->name('user.delete');
        Route::get('/fetch/{id}', [HomeController::class, 'user_edit'])->name('user.edit');
        Route::post('/update/{id}', [HomeController::class, 'user_update'])->name('user.update');
    });


    Route::get('/logout',[UserController::class, 'logout'])->name('logout');
});

    Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
    Route::post('/user/add', [UserController::class, 'save'])->name('user.add');
    Route::get('/', [UserController::class, 'login_index'])->name('login');
    Route::post('/user/do/login', [UserController::class, 'login'])->name('login.do');

