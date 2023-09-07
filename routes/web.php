<?php

use App\Http\Controllers\DashboardController;
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

Route::get('/', [DashboardController::class, 'index'] );

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