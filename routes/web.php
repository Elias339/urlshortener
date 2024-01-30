<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortenerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('generate-short-link',[ShortenerController::class,'index']);
Route::post('generate-short-link',[ShortenerController::class,'store'])->name('generate.short.link');
Route::get('{code}',[ShortenerController::class,'shortUrl'])->name('shorten.url');


Route::get('/', function () {
    return view('welcome');
});
