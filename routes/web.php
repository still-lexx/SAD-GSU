<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/contact', [App\Http\Controllers\contactcontroller::class, 'index'])->name('contact');

Auth::routes();

Route::post('/userinfo', [App\Http\Controllers\userinfoController::class, 'store'])->name('userinfo');
Route::get('/userinfo/delete/{id}', [App\Http\Controllers\userinfoController::class, 'destroy']);
