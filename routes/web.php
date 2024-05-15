<?php

use App\Http\Controllers\Admin\LoginController; // LoginController
use App\Http\Controllers\Admin\MovieController; // harus di use, karna kita sudah menggunakan extension otomatis jadi tidk usah
use App\Http\Controllers\Admin\TransactionController; // transaction
use App\Http\Controllers\Member\DashboardController;
use App\Http\Controllers\Member\RegisterController; // use registerController
use App\Http\Controllers\Member\LoginController as MemberLoginController; // use registerController
use App\Http\Controllers\Member\MovieController as MemberMovieController;
use App\Http\Controllers\Member\PricingController;
use App\Http\Controllers\Member\TransactionController as MemberTransactionController;
use App\Http\Controllers\Member\UserPremiumController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//login back end (admin)
Route::get('/admin/login', [LoginController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'authenticate'])->name('admin.login.auth');

Route::group(['prefix' => 'admin', 'middleware' => ['admin.auth']], function () {
    Route::view('/', 'admin.dashboard')->name('admin.dashboard'); // perbedaanya kalo menggunakan route view tdk perlu mendeclasrasikan function

    // logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
    // transaction
    Route::get('/transaction', [TransactionController::class, 'index'])->name('admin.transaction');

    // agar tidak perlu memanggil movie berkali-kali kita bs mnggnkn prefix
    Route::group(['prefix' => 'movie'], function () {
        Route::get('/', [MovieController::class, 'index'])->name('admin.movie');
        Route::get('/create', [MovieController::class, 'create'])->name('admin.movie.create');
        Route::post('/store', [MovieController::class, 'store'])->name('admin.movie.store');
        Route::get('/edit/{id}', [MovieController::class, 'edit'])->name('admin.movie.edit');
        Route::put('/update/{id}', [MovieController::class, 'update'])->name('admin.movie.update');
        Route::delete('/destroy/{id}', [MovieController::class, 'destroy'])->name('admin.movie.destroy');
    });
});

// dashboard member // pencegahan middleware jika blm login member
Route::group(['prefix' => 'member', 'middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('member.dashboard');
    Route::get('movie/{id}', [MemberMovieController::class, 'show'])->name('member.movie.detail');

    // beli paket jd ketika dia blm login maka kita arahkan ke login
    Route::post('/transaction', [MemberTransactionController::class, 'store'])->name('member.transaction.store');

    // subscription
    Route::get('/subscription', [UserPremiumController::class, 'index'])->name('member.user_premium.index');

    Route::get('/logout', [MemberLoginController::class, 'logout'])->name('member.logout');
});

// main dari sebuah web
Route::view('/', 'index');

// regiter member
Route::get('/register', [RegisterController::class, 'index'])->name('member.register');
Route::post('/register', [RegisterController::class, 'store'])->name('member.register.store');

// login member
Route::get('/login', [MemberLoginController::class, 'index'])->name('member.login');
Route::post('/login', [MemberLoginController::class, 'auth'])->name('member.login.auth');

// tempat transaction
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');


// Route::get('/', function () {
//     return view('welcome');
// });
