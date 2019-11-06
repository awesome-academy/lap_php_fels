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
        }
        else {
            Auth::user()->activities()->create([
                'type' => 'start',
                'name' => 'lession',
                'description' => 'Start lession ' . $lession->name,
                'created_at' => Carbon::now(),
            ]);
        }

        return view('pages.lession-details', ['lession' => $lession]);
    }

    public function getAnswers(Request $request, $lession_id, $test_id)
    {
        $test = Test::with('questions')->where('id', $test_id)->first();
        $count = config('number.zero');

        foreach ($test->questions as $question) {
            $id = $question->id;
            if ($request->$id == config('number.one')) {
                $count++;
            }
        }
        Auth::user()->lessions()->updateExistingPivot($lession_id, [
            'result' => $count,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('home');
    }
}
