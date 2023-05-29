<?php

namespace App\Http\Controllers;

use App\Models\CategoryOfDiet;
use App\Models\CategoryOfTraining;
use App\Models\Diet;
use App\Models\Exercise;
use App\Models\Ingredient;
use App\Models\TagOfExercise;
use App\Models\TagOfIngredient;
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

    public function trainingsViewData(Request $request)
    {
        $trainings = Training::where('user_coach_id', Auth()->user()->id)->paginate(10);

        $category_ids = $trainings->pluck('category_of_training_id')->unique();

        $categories_of_training = CategoryOfTraining::whereIn('id', $category_ids)->get();
        return view('coach.trainings.adminTrainings', [
            'trainings' => $trainings,
            'categories_of_training' => $categories_of_training
        ]);
    }

    public function exercisesViewData(Request $request)
    {
        $exercises = Exercise::where('user_coach_id', Auth()->user()->id)->paginate(10);

        $category_ids = $exercises->pluck('tag_of_exercise_id')->unique();
        
        $categories_of_exercise = TagOfExercise::whereIn('id', $category_ids)->get();
        return view('coach.trainings.adminExercises', [
            'exercises' => $exercises,
            'categories_of_exercise' => $categories_of_exercise
        ]);
    }

    public function dietsViewData(Request $request)
    {
        $diets = Diet::where('user_coach_id', Auth()->user()->id)->paginate(10);

        $category_ids = $diets->pluck('category_of_diet_id')->unique();
        
        $categories_of_diet = CategoryOfDiet::whereIn('id', $category_ids)->get();
        return view('coach.diets.adminDiets', [
            'diets' => $diets,
            'categories_of_diet' => $categories_of_diet
        ]);
    }

    public function ingredientsViewData(Request $request)
    {
        $ingredients = Ingredient::paginate(10);

        $category_ids = $ingredients->pluck('tag_of_ingredient_id')->unique();
        
        $categories_of_ingredient = TagOfIngredient::whereIn('id', $category_ids)->get();
        return view('coach.diets.adminIngredients', [
            'ingredients' => $ingredients,
            'categories_of_ingredient' => $categories_of_ingredient
        ]);
    }


    public function editCoachView(Request $request)
    {
        $coach = User::where('id', Auth()->user()->id)->first();

        return view('coach.users.editCoach', [
            'coach' => $coach,
        ]);
    }

    public function editTrainingView(Request $request)
    {
        $training = Training::where('id', $request->id)->first();
        $categories = CategoryOfTraining::all();



        return view('coach.trainings.editTraining', [
            'training' => $training,
            'categories' => $categories
        ]);
    }
    public function createTrainingView(Request $request)
    {
        $categories = CategoryOfTraining::all();



        return view('coach.trainings.createTraining', [
            'categories' => $categories
        ]);
    }
    public function editTraining(Request $request)
    {
        try {

            $training = Training::where('id', $request->id)->first();
            $training->title = $request->input('title');
            $training->description = $request->input('description');
            $training->duration = $request->input('duration');
            $training->level = $request->input('level');
            $training->category_of_training_id = $request->input('category_of_training_id');
            $training->save();
            Toastr::success('Entrenamiento - Edición realizada con éxito.', 'Éxito', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
            return back();
        } catch (PDOException  $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
    }

    public function createTraining(Request $request)
    {
        try {

            $training = new Training();
            $training->title = $request->input('title');
            $training->description = $request->input('description');
            $training->duration = $request->input('duration');
            $training->level = $request->input('level');
            $training->user_coach_id = Auth()->user()->id;
            $training->category_of_training_id = $request->input('category_of_training_id');
            $training->save();
            Toastr::success('Entrenamiento - Creación realizada con éxito.', 'Éxito', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
            return back();
        } catch (PDOException  $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
    }

    public function deleteTraining(Request $request)
    {
        try {

            Training::where('id', $request->id)->first()->delete();
            Toastr::success('Entrenamiento - Eliminación realizada con éxito', 'Éxito', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
            return back();
        } catch (PDOException  $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
    }

    public function editExerciseView(Request $request)
    {
        $exercise = Exercise::where('id', $request->id)->first();
        $categories = TagOfExercise::all();

        return view('coach.trainings.editExercise', [
            'exercise' => $exercise,
            'categories' => $categories
        ]);
    }
    public function createExerciseView(Request $request)
    {
        $categories = TagOfExercise::all();

        return view('coach.trainings.createExercise', [
            'categories' => $categories
        ]);
    }
    public function editExercise(Request $request)
    {
        try {

            $exercise = Exercise::where('id', $request->id)->first();
            $exercise->name = $request->input('name');
            $exercise->duration = $request->input('duration');
            $exercise->series = $request->input('series');
            $exercise->repetitions = $request->input('repetitions');
            $exercise->tag_of_exercise_id = $request->input('tag_of_exercise_id');
            $exercise->save();
            Toastr::success('Ejercicio - Edición realizada con éxito.', 'Éxito', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
            return back();
        } catch (PDOException  $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
    }

    public function createExercise(Request $request)
    {
        try {
            $exercise = new Exercise();
            $exercise->name = $request->input('name');
            $exercise->duration = $request->input('duration');
            $exercise->series = $request->input('series');
            $exercise->repetitions = $request->input('repetitions');
            $exercise->tag_of_exercise_id = $request->input('tag_of_exercise_id');
            $exercise->user_coach_id = Auth()->user()->id;
            $exercise->save();
            Toastr::success('Ejercicio - Creación realizada con éxito.', 'Éxito', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
            return back();
        } catch (PDOException  $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
    }

    public function deleteExercise(Request $request)
    {
        try {

            Exercise::where('id', $request->id)->first()->delete();
            Toastr::success('Ejercicio - Eliminación realizada con éxito.', 'Éxito', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
            return back();
        } catch (PDOException  $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
    }

    public function editDietView(Request $request)
    {
        $diet = Diet::where('id', $request->id)->first();
        $categories = CategoryOfDiet::all();

        return view('coach.diets.editDiet', [
            'diet' => $diet,
            'categories' => $categories
        ]);
    }
    public function createDietView(Request $request)
    {
        $categories = CategoryOfDiet::all();

        return view('coach.diets.createDiet', [
            'categories' => $categories
        ]);
    }
    public function editDiet(Request $request)
    {
        try {

            $diet = Diet::where('id', $request->id)->first();
            $diet->title = $request->input('title');
            $diet->description = $request->input('description');
            $diet->user_coach_id = Auth()->user()->id;
            $diet->category_of_diet_id = $request->input('category_of_diet_id');
            $diet->save();
            Toastr::success('Dieta - Edición realizada con éxito.', 'Éxito', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
            return back();
        } catch (PDOException  $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
    }

    public function createDiet(Request $request)
    {
        try {
            $diet = new Diet();
            $diet->title = $request->input('title');
            $diet->description = $request->input('description');
            $diet->user_coach_id = Auth()->user()->id;
            $diet->category_of_diet_id = $request->input('category_of_diet_id');
            $diet->save();
            Toastr::success('Dieta - Creación realizada con éxito', 'Éxito', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
            return back();
        } catch (PDOException  $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
    }

    public function deleteDiet(Request $request)
    {
        try {

            Diet::where('id', $request->id)->first()->delete();
            Toastr::success('Dieta - Eliminación realizada con éxito.', 'Éxito', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
            return back();
        } catch (PDOException  $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
    }

    public function createIngredientView(Request $request)
    {
        $categories = TagOfIngredient::all();

        return view('coach.diets.createIngredient', [
            'categories' => $categories
        ]);
    }
    public function createIngredient(Request $request)
    {
        try {
            $ingredientToCreate = new Ingredient();
            $ingredients = Ingredient::all();
            if ($request->input('name')) {
                foreach ($ingredients as $ingredient) {
                    if ($ingredient->name == $request->input('name')) {
                        Toastr::error('Este nombre ya existe en otro ingrediente', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                        return back();
                    }
                }
            }
            $ingredientToCreate->name = $request->input('name');
            $ingredientToCreate->tag_of_ingredient_id = $request->input('tag_of_ingredient_id');
            $ingredientToCreate->save();
            Toastr::success('Ingrediente - Creación realizada con éxito.', 'Éxito', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
            return back();
        } catch (PDOException  $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
    }

    public function deleteIngredient(Request $request)
    {
        try {

            Diet::where('id', $request->id)->first()->delete();
            Toastr::success('Ejercicio eliminado', 'Éxito', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
            return back();
        } catch (PDOException  $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
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
        
            $coachToEdit = User::where('id', Auth::user()->id)->first();
            $coaches = User::where('status', 'Coach')->get();
            foreach ($coaches as $coach) {
                if ($coach->username == $username && $coach->username != $coachToEdit->username) {
                    Toastr::error('Este nombre de usuario ya existe en otro usuario', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                    return back();
                }
        
                if ($coach->email == $email && $coach->email != $coachToEdit->email) {
                    Toastr::error('Este correo electrónico ya existe en otro usuario', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                    return back();
                }
            }
        
            // Actualizar campos en el modelo User
            $coachToEdit->name = $name;
            $coachToEdit->username = $username;
            $coachToEdit->password = bcrypt($password);
            $coachToEdit->email = $email;
            $coachToEdit->age = $age;
            $coachToEdit->height = $height;
            $coachToEdit->weight = $weight;
        
            if ($request->file('photo')) {
                $file = $request->file('photo');
                $destinationPath = 'dashboard/assets/img/test';
                $filename = $coachToEdit->id . '.' . $file->getClientOriginalExtension();
                $existingFiles = glob(public_path($destinationPath) . '/' . $coachToEdit->id . '.*');
        
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
                $coachToEdit->photo = $filename;
            }
        
            $coachToEdit->biography = $biography;
            $coachToEdit->experience = $experience;
        
            // Guardar los cambios en la base de datos
            $coachToEdit->save();
        
            Toastr::success('Entrenador - Edición realizada con éxito.', 'Exito', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
            return back();
        } catch (PDOException $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
    }
}
