<?php

namespace App\Http\Controllers;

use App\Models\FrequentlyAskedQuestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Models\UserFollowCoach;
use App\Models\Gym;
use App\Models\Supermarket;
use App\Models\User;
use App\Models\Diet;
use App\Models\Training;

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
        return view('web.index', ['gyms' => $gyms, 'supermarkets' => $supermarkets, 'numUsers' => $numUsers, 'numCoaches' => $numCoaches, 'numDiets' => $numDiets, 'numTrainings' => $numTrainings]);
    }

    public function indexCoaches()
    {
        $coaches = User::where('status', 'Coach')->get();
        $numCoaches = User::where('status', 'Coach')->count();
        return view('web.coaches', [ 'coaches' => $coaches, 'numCoaches' => $numCoaches]);
    }

    public function followCoaches($action, $coach_id)
    {
        if ($action == 'follow') {
            $user_follow_coaches = new UserFollowCoach;
            $user_follow_coaches->user_id = Auth::user()->id;
            $user_follow_coaches->user_coach_id = $coach_id;
            $user_follow_coaches->save();
            return back();
        } else if ($action == 'unfollow') {
            $user_id = Auth::user()->id;
            UserFollowCoach::where('user_id', $user_id)->where('user_coach_id', $coach_id)->delete();
            return back();
        }        
    }

    public function messageCoaches($coach_id)
    {   
        $coach = User::where('id', $coach_id)->first();
        return view('web.messagecoach', ['coach' => $coach]);       
    } 

    public function sendMessageCoaches(Request $request, $coach_id)
    {  
        $message = new FrequentlyAskedQuestion;
        $message->user_id = Auth::user()->id;
        $message->user_coach_id = $coach_id;
        $message->message = $request->input('message');
        $message->save(); 
        return redirect()->route('account.coaches');     
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
  
}
