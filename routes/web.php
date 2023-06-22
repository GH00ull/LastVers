<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\ShowroomController;
use App\Http\Controllers\UserController;
use App\Mail\TestEmail;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'middleware' => 'auth'
    ],
    function () {
        Route::get('/ads/creat', [ShowController::class, 'Adscreat'])->name('ads.creat');
        Route::post('/ads/creat/creation', [AdsController::class, 'creat'])->name('ads.creation');
        Route::view('/cread/showroom', 'showroom.created')->name('creade.showroom');
        Route::get('/show/user', [UserController::class, 'ShowUser'])->name('show.user');
        Route::post('/cread/showroom', [ShowroomController::class, 'created'])->name('created.showroom');

        Route::group(['middleware' => 'showroom'], function () {
            Route::get('/showroom', function () { })->name('showroom');
        });
        Route::group(['middleware' => 'admin'], function () {
            Route::get('admin/ads', [AdminController::class, 'ads'])->name('admin.ads');
            Route::get('/admin', [AdminController::class, 'Show'])->name('admin');
            Route::get('/admin/user', [AdminController::class, 'User'])->name('admin.user');
            Route::get('/admin/user/{id}', [AdminController::class, 'UserUpdate'])->name('admin.user.update');
            Route::get('/admin/user/{id}/delite', [AdminController::class, 'Userdelite'])->name('admin.user.delite');
            Route::post('/admin/user/{id}/end', [AdminController::class, 'UserUpdateEnd'])->name('admin.user.updateEnd');
            Route::get('/admin/showroom', [AdminController::class, 'showroom'])->name('admin.showroom');
            Route::get('/admin/categori', [AdminController::class, 'categori'])->name('admin.city');
            Route::post('/admin/categori/barnd', [AdminController::class, 'CreateBrand'])->name('admin.brand');
            Route::get('/admin/categori/city/{id}', [AdminController::class, 'DeliteCity'])->name('admin.city.delite');
            Route::get('/admin/categori/barnd/delite/{id}', [AdminController::class, 'Delitebrand'])->name('admin.brand.delite');
            Route::post('/admin/categori/city', [AdminController::class, 'createcity'])->name('admin.city.create');

        });
    }
);
Route::get('/', [ShowController::class, 'home'])->name('home');
Route::get('/creat', [ShowController::class, 'registration'])->name('registration');
Route::get('/login', [ShowController::class, 'login'])->name('login');
Route::get('/ads/show', [ShowController::class, 'adsshow'])->name('adsShow');
// TODO: написать контролер + в БД написать запись
Route::view('/about', 'about')->name('about');
Route::post('/about/show', [UserController::class, 'message'])->name('about.show');

Route::post('/creat/user', [UserController::class, 'CreateUser'])->name('create.user');
Route::get('/show/user/post', [UserController::class, 'showUserPost'])->name('show.user.post');

Route::post('/login/user', [UserController::class, 'LoginUser'])->name('login.user');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/ads/show/{id}', [AdsController::class, 'Showone'])->name('ads.show.one');
Route::get('/ads/delite/{id}', [AdsController::class, 'deliteAds'])->name('ads.delite');
Route::post('/ads/filter', [AdsController::class, 'filter'])->name('ads.filter');