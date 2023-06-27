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

    Route::prefix('gallery')->name('gallery.')->group(function(){
        Route::get('/', [App\Http\Controllers\Admin\GalleryController::class,'index'])->name('index');
        Route::post('data',[App\Http\Controllers\Admin\GalleryController::class,'dataTable'])->name('data');
        Route::get('/create', [App\Http\Controllers\Admin\GalleryController::class,'create'])->name('create');
        Route::post('/create', [App\Http\Controllers\Admin\GalleryController::class,'store'])->name('store');
        //Route::get('/{id}/show', [App\Http\Controllers\Admin\GalleryController::class,'show'])->name('show');
        //Route::get('/{id}/edit', [App\Http\Controllers\Admin\GalleryController::class,'edit'])->name('edit');
        //Route::put('/{id}/update',  [App\Http\Controllers\Admin\GalleryController::class,'update'])->name('update');
        Route::post('/update', [App\Http\Controllers\Admin\GalleryController::class,'update'])->name('update');
        Route::delete('/{id}/delete', [App\Http\Controllers\Admin\GalleryController::class,'destroy'])->name('destroy');
        Route::post('/publish', [App\Http\Controllers\Admin\GalleryController::class,'publish'])->name('publish');

        Route::post('data-photo/{id}',[App\Http\Controllers\Admin\GalleryController::class,'dataTableGallery'])->name('dataphoto');
        Route::get('/{id}/photo', [App\Http\Controllers\Admin\GalleryController::class,'photo'])->name('photo');
        Route::post('/store-photo', [App\Http\Controllers\Admin\GalleryController::class,'storePhoto'])->name('storephoto');
        Route::post('/delete-photo', [App\Http\Controllers\Admin\GalleryController::class,'deletePhoto'])->name('deletephoto');
        Route::delete('/{id}/destroy-photo', [App\Http\Controllers\Admin\GalleryController::class,'photodestroy'])->name('photodestroy');
        Route::post('/update-photo', [App\Http\Controllers\Admin\GalleryController::class,'updatePhoto'])->name('updatephoto');
    });

    Route::prefix('video')->name('video.')->group(function(){
        Route::get('/', [App\Http\Controllers\Admin\VideoController::class,'index'])->name('index');
        Route::get('create', [App\Http\Controllers\Admin\VideoController::class,'create'])->name('create');
        Route::post('preview',[App\Http\Controllers\Admin\VideoController::class,'preview'])->name('preview');
        Route::post('data',[App\Http\Controllers\Admin\VideoController::class,'dataTable'])->name('data');
        Route::post('store', [App\Http\Controllers\Admin\VideoController::class,'store'])->name('store');

        Route::get('{id}/edit', [App\Http\Controllers\Admin\VideoController::class,'edit'])->name('edit');

        Route::put('{id}/update', [App\Http\Controllers\Admin\VideoController::class,'update'])->name('update');
        Route::post('publish', [App\Http\Controllers\Admin\VideoController::class,'publish'])->name('publish');
        Route::delete('{id}/destroy', [App\Http\Controllers\Admin\VideoController::class,'destroy'])->name('destroy');

    });

});