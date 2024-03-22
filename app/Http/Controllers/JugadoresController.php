<?php

namespace App\Http\Controllers;

use App\Models\card;
use App\Models\Equipo;
use App\Models\Player;
use Illuminate\Http\Request;

class JugadoresController extends Controller
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

    // public function index(Equipo $equipo)

    // {
    //     $equipos = Equipo::all();
    //     $jugadores = $equipo->jugadores;
    //     return view('jugadores.index',compact('equipos','jugadores'));
    // }
    public function index()

    {
        $equipos = Equipo::all();
        $jugadores = Player::orderby('id','desc')->paginate(6);
        return view('jugadores.index',compact('equipos','jugadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipos = Equipo::all();
        $cards = card::all();
        return view('jugadores.create',compact('equipos','cards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jugador = new Player();
        $jugador -> equipo_id = $request->get('equipo_id');
        $jugador -> nombre = $request->get('nombre');
        $jugador -> apellido = $request->get('apellido');
        $jugador -> edad = $request->get('edad');
        $jugador -> numero = $request->get('numero');
        $jugador -> cardA_id = $request->get('cardA_id');
        $jugador -> cardR_id = $request->get('cardR_id');
        $jugador ->save();
        return redirect('jugadores')->with('mensaje', 'jugadore agregado correctamente.');
       
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jugador = Player::find($id);
        // return  $jugador;
        return view('jugadores.show', compact('jugador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipos = Equipo::all();
        $cards = card::all();
        $jugador = Player::find($id);
        return view('jugadores.edit',compact('jugador','equipos','cards'));
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
        $jugador = Player::find($id);
        $jugador -> equipo_id = $request->get('equipo_id');
        $jugador -> nombre = $request->get('nombre');
        $jugador -> apellido = $request->get('apellido');
        $jugador -> edad = $request->get('edad');
        $jugador -> numero = $request->get('numero');
        $jugador -> cardA_id = $request->get('cardA_id');
        $jugador -> cardR_id = $request->get('cardR_id');
        $jugador ->save();
        return redirect('jugadores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jugador = Player::find($id);
        $jugador->delete();
        return redirect('jugadores');
    }

    // public function filtro(Equipo $equipo)

    // {
    //     $equipos = Equipo::all();
    //     $jugadores = $equipo->jugadores;
    //     return view('jugadores.index',compact('equipos','jugadores'));
    // }
}
