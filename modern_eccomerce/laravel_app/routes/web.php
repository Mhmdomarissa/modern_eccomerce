<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController ;
use App\Http\Controllers\AdminController ;

Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard') ->middleware(['auth', 'admin']);
Route::get('view_category', [AdminController::class, 'view_category'])->name('admin.view_category')->middleware(['auth', 'admin']);
Route::post('add_category', [AdminController::class, 'add_category'])->name('admin.add_category')->middleware(['auth', 'admin']);
Route::get('delete_category/{id}', [AdminController::class, 'delete_category'])->name('admin.delete_category')->middleware(['auth', 'admin']);
Route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->name('admin.edit_category')->middleware(['auth', 'admin']);
Route::post('update-category/{id}', [AdminController::class, 'update_category'])->name('admin.update_category')->middleware(['auth', 'admin']);

