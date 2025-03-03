<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BooknowController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[PagesController::class,'index'])->name('home');




Route::post('booknow/store',[BooknowController::class,'store'])->name('cart.store');
Route::get('booknow',[BooknowController::class,'index'])->name('booknow');


Route::middleware(['auth','admin'])->group(function () {

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');



Route::resource('categories', CategoryController::class);
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::delete('/category/destroy',[CategoryController::class,'destroy'])->name('category.destroy');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/category',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');


Route::get('/room', [RoomController::class, 'index'])->name('room.index');
Route::get('/room/create', [RoomController::class, 'create'])->name('room.create');
Route::post('/room/store', [RoomController::class, 'store'])->name('room.store');
Route::get('/room/edit/{id}', [RoomController::class, 'edit'])->name('room.edit');
Route::post('/room/update/{id}', [RoomController::class, 'update'])->name('room.update');
Route::delete('/room/destroy/{id}', [RoomController::class, 'destroy'])->name('room.destroy');


Route::resource('staff', StaffController::class);
Route::get('/user/show', [UserController::class, 'show'])->name('user.show');


// destroy user
Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::resource('users', UserController::class);
Route::resource('users', UserController::class);
Route::get('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

require_once __DIR__.'/auth.php';
