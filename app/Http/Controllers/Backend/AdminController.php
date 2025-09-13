<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $courses=Course::count();
        $modules=Module::count();
        $contents=Content::count();
        return view('backend.dashboard',compact('courses','modules','contents'));
    }
}
