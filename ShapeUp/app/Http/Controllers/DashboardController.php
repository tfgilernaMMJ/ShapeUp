<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserFollowCoach;

class DashboardController extends Controller
{
    public function get_users_followers(Request $request, $coach_id)
    {
        $followersCount = UserFollowCoach::where('user_coach_id', $coach_id)->count();

        return view('dashboard.dashboard', compact('followersCount'));
    }
}
