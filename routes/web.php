<?php

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'role:worker', 'prefix' => 'worker', 'as' => 'worker.'], function () {
        Route::resource('work', \App\Http\Controllers\worker\WorkerController::class);
    });
    Route::group(['middleware' => 'role:hirer', 'prefix' => 'hirer', 'as' => 'hirer.'], function () {
        Route::resource('hire', \App\Http\Controllers\hirer\HirerController::class);
    });
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    });
});