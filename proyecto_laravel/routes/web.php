<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
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

Route::middleware(['auth'])->group(function () {

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
    });
});



require __DIR__ . '/auth.php';
