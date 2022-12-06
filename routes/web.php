<?php

use App\Http\Controllers\{CategoryController, ExpenseController, TodoController, MaintenanceController};
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function (){
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('expenses')->name('expenses.')->group(function (){
        Route::get('', [ExpenseController::class, 'index'])->name('index');
        Route::get('create', [ExpenseController::class, 'create'])->name('create');
        Route::get('import-from-file', [ExpenseController::class, 'importFromFile'])->name('import-from-file');
        Route::post('upload-file', [ExpenseController::class, 'uploadFile'])->name('upload-file');
        Route::post('', [ExpenseController::class, 'store'])->name('store');
        Route::get('{expense}', [ExpenseController::class, 'edit'])->name('edit');
        Route::patch('{expense}', [ExpenseController::class, 'update'])->name('update');
        Route::delete('{expense}', [ExpenseController::class, 'delete'])->name('delete');
    });

    Route::prefix('categories')->name('categories.')->group(function (){
        Route::get('', [CategoryController::class, 'index'])->name('index');
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('', [CategoryController::class, 'store'])->name('store');
        Route::get('{category}', [CategoryController::class, 'edit'])->name('edit');
        Route::patch('{category}', [CategoryController::class, 'update'])->name('update');
        Route::delete('{category}', [CategoryController::class, 'delete'])->name('delete');
    });

    Route::prefix('new-ideas')->name('todo.')->group(function (){
        Route::get('', [TodoController::class, 'index'])->name('index');
    });

    Route::prefix('maintenance')->name('maintenance.')->group(function (){
        Route::get('', [MaintenanceController::class, 'index'])->name('index');
    });
});

require __DIR__.'/auth.php';
