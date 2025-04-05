<?php

namespace App\Http\Controllers;

use App\Models\Dron;
use Illuminate\Http\Request;

class DronController extends Controller
{
    public function index()
    {
        $drones = Dron::all();
        return view('drones.index', compact('drones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('drones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
            $request->validate([
                'model' => 'required|string|max:250|min:5',
                'registration_number' => 'required|string|min:5',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096', // Máximo 4MB
            ], [
                'model.required' => 'El modelo es obligatorio.',
                'model.string' => 'El modelo debe ser un texto válido.',
                'model.max' => 'El modelo no puede tener más de 250 caracteres.',
                'model.min' => 'El modelo no puede tener menos de 5 caracteres.',

                'registration_number.required' => 'La matrícula es obligatoria.',
                'registration_number.string' => 'La matrícula debe ser un texto válido.',
                'registration_number.min' => 'La matrícula no puede tener menos de 5 caracteres.',

                'image.required' => 'Debe subir una imagen.',
                'image.image' => 'El archivo debe ser una imagen.',
                'image.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg o gif.',
                'image.max' => 'La imagen no puede superar los 4MB.',
            ]);

            $path = null;
            if ($request->file('image')) {
                $path = $request->file('image')->store('images', 'public');
            }

            Dron::create([
                'model' => $request->title,
                'registration_number' => $request->description,
                'image' => $path
            ]);

            $drones = Dron::all();
            return redirect()->route('drones.index', compact('services'))
                ->with('success', 'Dron creado correctamente.');
  

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dron $Dron)
    {
            return view('drones.edit', compact('Dron'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dron $Dron)
    {
       
            $request->validate([
                'model' => 'required|string|max:250|min:5',
                'registration_number' => 'required|string|min:5',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096', // Máximo 4MB
            ], [
                'model.required' => 'El título es obligatorio.',
                'model.string' => 'El título debe ser un texto válido.',
                'model.max' => 'El título no puede tener más de 250 caracteres.',
                'model.min' => 'El título no puede tener menos de 5 caracteres.',

                'registration_number.required' => 'La descripción es obligatoria.',
                'registration_number.string' => 'La descripción debe ser un texto válido.',
                'registration_number.min' => 'La descripción no puede tener menos de 5 caracteres.',

                'image.image' => 'El archivo debe ser una imagen.',
                'image.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg o gif.',
                'image.max' => 'La imagen no puede superar los 4MB.',
            ]);
            if ($request->file('image')) {
                $path = $request->file('image')->store('images', 'public');
                $Dron->image = $path;
            }
            $Dron->model = $request->model;
            $Dron->registration_number = $request->registration_number;
            $Dron->save();
            return redirect()->back()->with('success', 'Dron actualizado correctamente.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dron $Dron)
    {
            $Dron->delete();
            $drones = Dron::all();
            return redirect()->route('drones.index', compact('drones'))
            ->with('success', 'Dron eliminado correctamente.');
    }
}
