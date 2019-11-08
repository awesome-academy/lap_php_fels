<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\User;
use App\Models\Lession;
use App\Models\Category;
use App\Models\Activity;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $courses = Course::orderBy('id')->limit(config('number.three'))->get();
        $lessions = Lession::all();
        $user = Auth::user();
        $activities = Activity::orderBy('user_id')->limit(config('number.five'))->get();

        return view('pages.index', [
            'courses' => $courses,
            'lessions' => $lessions,
            'user' => $user,
            'activities' => $activities,
        ]);
    }

    public function getLogout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
