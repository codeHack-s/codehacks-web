<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
    Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
    Route::post('courses/{course}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');

    Route::post('lessons/{lesson}/attend', [LessonController::class, 'attend'])->name('lesson.attend');
    //un-attend
    Route::post('lessons/{lesson}/unattend', [LessonController::class, 'unattend'])->name('lesson.unattend');

    Route::post('courses/{course}/unenroll', [CourseController::class, 'unenroll'])->name('courses.unenroll');

    Route::get('courses/{course}/students', [CourseController::class, 'students'])->name('courses.students');

    //all courses for a user
    Route::get('courses/user/{user}', \App\Http\Livewire\Usercourses::class)->name('courses.user');

    //lessons
    Route::resource('lessons', LessonController::class);

    //lessons.students
    Route::get('lessons/{lesson}/students', [LessonController::class, 'students'])->name('lessons.students');

});

Route::get('about', function () {
    return view('codehacks.about');
})->name('about');

require __DIR__.'/auth.php';
