<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/user/registration', [UserController::class, 'registration']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/user/register', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/user/edit', [UserController::class, 'edit'])->name('user_edit');
    Route::post('/user/update', [UserController::class, 'update'])->name('user_update');

    Route::resource('/books', BookController::class);
});

Route::fallback(function () {
    return redirect()->route('home');
});
