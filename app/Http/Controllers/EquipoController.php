<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Grupo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {  
        $grupos = Grupo::all();
        $equipos = Equipo::orderby('id','desc')->paginate(5);
        return view('equipos.index',compact('equipos','grupos'));
    }
   
    public function create()
    {
        $grupos = Grupo::all();
        return view('equipos.create',compact('grupos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'grupo_id' => 'required',
            'nombre' => 'required', 
            'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024'
        ]);
    
        $equipo = $request->all();
    
        if($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'imagenes/';
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $equipo['imagen'] = "$imagenProducto";             
        }
    
        Equipo::create($equipo);
    
        return redirect('equipos')->with('mensaje', 'Equipo agregado correctamente.');
    }
    
    

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $equipo = Equipo::find($id);
        $grupos = Grupo::all();
        return view('equipos.edit',compact('equipo','grupos'));
    }

    public function update(Request $request, Equipo $equipo)
    {
        $request->validate([
            'grupo_id' => 'required',
            'nombre' => 'required', 
            'imagen' => 'required|image|max:1024',

        ]);
         
        $prod = $request->all();
         
        if($imagen = $request->file('imagen')){
            $rutaGuardarImg = 'imagenes/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension(); 
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $prod['imagen'] = "$imagenProducto";
        }else{
            unset($prod['imagen']);
        }
         
        $equipo->update($prod);
        return redirect()->route('equipos.index');

    }

    public function destroy($id)
    {
        $equipo = Equipo::find($id);
        $equipo->delete();
        return redirect('equipos');
    }
}
