<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Course;
use App\Models\Module;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::with('course', 'module')->latest()->get();

        return view('backend.contents.index', compact('contents'));
    }

    public function create()
    {
        $courses = Course::latest()->get();

        $modules = Module::all()->groupBy('course_id');

        return view('backend.contents.create', compact('courses', 'modules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'modules.*.id' => 'required|exists:modules,id',
            'modules.*.contents.*.title' => 'required|string|max:255',
            'modules.*.contents.*.video' => 'nullable|url',
            'modules.*.contents.*.text' => 'nullable|string',
            'modules.*.contents.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $course_id = $request->course_id;
        $modules = $request->modules ?? [];

        foreach ($modules as $moduleIndex => $module) {
            $module_id = $module['id'];
            $contents = $module['contents'] ?? [];

            foreach ($contents as $contentIndex => $content) {
                $imagePath = null;

                if ($request->hasFile("modules.$moduleIndex.contents.$contentIndex.image")) {
                    $image = $request->file("modules.$moduleIndex.contents.$contentIndex.image");

                    $uploadPath = public_path('upload');
                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath, 0777, true);
                    }

                    $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move($uploadPath, $fileName);

                    $imagePath = 'upload/' . $fileName;
                }

                Content::create([
                    'course_id' => $course_id,
                    'module_id' => $module_id,
                    'title' => $content['title'],
                    'video' => $content['video'] ?? null,
                    'text' => $content['text'] ?? null,
                    'image' => $imagePath,
                ]);
            }
        }

        return redirect()->route('content.index')->with('success', 'Content Insert Success!');
    }

    public function edit($id)
    {
        $content = Content::with('course', 'module')->findOrFail($id);
        $courses = Course::latest()->get();
        $modules = Module::latest()->get();

        return view('backend.contents.edit', compact('content', 'courses', 'modules'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'module_id' => 'required|exists:modules,id',
            'title' => 'required|string|max:255',
            'video' => 'nullable|url',
            'text' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $content = Content::findOrFail($id);
        $imagePath = $content->image;

        if ($request->hasFile('image')) {
            $uploadPath = public_path('upload/contents');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            if ($content->image && file_exists(public_path($content->image))) {
                unlink(public_path($content->image));
            }

            $fileName = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($uploadPath, $fileName);

            $imagePath = 'upload/contents/' . $fileName;
        }

        $content->update([
            'course_id' => $request->course_id,
            'module_id' => $request->module_id,
            'title' => $request->title,
            'video' => $request->video,
            'text' => $request->text,
            'image' => $imagePath,
        ]);

        return redirect()->route('content.index')->with('success', 'Content Update Success!');
    }

    public function destroy($id)
    {
        $content = Content::findOrFail($id);

        if ($content->image && File::exists(public_path('uploads/content/' . $content->image))) {
            File::delete(public_path('uploads/content/' . $content->image));
        }

        $content->delete();

        return redirect()->route('content.index')->with('success', 'Content deleted successfully!');
    }
    public function show($id)
    {
        $content = Content::with('course', 'module')->findOrFail($id);

        return view('backend.contents.show', compact('content'));
    }
}
