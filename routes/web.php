<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AlbumPictureController;
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
})->name('home');

Route::resource('albums', AlbumController::class);

Route::resource('album_pictures', AlbumPictureController::class);

route::get('dwonload_picture/{picture_name}/{album_name}', [AlbumPictureController::class, 'dwonload_picture'])->name('dwonload_picture');