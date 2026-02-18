<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login',[AdminController::class,"login"])->name("admin.login");
Route::post('/admin/auth',[AdminController::class,"auth"])->name("admin.auth");

Route::middleware(['role:admin'])
    ->prefix("admin")
    ->as("admin.") // Tüm alt rotaların isimlerine "admin." ön ekini ekler
    ->group(function() {
        
        // URL: /admin/index | İsim: admin.index
        Route::get('index', [AdminController::class, "index"])->name("index");
        
        // URL: /admin/logout | İsim: admin.logout
        Route::get('logout', [AdminController::class, "logout"])->name("logout");

        // URL: /admin/categories | İsim: admin.categories.index (ve diğerleri)
        Route::resource('categories', CategoryController::class);
        
    });