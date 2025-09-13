<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $courses = Course::latest()->get();
        $modules = Module::latest()->get();
        $contents = Content::latest()->get();

        return view('welcome', compact('courses', 'modules', 'contents'));
    }
}
