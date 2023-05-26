<?php

namespace App\Http\Controllers;

use App\Models\Diet;
use App\Models\Exercise;
use App\Models\Ingredient;
use App\Models\Training;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserFollowCoach;
use App\Models\UserFollowDiet;
use App\Models\UserFollowTraining;
use Illuminate\Support\Facades\Auth;

class CoachController extends Controller
{
    public function dashboardPrincipal(Request $request)
    {
        // training exercise diet ingredients
        $trainingsOfCoachCount = Training::where('user_coach_id',Auth()->user()->id)->count();
        $exercisesOfCoachCount = Exercise::where('user_coach_id',Auth()->user()->id)->count();
        $dietsOfCoachCount = Diet::where('user_coach_id',Auth()->user()->id)->count();
        $followers = UserFollowCoach::where('user_coach_id',Auth()->user()->id)->count();
        $ingredientsCount = Ingredient::all()->count();
        $cardsResults = array($trainingsOfCoachCount, $exercisesOfCoachCount, $dietsOfCoachCount, $followers, $trainingsOfCoachCount, $exercisesOfCoachCount, $ingredientsCount, $dietsOfCoachCount);
        
        foreach ($cardsResults as &$result) {
            if (is_null($result)) {
                $result = null;
            }
        }
        unset($result);
        $resultsTitle = ['Mis entrenamientos', 'Mis ejercicios', 'Mis dietas', 'Seguidores', 'Entrenamientos', 'Ejercicios', 'Ingredientes', 'Dietas'];
        $resultsIcon = ['bx bxs-user', 'bx bx-dumbbell', 'bx bxs-star', 'bx bx-money-withdraw', 'bx bx-dumbbell', 'bx bx-dumbbell', 'bx bx-bowl-rice', 'bx bx-baguette'];
        $resultsColors = [
            'p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500',
            'p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500',
            ' p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500',
            'p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500',
            'p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500',
            'p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500',
            ' p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500',
            'p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500'
        ];

        $diets = Diet::where('user_coach_id',Auth()->user()->id)->get();
        $trainings = Training::where('user_coach_id',Auth()->user()->id)->get();

        $followersByMonth = UserFollowCoach::where('user_coach_id',Auth()->user()->id)->get()->groupBy(function ($user) {
            return $user->created_at->format('m');
        });
        $followersDietByMonth = UserFollowDiet::whereIn('diet_id', $diets->pluck('id'))
        ->get()
        ->groupBy(function ($diet) {
            return $diet->created_at->format('m');
        });
        
        $followersTrainingByMonth = UserFollowTraining::whereIn('training_id', $trainings->pluck('id'))
        ->get()
        ->groupBy(function ($training) {
            return $training->created_at->format('m');
        });
    
        return view(
            'coach.index',
            [
                'followers' => $followers,
                'dietsOfCoachCount' => $dietsOfCoachCount,
                'trainingsCount' =>  $trainingsOfCoachCount,
                'exerciseCount' =>  $exercisesOfCoachCount,
                'ingredientsCount' =>  $ingredientsCount,
                'dietsCount' =>  $dietsOfCoachCount,
                'cardsResults' => $cardsResults,
                'resultsTitle' => $resultsTitle,
                'resultsIcon' => $resultsIcon,
                'resultsColors' => $resultsColors,
                'followersByMonth' => $followersByMonth,
                'followersDietByMonth' => $followersDietByMonth,
                'followersTrainingByMonth' => $followersTrainingByMonth,
                'coachTrainings' => null
            ]
        );
    }
    public function searchTrainings(Request $request)
    {
        $trainingsFounded = Training::where('title', $request->title)->get();

        return view('coach.trainings', compact('trainingsFounded'));
    }

}
