<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //if the user can:manage
        if(Auth::user()->can('manage')){
            $courses = Course::all();
        }else{
            $userType = Auth::user()->user_type;
            $courses = Course::where('for', $userType)->get();
        }

        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     * Make sure the current user is an admin before allowing to create a course
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if(Auth::user()->email == 'tomsteve187@gmail.com'||Auth::user()->email == 'samson2020odhiambo@gmail.com'){
            return view('courses.create');
        } else {
            return redirect()->route('courses.index')->with('error', 'Unauthorized');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'for' => 'required',
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
            'for' => $request->for,
            'status' => 'pending',
            'image_url' => '/images/'.$imageName,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ]);

        return redirect()->route('courses.index')->with('success', 'Course created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if(Auth::user()->email == 'tomsteve187@gmail.com'||Auth::user()->email == 'samson2020odhiambo@gmail.com'){
            return view('courses.edit', compact('course'));
        } else {
            return redirect()->route('courses.index')->with('error', 'Unauthorized');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course): RedirectResponse
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
    public function destroy(Course $course): RedirectResponse
    {
        if(Auth::user()->email == 'tomsteve187@gmail.com'||Auth::user()->email == 'samson2020odhiambo@gmail.com'){
            $course->delete();
            return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
        } else {
            return redirect()->route('courses.index')->with('error', 'Unauthorized');
        }
    }

    /**
     * Enroll a user in a course
     */
    public function enroll(Course $course, Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        // Get the user by the passed-in ID
        $user = User::find($request->user_id);

        // Check if the user is already enrolled in the course
        if ($user->enrolledCourses->contains($course)) {
            return redirect()->route('courses.show', $course)->with('error', 'User is already enrolled in the course');
        }

        // Attach the course to the user with the timestamp
        $user->enrolledCourses()->attach($course);

        // Redirect back to the course with a success message
        return redirect()->route('courses.show', $course)->with('success', 'Successfully enrolled the user in the course');
    }
    /**
     * Unenroll a user from a course
     */
    public function unenroll(Course $course, Request $request): RedirectResponse
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        // Get the user by the passed-in ID
        $user = User::find($request->user_id);

        // Check if the user isn't enrolled in the course, and if so, redirect with a message
        if (!$user->enrolledCourses->contains($course)) {
            return redirect()->route('courses.show', $course)->with('error', 'User is not enrolled in the course');
        }

        // Detach the course from the user
        $user->enrolledCourses()->detach($course);

        // Redirect back to the course with a success message
        return redirect()->route('courses.show', $course)->with('success', 'Successfully un-enrolled the user from the course');
    }

    /**
     * Display a listing of the enrolled users for a course.
     */
    public function students(Course $course): \Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $students = $course->enrolledUsers()->get();
        return view('courses.students', compact('course', 'students'));
    }


    public function userCourses(User $user): \Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $courses = $user->courses()->get();
        return view('courses.user', compact('user', 'courses'));
    }

}
