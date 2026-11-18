<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/register', [AuthController::class, 'register'])
    ->name('register');

Route::post('/register', [AuthController::class, 'store'])
    ->name('register.store');

Route::get('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])
    ->name('login.authenticate');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/admin', function () {
    return 'Welcome Admin! You have access.';
})->middleware(['auth', 'check.role'])->name('admin');

Route::get('/admin/users', [UserController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.users.index');

Route::put('/admin/users/{user}', [UserController::class, 'update'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.users.update');

Route::middleware('auth')->group(function () {

    Route::get('/categories', [CategoryController::class, 'index'])
        ->middleware('permission:view categories')
        ->name('categories.index');

    Route::get('/categories/create', [CategoryController::class, 'create'])
        ->middleware('permission:create categories')
        ->name('categories.create');

    Route::post('/categories', [CategoryController::class, 'store'])
        ->middleware('permission:create categories')
        ->name('categories.store');

    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
        ->middleware('permission:edit categories')
        ->name('categories.edit');

    Route::put('/categories/{category}', [CategoryController::class, 'update'])
        ->middleware('permission:edit categories')
        ->name('categories.update');

    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
        ->middleware('permission:delete categories')
        ->name('categories.destroy');

});

Route::middleware('auth')->group(function () {

    Route::get('/products', [ProductController::class, 'index'])
        ->middleware('permission:view products')
        ->name('products.index');

    Route::get('/products/create', [ProductController::class, 'create'])
        ->middleware('permission:create products')
        ->name('products.create');

    Route::post('/products', [ProductController::class, 'store'])
        ->middleware('permission:create products')
        ->name('products.store');

    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
        ->middleware('permission:edit products')
        ->name('products.edit');

    Route::put('/products/{product}', [ProductController::class, 'update'])
        ->middleware('permission:edit products')
        ->name('products.update');

    Route::delete('/products/{product}', [ProductController::class, 'destroy'])
        ->middleware('permission:delete products')
        ->name('products.destroy');

});
