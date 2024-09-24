<?php

use App\Http\Controllers\backend\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admin.login');
});


require __DIR__ .'/admin.php';