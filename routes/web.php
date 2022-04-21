<?php

use App\Models\Page;
use App\Models\Home;
use App\Models\Image;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\PageController;
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

    return view('home', [
        'pages' => Page::all()
    ]);
})->name('home');

/* Route::resource('/page', PageController::class); */
Route::resource('/page', 'App\Http\Controllers\PageController');

Route::delete('/setting/destroy/{page}', [PageController::class, 'destroy']);