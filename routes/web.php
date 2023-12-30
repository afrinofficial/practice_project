<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReportController;

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


Route::middleware('auth')->group(function () {

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('category',CategoryController::class);
    Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
    Route::get('/category/update/{id}',[CategoryController::class,'categoryUpdate'])->name('category.update');
    Route::post('/category/update/save',[CategoryController::class,'updateCategory'])->name('category.update.save');

    // ======= Suppliers Routes =============
    Route::get('suppliers/create',[SupplierController::class,'create'])->name('supplier.create');
    Route::get('suppliers/list',[SupplierController::class,'index'])->name('supplier.list');
    Route::post('suppliers/save',[SupplierController::class,'save'])->name('supplier.save');
    Route::get('suppliers/delete/{id}', [SupplierController::class,'delete'])->name('delete.supplier');
    Route::get('suppliers/edit/{id}',[SupplierController::class,'edit'])->name('edit.supplier');
    Route::post('suppliers/update/{id}', [SupplierController::class, 'update'])->name('update.supplier');

    // ======= Customer Routes =============
    Route::get('customer/create',[CustomerController::class,'create'])->name('customer.create');
    Route::get('customer/list',[CustomerController::class,'index'])->name('customer.list');
    Route::post('customer/save',[CustomerController::class,'save'])->name('customer.save');
    Route::get('customer/delete/{id}', [CustomerController::class,'delete'])->name('delete.customer');
    Route::get('customer/edit/{id}',[CustomerController::class,'edit'])->name('edit.customer');
    Route::post('customer/update/{id}', [CustomerController::class, 'update'])->name('update.customer');


    // ======= Product Routes =============
    Route::get('product/create',[ProductController::class,'create'])->name('product.create');
    Route::get('product/list',[ProductController::class,'index'])->name('product.list');
    Route::post('product/save',[ProductController::class,'save'])->name('product.save');
    Route::get('product/delete/{id}', [ProductController::class,'delete'])->name('delete.product');
    Route::get('product/edit/{id}',[ProductController::class,'edit'])->name('edit.product');
    Route::post('product/update/{id}', [ProductController::class, 'update'])->name('update.product');

    // ======= Product Routes =============
    Route::get('purchase/create',[PurchaseController::class,'create'])->name('purchase.create');
    Route::get('purchase/invoice/{id}',[PurchaseController::class,'invoice'])->name('purchase.invoice');
    Route::get('purchase/add/purchase',[PurchaseController::class,'add'])->name('purchase.add');
    Route::get('purchase/list',[PurchaseController::class,'index'])->name('purchase.list');
    Route::get('search/product/purchase',[PurchaseController::class,'search'])->name('search.product');
    Route::post('purchase/save',[PurchaseController::class,'save'])->name('purchase.save');
    Route::get('purchase/delete/{id}', [PurchaseController::class,'delete'])->name('delete.purchase');
    Route::get('purchase/edit/{id}',[PurchaseController::class,'edit'])->name('edit.purchase');
    Route::post('purchase/update', [PurchaseController::class, 'update'])->name('update.purchase');
    Route::get('/get-products/{id}', [PurchaseController::class, 'getProductsForPurchase'])->name('get.products.for.purchase');


    // POS Routes

    Route::get('pos',[PurchaseController::class,'add'])->name('pos.add');

    // Report Routes
    Route::get('report/purchase',[ReportController::class,'purchaseReport'])->name('purchase.report');
    Route::get('report/purchase/order',[ReportController::class,'purchaseReportOrder'])->name('purchase.report.order');


    //Auth Routes

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
