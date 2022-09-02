<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
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
    return view('index');
});

//FOOTER ROUTES
Route::get('/termsAndConditions', [App\Http\Controllers\FooterController::class, 'terms'])->name('terms');
Route::get('/disclaimer', [App\Http\Controllers\FooterController::class, 'disclaimer'])->name('disclaimer');
Route::get('/privacy-policy', [App\Http\Controllers\FooterController::class, 'privacy'])->name('privacy');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/dashboard',[MessagesController::class, 'dashboard']);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/changePassword',[App\Http\Controllers\HomeController::class, 'showChangePasswordGet'])->name('changePasswordGet');
    Route::post('/changePassword',[App\Http\Controllers\HomeController::class, 'changePasswordPost'])->name('changePasswordPost');
});

Auth::routes();
Route::resource('messages', 'App\Http\Controllers\MessagesController');
Route::get('/settings',[App\Http\Controllers\MessagesController::class, 'getSettings']);
Route::get('/{username}',[App\Http\Controllers\MessagesController::class, 'display']);

