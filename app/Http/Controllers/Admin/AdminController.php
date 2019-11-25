<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Course\CourseRepositoryInterface;
use App\Repositories\Lession\LessionRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;

class AdminController extends Controller
{
    public function __construct(
        CourseRepositoryInterface $courseRepository,
        LessionRepositoryInterface $lessionRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->middleware('auth');
        $this->courseRepository = $courseRepository;
        $this->lessionRepository = $lessionRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $user = $this->userRepository->getAll();
        $courses = $this->courseRepository->getAll();
        $lessions = $this->lessionRepository->getAll();

        return view('admin.index', [
            'courses' => $courses,
            'lessions' => $lessions,
            'user' => $user,
        ]);
    }

    public function getLogout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function search(Request $request)
    {
        return view('admin.search-result');
    }
}

