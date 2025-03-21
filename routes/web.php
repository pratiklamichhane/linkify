<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ManageUserController;

//auth routes
Route::get('/register' , [UserController::class, 'register'])->name('register');
Route::post('/register/store' , [UserController::class, 'store'])->name('register.store');
Route::get('/login' , [UserController::class, 'login'])->name('login');
Route::post('/login/validate' , [UserController::class, 'loginValidate'])->name('login.validate');
Route::post('/logout' , [UserController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/otp' , [UserController::class, 'otp'])->name('otp');
Route::post('/otp/validate' , [UserController::class, 'otpValidate'])->name('otp.validate');

Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

// url + array Contoller + function
Route::get('/', [HomePageController::class, 'index'])->name('home')->middleware('auth');
Route::get('/about', [HomePageController::class, 'about'])->name('about');



//
Route::resource('categories', CategoryController::class)->middleware('auth');
Route::resource('links', LinkController::class)->middleware('auth');
Route::get('users', [ManageUserController::class, 'index'])->name('users.index');
Route::put('users/ban/{user}', [ManageUserController::class, 'ban'])->name('users.ban');