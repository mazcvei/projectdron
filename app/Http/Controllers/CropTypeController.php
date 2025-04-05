<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CropType;
class CropTypeController extends Controller
{

    public function index()
    {
        $cropTypes = CropType::all();
        return view('crops.index', compact('cropTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:crop_types,name'
       ],[
           'name.required' => 'El nombre del tipo de cultivo es obligatorio.',
           'name.string' => 'El nombre debe ser una cadena de texto.',
           'name.max' => 'El nombre no puede exceder los 255 caracteres.',
           'name.unique' => 'Este tipo de cultivo ya existe.' 
       ]);
        CropType::create($request->all());

        return redirect()->route('crop.index')
            ->with('success', 'Tipo de cultivo creado exitosamente.');
    }
    public function edit(CropType $CropType)
    {
        return view('crops.edit', compact('CropType'));
    }

    public function create(CropType $CropType)
    {
        return view('crops.create');
    }
    public function update(Request $request, CropType $CropType)
    {
        $request->validate([
             'name' => 'required|string|max:255|unique:crop_types,name'
        ],[
            'name.required' => 'El nombre del tipo de cultivo es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no puede exceder los 255 caracteres.',
            'name.unique' => 'Este tipo de cultivo ya existe.' 
        ]);

        $CropType->update(['name'=>$request->name]);

        return redirect()->route('crop.index')
            ->with('success', 'Tipo de cultivo actualizado correctamente.');
    }

    public function destroy(CropType $CropType)
    {
        $CropType->delete();
        return redirect()->route('crop.index')
            ->with('success', 'Tipo de cultivo eliminado correctamente.');
    }
}
