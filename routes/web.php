<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class, 'create'])->name('auth.create');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/', [Controller::class, 'app'])->name('app');
Route::get('/', [Controller::class, 'home'])->name('home');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/send-mail', [ContactController::class, 'sendMail'])->name('contact.send-mail');
Route::get('/go-back', [Controller::class, 'goBack'])->name('goBack');
Route::delete('/remove-from-cart/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
Route::resource('cart', CartController::class);
