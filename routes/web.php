<?php

use App\Http\Controllers\Backend\{
    RoleController,
    UserController,
};

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
    return view('welcome');
});

Auth::routes();


// Route::resource('dashboard', DashboardController::class);

Route::group(['middleware' => ['auth', 'role']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('roles', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('user', UserController::class);

    Route::get('profile/{id}', [UserController::class, 'myProfile'])->name('profile');
// roles

Route::match(['get', 'post'], 'roles/{id}/add', [RoleController::class, 'add'])->name('roles.add');

    Route::post('user/edit-step-one/{id}', [UserController::class, 'posteditStepOne'])
    ->name('user.edit.step.one.post');


    Route::post('user/edit-step-two/{id}', [UserController::class, 'posteditStepTwo'])
    ->name('user.edit.step.two.post');


    Route::post('user/edit-step-three/{id}', [UserController::class, 'posteditStepThree'])
    ->name('user.edit.step.three.post');

    Route::post('user/edit-step-four/{id}', [UserController::class, 'posteditStepFour'])
    ->name('user.edit.step.four.post');

    Route::post('user/edit-step-five/{id}', [UserController::class, 'posteditStepFive'])
    ->name('user.edit.step.five.post');

    Route::any('/user/data/role', [RoleController::class, 'data'])->name('role.user');



    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
});
