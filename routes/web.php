<?php

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderItemController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\EnsureUserIsAuthenticated;

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

Route::middleware('guest')->group(function(){
    Route::controller(UserController::class)->group(function () {
        Route::get('/login', 'loginView');
        Route::post('/login', 'login')->name('login');
    });
});

Route::controller(UserController::class)->group(function(){
    Route::get('/register', 'registerView');
    Route::post('/register', 'register')->name('register');
    Route::get('/update', 'profile');
    Route::post('/update', 'update')->name('update');
    Route::get('/search', 'searchnav');
    Route::get('/search', 'search')->name('search');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware('auth.check')->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::redirect('/', '/dashboard');
        Route::get('/dashboard','dashboard');
    });


    // Route::get('/dashboard', [DashboardController::class, 'Dashboard'])->name('dashboard');
    // Route::get('/dashboard', [DashboardController::class, 'nav'])->name('nav');

    Route::prefix('category')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'catView');
        Route::get('/add', 'addCategoryView');
        Route::post('/add', 'addCategory')->name('addCategory');
        Route::get('/hapus/{id}', 'hapusCat');
        Route::get('/edit/{id}', 'editCategoryView');
        Route::post('/edit/{id}', 'editData')->name('editCategory');
    });


    Route::prefix('product')->controller(ProductController::class)->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/add', [ProductController::class, 'create']);
        Route::post('/add', [ProductController::class, 'store'])->name('addProduct');
        Route::get('/edit/{id}', [ProductController::class, 'edit']);
        Route::post('/edit/{id}', [ProductController::class, 'update']);
        Route::get('/hapus/{id}', [ProductController::class, 'destroy']);
    });

    //Order

    Route::prefix('order')->controller(OrderController::class)->group(function () {
        Route::get('/', [OrderController::class, 'index']);
        Route::get('/add/', [OrderController::class, 'create']);
        Route::post('/add/', [OrderController::class, 'store'])->name('addData');
        Route::get('/hapus/{id}', [OrderController::class, 'destroy']);
        Route::get('/edit/{id}', [OrderController::class, 'edit']);
        Route::post('/edit/{id}', [OrderController::class, 'update']);
    });


    Route::prefix('orderitem')->controller(OrderItemController::class)->group(function () {
        Route::get('', [OrderItemController::class, 'index']);
        Route::get('/add/', [OrderItemController::class, 'create'])->name('orderitem');
        Route::post('/add/', [OrderItemController::class, 'store'])->name('addData');
        Route::get('/edit/{id}', [OrderItemController::class, 'edit']);
        Route::post('/edit/{id}', [OrderItemController::class, 'update']);
        Route::get('/hapus/{id}', [OrderItemController::class, 'destroy']);
    });

});





