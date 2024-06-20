<?php

namespace App\Http\Controllers;
use App\Models\Persona;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class PersonaController extends Controller
{
    // Método para mostrar la lista de personas
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    // Método para mostrar el formulario de creación
    public function create()
    {
        return view('personas.create');
    }

    // Método para almacenar una nueva persona
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cedula' => 'required|string|max:255|unique:personas',
            'documento' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $data = $request->all();

        // if ($request->hasFile('documento')) {
        //     $filePath = $request->file('documento')->store('documentos', 'public');
        //     $data['documento'] = $filePath;
        // }
        if ($request->hasFile('documento')) {
            $file = $request->file("documento");

            // Generar un nombre único para el archivo PDF
            $nombreUnico = uniqid('pdf_') . '.' . $file->guessExtension();

            // Almacenar el archivo en la carpeta 'documentos' dentro del disco 'public'
            $file->storeAs('public/documentos', $nombreUnico);

            // Asignar el nombre único al campo 'documento' en los datos a guardar
            $data['documento'] = $nombreUnico;
        }

        Persona::create($data);

        return redirect()->route('personas.index')->with('success', 'Persona creada exitosamente.');
    }

    // Método para mostrar una persona específica
    public function show(Persona $persona)
    {
        return view('personas.show', compact('persona'));
    }

    // Método para mostrar el formulario de edición
    public function edit(Persona $persona)
    {
        return view('personas.edit', compact('persona'));
    }

    // Método para actualizar una persona existente
    public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cedula' => 'required|string|max:255|unique:personas,cedula,' . $persona->id,
            'documento' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('documento')) {
            if ($persona->documento) {
                Storage::delete('public/' . $persona->documento);
            }
            $filePath = $request->file('documento')->store('documentos', 'public');
            $data['documento'] = $filePath;
        }

        $persona->update($data);

        return redirect()->route('personas.index')->with('success', 'Persona actualizada exitosamente.');
    }

    // Método para eliminar una persona existente
    public function destroy(Persona $persona)
    {
        if ($persona->documento) {
            Storage::delete('public/' . $persona->documento);
        }

        $persona->delete();

        return redirect()->route('personas.index')->with('success', 'Persona eliminada exitosamente.');
    }
}
