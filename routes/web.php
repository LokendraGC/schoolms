<?php

use App\Http\Controllers\backend\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login',[AdminController::class,'getLogin'])->name('admin.login');
Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('/form',[AdminController::class,'getForm'])->name('general-form');