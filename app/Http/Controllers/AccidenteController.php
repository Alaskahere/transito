<?php

namespace App\Http\Controllers;

use App\Models\Accidente;
use App\Models\Persona;
use Illuminate\Http\Request;

class AccidenteController extends Controller
{
    public function index(){
        $accidentes = Accidente::with('persona')->get(); //consulta a todos los accidentes junto con sus personas
        return view('accidentes.index',compact('accidentes',));
    }

    public function create(){  //Habilita formulario para crear registro
        $personas = Persona::all(); //trae todas las personas
        return view('accidentes.create',compact('personas'));
    }

    public function store(Request $request){
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'lugar' => 'required|string',
            'persona_id' => 'required|exists:personas,id',

        ]);

        // Inserta un nuevo registro en la base de datos
        Accidente::create($request->all());

        // Redirige al índice de accidentes con un mensaje de éxito
        return redirect()->route('accidentes.index')->with('success','accidente creado exitosamente');
    }

    public function show(Accidente $accidente){
        return view('accidentes.show',compact('accidente'));

    }

    public function edit(Accidente $accidente){
        $personas = Persona::all();
        return view('accidentes.edit',compact('personas','accidente'));

    }

    public function update(Request $request, Accidente $accidente){
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'lugar' => 'required|string',
            'persona_id' => 'required|exists:personas,id',
        ]);
        $accidente->update($request->all());
        return redirect()->route('accidentes.index')->with('success','actualizacion satisfatoria');

    }
    public function destroy(Accidente $accidente){

        $accidente->delete();
        return redirect()->route('accidentes.index')->with('success','registro eliminado');

    }
}
