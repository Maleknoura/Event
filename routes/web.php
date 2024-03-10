<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\eventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\reservationController;
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






// dashboardadmin
Route::get('/dashboard/createcategory', [categoryController::class, 'create'])->name('create.category');
Route::post('/dashboard/storecategory', [categoryController::class, 'store'])->name('store.category');
Route::get('/dashboard/{id}/editcategory', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/dashboard/{id}/editcategory/update', [categoryController::class, 'update'])->name('update.category');
Route::delete('/dashboard/deletecategory/{id}', [categoryController::class, 'destroy'])->name('destroycategory');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('statistiques');
Route::patch('/dashboard/{user}', [DashboardController::class, 'toggleStatus'])->name('users.update');


// dashboard organiser
Route::get('/dashboardorganiser', [eventController::class, 'index']);
Route::delete('/dashboardorganiser/delete/{id}', [eventController::class, 'destroy'])->name('destroy.event');
// Route::get('/dashboardorganiser/create', [eventController::class, 'create'])->name('create.organiser');
Route::post('/dashboardorganiser/store', [eventController::class, 'store'])->name('store.organiser');




// home
Route::get('/', [eventController::class, 'view'])->name("home");
Route::get('/search', [eventController::class, 'view'])->name('home.search');
Route::get('/events/{id}', [eventController::class, 'show'])->name('event.show');
Route::post('/events/{id}/store/{clientId}', [ReservationController::class, 'store'])->name('reservation.store');














Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__ . '/auth.php';
