<?php

namespace App\Http\Controllers;

use App\Models\Diet;
use App\Models\Exercise;
use App\Models\Ingredient;
use App\Models\User;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\UserFollowCoach;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboardPrincipal(Request $request)
    {
        $allCoaches = User::paginate(10);
        $coachesCount = User::where('status', 'Coach')->count();
        $trainingsCount = Training::all()->count();
        $exercisesCount = Exercise::all()->count();
        $ingredientsCount = Ingredient::all()->count();
        $dietsCount = Diet::all()->count();
        $superSusCount = User::where('suscription_id', 2)->count();
        $userByMonth = User::all()->groupBy(function ($user) {
            return $user->created_at->format('m');
        });
        $userByMonthSus = User::where('suscription_id', 2)->get()->groupBy(function ($user) {
            return $user->created_at->format('m');
        });
        $usersFounded = null;
        if($request->name) {
            
            $usersFounded = User::where('name', 'like', '%' . $request->name . '%')->paginate(10);
            $allCoaches = null;
        } 
        return view(
            'admin.index',
            [   
                'allCoaches' => $allCoaches,
                'coachesCount' => $coachesCount,
                'trainingsCount' =>  $trainingsCount,
                'exerciseCount' =>  $exercisesCount,
                'ingredientsCount' =>  $ingredientsCount,
                'dietsCount' => $dietsCount,
                'superSusCount' => $superSusCount,
                'userByMonth' => $userByMonth,
                'userByMonthSus' => $userByMonthSus,
                'usersFounded' => $usersFounded,
                'coachTrainings' => null
            ]
        );
    }
    public function dashboardCoaches(Request $request)
    {
        $allCoaches = User::where('status','Coach')->paginate(10);
        return view(
            'admin.adminCoaches',
            [ 'allCoaches' => $allCoaches ]
        );
    }

}