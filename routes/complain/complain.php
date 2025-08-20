<?php

use App\Http\Controllers\Complain\ComplainController;
use Illuminate\Support\Facades\Route;

Route::prefix('complain')->group(function () {
    Route::get('/', [ComplainController::class, 'index'])->name('complain.index');
    Route::get('/create', [ComplainController::class, 'create'])->name('complain.create');
    Route::post('/', [ComplainController::class, 'store'])->name('complain.store');
    Route::get('/{complain}', [ComplainController::class, 'show'])->name('complain.show');
    Route::get('/{complain}/edit', [ComplainController::class, 'edit'])->name('complain.edit');
    Route::put('/{complain}', [ComplainController::class, 'update'])->name('complain.update');
    Route::delete('/{complain}', [ComplainController::class, 'destroy'])->name('complain.destroy');
    Route::put('/complain/{complain}/close', [ComplainController::class, 'close'])->name('complain.close');
    Route::post('/complain/{complain}/comment', [ComplainController::class, 'comment'])->name('complain.comment');
});
