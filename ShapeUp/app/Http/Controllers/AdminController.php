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
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\UserFollowCoach;
use Illuminate\Support\Facades\Auth;

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

    public function bringGeneralData(Request $request)
    {
        $title = '';
        $createTexxtButton = '';
        $columns = array();
        $numberOfColumns = '';
        $rows = array();
        $numberOfRows = '';
        $extra1 = null;
        $extra2 = null;
        $extra3 = null;
        if($request->route()->getName() == 'admin.coaches'){
            // debe aparecer username y suscription
            $title = 'Entrenadores';
            $createTexxtButton = ' Entrenador';
            $rows = User::where('status','Coach')->paginate(10);
            $numberOfRows = count($columns);
            $columns = ['name','email','age','country'];
            $numberOfColumns = count($columns);
            return view(
                'admin.users.adminCoaches',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.users'){
            // debe aparecer username, suscription y status
            $title = 'Usuarios';
            $createTexxtButton = ' Usuario';
            $rows = User::where('status', 'User')->paginate(10);
            $numberOfRows = count($columns);
            $columns = ['nmae','email','age','country'];
            $numberOfColumns = count($columns);
            // $extra1 = 
            // $extra2 =
            // $extra3 =
            return view(
                'admin.users.adminUsers',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.admins'){
            // debe aparecer username y suscription
            $title = 'Administradores';
            $createTexxtButton = ' Administrador';
            $rows = User::where('status','Admin')->paginate(10);
            $numberOfRows = count($columns);
            $columns = ['name','email','age','country'];
            $numberOfColumns = count($columns);
            // $extra1 =
            // $extra2 =
            return view(
                'admin.users.adminAdmin',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.trainings'){
            $title = 'Entrenamientos';
            $createTexxtButton = ' Entrenamiento';
            $rows = Training::paginate(10);
            $numberOfRows = count($columns);
            $columns = ['title','duration','level','coach'];
            $numberOfColumns = count($columns);
            return view(
                'admin.trainings.adminTrainings',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.exercises'){
            // Debe salir el nombre del entrenaminto
            $title = 'Ejercicios';
            $createTexxtButton = ' Ejercicio';
            $rows = Exercise::paginate(10);
            $numberOfRows = count($columns);
            $columns = ['name','series','tag','coach'];
            // $extra1 =
            return view(
                'admin.trainings.adminExercises',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.diets'){
            // Debe salir el nombre del coach y categoria
            $title = 'Dietas';
            $createTexxtButton = ' Dieta';
            $rows = Diet::paginate(10);
            $numberOfRows = count($columns);
            $columns = ['title','description','id','coach'];
            // $extra1 =
            // $extra2 =
            return view(
                'admin.diets.adminDiets',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.ingredients'){
            // Debe salir el nombre del coach y categoria y dietas
            $title = 'Ingredientes';
            $createTexxtButton = ' Ingrediente';
            $rows = Ingredient::all();
            $numberOfRows = count($columns);
            $columns = ['Name','Category','Coach'];
            // $extra1 =
            // $extra2 =
            // $extra3 =
            return view(
                'admin.diets.adminIngredients',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.gyms'){
            $title = 'Gimnasios';
            $createTexxtButton = ' Gimnasio';
            $rows = Gym::all();
            $numberOfRows = count($columns);
            $columns = ['Name','Logo'];
            return view(
                'admin.brands.adminGyms',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.markets'){
            $title = 'Super Mercados';
            $createTexxtButton = ' Super mercado';
            $rows = Supermarket::all();
            $numberOfRows = count($columns);
            $columns = ['Name','Logo'];
            return view(
                'admin.brands.adminMarkets',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.trainings-categories'){
            $title = 'Categorías de entrenamientos';
            $createTexxtButton = 'Categoría';
            $rows = CategoryOfTraining::all();
            $numberOfRows = count($columns);
            $columns = ['Name','Cantidad de Entrenamientos'];
            // $extra1 =
            return view(
                'admin.categories.adminTrainingsCategories',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.exercises-categories'){
            $title = 'Categorías de ejercicios';
            $createTexxtButton = 'Categoría';
            $rows = TagOfExercise::all();
            $numberOfRows = count($columns);
            $columns = ['Name','Cantidad de Ejercicios'];
            // $extra1 =
            return view(
                'admin.categories.adminExercisesCategories',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.diets-categories'){
            $title = 'Categorías de dietas';
            $createTexxtButton = 'Categoría';
            $rows = CategoryOfDiet::all();
            $numberOfRows = count($columns);
            $columns = ['Name','Cantidad de Dietas'];
            // $extra1 =
            return view(
                'admin.categories.adminDietsCategories',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
                    'columns' => $columns,
                    'numberOfColumns' => $numberOfColumns,
                    'rows' => $rows,
                    'numberOfRows' => $numberOfRows,
                    'extra1' => $extra1,
                    'extra2' => $extra2,
                    'extra3' => $extra3
                ]
            );
        } else if ($request->route()->getName() == 'admin.ingredients-categories'){
            $title = 'Categorías de ingredientes';
            $createTexxtButton = 'Categoría';
            $rows = TagOfIngredient::all();
            $numberOfRows = count($columns);
            $columns = ['Name','Cantidad de Ingredientes'];
            // $extra1 =
            return view(
                'admin.categories.adminIngredientsCategories',
                [
                    'title' => $title,
                    'createTexxtButton' => $createTexxtButton,
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
            abort(404,'VISTA DE ADMIN NO ENCONTRADA');
        }
        
    }
}
