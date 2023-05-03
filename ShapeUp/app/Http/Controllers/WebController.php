<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gym;
use App\Models\Supermarket;
use App\Models\User;
use App\Models\Coach;
use App\Models\Diet;
use App\Models\Training;

class WebController extends Controller
{
    public function index()
    {
        $gyms = Gym::all();
        $supermarkets = Supermarket::all();
        $numUsers = User::count();
        $numCoaches = Coach::count();
        $numDiets = Diet::count();
        $numTrainings = Training::count();
        return view('web.index', ['gyms' => $gyms, 'supermarkets' => $supermarkets, 'numUsers' => $numUsers, 'numCoaches' => $numCoaches, 'numDiets' => $numDiets, 'numTrainings' => $numTrainings]);
    }
    
}
