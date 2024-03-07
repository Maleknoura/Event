<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\eventController;
use App\Http\Controllers\ProfileController;
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

Route::get('/page', function () {
    return view('singlepage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/create', [categoryController::class, 'create'])->name('create');
Route::post('/store', [categoryController::class, 'store'])->name('store');
Route::post('/edit{id}', [categoryController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [categoryController::class, 'destroy'])->name('destroycategory');
Route::get('/dashboardevent', [eventController::class, 'index']);
Route::delete('/delete/{id}', [eventController::class, 'destroy'])->name('destroy.event');
Route::post('/create', [eventController::class, 'create'])->name('createe');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('statistiques');
Route::patch('/dashboard/{user}', [DashboardController::class, 'toggleStatus'])->name('users.update');
Route::get('/',[eventController::class,'view'])->name('home');
Route::get('/{categorie_id?}',[eventController::class,'view'])->name('home');
Route::get('/search',[eventController::class,'view'])->name('home');
Route::get('/events/{id}', [eventController::class,'show'])->name('event.show');













Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
