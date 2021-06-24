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
Route::get('/portfolio-details/{id}', [\App\Http\Controllers\Frontend\PagesController::class, 'portfolio_details'])->name('portfolio.details');
Route::post('/contact', [\App\Http\Controllers\Frontend\PagesController::class, 'contact'])->name('contact');

Auth::routes();
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.index');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function (){
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function (){
        Route::resource('pages', \App\Http\Controllers\Backend\AdminPageController::class);
        Route::resource('category', \App\Http\Controllers\Backend\CategoryController::class);
        Route::resource('portfolio', \App\Http\Controllers\Backend\PortfolioController::class);
        Route::get('portfolio/image/delete/{id}', [\App\Http\Controllers\Backend\PortfolioImageController::class, 'destroy'])
            ->name('portfolio_image.destroy');
    });
});
