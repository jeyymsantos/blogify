<?php

use Illuminate\Support\Facades\Routes;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

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
    return view('login');
});

Route::get('profile', [ProfileController::class, 'loadProfile'])-> name('profile');
Route::get('/view/{id}', [ProfileController::class, 'viewProfile'])-> name('view');

Route::get('/thoughts', [PostController::class, 'loadThoughts'])->name('thoughts');

Route::post('create_post', [PostController::class, 'createPost']);
Route::post('upload_profile', [ProfileController::class, 'storeProfile']);

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
