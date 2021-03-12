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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/accounts/edit/{id}', function() {
    return view('edit');
});
Route::get('/accounts/password/change/{id}', function() {
    return view('changepassword');
});

Route::post('/home/posts/{id}', [App\Http\Controllers\HomeController::class, 'posts']);

Route::post('/home/{id}', [App\Http\Controllers\HomeController::class, 'update']);
Route::post('/accounts/password/change/{id}', [App\Http\Controllers\HomeController::class, 'changepassword']);