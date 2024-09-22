<?php
// auth routes

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\DashboardController;
use Illuminate\Support\Facades\Route;


Route::middleware('admin_guest')->prefix('/admin/')->group(function () {

    Route::get('login', [AdminController::class, 'getLogin'])->name('showLoginPage');
    Route::post('login', [AdminController::class, 'login'])->name('admin.login');

});

Route::middleware('admin_auth')->prefix('/admin/')->group(function(){
    
    //dashboard routes 
    Route::get('dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');
    
    // forms and table
    Route::get('form',[DashboardController::class,'getForm'])->name('admin.form');
    Route::get('table',[DashboardController::class,'getTable'])->name('admin.table');
    Route::get('logout', [DashboardController::class, 'logout'])->name('admin.logout');

});

