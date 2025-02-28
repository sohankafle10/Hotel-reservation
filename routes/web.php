<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('categories', CategoryController::class);
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::delete('/category/destroy',[CategoryController::class,'destroy'])->name('category.destroy');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/category',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');

require_once __DIR__.'/auth.php';
