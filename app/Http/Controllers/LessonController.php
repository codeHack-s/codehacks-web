<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage')->only(['create', 'edit', 'store', 'update', 'destroy']);
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $lessons = Lesson::all();
        return view('lessons.index', compact('lessons'));
    }

    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $courses = Course::all();
        return view('lessons.create', compact('courses'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required',
            'description' => 'required',
            'venue' => 'sometimes',  // changed from required
            'date' => 'required|date_format:Y-m-d\TH:i',  // validate as datetime
        ]);

        $lesson = new Lesson($request->all());
        $lesson->date = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $request->date);
        $lesson->save();

        return redirect()->route('lessons.index')->with('success', 'Lesson created successfully');
    }

    public function show(Lesson $lesson): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('lessons.show', compact('lesson'));
    }

    public function edit(Lesson $lesson): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $courses = Course::all();
        return view('lessons.edit', compact('lesson', 'courses'));
    }

    public function update(Request $request, Lesson $lesson): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required',
            'description' => 'required',
            'venue' => 'nullable',
            'date' => 'required|date',
        ]);

        $lesson->update($request->all());
        return redirect()->route('lessons.index')->with('success', 'Lesson updated successfully');
    }

    public function destroy(Lesson $lesson): \Illuminate\Http\RedirectResponse
    {
        $lesson->delete();
        return redirect()->route('lessons.index')->with('success', 'Lesson deleted successfully');
    }
}
