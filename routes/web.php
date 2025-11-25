<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::middleware('auth')->get('/', function () {
    return redirect()->route(
        auth()->user()->role === 'admin'
            ? 'admin.dashboard'
            : 'employee.dashboard'
    );
});

require __DIR__.'/employee.php';
require __DIR__.'/admin.php';
