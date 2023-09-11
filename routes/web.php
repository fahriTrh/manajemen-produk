<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\ProductController;

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
Route::get('/home', fn() => redirect('/product'));
Route::get('/', fn() => redirect('/product'));
// Route::get('/', function() {
//     return view('/welcome');
// });

// start authenticate
Route::middleware('guest')->group(function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::get('/logout', function(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
});
// end authenticate

Route::middleware('auth')->group(function() {
    Route::resource('/product', ProductController::class)->names([
        'index' => 'product',
        'create' => 'product.create',
        'store' => 'product.store',
        'show' => 'product.show',
        'update' => 'product.update',
        'destroy' => 'product.delete'
    ]);
});