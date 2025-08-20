<?php

use App\Http\Controllers\Complain\ComplainController;
use Illuminate\Support\Facades\Route;

Route::prefix('complain')->group(function () {
    Route::get('/', [ComplainController::class, 'index'])->name('complain.index');
});
