<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactGroupController;
use Illuminate\Support\Facades\Auth;
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
    return view('Auth.login');
});

Route::get('/test', function () {
    return "raiyan";
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//peopleapi

Route::resource('/contactgroup', ContactGroupController::class);

//google
Route::get('/sign-in/google', [LoginController::class, 'google']);
Route::get('google/callback', [LoginController::class, 'googleRedirect']);

//callig the api
Route::get('/getgrouplist', [ContactGroupController::class, 'callhelper'])->name('contactgrouplist');

//example

route::get('/example', function () {
    return view('contactgroup.example');
});
