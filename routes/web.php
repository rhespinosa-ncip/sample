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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->group(function () {
    Route::prefix('add')->group(function () {
        Route::get('', [App\Http\Controllers\HomeController::class, 'add'])->name('addUser');
        Route::post('submit', [App\Http\Controllers\HomeController::class, 'submit'])->name('submitUser');
    });

    Route::prefix('update')->group(function () {
        Route::get('{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('editUser');
        Route::post('submit/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('updateUser');
    });
});
