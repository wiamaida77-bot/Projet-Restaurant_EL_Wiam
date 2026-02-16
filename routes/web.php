<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminMenuItemController;
use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\AdminMessageController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin authentication routes
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin protected routes
Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Menu items CRUD
    Route::get('/menu-items', [AdminMenuItemController::class, 'index'])->name('menu-items.index');
    Route::get('/menu-items/create', [AdminMenuItemController::class, 'create'])->name('menu-items.create');
    Route::post('/menu-items', [AdminMenuItemController::class, 'store'])->name('menu-items.store');
    Route::get('/menu-items/{menuItem}/edit', [AdminMenuItemController::class, 'edit'])->name('menu-items.edit');
    Route::put('/menu-items/{menuItem}', [AdminMenuItemController::class, 'update'])->name('menu-items.update');
    Route::delete('/menu-items/{menuItem}', [AdminMenuItemController::class, 'destroy'])->name('menu-items.destroy');
    
    // Reservations management
    Route::get('/reservations', [AdminReservationController::class, 'index'])->name('reservations.index');
    Route::put('/reservations/{reservation}/status', [AdminReservationController::class, 'updateStatus'])->name('reservations.updateStatus');
    Route::delete('/reservations/{reservation}', [AdminReservationController::class, 'destroy'])->name('reservations.destroy');
    
    // Messages management
    Route::get('/messages', [AdminMessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{contactMessage}', [AdminMessageController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{contactMessage}', [AdminMessageController::class, 'destroy'])->name('messages.destroy');
});
