<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\SourceController;
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

//admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function() {
    Route::get('/', AdminController::class)
        ->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
    Route::resource('sources', SourceController::class);

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

