<?php

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

Route::get('/', [\App\Http\Controllers\Frontend\PagesController::class, 'index'])->name('index');
Route::get('/portfolio-details', [\App\Http\Controllers\Frontend\PagesController::class, 'portfolio'])->name('portfolio');

Auth::routes();
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.index');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function (){
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function (){
        Route::resource('pages', \App\Http\Controllers\Backend\AdminPageController::class);
        Route::resource('category', \App\Http\Controllers\Backend\CategoryController::class);
        Route::resource('portfolio', \App\Http\Controllers\Backend\PortfolioController::class);
    });
});
