<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Partido;
use Illuminate\Http\Request;

class HomeMatches_userController extends Controller
{
    public function index()

    {
        $grupos = Grupo::all();
        $partidos = Partido::orderby('id','desc')->paginate(9);
     
     
        return view('user.matches',compact('partidos','grupos'));

    }
}
