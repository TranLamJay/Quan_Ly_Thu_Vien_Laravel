<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\OrderController;
use App\Models\Role;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get ('/admin/login',[LoginController::class,'index'])->name('login');
Route::post ('/admin/login/store',[LoginController::class,'store']);

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get ('/', [MainController::class, 'index'])->name('admin');
        Route::get ('main', [MainController::class, 'index']);


        Route::prefix('menus/users')->group(function () {
            Route::get ('add', [MenuController::class,'create']);
            Route::post ('add', [MenuController::class,'store']);
            Route::get ('list_librarian', [MenuController::class,'index']);
            Route::get ('list_readers', [MenuController::class,'index_2']);
        });
    });
});


Route::prefix('/books')->group(function (){
    Route::get('/', [BookController::class, 'all']);
    Route::get('/by-order', [BookController::class, 'getAllBookByOrder']);
});

Route::prefix('/orders')->group(function () {
    Route::post('/', [OrderController::class, 'create']);
});
