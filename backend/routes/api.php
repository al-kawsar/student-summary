<?php

use App\Http\Controllers\Api\GuruController;
use App\Http\Controllers\Api\InformasiController;
use App\Http\Controllers\Api\SiswaController;
use App\Http\Controllers\Api\User;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(SiswaController::class)
    ->prefix('students')
    ->group(function () {
        Route::get('/', 'getData');
        Route::get('/{siswa:username}', 'getDetailSiswa');
        Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
            Route::post('/', 'store');
            Route::put('/{siswa:uuid}', 'edit');
            Route::delete('/{siswa:uuid}', 'delete');
        });
    });

Route::controller(GuruController::class)
    ->prefix('teachers')
    ->group(function () {
        Route::get('/', 'getData');
        Route::get('/{guru:username}', 'getDetailGuru');
        Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
            Route::post('/', 'store');
            Route::put('/{guru:uuid}', 'edit');
            Route::delete('/{guru:uuid}', 'delete');
        });
    });

Route::controller(InformasiController::class)
    ->prefix('announcements')
    ->group(function () {
        Route::get('/', 'getData');
        Route::get('/{slug}', 'getDetail');
        Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
            Route::post('/', 'store');
            Route::put('/{slug}', 'edit');
            Route::delete('/{slug}', 'delete');
        });
    });

Route::view('/about', 'pages.about')->name('about.index');

Route::name('auth.')->prefix('auth')->middleware(['guest'])->group(function(){
    Route::get('register', 'registerPage')->name('register.index');
    Route::post('register', 'register')->name('register');
    Route::get('login', 'loginPage')->name('login.index');
    Route::post('login', 'login')->name('login');
    Route::get('logout', 'logout')->name('logout')->withoutMiddleware(['guest'])->middleware(['auth']);
});

// Route::middleware(['auth',])
