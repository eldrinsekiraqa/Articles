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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::namespace('App\Http\Controllers')->middleware('auth','verified')->group(function(){
    Route::resource('/articles','ArticlesController',['except'=>['show','index','update','destroy','edit']]);
    Route::resource('/my_articles','MyArticlesController',['except'=>['show','store','edit','create']]);

});


