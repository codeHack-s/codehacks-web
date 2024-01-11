<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\View\View;

class PageController extends Controller
{

    public function dashboard(): View
    {
        //get all courses
        $courses = Course::all();
        //dd number of courses
        dd($courses->count());
        return view('dashboard', compact('courses'));
    }

}
