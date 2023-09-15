<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeasController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [DashboardController::class, 'index'] );
*/

Route::get('/', [DashboardController::class, 'index'] )->name('dashboard');

Route::post('/ideas', [IdeasController::class, 'store'] )->name('ideas.store');

Route::delete('/ideas/{ideas}', [IdeasController::class, 'destroy'] )->name('ideas.destroy');

Route::get('/ideas/{ideas}', [IdeasController::class, 'show'] )->name('ideas.show');

Route::get('/ideas/{ideas}/edit', [IdeasController::class, 'edit'] )->name('ideas.edit');

Route::put('/ideas/{ideas}', [IdeasController::class, 'update'] )->name('ideas.update');

Route::post('/ideas/{ideas}/comments', [CommentController::class, 'store'] )->name('ideas.comments.store');

// auth
Route::get('/register', [AuthController::class, 'register'] )->name('register');

Route::post('/register', [AuthController::class, 'store'] );

Route::get('/login', [AuthController::class, 'login'] )->name('login');

Route::post('/login', [AuthController::class, 'authenticate'] );

Route::post('/logout', [AuthController::class, 'logout'] )->name('logout');

//endof auth

Route::get('/terms', function () {
    return view('terms');
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/feed', function () {
//     return view('feed');
// });

// Route::get('/profile', function () {
//     return view('user.profile');
// });
