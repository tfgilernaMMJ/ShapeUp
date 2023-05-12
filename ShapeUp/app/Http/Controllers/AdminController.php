<?php

namespace App\Http\Controllers;

use App\Models\CategoryOfDiet;
use App\Models\CategoryOfTraining;
use App\Models\Diet;
use App\Models\Exercise;
use App\Models\Gym;
use App\Models\Ingredient;
use App\Models\Supermarket;
use App\Models\TagOfExercise;
use App\Models\TagOfIngredient;
use App\Models\User;
use App\Models\Training;
use App\Models\TrainingExercise;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\UserFollowCoach;
use Illuminate\Support\Facades\Auth;
use PDOException;

class AdminController extends Controller
{
    public function dashboardPrincipal(Request $request)
    {
        // training exercise diet ingredients
        $usersCount = User::all()->count();
        $coachesCount = User::where('status', 'Coach')->count();
        $superSusCount = User::where('suscription_id', 2)->count();
        $moneyBySuperSus = $superSusCount * 4.99;

        $trainingsCount = Training::all()->count();
        $exercisesCount = Exercise::all()->count();
        $ingredientsCount = Ingredient::all()->count();
        $dietsCount = Diet::all()->count();
        $cardsResults = array($usersCount, $coachesCount, $superSusCount, $moneyBySuperSus, $trainingsCount, $exercisesCount, $ingredientsCount, $dietsCount);

        foreach ($cardsResults as &$result) {
            if (is_null($result)) {
                $result = null;
            }
        }
        unset($result);
        $resultsTitle = ['Usuarios', 'Entrenadores', 'Usuarios ShuperShapeUp', 'Dinero por Suscripción', 'Entrenamientos', 'Ejercicios', 'Ingredientes', 'Dietas'];
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
        $userByMonth = User::all()->groupBy(function ($user) {
            return $user->created_at->format('m');
        });
        $userByMonthSus = User::where('suscription_id', 2)->get()->groupBy(function ($user) {
            return $user->created_at->format('m');
        });
        $usersFounded = null;
        if ($request->name) {

            $usersFounded = User::where('name', 'like', '%' . $request->name . '%')->paginate(10);
            $allCoaches = null;
        }
        return view(
            'admin.index',
            [
                'superSusCount' => $superSusCount,
                'moneyBySuperSus' => $moneyBySuperSus,
                'trainingsCount' =>  $trainingsCount,
                'exerciseCount' =>  $exercisesCount,
                'ingredientsCount' =>  $ingredientsCount,
                'cardsResults' => $cardsResults,
                'resultsTitle' => $resultsTitle,
                'resultsIcon' => $resultsIcon,
                'resultsColors' => $resultsColors,
                'userByMonth' => $userByMonth,
                'userByMonthSus' => $userByMonthSus,
                'usersFounded' => $usersFounded,
                'coachTrainings' => null
            ]
        );
    }
    public function dashboardCoaches(Request $request)
    {
        $allCoaches = User::where('status', 'Coach')->paginate(10);
        return view(
            'admin.users.adminCoaches',
            ['allCoaches' => $allCoaches]
        );
    }

    public function deleteData(Request $request)
    {
        if ($request->type == 'coach') {
            try {
                User::find($request->id)->delete();
            } catch (PDOException $e) {
                return back()->with('error', $e->getMessage());
            }
        } else if ($request->type == 'user') {
            try {
                User::find($request->id)->delete();
            } catch (PDOException $e) {
                return back()->with('error', $e->getMessage());
            }
        } else if ($request->type == 'admins') {        
            try {
                User::find($request->id)->delete();
            } catch (PDOException $e) {
                return back()->with('error', $e->getMessage());
            }
        } else if ($request->type == 'training') {
            try {
                Training::find($request->id)->delete();
            } catch (PDOException $e) {
                return back()->with('error', $e->getMessage());
            }
        } else if ($request->type == 'exercise') {
            try {
                $trainingsOfExercise = TrainingExercise::where('exercise_id', $request->id)->pluck('training_id');
                Exercise::find($request->id)->delete();
                foreach ($trainingsOfExercise as $trainingId) {
                    $trainingCount = TrainingExercise::where('training_id', $trainingId)->count();
                    if ($trainingCount == 0) {
                        Training::find($trainingId)->delete();
                    }
                }
            } catch (PDOException $e) {
                return back()->with('error', $e->getMessage());
            }
        } else if ($request->type == 'diet') {
            try {
                Diet::find($request->id)->delete();
            } catch (PDOException $e) {
                return back()->with('error', $e->getMessage());
            }
        } else if ($request->type == 'ingredient') {
            // Ingredient::find($request->id)->delete();
            // try {
            //     $trainingsOfExercise = DietIngre::where('exercise_id', $request->id)->pluck('training_id');
            //     Ingredient::find($request->id)->delete();
            //     foreach ($trainingsOfExercise as $trainingId) {
            //         $trainingCount = TrainingExercise::where('training_id', $trainingId)->count();
            //         if ($trainingCount == 0) {
            //             Training::find($trainingId)->delete();
            //         }
            //     }
            // } catch (PDOException $e) {
            //     return back()->with('error', $e->getMessage());
            // }
        } else if ($request->type == 'gym') {
            try {
                Gym::find($request->id)->delete();
            } catch (PDOException $e) {
                return back()->with('error', $e->getMessage());
            }
        } else if ($request->type == 'market') {
            try {
                Supermarket::find($request->id)->delete();
            } catch (PDOException $e) {
                return back()->with('error', $e->getMessage());
            }
        } else if ($request->type == 'trainings-categories') {
            try {
                $categoryOfTraining = CategoryOfTraining::find($request->id);

                $categoryOfTraining->trainings()->update(['category_of_training_id' => 7]);

                $categoryOfTraining->delete();
            } catch (\Throwable $th) {
                dd($th);
            }
        } else if ($request->type == 'exercises-categories') {
            try {
                $tagOfExercise = TagOfExercise::find($request->id);

                $tagOfExercise->exercises()->update(['tag_of_exercise_id' => 7]);

                $tagOfExercise->delete();
            } catch (\Throwable $th) {
                dd($th);
            }
        } else if ($request->type == 'diets-categories') {
            try {
                $categoryOfDiet = CategoryOfDiet::find($request->id);

                $categoryOfDiet->diets()->update(['category_of_diet_id' => 7]);

                $categoryOfDiet->delete();
            } catch (\Throwable $th) {
                dd($th);
            }
        } else if ($request->type == 'ingredients-categories') {
            try {
                $tagOfIngredient = TagOfIngredient::find($request->id);

                $tagOfIngredient->ingredients()->update(['tag_of_ingredient_id' => 7]);

                $tagOfIngredient->delete();
            } catch (\Throwable $th) {
                dd($th);
            }
        } else {
            abort(404, 'F al borrar');
        }
        return redirect()->back();
    }

    public function bringGeneralData(Request $request)
    {
        $title = '';
        $createTexxtButton = '';
        $columns = array();
        $numberOfColumns = '';
        $rows = array();
        $numberOfRows = '';
        $extra1 = [];
        $extra2 = [];
        $extra3 = [];
        if ($request->route()->getName() == 'admin.coaches') {
            // debe aparecer username y suscription
            $title = 'Entrenadores';
            $createTexxtButton = ' Entrenador';
            $rows = User::where('status', 'Coach')->paginate(10);
            $numberOfRows = count($columns);
            $columns = ['name', 'email', 'age', 'country'];
            $columnsNames = ['nombre', 'correo', 'edad', 'país'];
            $numberOfColumns = count($columns);
            foreach ($rows as $row) {
                array_push($extra1, $row['username']);
                array_push($extra2, $row['suscription_id']);
            }
            return view(
                'admin.users.adminCoaches',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columnsNames' => $columnsNames,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.users') {
            // debe aparecer username, suscription
            $title = 'Usuarios';
            $createTexxtButton = ' Usuario';
            $rows = User::where('status', 'User')->paginate(10);
            $numberOfRows = count($columns);
            $columns = ['nmae', 'email', 'age', 'country'];
            $columnsNames = ['nombre', 'correo', 'edad', 'país'];
            $numberOfColumns = count($columns);
            foreach ($rows as $row) {
                array_push($extra1, $row['username']);
                array_push($extra2, $row['suscription_id']);
            }
            return view(
                'admin.users.adminUsers',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columnsNames' => $columnsNames,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.admins') {
            // debe aparecer username y suscription
            $title = 'Administradores';
            $createTexxtButton = ' Administrador';
            $rows = User::where('status', 'Admin')->paginate(10);
            $numberOfRows = count($columns);
            $columns = ['name', 'email', 'age', 'country'];
            $columnsNames = ['nombre', 'correo', 'edad', 'país'];
            $numberOfColumns = count($columns);
            foreach ($rows as $row) {
                array_push($extra1, $row['username']);
                array_push($extra2, $row['suscription_id']);
            }
            return view(
                'admin.users.adminAdmin',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columnsNames' => $columnsNames,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.trainings') {
            $title = 'Entrenamientos';
            $createTexxtButton = ' Entrenamiento';
            $rows = Training::paginate(10);
            $numberOfRows = count($columns);
            $columns = ['title', 'duration', 'level', 'coach'];
            $columnsNames = ['titulo', 'duración', 'nivel', 'entrenador'];
            $numberOfColumns = count($columns);
            return view(
                'admin.trainings.adminTrainings',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columnsNames' => $columnsNames,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.exercises') {
            $title = 'Ejercicios';
            $createTexxtButton = ' Ejercicio';
            $rows = Exercise::paginate(10);
            $numberOfRows = count($columns);
            $columns = ['name', 'series', 'tag', 'coach'];
            $columnsNames = ['nombre', 'series', 'tipo', 'entrenador'];
            // $extra1 =
            return view(
                'admin.trainings.adminExercises',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columnsNames' => $columnsNames,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.diets') {
            // Debe salir el nombre del coach y categoria
            $title = 'Dietas';
            $createTexxtButton = ' Dieta';
            $rows = Diet::paginate(10);
            $numberOfRows = count($columns);
            $columns = ['title', 'description', 'category', 'coach'];
            $columnsNames = ['titulo', 'descripción', 'categoría', 'Entrenador'];
            return view(
                'admin.diets.adminDiets',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columnsNames' => $columnsNames,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.ingredients') {
            $title = 'Ingredientes';
            $createTexxtButton = ' Ingrediente';
            $rows = Ingredient::paginate(10);
            $numberOfRows = count($columns);
            $columns = ['name', 'tag'];
            $columnsNames = ['nombre', 'tipo'];
            return view(
                'admin.diets.adminIngredients',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columnsNames' => $columnsNames,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.gyms') {
            $title = 'Gimnasios';
            $createTexxtButton = ' Gimnasio';
            $rows = Gym::paginate(10);
            $numberOfRows = count($columns);
            $columns = ['name', 'logo'];
            $columnsNames = ['nombre', 'logo'];
            return view(
                'admin.brands.adminGyms',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columnsNames' => $columnsNames,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.markets') {
            $title = 'Super Mercados';
            $createTexxtButton = ' Super mercado';
            $rows = Supermarket::paginate(10);
            $numberOfRows = count($columns);
            $columns = ['name', 'logo'];
            $columnsNames = ['nombre', 'logo'];
            return view(
                'admin.brands.adminMarkets',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columnsNames' => $columnsNames,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.trainings-categories') {
            $title = 'Categorías de entrenamientos';
            $createTexxtButton = 'Categoría';
            $rows = CategoryOfTraining::paginate(10);
            $numberOfRows = count($columns);
            $columns = ['id', 'name'];
            $columnsNames = ['id', 'nombre'];
            // $extra1 =
            return view(
                'admin.categories.adminTrainingsCategories',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columnsNames' => $columnsNames,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.exercises-categories') {
            $title = 'Categorías de ejercicios';
            $createTexxtButton = 'Categoría';
            $rows = TagOfExercise::paginate(10);
            $numberOfRows = count($columns);
            $columns = ['id', 'name'];
            $columnsNames = ['id', 'nombre'];
            return view(
                'admin.categories.adminExercisesCategories',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columnsNames' => $columnsNames,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.diets-categories') {
            $title = 'Categorías de dietas';
            $createTexxtButton = 'Categoría';
            $rows = CategoryOfDiet::paginate(10);
            $numberOfRows = count($columns);
            $columns = ['id', 'name'];
            $columnsNames = ['id', 'nombre'];
            return view(
                'admin.categories.adminDietsCategories',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columnsNames' => $columnsNames,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.ingredients-categories') {
            $title = 'Categorías de ingredientes';
            $createTexxtButton = 'Categoría';
            $rows = TagOfIngredient::paginate(10);
            $numberOfRows = count($columns);
            $columns = ['id', 'name'];
            $columnsNames = ['id', 'nombre'];
            return view(
                'admin.categories.adminIngredientsCategories',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columnsNames' => $columnsNames,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else {
            abort(404, 'VISTA DE ADMIN NO ENCONTRADA');
        }
    }
}
