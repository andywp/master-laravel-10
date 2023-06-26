<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
    Route::view('/login','admin.auth.login')->name('login');
    Route::post('/login',[App\Http\Controllers\Admin\AdminController::class,'check'])->name('login');
});

Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
    Route::view('/','admin.home')->name('home');
    Route::post('/logout',[App\Http\Controllers\Admin\AdminController::class,'logout'])->name('logout');
    Route::prefix('profile')->name('profile.')->group(function(){
        Route::get('/', [App\Http\Controllers\Admin\AdminUserController::class,'index'])->name('index');
        Route::put('/{id}/update',  [App\Http\Controllers\Admin\AdminUserController::class,'update'])->name('update');
        Route::put('/{id}/update-password',  [App\Http\Controllers\Admin\AdminUserController::class,'updatepassword'])->name('password');
        //Route::delete('/{id}/delete', [App\Http\Controllers\Admin\AdminUserController::class,'destroy'])->name('destroy');
    });

});