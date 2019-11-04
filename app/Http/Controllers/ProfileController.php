<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\User;
use App\Models\Lession;
use App\Models\Category;
use App\Models\Activity;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($id)
    {  
        $user = Auth::user();
        if ($user->id != $id) {
            $user = User::find($id);
        }
        
        $followUser = User::find($id)->followOtherUsers;
        $userFollow = User::find($id)->otherUsersFollow;
        $activities = Activity::where('user_id', $user->id)->paginate(config('number.five'));

        return view('profiles.index', [
            'user' => $user, 
            'activities' => $activities, 
            'followUser' => $followUser,   
            'userFollow' => $userFollow,
        ]);
    }

    public function getEditProfile()
    {
        $user = Auth::user();

        return view('profiles.edit', compact('user'));
    }

    public function postEditProfile(Request $request, $id)
    {        
        User::find($id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'birthday' => $request->birthday,
        ]);

        return redirect()->route('get.profile', [$id]);
    }
}
