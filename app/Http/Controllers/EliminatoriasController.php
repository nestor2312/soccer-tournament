<?php

namespace App\Http\Controllers;

use App\Models\Eliminatoria;
use App\Models\Equipo;
use Illuminate\Http\Request;

class EliminatoriasController extends Controller
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
        // $eliminatorias =  Eliminatoria::all();
        $eliminatoriasCuartos = Eliminatoria::where('numPartido', 1)->orderBy('id', 'asc')->get();
        $eliminatoriasSemis =   Eliminatoria::where('numPartido', 2)->orderBy('id', 'asc')->get();
        $eliminatoriasFinal =   Eliminatoria::where('numPartido',3)->get();
        return view('eliminatorias.index',compact('eliminatoriasCuartos','eliminatoriasSemis','eliminatoriasFinal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipos = Equipo::all();
        return view('eliminatorias.create',compact('equipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $eliminatoria = new Eliminatoria();
        $eliminatoria->equipo_a_id = $request->get('equipo_a_id');
        $eliminatoria->equipo_b_id = $request->get('equipo_b_id');
        $eliminatoria->marcador1 = $request->get('marcador1');
        $eliminatoria->marcador2 = $request->get('marcador2');
        $eliminatoria->numPartido = $request->get('numPartido');
        $eliminatoria->save();
        return redirect('eliminatorias');
      
      

        // return redirect('eliminatorias');
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
        $eliminatoria = eliminatoria::find($id);
        return view('eliminatorias.edit',compact('eliminatoria','equipos'));
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
        $eliminatoria = eliminatoria::find($id);
        $eliminatoria->equipo_a_id = $request->get('equipo_a_id');
        $eliminatoria->equipo_b_id = $request->get('equipo_b_id');
        $eliminatoria->marcador1 = $request->get('marcador1');
        $eliminatoria->marcador2 = $request->get('marcador2');
        $eliminatoria->numPartido = $request->get('numPartido');
        $eliminatoria->save();

        return redirect('eliminatorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $eliminatoria = eliminatoria::find($id);
    //     $eliminatoria->delete();
    //     return redirect('eliminatorias');
    // }

    public function reset($id)
{
    $eliminatoria = Eliminatoria::find($id);

    $eliminatoria->equipo_a_id = null;
    $eliminatoria->equipo_b_id = null;
    $eliminatoria->marcador1 = null;
    $eliminatoria->marcador2 = null;
    $eliminatoria->save();
    return redirect('eliminatorias')->with('success', 'Los campos han sido restaurados.');
}

}
