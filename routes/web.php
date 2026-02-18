<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login',[AdminController::class,"login"])->name("admin.login");
Route::post('/admin/auth',[AdminController::class,"auth"])->name("admin.auth");

Route::middleware(['role:admin'])->prefix("admin")->group(function(){
    Route::get('index', [AdminController::class,"index"])->name("admin.index");

    
});