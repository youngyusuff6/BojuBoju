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
})->name('/');

//FOOTER ROUTES
Route::get('/termsAndConditions', [App\Http\Controllers\FooterController::class, 'terms'])->name('terms');
Route::get('/disclaimer', [App\Http\Controllers\FooterController::class, 'disclaimer'])->name('disclaimer');
Route::get('/privacy-policy', [App\Http\Controllers\FooterController::class, 'privacy'])->name('privacy');
//ADMINISTRATION
Route::get('/a/d/m/i/n', [App\Http\Controllers\FooterController::class, 'admin'])->name('admin');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/dashboard',[MessagesController::class, 'dashboard']);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/changeEmail',[App\Http\Controllers\HomeController::class, 'showChangeUsernameGet'])->name('showChangeUsernameGet');
    Route::post('/changeEmail',[App\Http\Controllers\HomeController::class, 'showChangeUsernamePost'])->name('showChangeUsernamePost');
    Route::get('/changePassword',[App\Http\Controllers\HomeController::class, 'showChangePasswordGet'])->name('changePasswordGet');
    Route::post('/changePassword',[App\Http\Controllers\HomeController::class, 'changePasswordPost'])->name('changePasswordPost');
});

Auth::routes();
//ROUTE TO OPEN MESSAGE IN NEW TAB
//Route::get('/share/{id}',[App\Http\Controllers\MessagesController::class, 'getMessages'])->name('getMessages');
//Route::resource('messages', 'App\Http\Controllers\MessagesController');
Route::post('/12345/{id}',[App\Http\Controllers\FooterController::class, 'postReaction'])->name('postReaction');

Route::post('/sendMessage',[App\Http\Controllers\MessagesController::class, 'store'])->name('sendmessage');
Route::post('/deleteUser',[App\Http\Controllers\MessagesController::class, 'delete'])->name('deleteUser');
Route::get('/dashboard',[App\Http\Controllers\MessagesController::class, 'index'])->name('dashboard');
Route::get('/myMessages',[App\Http\Controllers\MessagesController::class, 'show'])->name('myMessages');
Route::get('/settings',[App\Http\Controllers\MessagesController::class, 'getSettings'])->name('changeSettings');
Route::get('/{username}',[App\Http\Controllers\MessagesController::class, 'display']);

