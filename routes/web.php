<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

Auth::routes();
// User Auth - login. ShareDatas is used for cart_count
Route::middleware('ShareDatas')->group(function (){

    Route::get('/login', [UserController::class, 'showLogin'] )->name('user.login');
    Route::post('/login', [UserController::class, 'postLogin'] )->name('user.login');

// User Auth - register
    Route::get('/register', [UserController::class, 'showRegister'] )->name('user.register');
    Route::post('/register', [UserController::class, 'postRegister'] )->name('user.register');

// User Page
    Route::get("/", [ PageController::class, "index" ])->name("index");
    Route::get("/product/detail/{slug}", [ PageController::class, "productDetail" ])->name("detail");
    Route::get("/product/category/{slug}", [ PageController::class, "byCategory" ])->name("filter.category");
    Route::get("/product/search", [ PageController::class, "bySearch" ])->name("filter.search");

// Add To Cart
    Route::get('/product/cart/add/{slug}', [PageController::class, 'addToCart'])->name('addToCart');
    Route::get('/product/cart/show', [PageController::class, 'showCart'])->name('showCart');

// Order Management
    Route::get('/product/order/make-order', [PageController::class, 'makeOrder'])->name('makeOrder');
    Route::get('/product/order/pending', [PageController::class, 'showPendingOrder'])->name('pending');
    Route::get('/product/order/complete', [PageController::class, 'showCompleteOrder'])->name('complete');

// Profile Management
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/profile', [UserController::class, 'changeProfile'])->name('user.profile');

});

Route::get('/home', [ HomeController::class, 'index'])->name('home');

Route::prefix('/admin-panel')->middleware('Admin')->group(function (){

    Route::get("/", [PageController::class, "home"])->name('admin.index');
    Route::get("/users", [PageController::class, "allUsers"])->name('admin.users');

    Route::get("/order/pending", [OrderController::class, "pending"])->name('order.pending');
    Route::get("/order/complete/{id}", [OrderController::class, "makeComplete"])->name('order.makecomplete');
    Route::get("/order/complete", [OrderController::class, "complete"])->name('order.complete');

    Route::resource('/category', CategoryController::class);

    Route::resource('/product', ProductController::class);

});
