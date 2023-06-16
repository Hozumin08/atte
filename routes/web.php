<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BreakController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/workstart', [AttendanceController::class, 'stampStart']);
Route::post('/workstart', [AttendanceController::class, 'workStart']);

Route::get('/workend', [AttendanceController::class, 'stampEnd']);
Route::post('/workend', [AttendanceController::class, 'workEnd']);

Route::get('/breakstart', [BreakController::class, 'stampBreakStart']);
Route::post('/breakstart', [BreakController::class, 'breakStart']);

Route::get('/breakend', [BreakController::class, 'stampBreakEnd']);
Route::post('/breakend', [BreakController::class, 'breakEnd']);


require __DIR__.'/auth.php';


