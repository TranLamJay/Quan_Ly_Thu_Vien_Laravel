<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\BookController as UserBookController;

Route::get("/", function(){
return View('User.index');
});
Route::middleware('auth')->group(function (){
    Route::prefix('user')->group(function(){
    });
});

Route::prefix('/books')->group(function () {
    Route::get('/',[UserBookController::class, 'index']);
    Route::get('/{id}',[UserBookController::class, 'detail']);
});

Route::get ('/admin/login',[LoginController::class,'index'])->name('login');
Route::post ('/admin/login/store',[LoginController::class,'store']);

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

        Route::prefix('users')->group(function () {
            Route::get('add',[UserController::class,'create']);
            Route::post ('add', [UserController::class,'store']);
            Route::get ('list_librarian', [UserController::class,'index']);
            Route::get ('list_readers', [UserController::class,'index']);
            Route::get ('edit/{category}', [UserController::class,'show']);
            Route::post ('edit/{category}', [UserController::class,'update']);
            Route::get('destroy',[UserController::class,'destroy']);
        });

        Route::prefix('author')->group(function () {
            Route::get('add',[AuthorController::class,'create']);
            Route::post ('add', [AuthorController::class,'store']);
            Route::get ('list', [AuthorController::class,'index']);
            Route::get ('edit/{category}', [AuthorController::class,'show']);
            Route::post ('edit/{category}', [AuthorController::class,'update']);
            Route::get('destroy',[AuthorController::class,'destroy']);
        });

        Route::prefix('books')->group(function () {
            Route::get('add',[BookController::class,'create']);
            Route::post ('add', [BookController::class,'store']);
            Route::get ('list', [BookController::class,'index']);
            Route::get ('edit/{category}', [BookController::class,'show']);
            Route::post ('edit/{category}', [BookController::class,'update']);
            Route::get('destroy',[BookController::class,'destroy']);
        });

        Route::post('upload/{services}',[UploadController::class,'store']);
    });
});


