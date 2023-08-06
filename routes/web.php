<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CronController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\Admin\AdminController;
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
Route::get('/mail',[FooterController::class, 'sendEmailToAllUsers']);
// Route for the cron job to call
Route::get('/delete-old-messages', [CronController::class, 'deleteOldMessages']);

Route::get('/', function () {
    return view('index');
})->name('/');

//CONTROLLER TO CONTACT-US
Route::post('/contact-us',[App\Http\Controllers\ContactUsController::class, 'contact'])->name('contact-us');

//FOOTER ROUTES
Route::get('/termsAndConditions', [App\Http\Controllers\FooterController::class, 'terms'])->name('terms');
Route::get('/disclaimer', [App\Http\Controllers\FooterController::class, 'disclaimer'])->name('disclaimer');
Route::get('/privacy-policy', [App\Http\Controllers\FooterController::class, 'privacy'])->name('privacy');
//ADMINISTRATION
Route::get('/admin/bojuboju/a/d/m/i/n', [AdminController::class, 'index'])->name('admin');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/dashboard',[MessagesController::class, 'dashboard']);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/changeEmail',[App\Http\Controllers\HomeController::class, 'showChangeUsernameGet'])->name('showChangeUsernameGet');
    Route::post('/changeEmail',[App\Http\Controllers\HomeController::class, 'showChangeUsernamePost'])->name('showChangeUsernamePost');
    Route::get('/changePassword',[App\Http\Controllers\HomeController::class, 'showChangePasswordGet'])->name('changePasswordGet');
    Route::post('/changePassword',[App\Http\Controllers\HomeController::class, 'changePasswordPost'])->name('changePasswordPost');
});




Auth::routes();

Route::post('/sendMessage',[App\Http\Controllers\MessagesController::class, 'store'])->name('sendmessage');
Route::post('/deleteUser',[App\Http\Controllers\MessagesController::class, 'delete'])->name('deleteUser');
Route::get('/dashboard',[App\Http\Controllers\MessagesController::class, 'index'])->name('dashboard');
Route::get('/myMessages',[App\Http\Controllers\MessagesController::class, 'show'])->name('myMessages');
Route::get('/settings',[App\Http\Controllers\MessagesController::class, 'getSettings'])->name('changeSettings');
Route::get('/{username}',[App\Http\Controllers\MessagesController::class, 'display']);
