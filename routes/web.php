<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Vendor\VendorController;
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
Route::get('/', function () {
    return view('welcome');
});

Route::controller(AdminController::class)->group(function(){
        Route::get('Admin',  'login')->name('Admin-login');
        Route::post('admin', 'adminlogin')->name('admin.login');
        Route::get('logout', 'logout')->name('logout');

});
Route::middleware(['admin'])->group(function(){
    Route::get('admin/dashboard', [AdminController::class, 'Admindashboard'])->name('Admindashboard');  
});



Route::controller(VendorController::class)->group(function(){
    Route::get('vendor',  'login')->name('login');
    Route::get('register',  'register')->name('register');
    Route::post('vendor', 'vregister')->name('vendor.register');
    Route::post('vendor/login', 'vendorlogin')->name('vendor.login');
    Route::get('logout', 'logout')->name('logout');

});

Route::middleware(['vendor'])->group(function(){
    Route::get('vendor/dashboard', [VendorController::class, 'Vendorashboard'])->name('Vendorashboard');  
});