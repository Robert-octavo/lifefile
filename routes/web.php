<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PDFController;

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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', fn () => to_route('users.index'))->name('home');

Route::resource('users', UserController::class);
//->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
Route::patch('users/{user}/access', [UserController::class, 'toggleAccess'])->name('users.toggle-access');
Route::get('login', fn () => to_route('auth.create'))->name('login');
Route::resource('auth', AuthController::class)
    ->only(['create', 'store']);

Route::delete('logout', fn () => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');

Route::resource('records', RecordController::class)
    ->only(['show']);

Route::get('generate-pdf/{user}', [PDFController::class, 'generatePDF'])->name('generate-pdf');

// Route::resource('users', UserController::class)
//     ->only(['create', 'store']);
