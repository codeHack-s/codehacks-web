<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\View\View;

class PageController extends Controller
{

    public function dashboard(): View
    {
        $courses = Course::all();
        return view('dashboard', compact('courses'));
    }

    public function view_course(Course $course): View
    {
        return view('courses.show', compact('course'));
    }

}
