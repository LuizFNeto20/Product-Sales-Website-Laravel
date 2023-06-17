<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'list'])->name('home');
Route::get('/product/info/{id}', [ProductController::class, 'info'])->name('product.info');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user/list', [UserController::class, 'list'])->name('user.list');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/save', [UserController::class, 'save'])->name('user.save');
    Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

    Route::get('/category/list', [CategoryController::class, 'list'])->name('category.list');
    Route::get('/category/new', [CategoryController::class, 'new'])->name('category.new');
    Route::post('/category/save', [CategoryController::class, 'save'])->name('category.save');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/supplier/list', [SupplierController::class, 'list'])->name('supplier.list');
    Route::get('/supplier/new', [SupplierController::class, 'new'])->name('supplier.new');
    Route::post('/supplier/save', [SupplierController::class, 'save'])->name('supplier.save');
    Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::get('/supplier/delete/{id}', [SupplierController::class, 'delete'])->name('supplier.delete');

    Route::get('/product/list', [ProductController::class, 'list'])->name('product.list');
    Route::get('/product/new', [ProductController::class, 'new'])->name('product.new');
    Route::post('/product/save', [ProductController::class, 'save'])->name('product.save');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('/product/report', [ProductController::class, 'report'])->name('product.report');

    Route::get('/review/list', [ReviewController::class, 'reviewList'])->name('review.list');
    Route::post('/review/save/', [ReviewController::class, 'save'])->name('review.save');
    Route::get('/review/edit/{id}', [ReviewController::class, 'edit'])->name('review.edit');
    Route::get('/review/delete/{id}', [ReviewController::class, 'delete'])->name('review.delete');

    Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/list', [CartController::class, 'list'])->name('cart.list');
    Route::get('/cart/cancel', [CartController::class, 'cancel'])->name('cart.cancel');
    Route::get('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');

    Route::get('/order/list', [OrderController::class, 'list'])->name('order.list');
    Route::post('/order/save', [OrderController::class, 'save'])->name('order.save');
    Route::get('/order/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
    Route::post('/order/editStatus', [OrderController::class, 'editStatus'])->name('order.editStatus');
});

require __DIR__.'/auth.php';
