<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;

class ModuleController extends Controller
{
    protected $module;

    public function __construct(Module $module)
    {
        $this->module = $module;
    }

    public function index()
    {
        $modules = $this->module::all();
        return view('backend.modules.index', compact('modules'));
    }

    public function create()
    {
        return view('backend.modules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'description' => 'nullable|string',
        ]);

        $this->module::create([
            'title' => $request->title,
            'course_id' => $request->course_id,
            'description' => $request->description,
        ]);

        return redirect()->route('module.index')->with('success', 'Module created successfully!');
    }

    public function edit(Module $module)
    {
        return view('backend.modules.edit', compact('module'));
    }

    public function update(Request $request, Module $module)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'description' => 'nullable|string',
        ]);

        $module->update([
            'title' => $request->title,
            'course_id' => $request->course_id,
            'description' => $request->description,
        ]);

        return redirect()->route('module.index')->with('success', 'Module updated successfully!');
    }

    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->route('module.index')->with('success', 'Module deleted successfully!');
    }
}
