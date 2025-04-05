<?php

namespace App\Http\Controllers;

use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    public function index()
    {
        $services = ServiceType::all();
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
            $request->validate([
                'title' => 'required|string|max:250|min:5',
                'description' => 'required|string|min:10',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096', // Máximo 4MB
            ], [
                'title.required' => 'El título es obligatorio.',
                'title.string' => 'El título debe ser un texto válido.',
                'title.max' => 'El título no puede tener más de 250 caracteres.',
                'title.min' => 'El título no puede tener menos de 5 caracteres.',

                'description.required' => 'La descripción es obligatoria.',
                'description.string' => 'La descripción debe ser un texto válido.',
                'description.min' => 'La descripción no puede tener menos de 10 caracteres.',

                'image.required' => 'Debe subir una imagen.',
                'image.image' => 'El archivo debe ser una imagen.',
                'image.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg o gif.',
                'image.max' => 'La imagen no puede superar los 4MB.',
            ]);

            $path = null;
            if ($request->file('image')) {
                $path = $request->file('image')->store('images', 'public');
            }

            ServiceType::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $path
            ]);

            $services = ServiceType::all();
            return redirect()->route('services.index', compact('services'))
                ->with('success', 'Servicio creado correctamente.');
  

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceType $ServiceType)
    {
            return view('services.edit', compact('ServiceType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceType $ServiceType)
    {
       
            $request->validate([
                'title' => 'required|string|max:250|min:5',
                'description' => 'required|string|min:10',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096', // Máximo 4MB
            ], [
                'title.required' => 'El título es obligatorio.',
                'title.string' => 'El título debe ser un texto válido.',
                'title.max' => 'El título no puede tener más de 250 caracteres.',
                'title.min' => 'El título no puede tener menos de 5 caracteres.',

                'description.required' => 'La descripción es obligatoria.',
                'description.string' => 'La descripción debe ser un texto válido.',
                'description.min' => 'La descripción no puede tener menos de 10 caracteres.',

                'image.image' => 'El archivo debe ser una imagen.',
                'image.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg o gif.',
                'image.max' => 'La imagen no puede superar los 4MB.',
            ]);
            if ($request->file('image')) {
                $path = $request->file('image')->store('images', 'public');
                $ServiceType->image = $path;
            }
            $ServiceType->title = $request->title;
            $ServiceType->description = $request->description;
            $ServiceType->save();
            return redirect()->back()->with('success', 'Servicio actualizado correctamente.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceType $ServiceType)
    {
            $ServiceType->delete();
            $services = ServiceType::all();
            return redirect()->route('services.index', compact('services'))
            ->with('success', 'Servicio eliminado correctamente.');
    }
}
