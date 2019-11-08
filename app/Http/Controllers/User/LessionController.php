<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Lession;
use App\Models\Course;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Support\Carbon;

class LessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $lessions = Lession::where('course_id', $id)->get();
        $course = Course::find($id);
        $user_course = Auth::user()->courses()->where('course_id', $id)->first();

        if (empty ($user_course->pivot)) {
            Auth::user()->courses()->attach($id, [
                'created_at' => Carbon::now(),
            ]);
            Auth::user()->activities()->create([
                'type' => trans('controllers.registed'),
                'name' => trans('controllers.course'),
                'description' => trans('controllers.has_registed_course') . $course->name . trans('</b>'),
                'created_at' => Carbon::now(),
            ]);
        }

        return view('pages.lessions', ['lessions' => $lessions, 'course' => $course]);
    }

    public function getLession($id)
    {
        $lession = Lession::find($id);

        $user_lession = Auth::user()->lessions()->where('lession_id', $id)->first();

        if (empty ($user_lession->pivot->lession_id)) {
            Auth::user()->lessions()->attach($id, [
                'created_at' => Carbon::now(),
            ]);
            Auth::user()->activities()->create([
                'type' => trans('controllers.started'),
                'name' => trans('controllers.lession'),
                'description' => trans('controllers.has_stated_lession') . $lession->name . trans('</b>'),
                'created_at' => Carbon::now(),
            ]);
        }

        return view('pages.lession-details', ['lession' => $lession]);
    }

    public function getAnswers(Request $request, $lession_id, $test_id)
    {
        $test = Test::with('questions')->where('id', $test_id)->first();
        $lession = Lession::find($lession_id);
        $count = config('number.zero');
        $true_answer = [];

        foreach ($test->questions as $question) {
            $id = $question->id;
            $answer = Answer::find($request->$id);
            if ($answer->true_answer == config('number.one')) {
                $count++;
                array_push($true_answer, $answer);
            }
        }
        Auth::user()->lessions()->updateExistingPivot($lession_id, [
            'result' => $count,
            'updated_at' => Carbon::now(),
        ]);

        return view('pages.lession-result', [
            'request' => $request,
            'true_answer' => $true_answer,
            'lession' => $lession
        ]);
    }
}
