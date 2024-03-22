<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Partido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartidosController extends Controller
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
        $partidos = Partido::orderby('id','desc')->paginate(6);
        return view('partidos.index',compact('partidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipos = Equipo::all();
        return view('partidos.create',compact('equipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $i = 0;
        foreach ($request->equipoA_id as $mor) {
        $partido = new Partido();
        $partido -> equipoA_id = $request->equipoA_id[$i];
        $partido -> equipoB_id = $request->equipoB_id[$i];
        $partido -> marcador1 = $request->marcador1[$i];
        $partido -> marcador2 = $request->marcador2[$i];
        $partido -> equipoA()->associate( $request->equipoA_id[$i] );
        $partido -> equipoB()->associate( $request->equipoB_id[$i] );
        $partido ->save();
        
        $i++;
    }
    return redirect('partidos')->with('mensaje', 'partido agregado correctamente.');
        // dd($request->all());
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
        $equipos = Equipo::all();
        $partido = Partido::find($id);
        return view('partidos.edit',compact('partido','equipos'));
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
        $partido = Partido::find($id);
        $partido -> equipoA_id = $request->get('equipoA_id');
        $partido -> equipoB_id = $request->get('equipoB_id');
        $partido -> marcador1 = $request->get('marcador1');
        $partido -> marcador2 = $request->get('marcador2');
        $partido ->save();
        return redirect('partidos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partidos = Partido::find($id);
        $partidos->delete();
        return redirect('partidos');
    }
}
