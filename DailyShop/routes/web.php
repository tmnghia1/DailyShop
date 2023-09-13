<?php

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
    return view('fontend.layouts.index');
});

Auth::routes();
Route::prefix('/home')->name('admin.')->group(function ()
{
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/logout', [App\Http\Controllers\HomeController::class,'logout'])->name('logout');
    Route::get('/account-setting/account', [App\Http\Controllers\admin\UserController::class,'index'])->name('account');
});


