<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;

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

Route::name('admin.')->middleware(['guest'])->group(function () {

    Route::controller(LoginController::class)->group(function () {
        Route::get('/', 'index')->name('login.form');
        Route::post('/', 'authenticate')->name('login');
        //signup

        Route::get('/signup', 'signupform')->name('signup.form');
        Route::post('/signup', 'signup')->name('signup');
        //signup

        Route::get('/forgot-password', 'forgotpasswordform')->name('forgotpassword.form');
        Route::post('/forgot-password', 'forgotpassword')->name('forgotpassword');
        //signup

        Route::get('/reset-password/{token}', 'resetpasswordform')->name('resetpassword.form');
        Route::post('/reset-password', 'resetpassword')->name('resetpassword');
    });
});


Route::prefix('admin')->name('admin.')->middleware(['auth', 'history'])->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::post('/logout', 'logout')->name('logout');
        Route::resource('/employee', EmployeeController::class);
        Route::resource('/customer', CustomerController::class);
    });
});
