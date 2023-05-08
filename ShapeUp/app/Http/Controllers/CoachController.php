<?php

namespace App\Http\Controllers;

use App\Models\Diet;
use App\Models\Training;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserFollowCoach;
use Illuminate\Support\Facades\Auth;

class CoachController extends Controller
{
    public function dashboardPrincipal()
    {
        $followersCount = UserFollowCoach::where('user_coach_id', Auth::user()->id)->count();
        $coachTrainings = Training::where('user_coach_id', Auth::user()->id)->paginate(10);
        $coachTrainingsCount = count($coachTrainings);  // Training::where('user_coach_id', Auth::user()->id)->count();
        $coachDiets = Diet::where('user_coach_id', Auth::user()->id)->count();

        return view(
            'coach.index',
            [
                'coachTrainings' =>  $coachTrainings,
                'followersCount' => $followersCount,
                'coachTrainingsCount' => $coachTrainingsCount,
                'coachDiets' => $coachDiets
            ]
        );
    }
    public function searchTrainings(Request $request)
    {
        $trainingsFounded = Training::where('title', $request->title)->get();

        return view('coach.trainings', compact('trainingsFounded'));
    }

}
