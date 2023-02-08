<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\SourceController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UsersController;
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

Route::group(['middleware' => 'auth'],  static function () {
    Route::get('/logout', [LoginController::class, 'logout'])
    ->name('account.logout');
    Route::get('/account', AccountController::class)
    ->name('account');

    //admin routes
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is.admin'], static function () {
        Route::get('/', AdminController::class)
            ->name('index');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('sources', SourceController::class);
        Route::resource('users', UsersController::class);
    });
});

Route::group(['prefix' => 'guest'], static function() {
    Route::get('/news', [NewsController::class, 'index'])
        ->name('news');
    Route::get('/news/{id}/show', [NewsController::class, 'show'])
        ->where('id', '\d+')
        ->name('news.show');

    Route::get('categories', [CategoryController::class, 'index'])
        ->name('categories');
    Route::get('/categories/{id}/show', [CategoryController::class, 'show'])
        ->where('id', '\d+')
        ->name('categories.show');

    Route::get('/info', [InfoController::class, 'info'])
        ->name('info');
    Route::get('/info/createUserForm', [InfoController::class, 'createUserForm'])
        ->name('createUserForm');
    Route::get('/info/createOrderForm', [InfoController::class, 'createOrderForm'])
        ->name('createOrderForm');
    Route::post('/info/storeUserForm', [InfoController::class, 'storeUserForm'])
        ->name('storeUserForm');
    Route::post('/info/storeOrderForm', [InfoController::class, 'storeOrderForm'])
        ->name('storeOrderForm');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
