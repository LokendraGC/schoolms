<?php

use App\Http\Controllers\backend\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


require __DIR__ .'/admin.php';