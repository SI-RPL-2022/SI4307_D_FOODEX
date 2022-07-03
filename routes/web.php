<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\MenuController;
use App\Http\Controllers\Dashboard\OrderController as DashboardOrderController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Dashboard\SubscriptionController;
use App\Http\Controllers\OrderController;
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

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/menus', [MainController::class, 'menus'])->name('menus');
Route::get('/article/{article}', [MainController::class, 'article'])->name('articles.show');
Route::get('/subscriptions', [MainController::class, 'subscription'])->name('subscription.index');
Route::get('/subscriptions/{subscription}', [MainController::class, 'showSubscription'])->name('subscription.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'auth']);
    Route::post('/register', [AuthController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [MainController::class, 'profile'])->name('profile');
    Route::post('/profile', [MainController::class, 'updateProfile'])->name('updateProfile');

    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin');
        Route::resource('articles', ArticleController::class, [
            'as' => 'admin'
        ]);
        Route::post('ckeditor/upload', [ArticleController::class, 'upload'])->name('ckeditor.image-upload');
        Route::resource('menus', MenuController::class, [
            'as' => 'admin'
        ]);
        Route::resource('subscriptions', SubscriptionController::class, [
            'as' => 'admin'
        ]);
        Route::resource('orders', DashboardOrderController::class, [
            'as' => 'admin'
        ]);
        Route::patch('orders/{order}/status', [DashboardOrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    });

    Route::middleware('user')->group(function () {
        Route::resource('cart', CartController::class);
        Route::resource('orders', OrderController::class);
        Route::post('/subscriptions/{subscription}', [MainController::class, 'addToCartSubscription'])->name('subscription.store');
        Route::patch('orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    });
});
