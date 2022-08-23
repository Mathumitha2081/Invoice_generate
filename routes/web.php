<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\purchaseController;

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
// amin login view
Route::get('/', function () {
    return view('login');
});
// amin login view

Route::get('/login', function () {
    return view('login');
});

//product list view
Route::get('/products', function () {
    return view('list_product');
});
//customer login
Route::get('/customer', function () {
    return view('customer_login');
});
Route::get('/index', function () {
    return view('list_product');
});
Route::get('/billing', function () {
    return view('billing');
});
Route::get('/invoice', function () {
    return view('emails.InvoiceMail');
});
// admin and customer dashboard with middleware checking
Route::get("/admin_dashboard", [ProductController::class, 'admin_dashboard'])->name('admin_dashboard')->middleware('authcheck');
Route::get("/customers_dash", [ProductController::class, 'customers_dashboard'])->name('customers_dash')->middleware('authcheck');

//admin and customerlogin
Route::post("/check", [AdminController::class, 'check'])->name('check');
Route::post("/customer_check", [AdminController::class, 'customer_check'])->name('customer_check');

//create product and customerlist
Route::post("/create", [AdminController::class, 'create'])->name('create')->middleware('authcheck');
Route::get("/customers", [ProductController::class, 'customers'])->name('customers')->middleware('authcheck');

//resource for product list ,ediit ,delete, create
Route::resource('products', ProductController::class);

Route::post('/denominations', [purchaseController::class, 'add_denominations'])->name('add_deno');
Route::get('/purchase', [purchaseController::class, 'purchase'])->name('purchase');


//add_purchase 
Route::post('/add_purchase', [purchaseController::class, 'add_purchase'])->name('add_purchase');

//logout for admin
Route::get("/logout", [AdminController::class, 'logout']);
