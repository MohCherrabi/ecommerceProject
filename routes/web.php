<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardContrller;
use App\Http\Controllers\FamilieController;
use App\Http\Controllers\HomeContrller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentModeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SubFamilieController;
use App\Http\Controllers\SubProductController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;

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

Route::get('/admin',[DashboardContrller::class,'dashboard'])->name('dashboard');
Route::resource('/brands', BrandController::class);
Route::resource('/units', UnitController::class);
Route::resource('/statuses',StatusController::class);
Route::resource('/payment_modes',PaymentModeController::class);
Route::resource('/families',FamilieController::class);
Route::resource('/sub_families',SubFamilieController::class);
Route::resource('/users',UserController::class);
Route::resource('/orders',OrderController::class);
Route::resource('/products',ProductController::class);
Route::resource('/sub_products',SubProductController::class);
Route::resource('/orders_details',OrderDetailController::class);
Route::resource('/blogs',BlogController::class);
Route::resource('/comments',CommentController::class);

Route::get('/home/blogs', [BlogController::class ,'blogsUser'])->name('blogsUser');

Route::get('/', [HomeContrller::class,'home'])->name('home');

Route::get('/shopingCart',[HomeContrller::class ,'shopingCart'])->name('shopingCart')->middleware('authUser');
// CheckoutController

Route::get('/checkout',[CheckoutController::class ,'checkout'])->name('checkout')->middleware('authUser');
Route::post('/shipping', [CheckoutController::class, 'shipping'])->name('shipping')->middleware('authUser');

Route::get('/productsList',[HomeContrller::class,'productsList'])->name('productsList');

Route::get('/logout',[LoginController::class, 'logout'])->name('logout')->middleware('authUser');

Route::get('/loginForm', [LoginController::class , 'loginForm'])->name('loginForm')->middleware('guestUser');
Route::post('/login', [LoginController::class , 'login'])->name('login')->middleware('guestUser');

Route::get('/productSingle', [HomeContrller::class, 'productSingle'])->name('productSingle');

Route::post('/register', [RegisterController::class , 'register'])->name('register')->middleware('guestUser');
Route::get('/registerForm', [RegisterController::class , 'registerForm'])->name('registerForm')->middleware('guestUser');

// payment with paymongo
Route::get('pay',[PaymentController::class,'pay'])->middleware('authUser')->name('pay'); // this method will be use api paymongo for payment
Route::get('success',[PaymentController::class,'success'])->middleware('authUser'); // this method called  for success payment
