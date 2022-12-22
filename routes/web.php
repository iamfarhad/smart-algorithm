<?php

use App\Http\Controllers\Controller;
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

Route::get('/algorithm/iterative/{number}', [Controller::class, 'iterative'])->name('algorithm.iterative')->where('id', '[0-9]+');
Route::get('/algorithm/recursive/{number}', [Controller::class, 'recursive'])->name('algorithm.recursive')->where('id', '[0-9]+');
