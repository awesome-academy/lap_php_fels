<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Course\CourseRepositoryInterface;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->middleware('auth');
        $this->courseRepository = $courseRepository;
    }

    public function index($id)
    {
        $courses = $this->courseRepository->getWhereById($id);

        return view('pages.courses', ['courses' => $courses]);
    }
}
