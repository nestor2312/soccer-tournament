<?php

namespace App\Http\Controllers;

use App\Models\asistencia;
use App\Models\Player;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
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
        $asistencias = asistencia::all();
        return view('asistencia.index',compact('asistencias'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jugadores = Player::all();
        return view('asistencia.create',compact('jugadores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asistencia = new asistencia();
        $asistencia-> jugador_id = $request->get('jugador_id');
        $asistencia-> asistencias = $request->get('asistencias');
        $asistencia->save();
        return redirect('asistencia')->with('mensaje', 'asistencia agregado correctamente.');
      
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
        $asistencia = asistencia::find($id);
        $jugadores = Player::all();
        return view('asistencia.edit',compact('asistencia','jugadores'));
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
        $asistencia = asistencia::find($id);
        $asistencia-> jugador_id = $request->get('jugador_id');
        $asistencia-> asistencias = $request->get('asistencias');
        $asistencia->save();
        return redirect('asistencia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asistencia = asistencia::find($id);
        $asistencia->delete();
        return redirect('asistencia');
    }
}
