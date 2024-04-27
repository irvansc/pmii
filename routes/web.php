<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\back\RoleController;
use App\Http\Controllers\back\UserController;
use App\Http\Controllers\back\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware('auth')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('users', UserController::class);
    Route::post('/change-profile-picture', [UserController::class, 'changeProfilePicture'])->name('change-profile-picture');
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->name('logs');
        Route::prefix('konfigurasi')->name('konfigurasi.')->group(function(){
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
    });
});
