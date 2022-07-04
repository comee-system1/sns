<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;

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
Route::get('/sample', [SampleController::class, 'index'])->name('sample.index');
Route::get('/chatwork', [SampleController::class, 'chatwork'])->name('sample.chatwork');
Route::get('/line', [SampleController::class, 'line'])->name('sample.line');
Route::get('/gmail', [SampleController::class, 'gmail'])->name('sample.gmail');
