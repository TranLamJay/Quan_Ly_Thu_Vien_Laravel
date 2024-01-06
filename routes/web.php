<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CallCardController;
use App\Http\Controllers\Admin\LanguageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\BookController as UserBookController;
use App\Http\Controllers\User\AuthorController as UserAuthorController;
use App\Http\Controllers\User\CallCardController as UserCallCardController;
use App\Http\Controllers\User\OrderController;

/////////////User
Route::get('/',[UserBookController::class, 'index'])->name('user');;
Route::middleware('auth')->group(function () {
    Route::get('/my-book', [UserCallCardController::class, 'myBook'])->name('my_book');
    Route::get('/request-extend/{id}', [UserCallCardController::class, 'requestExtend'])->name('requestExtend');
});

Route::prefix('/books')->group(function () {
    Route::get('/',[UserBookController::class, 'index']);
    Route::get('/{id}',[UserBookController::class, 'detail']);
});

Route::get('/contact',function () {
    return view('User/contact');
});

Route::get('/about',function () {
    return view('User/about');
});

Route::prefix('/authors')->group(function () {
    Route::get('/',[UserAuthorController::class, 'index']);
    Route::get('/author-detail',[UserAuthorController::class, 'detail']);
});

Route::middleware('auth')
    ->prefix('/orders')
    ->name('orders.')
    ->group(function () {
    Route::get('/',[OrderController::class, 'index'])->name('index');
});


//////////////Admin
Route::get ('/login',[LoginController::class,'index'])->name('login');
Route::post ('/login/store',[LoginController::class,'store']);
Route::get ('/register',[LoginController::class,'register'])->name('register');
Route::post ('/register/create',[LoginController::class,'create']);
Route::get ('/logout',[LoginController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get ('/', [MainController::class, 'index'])->name('admin');
        Route::get ('main', [MainController::class, 'index']);


        Route::prefix('menus')->group(function () {
            Route::get ('add', [MenuController::class,'create']);
            Route::post ('add', [MenuController::class,'store']);
            Route::get ('list', [MenuController::class,'index']);
            Route::get ('edit/{category}', [MenuController::class,'show']);
            Route::post ('edit/{category}', [MenuController::class,'update']);
            Route::get('destroy',[MenuController::class,'destroy']);
        });

        Route::prefix('languages')->group(function () {
            Route::get ('add', [LanguageController::class,'create']);
            Route::post ('add', [LanguageController::class,'store']);
            Route::get ('list', [LanguageController::class,'index']);
            Route::get ('edit/{language}', [LanguageController::class,'show']);
            Route::post ('edit/{language}', [LanguageController::class,'update']);
            Route::get('destroy',[LanguageController::class,'destroy']);
        });

        Route::prefix('users')->group(function () {
            Route::get('add',[UserController::class,'create']);
            Route::post ('add', [UserController::class,'store']);
            Route::get ('list', [UserController::class,'index']);
            Route::get ('edit/{user}', [UserController::class,'show']);
            Route::post ('edit/{user}', [UserController::class,'update']);
            Route::get('destroy',[UserController::class,'destroy']);
        });

        Route::prefix('author')->group(function () {
            Route::get('add',[AuthorController::class,'create']);
            Route::post ('add', [AuthorController::class,'store']);
            Route::get ('list', [AuthorController::class,'index']);
            Route::get ('edit/{author}', [AuthorController::class,'show']);
            Route::post ('edit/{author}', [AuthorController::class,'update']);
            Route::get('destroy',[AuthorController::class,'destroy']);
        });

        Route::prefix('books')->group(function () {
            Route::get('add',[BookController::class,'create']);
            Route::post ('add', [BookController::class,'store']);
            Route::get ('list', [BookController::class,'index']);
            Route::get ('edit/{book}', [BookController::class,'show']);
            Route::post ('edit/{book}', [BookController::class,'update']);
            Route::get('destroy',[BookController::class,'destroy']);
        });   

        Route::prefix('callCards')->group(function () {
            Route::get ('list', [CallCardController::class,'index']);
            Route::get ('list/detail/{callCard}', [CallCardController::class,'detail']);
            Route::get ('edit/{book}', [CallCardController::class,'show']);
            Route::post ('edit/{book}', [CallCardController::class,'update']);
            Route::get('destroy',[CallCardController::class,'destroy']);
            Route::get('handle-extend/{id}', [CallCardController::class, 'handleExtend']);
            Route::get('handle-status/{id}', [CallCardController::class, 'handleStatus']);
        });
    });
});


