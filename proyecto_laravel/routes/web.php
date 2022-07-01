<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TagController;
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

Route::middleware(['auth', 'permission:view'])->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(UserController::class)->group(function () {

        Route::get('/users', 'showAll')->name('users');

        Route::get('/user/{username}', 'showUser')->name('user');

        Route::delete('/user/{username}/delete', 'deleteUser')->name('user_delete');

        Route::patch('/user/{username}/update', 'updateUser')->name('user_update');
    });

    Route::controller(ImageController::class)->group(function () {

        Route::get('/images', 'showAll')->name('images');

        Route::get('/image/{id}', 'showImage')->name('image');

        Route::delete('/image/{id}/delete', 'deleteImage')->name('image_delete');

        Route::patch('/image/{id}/update', 'updateImage')->name('image_update');

        Route::post('/user/{username}/add/image', 'addImage')->name('image_add');
    });

    Route::controller(TagController::class)->group(function () {

        Route::get('/tags', 'showAll')->name('tags');

        Route::delete('/tag/{id}/delete', 'deleteTag')->name('tag_delete');

        Route::post('/tag/add', 'addTag')->name('tag_add');
    });
});



require __DIR__ . '/auth.php';
