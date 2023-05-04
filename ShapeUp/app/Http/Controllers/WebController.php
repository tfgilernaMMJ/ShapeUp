<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserFollowCoach;
use App\Models\Gym;
use App\Models\Supermarket;
use App\Models\User;
use App\Models\Coach;
use App\Models\Diet;
use App\Models\Training;

class WebController extends Controller
{
    public function index()
    {
        $gyms = Gym::all();
        $supermarkets = Supermarket::all();
        $numUsers = User::count();
        $numCoaches = Coach::count();
        $numDiets = Diet::count();
        $numTrainings = Training::count();
        return view('web.index', ['gyms' => $gyms, 'supermarkets' => $supermarkets, 'numUsers' => $numUsers, 'numCoaches' => $numCoaches, 'numDiets' => $numDiets, 'numTrainings' => $numTrainings]);
    }

    public function indexCoaches()
    {
        $coaches = Coach::all();
        $numCoaches = Coach::count();
        return view('web.coaches', [ 'coaches' => $coaches, 'numCoaches' => $numCoaches]);
    }

    public function followCoaches($action, $coach_id)
    {
        if ($action == 'follow') {
            $user_follow_coaches = new UserFollowCoach;
            $user_follow_coaches->user_id = Auth::user()->id;
            $user_follow_coaches->coach_id = $coach_id;
            $user_follow_coaches->save();
            return back();
        } else if ($action == 'unfollow') {
            $user_id = Auth::user()->id;
            UserFollowCoach::where('user_id', $user_id)->where('coach_id', $coach_id)->delete();
            return back();
        }        
    }
    
}
