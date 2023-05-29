<?php

namespace App\Http\Controllers;

use App\Models\FrequentlyAskedQuestion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Models\AnswerQuestion;
use App\Models\CategoryOfDiet;
use App\Models\UserFollowCoach;
use App\Models\Gym;
use App\Models\Supermarket;
use App\Models\User;
use App\Models\Diet;
use App\Models\Training;
use App\Models\CategoryOfTraining;
use App\Models\Exercise;
use App\Models\Ingredient;
use App\Models\TagOfExercise;
use App\Models\TagOfIngredient;
use App\Models\UserFollowDiet;
use App\Models\UserFollowTraining;

class WebController extends Controller
{
    public function index()
    {
        $gyms = Gym::all();
        $supermarkets = Supermarket::all();
        $numUsers = User::count();
        $numCoaches = User::where('status', 'Coach')->count();
        $numDiets = Diet::count();
        $numTrainings = Training::count();

        $trainingsWithMostLikes = Training::withCount('userFollowTrainings')
            ->orderByDesc('user_follow_trainings_count')
            ->take(3)
            ->get();


        $dietsWithMostLikes = Diet::withCount('userFollowDiets')
            ->orderByDesc('user_follow_diets_count')
            ->take(3)
            ->get();
        
        return view('web.index', ['gyms' => $gyms, 'supermarkets' => $supermarkets, 'numUsers' => $numUsers, 'numCoaches' => $numCoaches, 'numDiets' => $numDiets, 'numTrainings' => $numTrainings, 'trainings' => $trainingsWithMostLikes, 'diets' => $dietsWithMostLikes]);
            
    }

    public function indexTrainings(Request $request)
    {
        $query = Training::has('exercise');

        if ($request->filled('category_sort')) {
            $query->where('category_of_training_id', $request->input('category_sort'));
        }
        
        if ($request->filled('level_sort')) {
            $query->where('level', $request->input('level_sort'));
        }

        if ($request->filled('coach_sort')) {
            $query->where('user_coach_id', $request->input('coach_sort'));
        }
        
        if ($request->input('like_sort') === 'asc' || $request->input('like_sort') === 'desc') {
            $sortDirection = $request->input('like_sort') === 'asc' ? 'asc' : 'desc';
            $query->leftJoin('user_follow_trainings', 'trainings.id', '=', 'user_follow_trainings.training_id')
                ->select('trainings.*', DB::raw('count(user_follow_trainings.id) as likes_count'))
                ->groupBy('trainings.id')
                ->orderBy('likes_count', $sortDirection);
        }  
        
        if ($request->input('trainingslike_sort') == 'like') {
            $query->whereExists(function ($subquery) {
                $subquery->select(DB::raw(1))
                    ->from('user_follow_trainings')
                    ->whereColumn('trainings.id', 'user_follow_trainings.training_id');
            });
        } else if ($request->input('trainingslike_sort') == 'notlike') {
            $query->whereNotExists(function ($subquery) {
                $subquery->select(DB::raw(1))
                    ->from('user_follow_trainings')
                    ->whereColumn('trainings.id', 'user_follow_trainings.training_id');
            });
        }

        $trainings = $query->paginate(10);
        $categories = CategoryOfTraining::all();
        $coaches = User::where('status', 'Coach')->get();

        return view('web.trainings', ['trainings' => $trainings, 'categories' => $categories, 'coaches' => $coaches, 'request' => $request]);
    }

    public function followTrainings($action, $view, $training_id)
    {
        if ($action == 'follow') {
            if ($view == 'training') {
                try {
                    $user_follow_trainings = new UserFollowTraining;
                    $user_follow_trainings->user_id = Auth::user()->id;
                    $user_follow_trainings->training_id = $training_id;
                    $user_follow_trainings->save();
        
                    return redirect()->route('account.trainings')->with('success', 'Entrenamiento seguido correctamente.');
                } catch (\Exception $e) {
                    return redirect()->route('account.trainings')->with('error', 'Ha ocurrido un error al seguir el entrenamiento. Por favor, inténtalo de nuevo más tarde.');
                }
            } else {
                try {
                    $user_follow_trainings = new UserFollowTraining;
                    $user_follow_trainings->user_id = Auth::user()->id;
                    $user_follow_trainings->training_id = $training_id;
                    $user_follow_trainings->save();
        
                    return redirect()->to(route('account.index') . '#entrenamientos-populares')->with('successTraining', 'Entrenamiento seguido correctamente.');
                } catch (\Exception $e) {
                    return redirect()->to(route('account.index') . '#entrenamientos-populares')->with('errorTraining', 'Ha ocurrido un error al seguir el entrenamiento. Por favor, inténtalo de nuevo más tarde.');
                }
            }
        } else if ($action == 'unfollow') {
            if ($view == 'training') {
                try {
                    $user_id = Auth::user()->id;
                    UserFollowTraining::where('user_id', $user_id)->where('training_id', $training_id)->delete();
        
                    return redirect()->route('account.trainings')->with('success', 'Entrenamiento dejado de seguir correctamente.');
                } catch (\Exception $e) {
                    return redirect()->route('account.trainings')->with('error', 'Ha ocurrido un error al dejar de seguir el entrenamiento. Por favor, inténtalo de nuevo más tarde.');
                }
            } else {
                try {
                    $user_id = Auth::user()->id;
                    UserFollowTraining::where('user_id', $user_id)->where('training_id', $training_id)->delete();
        
                    return redirect()->to(route('account.index') . '#entrenamientos-populares')->with('successTraining', 'Entrenamiento dejado de seguir correctamente.');
                } catch (\Exception $e) {
                    return redirect()->to(route('account.index') . '#entrenamientos-populares')->with('errorTraining', 'Ha ocurrido un error al dejar de seguir el entrenamiento. Por favor, inténtalo de nuevo más tarde.');
                }
            }
        }        
    }

    public function indexTrainingsExercises($training_id)
    {
        $training = Training::find($training_id);
        $exercises = $training->exercise()->get();
        return view('web.trainingsexercises', [ 'exercises' => $exercises]);       
    }

    public function indexExercises(Request $request)
    {
        $query = Exercise::query();

        if ($request->input('name_sort') === 'asc' || $request->input('name_sort') === 'desc') {
            $query->orderBy('name', $request->input('name_sort'));
        }

        if ($request->filled('tag_sort')) {
            $query->where('tag_of_exercise_id', $request->input('tag_sort'));
        }

        if ($request->filled('coach_sort')) {
            $query->where('user_coach_id', $request->input('coach_sort'));
        }

        $exercises = $query->paginate(15);
        $tags = TagOfExercise::all();
        $coaches = User::where('status', 'Coach')->get();
        return view('web.exercises', ['exercises' => $exercises, 'coaches' => $coaches,'tags' => $tags, 'request' => $request]);       
    }

    public function indexDiets(Request $request)
    {
        $query = Diet::has('ingredient');

        if ($request->filled('category_sort')) {
            $query->where('category_of_diet_id', $request->input('category_sort'));
        }

        if ($request->filled('coach_sort')) {
            $query->where('user_coach_id', $request->input('coach_sort'));
        } 
        
        if ($request->input('like_sort') === 'asc' || $request->input('like_sort') === 'desc') {
            $sortDirection = $request->input('like_sort') === 'asc' ? 'asc' : 'desc';
            $query->leftJoin('user_follow_diets', 'diets.id', '=', 'user_follow_diets.diet_id')
                ->select('diets.*', DB::raw('count(user_follow_diets.id) as likes_count'))
                ->groupBy('diets.id')
                ->orderBy('likes_count', $sortDirection);
        } 

        if ($request->input('dietslike_sort') == 'like') {
            $query->whereExists(function ($subquery) {
                $subquery->select(DB::raw(1))
                    ->from('user_follow_diets')
                    ->whereColumn('diets.id', 'user_follow_diets.diet_id');
            });
        } else if ($request->input('dietslike_sort') == 'notlike') {
            $query->whereNotExists(function ($subquery) {
                $subquery->select(DB::raw(1))
                    ->from('user_follow_diets')
                    ->whereColumn('diets.id', 'user_follow_diets.diet_id');
            });
        }

        $diets = $query->paginate(10);
        $categories = CategoryOfDiet::all();
        $coaches = User::where('status', 'Coach')->get();

        return view('web.diets', ['diets' => $diets, 'categories' => $categories, 'coaches' => $coaches, 'request' => $request]);
    }

    public function followDiets($action, $view, $diet_id)
    {
        if ($action == 'follow') {
            if ($view == 'diet') {
                try {
                    $user_follow_diets = new UserFollowDiet;
                    $user_follow_diets->user_id = Auth::user()->id;
                    $user_follow_diets->diet_id = $diet_id;
                    $user_follow_diets->save();
        
                    return redirect()->route('account.diets')->with('success', 'Dieta seguida correctamente.');
                } catch (\Exception $e) {
                    return redirect()->route('account.diets')->with('error', 'Ha ocurrido un error al seguir la dieta. Por favor, inténtalo de nuevo más tarde.');
                }
            } else {
                try {
                    $user_follow_diets = new UserFollowDiet;
                    $user_follow_diets->user_id = Auth::user()->id;
                    $user_follow_diets->diet_id = $diet_id;
                    $user_follow_diets->save();
        
                    return redirect()->to(route('account.index') . '#dietas-populares')->with('successDiet', 'Dieta seguida correctamente.');
                } catch (\Exception $e) {
                    return redirect()->to(route('account.index') . '#dietas-populares')->with('errorDiet', 'Ha ocurrido un error al seguir la dieta. Por favor, inténtalo de nuevo más tarde.');
                }
            }
        } else if ($action == 'unfollow') {
            if ($view == 'diet') {
                try {
                    $user_id = Auth::user()->id;
                    UserFollowDiet::where('user_id', $user_id)->where('diet_id', $diet_id)->delete();
        
                    return redirect()->route('account.diets')->with('success', 'Dieta dejada de seguir correctamente.');
                } catch (\Exception $e) {
                    return redirect()->route('account.diets')->with('error', 'Ha ocurrido un error al dejar de seguir la dieta. Por favor, inténtalo de nuevo más tarde.');
                }
            } else {
                try {
                    $user_id = Auth::user()->id;
                    UserFollowDiet::where('user_id', $user_id)->where('diet_id', $diet_id)->delete();
        
                    return redirect()->to(route('account.index') . '#dietas-populares')->with('successDiet', 'Dieta dejada de seguir correctamente.');
                } catch (\Exception $e) {
                    return redirect()->to(route('account.index') . '#dietas-populares')->with('errorDiet', 'Ha ocurrido un error al dejar de seguir la dieta. Por favor, inténtalo de nuevo más tarde.');
                }
            }
        }        
    }

    public function indexDietsIngredients($diet_id)
    {
        $diet = Diet::find($diet_id);
        $ingredients = $diet->ingredient()->get();
        return view('web.dietingredients', [ 'ingredients' => $ingredients]);       
    }

    public function indexIngredients(Request $request)
    {
        $query = Ingredient::query();

        if ($request->input('name_sort') === 'asc' || $request->input('name_sort') === 'desc') {
            $query->orderBy('name', $request->input('name_sort'));
        }

        if ($request->filled('tag_sort')) {
            $query->where('tag_of_ingredient_id', $request->input('tag_sort'));
        }

        $ingredients = $query->paginate(10);
        $tags = TagOfIngredient::all();
        return view('web.ingredients', ['ingredients' => $ingredients,'tags' => $tags, 'request' => $request]);       
    }

    public function indexCoaches(Request $request)
    {
        $query = User::where('status', 'Coach');

        if ($request->input('name_sort') === 'asc' || $request->input('name_sort') === 'desc') {
            $query->orderBy('name', $request->input('name_sort'));
        }

        if ($request->input('age_sort') === 'asc' || $request->input('age_sort') === 'desc') {
            $query->orderBy('age', $request->input('age_sort'));
        }

        if ($request->input('experience_sort') === 'asc' || $request->input('experience_sort') === 'desc') {
            $sortDirection = $request->input('experience_sort') === 'asc' ? 'asc' : 'desc';
            $query->orderByRaw('CAST(experience AS SIGNED) ' . $sortDirection);
        }

        if ($request->input('followers_sort') === 'asc' || $request->input('followers_sort') === 'desc') {
            $sortDirection = $request->input('followers_sort') === 'asc' ? 'asc' : 'desc';
            $query->leftJoin('user_follow_coaches', 'users.id', '=', 'user_follow_coaches.user_coach_id')
                ->select('users.*', DB::raw('count(user_follow_coaches.id) as followers_count'))
                ->groupBy('users.id')
                ->orderBy('followers_count', $sortDirection);
        }
        
        if ($request->input('coacheslike_sort') == 'like') {
            $query->whereExists(function ($subquery) {
                $subquery->select(DB::raw(1))
                    ->from('user_follow_coaches')
                    ->whereColumn('users.id', 'user_follow_coaches.user_coach_id');
            });
        } else if ($request->input('coacheslike_sort') == 'notlike') {
            $query->whereNotExists(function ($subquery) {
                $subquery->select(DB::raw(1))
                    ->from('user_follow_coaches')
                    ->whereColumn('users.id', 'user_follow_coaches.user_coach_id');
            });
        }

        $coaches = $query->paginate(10);

        return view('web.coaches', ['coaches' => $coaches, 'request' => $request]);
    }


    public function followCoaches($action, $coach_id)
    {
        if ($action == 'follow') {
            try {
                $user_follow_coaches = new UserFollowCoach;
                $user_follow_coaches->user_id = Auth::user()->id;
                $user_follow_coaches->user_coach_id = $coach_id;
                $user_follow_coaches->save();
    
                return redirect()->route('account.coaches')->with('success', 'Entrenador seguido correctamente.');
            } catch (\Exception $e) {
                return redirect()->route('account.coaches')->with('error', 'Ha ocurrido un error al seguir al entrenador. Por favor, inténtalo de nuevo más tarde.');
            }
        } else if ($action == 'unfollow') {
            try {
                $user_id = Auth::user()->id;
                UserFollowCoach::where('user_id', $user_id)->where('user_coach_id', $coach_id)->delete();
    
                return redirect()->route('account.coaches')->with('success', 'Entrenador dejado de seguir correctamente.');
            } catch (\Exception $e) {
                return redirect()->route('account.coaches')->with('error', 'Ha ocurrido un error al dejar de seguir al entrenador. Por favor, inténtalo de nuevo más tarde.');
            }
        }        
    }

    public function messageCoaches($coach_id)
    {   
        $coach = User::where('id', $coach_id)->first();
        return view('web.messagecoach', ['coach' => $coach]);       
    } 

    public function sendMessageCoaches(Request $request, $coach_id)
    {  
        try {
            $message = new FrequentlyAskedQuestion;
            $message->user_id = Auth::user()->id;
            $message->user_coach_id = $coach_id;
            $message->message = $request->input('message');
            $message->save(); 

            return redirect()->route('account.coaches')->with('success', 'Mensaje enviado al entrenador correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('account.coaches')->with('error', 'Ha ocurrido un error al enviar el mensaje al entrenador. Por favor, inténtalo de nuevo más tarde.');
        }
    } 
    
    public function paymentSubscription($action = null)
    {   
        if ($action == 'gratuito') {
            try {
                $user = User::findOrFail(Auth::user()->id);
                $user->suscription_id = 1;
                $user->save();
    
                return redirect()->route('account.subscriptions')->with('success', 'Has cancelado la suscripción SuperShapeUp correctamente.');
            } catch (\Exception $e) {
                return redirect()->route('account.subscriptions')->with('error', 'Ha ocurrido un error al cancelar la suscripción. Por favor, inténtalo de nuevo más tarde.');
            }
        } else {
            try {
                $user = User::findOrFail(Auth::user()->id);
                $user->suscription_id = 2;
                $user->save();
    
                return redirect()->route('account.subscriptions')->with('success', 'Has contratado la suscripción SuperShapeUp correctamente. ¡Ya eres un SuperShapeUp!');
            } catch (\Exception $e) {
                return redirect()->route('account.subscriptions')->with('error', 'Ha ocurrido un error al contratar la suscripción. Por favor, inténtalo de nuevo más tarde.');
            }
        }    
    }

    public function contactShapeUp(Request $request)
    {
        try {
            $name = $request->input('name');
            $email = $request->input('email');
            $subject = $request->input('subject');
            $message = $request->input('message');

            env('MAIL_FROM_ADDRESS', $email);
            Mail::to('infocontact.shapeup@gmail.com')->send(new ContactFormMail($name, $email, $subject, $message));

            return redirect()->route('account.contact')->with('success', 'El mensaje se han enviado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('account.contact')->with('error', 'Ha ocurrido un error al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.');
        }

    }

    public function editProfile(Request $request)
    {
        try {
            $user = User::findOrFail(Auth::user()->id);
            $user->name = $request->input('name');
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->country = $request->input('country');
            $user->age = $request->input('age');
            $user->weight = $request->input('weight');
            $user->height = $request->input('height');
            $user->save();
        
            return redirect()->route('account.profile')->with('success', 'Los datos se han guardado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('account.profile')->with('error', 'Ha ocurrido un error al guardar los datos. Por favor, inténtalo de nuevo más tarde.');
        }
        
    }

    public function resetProfile()
    {
        try {
            $user = User::findOrFail(Auth::user()->id);
            $user->country = null;
            $user->age = null;
            $user->weight = null;
            $user->height = null;
            $user->save();
        
            return redirect()->route('account.profile')->with('success', 'Los datos opcionales se han reiniciado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('account.profile')->with('error', 'Ha ocurrido un error al reiniciar los datos opcionales. Por favor, inténtalo de nuevo más tarde.');
        }
        
    }

    public function editPassword(Request $request)
    {
        try {

            $password = $request->input('oldpassword');
            $hash = Auth::user()->password;

            if (password_verify($password, $hash)) {
                $newpassword = $request->input('newpassword');
                $confirmnewpassword = $request->input('confirmnewpassword');

                if($newpassword === $confirmnewpassword) {
                    $user = User::findOrFail(Auth::user()->id);
                    $user->password = bcrypt($newpassword);
                    $user->save();
                    return redirect()->route('account.profile')->with('success', 'La contraseña se ha cambiado correctamente.');
                } else {
                    return redirect()->route('account.profile.password')->with('error', 'La nueva contraseña y la confirmación de nueva contraseña no coinciden. Por favor, inténtalo de nuevo.');
                }
            } else {
                return redirect()->route('account.profile.password')->with('error', 'La contraseña actual no coincide con la introducida. Por favor, inténtalo de nuevo.');
            }
        } catch (\Exception $e) {
            return redirect()->route('account.profile.password')->with('error', 'Ha ocurrido un error al cambiar la contraseña. Por favor, inténtalo de nuevo más tarde.');
        }
        
    }

    public function indexMessaging()
    {
        $mensajesEnviados = FrequentlyAskedQuestion::where('user_id', Auth::user()->id)->get();
        return view('web.messaging', ['mensajes' => $mensajesEnviados]);       
    }
  
    public function actualizarCheck(Request $request)
    {
        $mensajeId = $request->input('mensajeId');

        $mensaje = AnswerQuestion::where('frequently_asked_question_id', $mensajeId)->first();
        $mensaje->check = 1;
        $mensaje->save();

        return response()->json(['success' => true]);
    }
}
