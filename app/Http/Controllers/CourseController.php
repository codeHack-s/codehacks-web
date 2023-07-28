<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     * Make sure the current user is an admin before allowing to create a course
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if(Auth::user()->email == 'tomsteve187@gmail.com'){
            return view('courses.create');
        } else {
            return redirect()->route('courses.index')->with('error', 'Unauthorized');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user_id = Auth::user()->id;

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $online = $request->online == 'on' ? 1 : 0;

        $course = Course::create([
            'user_id' => $user_id,
            'title' => $request->title,
            'description' => $request->description,
            'online' => $online,
            'image_url' => '/images/'.$imageName,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ]);

        return redirect()->route('courses.index')->with('success', 'Course created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if(Auth::user()->email == 'tomsteve187@gmail.com'){
            return view('courses.edit', compact('course'));
        } else {
            return redirect()->route('courses.index')->with('error', 'Unauthorized');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $online = $request->online == 'on' ? 1 : 0;

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'online' => $online,
            'updated_by' => Auth::user()->id,
        ]);

        if($request->hasFile('image')) {
            // Delete old image
            $image_path = public_path().$course->image_url;
            if(file_exists($image_path)) {
                unlink($image_path);
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $course->update(['image_url' => '/images/'.$imageName]);
        }

        return redirect()->route('courses.index')->with('success', 'Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course): \Illuminate\Http\RedirectResponse
    {
        if(Auth::user()->email == 'tomsteve187@gmail.com'){
            $course->delete();
            return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
        } else {
            return redirect()->route('courses.index')->with('error', 'Unauthorized');
        }
    }

    /**
     * Enroll a user in a course
     */
    public function enroll(Course $course)
    {
        // Add logic to enroll a user in a course
    }
}
