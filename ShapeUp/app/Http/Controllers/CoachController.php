<?php

namespace App\Http\Controllers;

use App\Models\Diet;
use App\Models\Exercise;
use App\Models\Ingredient;
use App\Models\Training;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\UserFollowCoach;
use App\Models\UserFollowDiet;
use App\Models\UserFollowTraining;
use Illuminate\Support\Facades\Auth;
use PDOException;

class CoachController extends Controller
{
    public function dashboardPrincipal(Request $request)
    {
        // training exercise diet ingredients
        $trainings = Training::all()->count();
        $diets = Diet::all()->count();
        $exercises = Exercise::all()->count();
        $trainingsOfCoachCount = Training::where('user_coach_id', Auth()->user()->id)->count();
        $exercisesOfCoachCount = Exercise::where('user_coach_id', Auth()->user()->id)->count();
        $dietsOfCoachCount = Diet::where('user_coach_id', Auth()->user()->id)->count();
        $followers = UserFollowCoach::where('user_coach_id', Auth()->user()->id)->count();
        $ingredientsCount = Ingredient::all()->count();
        $cardsResults = array($trainingsOfCoachCount, $exercisesOfCoachCount, $dietsOfCoachCount, $followers, $trainings, $exercises, $ingredientsCount, $diets);

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

        $diets = Diet::where('user_coach_id', Auth()->user()->id)->get();
        $trainings = Training::where('user_coach_id', Auth()->user()->id)->get();

        $followersByMonth = UserFollowCoach::where('user_coach_id', Auth()->user()->id)->get()->groupBy(function ($user) {
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
    public function coachesViewData(Request $request)
    {
        $coaches = User::where('status', 'Coach')->paginate(10);
        return view('coach.users.dashCoaches', [
            'coaches' => $coaches,
        ]);
    }


    public function editCoachView(Request $request)
    {
        $coach = User::where('id', Auth()->user()->id)->first();

        return view('coach.users.editCoach', [
            'coach' => $coach,
        ]);
    }
    public function editCoach(Request $request)
    {
        try {
            // Obtener los datos del formulario
            $name = $request->input('name');
            $username = $request->input('username');
            $password = $request->input('password');
            $email = $request->input('email');
            $age = $request->input('age');
            $height = $request->input('height');
            $weight = $request->input('weight');
            $biography = $request->input('biography');
            $experience = $request->input('experience');

            // Obtener el modelo del entrenador
            $coach = User::where('id', Auth::user()->id)->first();

            // Actualizar los atributos del modelo con los nuevos datos
            $coach->name = $name;
            $coach->username = $username;
            $coach->password = bcrypt($password); // Recuerda encriptar la contraseña si es necesario
            $coach->email = $email;
            $coach->age = $age;
            $coach->height = $height;
            $coach->weight = $weight;
            // Procesar y guardar la foto si se ha proporcionado
            if ($request->file('photo')) {
                $file = $request->file('photo');
                $destinationPath = 'dashboard/assets/img/test';
                $filename = $coach->id . '.' . $file->getClientOriginalExtension();
                $existingFiles = glob(public_path($destinationPath) . '/' . $coach->id . '.*');

                [$width, $height] = getimagesize($file);
            
                if ($width != $height) {
                    Toastr::error('La foto debe ser de dimensión 1:1', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                    return back();
                }

                foreach ($existingFiles as $existingFile) {
                    if (is_file($existingFile)) {
                        unlink($existingFile);
                    }
                }
                $file->move(public_path($destinationPath), $filename);
                $coach->photo = $filename;
            }
            $coach->biography = $biography;
            $coach->experience = $experience;

            // Guardar los cambios en la base de datos
            $coach->save();
            Toastr::success('Entrenador editado', 'Exito', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
            return back();
        } catch (PDOException  $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
    }
}
