<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

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

Route::get('', fn()=>to_route('jobs.index'));

Route::resource('jobs', JobController::class)
->only(['index', 'show'])
    ->names('jobs');

Route::get('login', fn()=>to_route('auth.create'))->name('login');
Route::resource('auth', AuthController::class)
    ->only(['create', 'store'])
    ->names('auth');

Route::delete('logout', fn()=>to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])
    ->name('auth.destroy');
