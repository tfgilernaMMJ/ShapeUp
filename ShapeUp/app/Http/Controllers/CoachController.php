<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserFollowCoach;
use Illuminate\Support\Facades\Auth;

class CoachController extends Controller
{
    public function get_users_followers()
    {
        $followersCount = UserFollowCoach::where('user_coach_id', Auth::user()->id)->count();

        return view('coach.index', compact('followersCount'));
    }
}
