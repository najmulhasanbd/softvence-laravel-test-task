<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    protected $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function index()
    {
        $courses = $this->course::all();
        return view('backend.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('backend.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
        ]);

        $this->course::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
        ]);

        return redirect()->route('course.index')->with('success', 'Course created successfully!');
    }

    public function edit(Course $course)
    {
        return view('backend.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
        ]);

        $course->update([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return redirect()->route('course.index')->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('course.index')->with('success', 'Course deleted successfully!');
    }
}
