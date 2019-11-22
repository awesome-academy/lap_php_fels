<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminCourseRequest;
use Illuminate\Http\File;
use Carbon\Carbon;
use App\Repositories\Course\CourseRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;

class AdminCourseController extends Controller
{
    protected $courseRepository;

    public function __construct(CourseRepositoryInterface $courseRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->middleware('auth');
        $this->courseRepository = $courseRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $courses = $this->courseRepository->getOrderBy();

        return view('admin.courses.index', compact('courses'));
    }

    public function getStore()
    {
        $categories = $this->categoryRepository->getWhere();

        return view('admin.courses.form', compact('categories'));
    }

    public function store(AdminCourseRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $extension = $request->avatar->extension();
            $file = $request->avatar;
            $fileName = \Str::slug(Carbon::now() . $request->name) . '.' . $extension;
            $file->move(config('imagelink.upload'), $fileName);
            $avatar = config('imagelink.upload_') . $fileName;
        }
        else {
            $avatar = config('imagelink.no_image');
        }

        $data = [
            'name' => $request->name,
            'cate_id' => $request->category,
            'slug' => \Str::slug($request->name),
            'avatar' => $avatar
        ];

        $create = $this->courseRepository->create($data);


        return redirect()->route('get.all.courses');
    }

    public function getUpdate($id)
    {
        $course = $this->courseRepository->find($id);

        return view('admin.courses.form', compact('course'));
    }

    public function postUpdate(AdminCourseRequest $request, $id)
    {
        $course = $this->courseRepository->find($id);

        if ($request->hasFile('avatar')) {
            $extension = $request->avatar->extension();
            $file = $request->avatar;
            $fileName = \Str::slug(Carbon::now() . $request->name) . '.' . $extension;
            $file->move(config('imagelink.upload'), $fileName);
            $course->avatar = config('imagelink.upload'_) . $fileName;
        }

        $data = [
            'name' => $request->name,
            'cate_id' => $request->category,
            'slug' => \Str::slug($request->name),
            'avatar' => $course->avatar
        ];

        $update = $this->courseRepository->update($id, $data);

        return redirect()->route('get.all.courses');
    }

    public function getDelete($id)
    {
        $this->courseRepository->delete($id);

        return redirect()->back();
    }
}
