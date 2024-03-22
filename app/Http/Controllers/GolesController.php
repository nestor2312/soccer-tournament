<?php

namespace App\Http\Controllers;

use App\Models\gol;
use App\Models\Player;
use Illuminate\Http\Request;

class GolesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goles = gol::all();
        return view('goles.index',compact('goles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jugadores = Player::all();
        return view('goles.create',compact('jugadores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gol = new gol();
        $gol-> jugador_id = $request->get('jugador_id');
        $gol-> goles = $request->get('goles');
        $gol->save();
      
        return redirect('goles')->with('mensaje', 'gol agregado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gol = gol::find($id);
        $jugadores = Player::all();
        return view('goles.edit',compact('gol','jugadores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gol = gol::find($id);
        $gol-> jugador_id = $request->get('jugador_id');
        $gol-> goles = $request->get('goles');
        $gol->save();
        return redirect('goles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gol = gol::find($id);
        $gol->delete();
        return redirect('goles');
    }
}
