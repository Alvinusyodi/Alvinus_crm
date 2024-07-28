<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

Route::get('/home', function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    // route untuk hak akses masuk
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/manager', [AdminController::class, 'manager'])->middleware('userAkses:manager');
    Route::get('/admin/sales', [AdminController::class, 'sales'])->middleware('userAkses:sales');

    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard.index');

    // Menambahkan rute resource untuk products di bawah /admin
    Route::resource('/admin/products', ProductController::class);
    Route::resource('/admin/leads', LeadController::class);

    // route untuk projects
    Route::resource('/admin/projects', ProjectController::class);
    // Rute untuk approval proyek
    Route::put('/admin/projects/{id}/approve', [ProjectController::class, 'approve'])->name('admin.projects.approve');
    // Rute untuk rejection proyek
    Route::put('/admin/projects/{id}/reject', [ProjectController::class, 'reject'])->name('admin.projects.reject');

    // customers
    Route::get('/admin/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/admin/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::delete('customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');



    Route::get('/logout', [SesiController::class, 'logout']);
});
