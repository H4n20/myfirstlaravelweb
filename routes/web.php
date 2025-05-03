<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Middleware\AuthenticateMiddleware;

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
// backend routes
Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index')
    ->middleware('admin');

// user routes
Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('index', [UserController::class, 'index'])->name('index')
        ->middleware('admin');
    Route::get('create', [UserController::class, 'create'])->name('create')
        ->middleware('admin');
    Route::post('store', [UserController::class, 'store'])->name('store')
        ->middleware('admin');
    Route::get('{id}/edit', [UserController::class, 'edit'])
        ->where(['id' => '[0-9]+'])->name('edit')
        ->middleware('admin');
    Route::post('{id}/update', [UserController::class, 'update'])
        ->where(['id' => '[0-9]+'])->name('update')
        ->middleware('admin');
    Route::get('{id}/delete', [UserController::class, 'delete'])
        ->where(['id' => '[0-9]+'])->name('delete')
        ->middleware('admin');
});

Route::get('admin', [AuthController::class, 'index'])->name('auth.admin')
    ->middleware('login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');