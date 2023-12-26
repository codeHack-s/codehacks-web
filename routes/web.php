<?php

use App\Http\Controllers\ConnectController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\AdminController;
use App\Http\Livewire\Usercourses;
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
})->middleware(['auth', 'verified', 'user.type:campus'])->name('dashboard');

Route::middleware(['auth','verified'])->group(function () {

    //breeze routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //custom routes
    Route::resource('courses', CourseController::class)->except(['show','index'])->middleware('can:manage');

    //define show route
    Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');

    //define index route
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::post('courses/{course}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll')->middleware('check.payment');

    Route::post('lessons/{lesson}/attend', [LessonController::class, 'attend'])->name('lesson.attend');
    //un-attend
    Route::post('lessons/{lesson}/unattend', [LessonController::class, 'unattend'])->name('lesson.unattend');

    Route::post('courses/{course}/unenroll', [CourseController::class, 'unenroll'])->name('courses.unenroll');

    Route::get('courses/{course}/students', [CourseController::class, 'students'])->name('courses.students');

    //all courses for a user
    Route::get('courses/user/{user}', Usercourses::class)->name('courses.user');

    //lessons
    Route::resource('lessons', LessonController::class);

    //lessons.students
    Route::get('lessons/{lesson}/students', [LessonController::class, 'students'])->name('lessons.students');

    //connect.index
    Route::get("/connect", [ConnectController::class, 'index'])->name('connect.index');

    //events.index
    Route::get('/events')->name('events.index');

    //pricing
    Route::get('/pricing', [PricingController::class, 'index'])->name('pricing.index');
    //pricing.plans
    Route::get('/pricing/gold', [PricingController::class, 'gold'])->name('pricing.gold');
    Route::get('/pricing/platinum', [PricingController::class, 'platinum'])->name('pricing.platinum');
    Route::get('/pricing/pro', [PricingController::class, 'pro'])->name('pricing.pro');

    //response
    Route::get('/response', function () {
        return view('codehacks.response');
    })->name('response');
});

Route::get('/about', function () {
    return view('codehacks.about');
})->name('about');


//admin routes
Route::get('admin-dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified','can:manage'])->name('admin.dashboard');

Route::get('innovate-dashboard', function () {
    return view('innovate.dashboard');
})->middleware(['auth', 'verified','user.type:innovate'])->name('innovate.dashboard');

Route::post('/set-theme', [ThemeController::class, 'setTheme'])->name('set-theme');
Route::get('/get-theme', [ThemeController::class, 'getTheme'])->name('get-theme');

require __DIR__.'/auth.php';
