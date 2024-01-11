<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\PageController;
use App\Http\Livewire\Admin;
use App\Http\Livewire\Connect;
use App\Http\Livewire\Courses;
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

Route::middleware(['auth', 'verified'])->group(function () {
   Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
   Route::get('/courses', Courses::class)->name('courses');
   Route::get('/courses/{course:slug}', [PageController::class, 'view_course'])->name('courses.show');
   Route::get('/connect', Connect::class)->name('connect');



});

Route::middleware(['auth', 'verified', 'can:manage'])->group(function () {
    Route::get('/admin', Admin::class)->name('admin');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/about', function () {return view('about');})->name('about');

Route::post('/set-theme', [ThemeController::class, 'setTheme'])->name('set-theme');
Route::get('/get-theme', [ThemeController::class, 'getTheme'])->name('get-theme');

require __DIR__.'/auth.php';
