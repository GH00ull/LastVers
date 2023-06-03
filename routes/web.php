<?php

use App\Http\Controllers\AdsController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'middleware' => 'auth'
    ],
    function () {
        Route::get('/ads/creat', [ShowController::class, 'Adscreat'])->name('ads.creat');
        Route::post('/ads/creat/creation', [AdsController::class, 'creat'])->name('ads.creation');
        // * админ панель  
        Route::group(['middleware' => 'admin'], function () {
            Route::get('/123', function () {
                dd('хуй соси');
            });
        });
    }
);

// ! вывод страниц 
Route::get('/', [ShowController::class, 'home'])->name('home');
Route::get('/creat', [ShowController::class, 'registration'])->name('registration');
Route::get('/login', [ShowController::class, 'login'])->name('login');
Route::get('/ads/show', [ShowController::class, 'adsshow'])->name('adsShow');
// TODO: написать контролер + в БД написать запись
Route::view('/about', 'about')->name('about');
// ! логика проэкта 

// * логика регистрации
Route::post('/creat/user', [UserController::class, 'CreateUser'])->name('create.user');
Route::get('/show/user', [UserController::class, 'ShowUser'])->name('show.user');
Route::get('/show/user/post', [UserController::class, 'showUserPost'])->name('show.user.post');
// * логика входа в акаунт
Route::post('/login/user', [UserController::class, 'LoginUser'])->name('login.user');
// * Вызод из акаунта
Route::get('/logout', [UserController::class, 'logout'])->name('logout');