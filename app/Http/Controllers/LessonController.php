<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Course;
use App\Models\User;
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

    public function students(Lesson $lesson): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        // get the course under which this lesson is
        $course = $lesson->course;
        $students = $course->users()->get();
        return view('lessons.students', compact('lesson', 'students'));
    }

    public function attend(Lesson $lesson, Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        // Get the user by the passed in ID
        $user = User::find($request->user_id);

        // Check if the user is already attending
        if ($user->lessons()->where('lesson_id', $lesson->id)->exists()) {
            return redirect()->route('lessons.students', $lesson->id)->with('error', 'User is already registered for this lesson');
        }

        //if the lesson is past the date, don't allow to register
        if ($lesson->date < now()) {
            return redirect()->route('lessons.show', $lesson->id)->with('error', 'Lesson is in the past');
        }

        //attach the user to the lesson
        $user->lessons()->attach($lesson->id, ['created_at' => now(), 'updated_at' => now()]);

        //add 1 to attending_members_count
        $lesson->attending_members_count += 1;
        $lesson->save();

        //redirect back with success
        return redirect()->route('lessons.show', $lesson)->with('success', 'Successfully Added to attending List');

    }

    public function unattend(Lesson $lesson, Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        // Get the user by the passed in ID
        $user = User::find($request->user_id);

        // Check if the user is already enrolled in the course
        if (!$user->lessons()->where('lesson_id', $lesson->id)->exists()) {
            return redirect()->route('courses.show', $lesson)->with('error', 'User is not attending');
        }

        //if the lesson is past the date, don't allow to unregister
        if ($lesson->date < now()) {
            return redirect()->route('lessons.show', $lesson->id)->with('error', 'Lesson is in the past');
        }

        // Detach the course from the user
        $user->lessons()->detach($lesson->id);

        //remove 1 from attending_members_count
        $lesson->attending_members_count -= 1;
        $lesson->save();

        // Redirect back to the course with a success message
        return redirect()->route('lessons.show', $lesson)->with('success', 'Successful:: You\'re not Attending');
    }
}
