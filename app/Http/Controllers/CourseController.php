<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lession;
use App\Models\Course;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($id)
    {
        $courses = Course::where('cate_id', $id)->get();

        return view('pages.courses', ['courses' => $courses]);
    }
}
