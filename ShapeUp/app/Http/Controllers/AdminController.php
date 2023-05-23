<?php

namespace App\Http\Controllers;

use App\Models\CategoryOfDiet;
use App\Models\CategoryOfTraining;
use App\Models\Diet;
use App\Models\DietIngredient;
use App\Models\Exercise;
use App\Models\Gym;
use App\Models\Ingredient;
use App\Models\Supermarket;
use App\Models\Suscription;
use App\Models\TagOfExercise;
use App\Models\TagOfIngredient;
use App\Models\User;
use App\Models\Training;
use App\Models\TrainingExercise;
use Brian2694\Toastr\Facades\Toastr;
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
            $createTexxtButton = 'Entrenador';
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
            $createTexxtButton = 'Usuario';
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
            $createTexxtButton = 'Administrador';
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
            $createTexxtButton = 'Entrenamiento';
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
            $createTexxtButton = 'Ejercicio';
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
            $createTexxtButton = 'Dieta';
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
            $createTexxtButton = 'Ingrediente';
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
            $createTexxtButton = 'Gimnasio';
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
            $createTexxtButton = 'Super mercado';
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
                    'User name',
                    'email',
                    'Contraseña',
                    'País',
                    'Año',
                    'Foto',
                    'Biografía',
                    'Experiencia',
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
                    'User name',
                    'Email',
                    'Contraseña',
                    'País',
                    'Edad',
                    'Altura en cm',
                    'Peso en kg',
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
                    'User name',
                    'email',
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
                    'Titulo',
                    'Description',
                    'Duration',
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
                    'Repeticiónes',
                    'Series',
                    'Video',
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
                    'Titulo',
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
                    'Logo'
                ];
                $dataInput = [
                    'name',
                    'logo'
                ];
            } elseif ($entity == 'Super mercado') {
                $data = [
                    'Nombre',
                    'Logo'
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
        $entity = $request->type;;
        $data = [];
        $dataInput = [];
        $current = [];
        $extra = [];
            if ($entity == 'Entrenador') {
                $current = User::where('id',$request->id)->first();
                $data = [
                    'Nombre',
                    'User name',
                    'email',
                    'Contraseña',
                    'País',
                    'Año',
                    'Foto',
                    'Biografía',
                    'Experiencia',
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
                    'User name',
                    'Email',
                    'Contraseña',
                    'País',
                    'Edad',
                    'Altura en cm',
                    'Peso en kg',
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
                    'User name',
                    'email',
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
                    'Titulo',
                    'Description',
                    'Duration',
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
                    'Repeticiónes',
                    'Series',
                    'Video',
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
                    'Titulo',
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
                    'Logo'
                ];
                $dataInput = [
                    'name',
                    'logo'
                ];
            } elseif ($entity == 'Super mercado') {
                $current = Supermarket::where('id',$request->id)->first();
                $data = [
                    'Nombre',
                    'Logo'
                ];
                $dataInput = [
                    'name',
                    'logo'
                ];
            } elseif ($entity == 'Categoría') {
                $current = Exercise::where('id',$request->id)->first();
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
                foreach ($columns as $key => $column) {
                    if ($column == 'password') {

                        $newCoach->$column = bcrypt($request[$column]);
                    } else {
                        $newCoach->$column = $request[$column];
                    }
                }
                $newCoach->status = 'Coach';
                $newCoach->save();
            } elseif ($entity == 'Usuario') {
                $newCoach = new User();
                foreach ($columns as $key => $column) {
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
                foreach ($columns as $key => $column) {
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
                foreach ($columns as $key => $column) {
                    $newExercise->$column = $request[$column];
                }
                $newExercise->save(); 
            } elseif ($entity == 'Dieta') {
                $newDiet = new Diet();
                foreach ($columns as $key => $column) {
                    $newDiet->$column = $request[$column];
                }
                $newDiet->save(); 
            } elseif ($entity == 'Ingrediente') {
                $newIngredient = new Ingredient();
                foreach ($columns as $key => $column) {
                    $newIngredient->$column = $request[$column];
                }
                $newIngredient->save(); 
            } elseif ($entity == 'Gimnasio') {
                $newGym = new Gym();
                foreach ($columns as $key => $column) {
                    $newGym->$column = $request[$column];
                }
                $newGym->save(); 
            } elseif ($entity == 'Super mercado') {
                $newMarket = new Supermarket();
                foreach ($columns as $key => $column) {
                    $newMarket->$column = $request[$column];
                }
                $newMarket->save(); 
            } elseif ($request->category == 'admin.trainings-categories') {
                $newCategory = new CategoryOfTraining();
                foreach ($columns as $key => $column) {
                    $newCategory->$column = $request[$column];
                }
                $newCategory->save(); 
            } elseif ($request->category == 'admin.exercises-categories') {
                $newCategory = new TagOfExercise();
                foreach ($columns as $key => $column) {
                    $newCategory->$column = $request[$column];
                }
                $newCategory->save(); 
            } elseif ($request->category == 'admin.diets-categories') {
                $newCategory = new CategoryOfDiet();
                foreach ($columns as $key => $column) {
                    $newCategory->$column = $request[$column];
                }
                $newCategory->save(); 
            } elseif ($request->category == 'admin.ingredients-categories') {
                $newCategory = new TagOfIngredient();
                foreach ($columns as $key => $column) {
                    $newCategory->$column = $request[$column];
                }
                $newCategory->save(); 
            }
            else {
                Toastr::error('No se pudo acceder', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                return back();
            }
            Toastr::success($entity . 'insertado', 'Super!!', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
            return back();
        } catch (PDOException  $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
    }

    public function editData(Request $request)
    {
        $entity = $request->entity;
        $columns = json_decode($request->dataInput);
        try {
            if ($entity == 'Entrenador') {
                $coach = User::where('id', $request->id)->first();
                $count = User::all()->count();
                foreach ($columns as $key => $column) {
                    if ($column == 'password') {

                        $coach->$column = bcrypt($request[$column]);
                    } else {
                        $coach->$column = $request[$column];
                    }
                }
                $coach->save();
            } elseif ($entity == 'Usuario') {
                $user = User::where('id', $request->id)->first();
                foreach ($columns as $key => $column) {
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
                $user = User::where('id', $request->id);
                foreach ($columns as $key => $column) {
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
                $exercise = Exercise::where('id', $request->id)->first();
                foreach ($columns as $key => $column) {
                    $exercise->$column = $request[$column];
                }
                $exercise->save(); 
            } elseif ($entity == 'Dieta') {
                $diet = Diet::where('id', $request->id)->first();
                foreach ($columns as $key => $column) {
                    $diet->$column = $request[$column];
                }
                $diet->save(); 
            } elseif ($entity == 'Ingrediente') {
                $ingredientToEdit = Ingredient::where('id', $request->id)->first();
                $ingredients = Ingredient::all();
                foreach ($ingredients as $key => $ingredient) {
                    if($request['name'] == $ingredient->name) {
                        Toastr::error('El nombre de ingrediente ya existe', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                        return back();
                    }
                }
                foreach ($columns as $key => $column) {
                    $ingredientToEdit->$column = $request[$column];
                }
                $ingredientToEdit->save(); 
            } elseif ($entity == 'Gimnasio') {
                $gymToEdit = Gym::where('id', $request->id)->first();
                $gyms = Gym::all();
                foreach ($gyms as $key => $gym) {
                    if($request['name'] == $gym->name) {
                        Toastr::error('El gimnasio ya existe', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                        return back();
                    }
                }
                foreach ($columns as $key => $column) {
                    $gymToEdit->$column = $request[$column];
                }
                $gymToEdit->save(); 
            } elseif ($entity == 'Super mercado') {
                $marketToEdit = Supermarket::where('id', $request->id)->first();
                $markets = Supermarket::all();
                foreach ($markets as $key => $market) {
                    if($request['name'] == $market->name) {
                        Toastr::error('El supermercado ya existe', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                        return back();
                    }
                }
                foreach ($columns as $key => $column) {
                    $marketToEdit->$column = $request[$column];
                }
                $marketToEdit->save(); 
            } elseif ($request->category == 'admin.trainings-categories') {
                $category = CategoryOfTraining::where('id', $request->id)->first();
                foreach ($columns as $key => $column) {
                    $category->$column = $request[$column];
                }
                $category->save(); 
            } elseif ($request->category == 'admin.exercises-categories') {
                $category = TagOfExercise::where('id', $request->id)->first();
                foreach ($columns as $key => $column) {
                    $category->$column = $request[$column];
                }
                $category->save(); 
            } elseif ($request->category == 'admin.diets-categories') {
                $category = CategoryOfDiet::where('id', $request->id)->first();
                foreach ($columns as $key => $column) {
                    $category->$column = $request[$column];
                }
                $category->save(); 
            } elseif ($request->category == 'admin.ingredients-categories') {
                $category = TagOfIngredient::where('id', $request->id)->first();
                foreach ($columns as $key => $column) {
                    $category->$column = $request[$column];
                }
                $category->save(); 
            }
            else {
                Toastr::error('No se pudo acceder', 'Error', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
                return back();
            }
            Toastr::success($entity . 'editado', 'Super!!', ["positionClass" => "toast-top-center", "timeOut" => "4000", "progressBar" => true]);
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
            $trainingExercises = TrainingExercise::where('training_id', $request->training_id)->count();
            if($trainingExercises > 4) {
                Toastr::info('Limite de ejercicios alcanzado', 'Debes borrar algún ejercicio', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
                return redirect()->back();
            }
            $coach = User::where('id', $trainingData->user_coach_id)->with('exercises')->first();
            $coachExercises = $coach->exercises;
            return view(
                'admin.forms.addExercise',
                [
                    'coach' => $coach,
                    'coachExercises' => $coachExercises,
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

            $training = Training::where('id', $request->training_id)->first();
            $coach = Exercise::where('id', $request->exercise)->first();
            $newTrainignExercise = new TrainingExercise();
            $newTrainignExercise->training_id = $request->training_id;
            $newTrainignExercise->exercise_id = $request->exercise;
            $newTrainignExercise->save();
            Toastr::success('Añadido', 'SUUUUUU!', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return back();
        } catch (PDOException  $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
    }

    public function addIngredient(Request $request)
    {
        try {

            $dietData = Diet::where('id', $request->diet_id)->select('id','title')->first();
            $dietIngredientsConut = DietIngredient::where('diet_id', $request->diet_id)->count();
            if($dietIngredientsConut > 5) {
                Toastr::info('Limite de ingredientes alcanzado', 'Debes borrar algún ingrediente', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
                return redirect()->back();
            }
            $ingredients = Ingredient::all();

            return view(
                'admin.forms.addIngredient',
                [
                    'ingredients' => $ingredients,
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

            // $diet = Diet::where('id', $request->diet_id)->first();
            // $exercise = Ingredient::where('id', $request->ingredient)->first();
            $newDietIngredient = new DietIngredient();
            $newDietIngredient->diet_id = $request->diet_id;
            $newDietIngredient->ingredient_id = $request->ingredient;
            $newDietIngredient->save();
            Toastr::success('Añadido', 'SUUUUUU!', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return back();
        } catch (PDOException  $e) {
            Toastr::error($e->getMessage(), 'Error', ["positionClass" => "toast-top-center", "timeOut" => "5000", "progressBar" => true]);
            return redirect()->back();
        }
    }
}
