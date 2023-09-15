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


Route::group(['prefix'=>'ideas', 'as'=>'ideas.'], function(){
    //add 'ideas' at start of route. ex: 'ideas/{ideas}'
    //and add 'ideas.' at the start of the name. ex: 'ideas.sshow'

    Route::post('', [IdeasController::class, 'store'] )->name('store');

    Route::get('/{ideas}', [IdeasController::class, 'show'] )->name('show');


    Route::group(['middleware'=>'auth'], function(){

        Route::get('/{ideas}/edit', [IdeasController::class, 'edit'] )->name('edit');

        Route::put('/{ideas}', [IdeasController::class, 'update'] )->name('update');

        Route::delete('/{ideas}', [IdeasController::class, 'destroy'] )->name('destroy');

        Route::post('/{ideas}/comments', [CommentController::class, 'store'] )->name('comments.store');

    });

});


Route::get('/terms', function () {
    return view('terms');
});

