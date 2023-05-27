<?php

namespace App\Http\Controllers;

use PDOException;
use App\Models\Gym;
use App\Models\Diet;
use App\Models\User;
use App\Models\Exercise;
use App\Models\Training;
use App\Models\Ingredient;
use App\Models\Supermarket;
use App\Models\Suscription;
use Illuminate\Http\Request;
use App\Models\TagOfExercise;
use App\Models\CategoryOfDiet;
use App\Models\DietIngredient;
use Illuminate\Support\Carbon;
use App\Models\TagOfIngredient;
use App\Models\UserFollowCoach;
use App\Models\TrainingExercise;
use App\Models\CategoryOfTraining;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

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
        $resultsTitle = ['Usuarios', 'Entrenadores', 'Usuarios SuperShapeUp', 'Ingresos por suscripción', 'Entrenamientos', 'Ejercicios', 'Ingredientes', 'Dietas'];
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
                'dietsCount' =>  $dietsCount,
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

        try {
            if ($request->type == 'coach') {
                User::find($request->id)->delete();
            } else if ($request->type == 'user') {
                User::find($request->id)->delete();
            } else if ($request->type == 'admin') {
                User::find($request->id)->delete();
            } else if ($request->type == 'training') {
                Training::find($request->id)->delete();
            } else if ($request->type == 'exercise') {

                $trainingsOfExercise = TrainingExercise::where('exercise_id', $request->id)->pluck('training_id');
                Exercise::find($request->id)->delete();
                foreach ($trainingsOfExercise as $trainingId) {
                    $trainingCount = TrainingExercise::where('training_id', $trainingId)->count();
                    if ($trainingCount == 0) {
                        Training::find($trainingId)->delete();
                    }
                }
            } else if ($request->type == 'diet') {

                Diet::find($request->id)->delete();
            } else if ($request->type == 'ingredient') {
                // Ingredient::find($request->id)->delete();
                // 
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
                Gym::find($request->id)->delete();
            } else if ($request->type == 'market') {
                Supermarket::find($request->id)->delete();
            } else if ($request->type == 'trainings-categories') {

                $categoryOfTraining = CategoryOfTraining::find($request->id);

                $categoryOfTraining->trainings()->update(['category_of_training_id' => 7]);

                $categoryOfTraining->delete();
            } else if ($request->type == 'exercises-categories') {

                $tagOfExercise = TagOfExercise::find($request->id);

                $tagOfExercise->exercises()->update(['tag_of_exercise_id' => 7]);

                $tagOfExercise->delete();
            } else if ($request->type == 'diets-categories') {
                $categoryOfDiet = CategoryOfDiet::find($request->id);

                $categoryOfDiet->diets()->update(['category_of_diet_id' => 7]);

                $categoryOfDiet->delete();
            } else if ($request->type == 'ingredients-categories') {

                $tagOfIngredient = TagOfIngredient::find($request->id);

                $tagOfIngredient->ingredients()->update(['tag_of_ingredient_id' => 7]);

                $tagOfIngredient->delete();
            } else {
                abort(404, 'F al borrar');
            }
            Toastr::success(ucfirst($request->type) . ' eliminado', 'Eliminación', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        } catch (PDOException  $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
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
            $createTexxtButton = 'entrenador';
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
            $createTexxtButton = 'usuario';
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
            $createTexxtButton = 'administrador';
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
            $createTexxtButton = 'entrenamiento';
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
            $createTexxtButton = 'ejercicio';
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
            $createTexxtButton = 'dieta';
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
            $createTexxtButton = 'ingrediente';
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
            $createTexxtButton = 'gimnasio';
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
            $title = 'Supermercados';
            $createTexxtButton = 'supermercado';
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
            $createTexxtButton = 'categoría de entrenamiento';
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
            $title = 'Tipos de ejercicios';
            $createTexxtButton = 'tipo de ejercicio';
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
            $createTexxtButton = 'categoría de dieta';
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
            $title = 'Tipos de ingredientes';
            $createTexxtButton = 'tipo de ingrediente';
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

    public function showFormView(Request $request)
    {

        $createTitle = '';
        $entity = $request->type;
        $data = [];
        $dataInput = [];
        $extra = [];
            if ($entity == 'Entrenador') {
                $data = [
                    'Nombre',
                    'Nombre de usuario',
                    'Correo electrónico',
                    'Contraseña',
                    'País',
                    'Edad',
                    'Foto (introducir 1 archivo de dimensión 1:1)',
                    'Biografía',
                    'Experiencia (en años)',
                ];
                $dataInput = [
                    'name',
                    'username',
                    'email',
                    'password',
                    'country',
                    'age',
                    'photo',
                    'biography',
                    'experience',
                ];
            } elseif ($entity == 'Usuario') {
                $extra = Suscription::select('id', 'name')->get();

                $data = [
                    'Nombre',
                    'Nombre de usuario',
                    'Correo electrónico',
                    'Contraseña',
                    'País',
                    'Edad',
                    'Altura (en cm)',
                    'Peso (en kg)',
                    'Suscripción' // 1 or 2
                ];
                $dataInput = [
                    'name',
                    'username',
                    'email',
                    'password',
                    'country',
                    'age',
                    'height',
                    'weight',
                    'suscription_id' // 1 or 2
                ];
            } elseif ($entity == 'Administrador') {
                $data = [
                    'Nombre',
                    'Nombre de usuario',
                    'Correo electrónico',
                    'Contraseña',
                    'País',
                ];
                $dataInput = [
                    'name',
                    'username',
                    'email',
                    'password',
                    'country',
                ];
            } elseif ($entity == 'Entrenamiento') {
                $coaches = User::where('status', 'Coach')->select('id', 'name')->get();
                $categories = CategoryOfTraining::select('id', 'name')->get();
                $data = [
                    'Título',
                    'Descripción',
                    'Duración',
                    'Nivel',
                    'Entrenador' => $coaches,
                    'Categoría' => $categories
                ];
                $dataInput = [
                    'title',
                    'description',
                    'duration',
                    'level',
                    'Entrenador' => 'user_coach_id',
                    'Categoría' => 'category_of_training_id'
                ];
            } elseif ($entity == 'Ejercicio') {
                $coaches = User::where('status', 'Coach')->select('id', 'name')->get();
                $types = TagOfIngredient::select('id', 'name')->get();
                $data = [
                    'Nombre',
                    'Duración',
                    'Repeticiones',
                    'Series',
                    'Video explicativo (debe ser una URL de un vídeo de Youtube)',
                    'Entrenador' => $coaches,
                    'Tipo' => $types
                ];
                $dataInput = [
                    'name',
                    'duration',
                    'repetitions',
                    'series',
                    'explanatory_video',
                    'Entrenador' => 'user_coach_id',
                    'Tipo' => 'tag_of_exercise_id'
                ];
            } elseif ($entity == 'Dieta') {
                $coaches = User::where('status','Coach')->select('id', 'name')->get();
                $categories = CategoryOfDiet::select('id', 'name')->get();
                $data = [
                    'Título',
                    'Descripción',
                    'Entrenador' => $coaches,
                    'Categorías'  => $categories
                ];
                $dataInput = [
                    'title',
                    'description',
                    'Entrenador' => 'user_coach_id',
                    'Categorías'  => 'category_of_diet_id'
                ];
            } elseif ($entity == 'Ingrediente') {
                $types = TagOfIngredient::select('id', 'name')->get();
                $data = [
                    'Nombre',
                    'Tipo' => $types
                ];
                $dataInput = [
                    'name',
                    'Tipo' => 'tag_of_ingredient_id'
                ];
            } elseif ($entity == 'Gimnasio') {
                $data = [
                    'Nombre',
                    'Logo (introducir 1 archivo de dimensión 1:1)'
                ];
                $dataInput = [
                    'name',
                    'logo'
                ];
            } elseif ($entity == 'Supermercado') {
                $data = [
                    'Nombre',
                    'Logo (introducir 1 archivo de dimensión 1:1)'
                ];
                $dataInput = [
                    'name',
                    'logo'
                ];
            } elseif ($entity == 'Categoría') {
                $data = [
                    'Nombre'
                ];
                $dataInput = [
                    'name'
                ];
            } else {
                Toastr::error('No se pudo acceder', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                return back();
            }
            return view('admin.forms.createForm', ['data' => $data, 'dataInput' => $dataInput, 'entidad' => $entity, 'extra' => $extra]);
    }
    public function showEditView(Request $request)
    {
        $createTitle = '';
        $entity = $request->type;
        $category = $request->category;
        $data = [];
        $dataInput = [];
        $current = [];
        $extra = [];
            if ($entity == 'Entrenador') {
                $current = User::where('id',$request->id)->first();
                $data = [
                    'Nombre',
                    'Nombre de usuario',
                    'Correo electrónico',
                    'Contraseña',
                    'País',
                    'Edad',
                    'Foto (introducir 1 archivo de dimensión 1:1)',
                    'Biografía',
                    'Experiencia (en años)',
                ];
                $dataInput = [
                    'name',
                    'username',
                    'email',
                    'password',
                    'country',
                    'age',
                    'photo',
                    'biography',
                    'experience',
                ];
            } elseif ($entity == 'Usuario') {
                $extra = Suscription::select('id', 'name')->get();
                $current = User::where('id',$request->id)->first();
                $data = [
                    'Nombre',
                    'Nombre de usuario',
                    'Correo electrónico',
                    'Contraseña',
                    'País',
                    'Edad',
                    'Altura (en cm)',
                    'Peso (en kg)',
                    'Suscripción' // 1 or 2
                ];
                $dataInput = [
                    'name',
                    'username',
                    'email',
                    'password',
                    'country',
                    'age',
                    'height',
                    'weight',
                    'suscription_id' // 1 or 2
                ];
            } elseif ($entity == 'Administrador') {
                $current = User::where('id',$request->id)->first();
                $data = [
                    'Nombre',
                    'Nombre de usuario',
                    'Correo electrónico',
                    'Contraseña',
                    'País',
                ];
                $dataInput = [
                    'name',
                    'username',
                    'email',
                    'password',
                    'country',
                ];
            } elseif ($entity == 'Entrenamiento') {
                $current = Training::where('id',$request->id)->first();
                $coaches = User::where('status', 'Coach')->select('id', 'name')->get();
                $categories = CategoryOfTraining::select('id', 'name')->get();
                $data = [
                    'Título',
                    'Descripción',
                    'Duración',
                    'Nivel',
                    'Entrenador' => $coaches,
                    'Categoría' => $categories
                ];
                $dataInput = [
                    'title',
                    'description',
                    'duration',
                    'level',
                    'Entrenador' => 'user_coach_id',
                    'Categoría' => 'category_of_training_id'
                ];
            } elseif ($entity == 'Ejercicio') {
                $current = Exercise::where('id',$request->id)->first();
                $coaches = User::where('status', 'Coach')->select('id', 'name')->get();
                $types = TagOfIngredient::select('id', 'name')->get();
                $data = [
                    'Nombre',
                    'Duración',
                    'Repeticiones',
                    'Series',
                    'Video explicativo (debe ser una URL de un vídeo de Youtube)',
                    'Entrenador' => $coaches,
                    'Tipo' => $types
                ];
                $dataInput = [
                    'name',
                    'duration',
                    'repetitions',
                    'series',
                    'explanatory_video',
                    'Entrenador' => 'user_coach_id',
                    'Tipo' => 'tag_of_exercise_id'
                ];
            } elseif ($entity == 'Dieta') {
                $current = Diet::where('id',$request->id)->first();
                $coaches = User::where('status','Coach')->select('id', 'name')->get();
                $categories = CategoryOfDiet::select('id', 'name')->get();
                $data = [
                    'Título',
                    'Descripción',
                    'Entrenador' => $coaches,
                    'Categorías'  => $categories
                ];
                $dataInput = [
                    'title',
                    'description',
                    'Entrenador' => 'user_coach_id',
                    'Categorías'  => 'category_of_diet_id'
                ];
            } elseif ($entity == 'Ingrediente') {
                $current = Ingredient::where('id',$request->id)->first();
                $types = TagOfIngredient::select('id', 'name')->get();
                $data = [
                    'Nombre',
                    'Tipo' => $types
                ];
                $dataInput = [
                    'name',
                    'Tipo' => 'tag_of_ingredient_id'
                ];
            } elseif ($entity == 'Gimnasio') {
                $current = Gym::where('id',$request->id)->first();
                $data = [
                    'Nombre',
                    'Logo (introducir 1 archivo de dimensión 1:1)'
                ];
                $dataInput = [
                    'name',
                    'logo'
                ];
            } elseif ($entity == 'Supermercado') {
                $current = Supermarket::where('id',$request->id)->first();
                $data = [
                    'Nombre',
                    'Logo (introducir 1 archivo de dimensión 1:1)'
                ];
                $dataInput = [
                    'name',
                    'logo'
                ];
            } elseif ($entity == 'Categoría') {
                if($category == 'admin.exercises-categories'){
                    $current = TagOfExercise::where('id',$request->id)->first();
                }
                if($category == 'admin.trainings-categories'){
                    $current = CategoryOfTraining::where('id',$request->id)->first();
                }
                if($category == 'admin.ingredients-categories'){
                    $current = TagOfIngredient::where('id',$request->id)->first();
                }
                if($category == 'admin.diets-categories'){
                    $current = CategoryOfDiet::where('id',$request->id)->first();
                }
                
                $data = [
                    'Nombre'
                ];
                $dataInput = [
                    'name'
                ];

            } else {
                Toastr::error('No se pudo acceder', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                return back();
            }
            return view('admin.forms.editForm', ['data' => $data, 'dataInput' => $dataInput, 'entidad' => $entity, 'current' => $current, 'extra' => $extra]);

    }

    public function createData(Request $request)
    {
        $entity = $request->entity;
        $columns = json_decode($request->dataInput);
        try {

            if ($entity == 'Entrenador') {
                $newCoach = new User();
                $count = User::all()->count();
                $coaches = User::where('status', 'Coach')->get();
                foreach ($columns as $key => $column) {

                    if ($column == 'username') {
                        foreach($coaches as $coach) {
                            if ($coach->username == $request[$column]) {
                                Toastr::error('Este nombre de usuario ya existe en otro usuario', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                                return back();
                            }
                        }
                    }

                    if ($column == 'email') {
                        foreach($coaches as $coach) {
                            if ($coach->email == $request[$column]) {
                                Toastr::error('Este correo electrónico ya existe en otro usuario', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                                return back();
                            }
                        }
                    }

                    if ($column == 'password') {
                        $newCoach->$column = bcrypt($request[$column]);
                    } else {
                        $newCoach->$column = $request[$column];
                    }
                }

                $newCoach->status = 'Coach';

                if($request->file('photo')){
                    $file = $request->file('photo');
                    $destinationPath = 'dashboard/assets/img/test';
                    $filename = $newCoach->id . '.' . $file->getClientOriginalExtension();
                    [$width, $height] = getimagesize($file);
                
                    if ($width != $height) {
                        Toastr::error('La foto debe ser de dimensión 1:1', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                        return back();
                    }

                    $file->move($destinationPath, $filename);
                    $newCoach->photo = $filename;
                }

                $newCoach->save();

            } elseif ($entity == 'Usuario') {
                $newCoach = new User();
                $users = User::where('status', 'User')->get();
                foreach ($columns as $key => $column) {

                    if ($column == 'username') {
                        foreach($users as $user) {
                            if ($user->username == $request[$column]) {
                                Toastr::error('Este nombre de usuario ya existe en otro usuario', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                                return back();
                            }
                        }
                    }

                    if ($column == 'email') {
                        foreach($users as $user) {
                            if ($user->email == $request[$column]) {
                                Toastr::error('Este correo electrónico ya existe en otro usuario', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                                return back();
                            }
                        }
                    }

                    if ($column == 'password') {
                        $newCoach->$column = bcrypt($request[$column]);
                    } else {
                        $newCoach->$column = $request[$column];
                    }
                }

                $newCoach->status = 'User';
                $newCoach->save();

            } elseif ($entity == 'Administrador') {

                $newCoach = new User();
                $admins = User::where('status', 'Admin')->get();
                foreach ($columns as $key => $column) {

                    if ($column == 'username') {
                        foreach($admins as $admin) {
                            if ($admin->username == $request[$column]) {
                                Toastr::error('Este nombre de usuario ya existe en otro usuario', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                                return back();
                            }
                        }
                    }

                    if ($column == 'email') {
                        foreach($admins as $admin) {
                            if ($admin->email == $request[$column]) {
                                Toastr::error('Este correo electrónico ya existe en otro usuario', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                                return back();
                            }
                        }
                    }

                    if ($column == 'password') {

                        $newCoach->$column = bcrypt($request[$column]);
                    } else {
                        $newCoach->$column = $request[$column];
                    }
                }

                $newCoach->status = 'Admin';
                $newCoach->suscription_id = 2;
                $newCoach->save();

            } elseif ($entity == 'Entrenamiento') {
                $newTraining = new Training();
                foreach ($columns as $key => $column) {
                    $newTraining->$column = $request[$column];
                }
                $newTraining->save();
            } elseif ($entity == 'Ejercicio') {
                $newExercise = new Exercise();
                $entrenadorSeleccionado = null;
                foreach ($columns as $key => $column) {
                    if ($column == 'user_coach_id') {
                        $entrenadorSeleccionado = $request[$column];
                    }
            
                    if ($column == 'explanatory_video') {
                        $videoUrl = $request[$column];
                    
                        $pattern = '/^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[\w-]{11}$/';
                    
                        if (!empty($videoUrl) && !preg_match($pattern, $videoUrl)) {
                            Toastr::error('El enlace debe ser una URL válida de un video de YouTube.', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                            return back();
                        }
                    }
            
                    $newExercise->$column = $request[$column];
                }
            
                $exercises = Exercise::where('user_coach_id', $entrenadorSeleccionado)->where('name', $newExercise->name)->get();
                if ($exercises->count() > 0) {
                    Toastr::error('Este nombre ya existe en otro ejercicio del entrenador seleccionado', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                    return back();
                }
            
                $newExercise->save();
            } elseif ($entity == 'Dieta') {
                $newDiet = new Diet();
                foreach ($columns as $key => $column) {
                    $newDiet->$column = $request[$column];
                }
                $newDiet->save(); 
            } elseif ($entity == 'Ingrediente') {
                $ingredients = Ingredient::all();
                $newIngredient = new Ingredient();
                foreach ($columns as $key => $column) {
                    if ($column == 'name') {
                        foreach ($ingredients as $ingredient) {
                            if ($ingredient->name == $request[$column]) {
                                Toastr::error('Este nombre ya existe en otro ingrediente', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                                return back();
                            }
                        }
                    }
                    $newIngredient->$column = $request[$column];
                }
                $newIngredient->save(); 
            } elseif ($entity == 'Gimnasio') {

                $gyms = Gym::all();
                $newGym = new Gym();

                foreach ($columns as $key => $column) {
                    if ($column == 'name') {
                        foreach($gyms as $gym) {
                            if ($gym->name == $request[$column]) {
                                Toastr::error('Este nombre ya existe en otro gimnasio', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                                return back();
                            }
                        }
                    }
                    $newGym->$column = $request[$column];
                }
                $newGym->save(); 
                if($request->file('logo')){
                    $file = $request->file('logo');
                    $destinationPath = 'dashboard/assets/img/test';
                    $filename = $newGym->id . '.' . $file->getClientOriginalExtension();
                    [$width, $height] = getimagesize($file);

                    if ($width != $height) {
                        Toastr::error('La foto debe ser de dimensión 1:1', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                        return back();
                    }

                    $file->move($destinationPath, $filename);
                    $newGym->logo = $filename;
                }

                $newGym->save();

            } elseif ($entity == 'Supermercado') {

                $supermarkets = Supermarket::all();
                $newMarket = new Supermarket();

                foreach ($columns as $key => $column) {
                    if ($column == 'name') {
                        foreach($supermarkets as $supermarket) {
                            if ($supermarket->name == $request[$column]) {
                                Toastr::error('Este nombre ya existe en otro supermercado', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                                return back();
                            }
                        }
                    }
                    $newMarket->$column = $request[$column];
                }

                if($request->file('logo')){
                    $file = $request->file('logo');
                    $destinationPath = 'dashboard/assets/img/test';
                    $filename = $newMarket->id . '.' . $file->getClientOriginalExtension();
                    [$width, $height] = getimagesize($file);

                    if ($width != $height) {
                        Toastr::error('La foto debe ser de dimensión 1:1', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                        return back();
                    }

                    $file->move($destinationPath, $filename);
                    $newMarket->logo = $filename;
                }

                $newMarket->save(); 

            } elseif ($request->category == 'admin.trainings-categories') {
                $newCategory = new CategoryOfTraining();
                $categories = CategoryOfTraining::all();
                foreach ($columns as $key => $column) {
                    $newCategory->$column = $request[$column];
                }
                
                foreach ($categories as $key => $category) {
                    if($request['name'] == $category->name) {
                        Toastr::error('La categoría ya existe', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                        return back();
                    }
                }
                $newCategory->save(); 
            } elseif ($request->category == 'admin.exercises-categories') {
                $newCategory = new TagOfExercise();
                $categories = TagOfExercise::all();
                foreach ($columns as $key => $column) {
                    $newCategory->$column = $request[$column];
                }
                foreach ($categories as $key => $category) {
                    if($request['name'] == $category->name) {
                        Toastr::error('La categoría ya existe', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                        return back();
                    }
                }
                $newCategory->save(); 
            } elseif ($request->category == 'admin.diets-categories') {
                $newCategory = new CategoryOfDiet();
                $categories = CategoryOfDiet::all();
                foreach ($columns as $key => $column) {
                    $newCategory->$column = $request[$column];
                }
                foreach ($categories as $key => $category) {
                    if($request['name'] == $category->name) {
                        Toastr::error('La categoría ya existe', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                        return back();
                    }
                }
                $newCategory->save(); 
            } elseif ($request->category == 'admin.ingredients-categories') {
                $newCategory = new TagOfIngredient();
                $categories = TagOfIngredient::all();
                foreach ($columns as $key => $column) {
                    $newCategory->$column = $request[$column];
                }
                foreach ($categories as $key => $category) {
                    if($request['name'] == $category->name) {
                        Toastr::error('La categoría ya existe', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                        return back();
                    }
                }
                $newCategory->save(); 
            }
            else {
                Toastr::error('No se pudo acceder', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                return back();
            }
            // Toastr::success($entity . ' insertado', 'Super!!', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
            Toastr::success($entity . ' - Creación realizada con éxito.', 'Super!!', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
            return back();
        } catch (PDOException  $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
    }

    public function editData(Request $request)
    {
        $entity = $request->entity;
        $category = $request->category;
        $columns = json_decode($request->dataInput);
        try {
            if ($entity == 'Entrenador') {
                $coachToEdit = User::where('id', $request->id)->first();
                $count = User::all()->count();
                $coaches = User::where('status', 'Coach')->get();
                foreach ($columns as $key => $column) {

                    if ($column == 'username') {
                        foreach($coaches as $coach) {
                            if ($coach->username == $request[$column] && $coach->username != $coachToEdit->username) {
                                Toastr::error('Este nombre de usuario ya existe en otro usuario', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                                return back();
                            }
                        }
                    }

                    if ($column == 'email') {
                        foreach($coaches as $coach) {
                            if ($coach->email == $request[$column] && $coach->username != $coachToEdit->username) {
                                Toastr::error('Este correo electrónico ya existe en otro usuario', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                                return back();
                            }
                        }
                    }

                    if ($column == 'password') {

                        $coachToEdit->$column = bcrypt($request[$column]);
                    }

                    if($column == 'photo') {
                        if (!empty($request->file('photo'))) {
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
                                    unlink($existingFile); // Eliminar el archivo existente
                                }
                            }
                            $file->move(public_path($destinationPath), $filename);
                            $coachToEdit->photo = $filename;
                        }

                    } else {
                        $coachToEdit->$column = $request[$column];
                    }
                }

                $coachToEdit->save();

            } elseif ($entity == 'Usuario') {
                $user = User::where('id', $request->id)->first();
                $users = User::where('status', 'User')->get();
                foreach ($columns as $key => $column) {

                    if ($column == 'username') {
                        foreach($users as $user) {
                            if ($user->username == $request[$column]) {
                                Toastr::error('Este nombre de usuario ya existe en otro usuario', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                                return back();
                            }
                        }
                    }

                    if ($column == 'email') {
                        foreach($users as $user) {
                            if ($user->email == $request[$column]) {
                                Toastr::error('Este correo electrónico ya existe en otro usuario', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                                return back();
                            }
                        }
                    }

                    if($request[$column]) {
                        if ($column == 'password') {
                            $user->$column = bcrypt($request[$column]);
                        } else {
                            $user->$column = $request[$column];
                        }
                    }
                }
                $user->suscription_id = $request->suscription_id;
                $user->save();
            } elseif ($entity == 'Administrador') {
                $user = User::where('id', $request->id)->first();
                $admins = User::where('status', 'Admin')->get();
                foreach ($columns as $key => $column) {

                    if ($column == 'username') {
                        foreach($admins as $admin) {
                            if ($admin->username == $request[$column]) {
                                Toastr::error('Este nombre de usuario ya existe en otro usuario', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                                return back();
                            }
                        }
                    }

                    if ($column == 'email') {
                        foreach($admins as $admin) {
                            if ($admin->email == $request[$column]) {
                                Toastr::error('Este correo electrónico ya existe en otro usuario', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                                return back();
                            }
                        }
                    }

                    if ($column == 'password') {
                        $user->$column = bcrypt($request[$column]);
                    } else {
                        $user->$column = $request[$column];
                    }
                }
                
                $user->save();

            } elseif ($entity == 'Entrenamiento') {
                $training = Training::where('id', $request->id)->first();
                foreach ($columns as $key => $column) {
                        $training->$column = $request[$column];
                }
                $training->save();
            } elseif ($entity == 'Ejercicio') {
                $exerciseToEdit = Exercise::where('id', $request->id)->first();
                $entrenadorSeleccionado = null;
                $entrenadorOriginal = $exerciseToEdit->user_coach_id;

                foreach ($columns as $key => $column) {
                    if ($column == 'user_coach_id') {
                        $entrenadorSeleccionado = $request[$column];
                    }

                    if ($column == 'explanatory_video') {
                        $videoUrl = $request[$column];

                        $pattern = '/^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[\w-]{11}$/';

                        if (!empty($videoUrl) && !preg_match($pattern, $videoUrl)) {
                            Toastr::error('El enlace debe ser una URL válida de un video de YouTube.', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                            return back();
                        }
                    }

                    $exerciseToEdit->$column = $request[$column];
                }

                // Verificar si el nombre ya existe para el entrenador seleccionado
                $exerciseName = $request['name'];
                if ($exerciseName != $exerciseToEdit->name || $entrenadorSeleccionado != $entrenadorOriginal) {
                    $exercises = Exercise::where('user_coach_id', $entrenadorSeleccionado)->where('name', $exerciseName)->get();
                    if ($exercises->count() > 0) {
                        Toastr::error('Este nombre ya existe en otro ejercicio del entrenador seleccionado', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                        return back();
                    }
                }

                $exerciseToEdit->save();

                
            } elseif ($entity == 'Dieta') {
                $diet = Diet::where('id', $request->id)->first();
                foreach ($columns as $key => $column) {
                    $diet->$column = $request[$column];
                }
                $diet->save(); 
            } elseif ($entity == 'Ingrediente') {
                $ingredientToEdit = Ingredient::where('id', $request->id)->first();
                $ingredients = Ingredient::all();
                foreach ($columns as $key => $column) {
                    if ($column == 'name') {
                        foreach($ingredients as $ingredient) {
                            if ($ingredient->name == $request[$column] && $ingredient->name != $ingredientToEdit->name) {
                                Toastr::error('Este nombre ya existe en otro ingrediente', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                                return back();
                            }
                        }
                    }
                    $ingredientToEdit->$column = $request[$column];
                }
                $ingredientToEdit->save(); 
            } elseif ($entity == 'Gimnasio') {

                $gymToEdit = Gym::where('id', $request->id)->first();
                $gyms = Gym::all();
                
                foreach ($columns as $key => $column) {
                    if ($column == 'name') {
                        foreach ($gyms as $gym) {
                            if($request['name'] == $gym->name && $gym->name != $gymToEdit->name) {
                                Toastr::error('Este nombre ya existe en otro gimnasio', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                                return back();
                            }
                        }
                    } 
                    
                    if($column == 'logo') {
                        if (!empty($request->file('logo'))) {
                            $file = $request->file('logo');
                            $destinationPath = 'dashboard/assets/img/test';
                            $filename = $gymToEdit->id . '.' . $file->getClientOriginalExtension();
                            $existingFiles = glob(public_path($destinationPath) . '/' . $gymToEdit->id . '.*');
        
                            [$width, $height] = getimagesize($file);
                        
                            if ($width != $height) {
                                Toastr::error('La foto debe ser de dimensión 1:1', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                                return back();
                            }
        
                            foreach ($existingFiles as $existingFile) {
                                if (is_file($existingFile)) {
                                    unlink($existingFile); // Eliminar el archivo existente
                                }
                            }
                            $file->move(public_path($destinationPath), $filename);
                            $gymToEdit->photo = $filename;
                        }
    
                    } else {
                        $gymToEdit->$column = $request[$column];
                    }

                }

                $gymToEdit->save(); 

            } elseif ($entity == 'Supermercado') {

                $marketToEdit = Supermarket::where('id', $request->id)->first();
                $markets = Supermarket::all();
            
                foreach ($columns as $key => $column) {
                    if ($column == 'name') {
                        foreach ($markets as $market) {
                            if($request['name'] == $market->name && $market->name != $marketToEdit->name) {
                                Toastr::error('Este nombre ya existe en otro supermercado', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                                return back();
                            }
                        }
                    } 

                    if($column == 'logo') {
                        if (!empty($request->file('logo'))) {
                            $file = $request->file('logo');
                            $destinationPath = 'dashboard/assets/img/test';
                            $filename = $marketToEdit->id . '.' . $file->getClientOriginalExtension();
                            $existingFiles = glob(public_path($destinationPath) . '/' . $marketToEdit->id . '.*');
        
                            [$width, $height] = getimagesize($file);
                        
                            if ($width != $height) {
                                Toastr::error('La foto debe ser de dimensión 1:1', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                                return back();
                            }
        
                            foreach ($existingFiles as $existingFile) {
                                if (is_file($existingFile)) {
                                    unlink($existingFile); // Eliminar el archivo existente
                                }
                            }
                            $file->move(public_path($destinationPath), $filename);
                            $marketToEdit->photo = $filename;
                        }
    
                    } else {
                        $marketToEdit->$column = $request[$column];
                    }
                }
                
                $marketToEdit->save(); 

            } elseif ($request->category == 'admin.trainings-categories') {
                $categoryToEdit = CategoryOfTraining::where('id', $request->id)->first();
                $categories = CategoryOfTraining::all();
                foreach ($categories as $key => $category) {
                    if($request['name'] == $category->name && $category->name != $categoryToEdit->name) {
                        Toastr::error('La categoria ya existe', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                        return back();
                    }
                }
                foreach ($columns as $key => $column) {
                    $categoryToEdit->$column = $request[$column];
                }
                $categoryToEdit->save(); 
            } elseif ($request->category == 'admin.exercises-categories') {
                $categoryToEdit = TagOfExercise::where('id', $request->id)->first();
                $categories = TagOfExercise::all();
                foreach ($categories as $key => $category) {
                    if($request['name'] == $category->name && $category->name != $categoryToEdit->name) {
                        Toastr::error('La categoria ya existe', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                        return back();
                    }
                }
                foreach ($columns as $key => $column) {
                    $categoryToEdit->$column = $request[$column];
                }
                $categoryToEdit->save(); 
            } elseif ($request->category == 'admin.diets-categories') {
                $categoryToEdit = CategoryOfDiet::where('id', $request->id)->first();
                $categories = CategoryOfDiet::all();

                foreach ($categories as $key => $category) {
                    if($request['name'] == $category->name && $category->name != $categoryToEdit->name) {
                        Toastr::error('La categoria ya existe', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                        return back();
                    }
                }

                foreach ($columns as $key => $column) {
                    $categoryToEdit->$column = $request[$column];
                }
                $categoryToEdit->save(); 
            } elseif ($request->category == 'admin.ingredients-categories') {
                $categoryToEdit = TagOfIngredient::where('id', $request->id)->first();
                $categories = CategoryOfDiet::all();

                foreach ($categories as $key => $category) {
                    if($request['name'] == $category->name && $category->name != $categoryToEdit->name) {
                        Toastr::error('La categoria ya existe', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                        return back();
                    }
                }
                foreach ($columns as $key => $column) {
                    $categoryToEdit->$column = $request[$column];
                }
                $categoryToEdit->save(); 
            }
            else {
                Toastr::error('No se pudo acceder', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                return back();
            }
            Toastr::success($entity . ' - Edición realizada con éxito.' , 'Super!!', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
            return back();
        } catch (PDOException  $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
    }

    public function addExercise(Request $request)
    {
        try {

            $trainingData = Training::where('id', $request->training_id)->select('user_coach_id', 'title')->first();
            $trainingExercises = TrainingExercise::where('training_id', $request->training_id)->get();

            $coach = User::where('id', $trainingData->user_coach_id)->with('exercises')->first();
            $coachExercises = $coach->exercises;
            return view(
                'admin.forms.addExercise',
                [
                    'coach' => $coach,
                    'coachExercises' => $coachExercises,
                    'trainingExercises' => $trainingExercises,
                    'title' => $trainingData->title,
                    'request' => $request
                ]
            );
        } catch (PDOException  $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
    }
    public function addToTraining(Request $request)
    {
        try {
            if (count($request->exercises) > 5) {
                Toastr::error('No se puede añadir más', 'Ya hay 5 ejercicios', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
                return back();
            }
            
            TrainingExercise::where('training_id', $request->training_id)->delete();
        
            foreach ($request->exercises as $exerciseId) {
                $coach = Exercise::where('id', $exerciseId)->first();
                $newTrainingExercise = new TrainingExercise();
                $newTrainingExercise->training_id = $request->training_id;
                $newTrainingExercise->exercise_id = $exerciseId;
                $newTrainingExercise->save();
            }

            if(count($request->exercises) === 1) {
                Toastr::success('Añadido', count($request->exercises) . ' ejercicio', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
                return back();
            } else {
                Toastr::success('Añadidos', count($request->exercises) . ' ejercicios', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return back();
            }
        
        } catch (PDOException $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
        
    }

    public function addIngredient(Request $request)
    {
        try {

            $dietData = Diet::where('id', $request->diet_id)->select('id','title')->first();
            $dietIngredients = DietIngredient::where('diet_id', $request->diet_id)->get();
            $ingredients = Ingredient::all();

            return view(
                'admin.forms.addIngredient',
                [
                    'ingredients' => $ingredients,
                    'dietIngredients' => $dietIngredients,
                    'title' => $dietData->title,
                    'request' => $request
                ]
            );
        } catch (PDOException  $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
    }
    public function addToDiet(Request $request)
    {
        try {
            if (count($request->ingredients) > 6) {
                Toastr::error('No se puede añadir más', 'Ya hay 6 ingredientes', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
                return back();
            }
            
            DietIngredient::where('diet_id', $request->diet_id)->delete();
            
            foreach ($request->ingredients as $ingredientId) {
                $newDietIngredient = new DietIngredient();
                $newDietIngredient->diet_id = $request->diet_id;
                $newDietIngredient->ingredient_id = $ingredientId;
                $newDietIngredient->save();
            }
            
            if (count($request->ingredients) === 1) {
                Toastr::success('Añadido', count($request->ingredients) . ' ingrediente', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
                return back();
            } else {
                Toastr::success('Añadidos', count($request->ingredients) . ' ingredientes', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
                return back();
            }
            
            Toastr::success('Añadido', 'SUUUUUU!', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return back();
        } catch (PDOException  $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
    }
}
