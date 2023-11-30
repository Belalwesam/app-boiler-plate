<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/

#localization middlewares and prefixing
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect']], function () {
    #add localized routes here and the prexfix them with admin keyword 
    Route::prefix('admin')->group(function () {
        #auth routes
        Route::view('login', 'admin.auth.login')->name('admin.login_form')->middleware('guest:admin');
        Route::post('login', [AuthController::class, 'login'])->name('admin.login')->middleware('guest:admin');


        Route::group(['middleware' => 'auth:admin', 'as' => 'admin.'], function () {
            #placeholder route 
            Route::view('/', 'admin.pages.index')->name('index');
        });
    });
});
