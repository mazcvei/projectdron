<?php

namespace App\Http\Controllers;

use App\Models\ConfigWeb;
use Illuminate\Http\Request;

class ConfigWebController extends Controller
{
    public function index()
    {
        
        return view('edit_config_web');
    }

    public function update(Request $request, ConfigWeb $ConfigWeb)
    {
        $request->validate([
            'logo' => 'nullable|max:255|image|mimes:jpeg,png,jpg,gif|max:4096',
            'facebook' => 'required|string|max:255|min:10|url',
            'instagram' => 'required|string|max:255|min:10|url',
            'email' => 'required|string|max:255|min:10|email',
        ], [
            'logo.max' => 'El nombre del logo no puede exceder los 255 caracteres',
            'logo.image' => 'El logo debe ser una imagen válida',
            'logo.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg o gif.',
            'logo.max.4096' => 'La imagen no debe pesar más de 4MB (4096 kilobytes)',

            'facebook.required' => 'El enlace de Facebook es obligatorio',
            'facebook.string' => 'El enlace de Facebook debe ser una cadena de texto',
            'facebook.max' => 'El enlace de Facebook no puede exceder los 255 caracteres',
            'facebook.min' => 'El enlace de Facebook debe tener al menos 10 caracteres',
            'facebook.url' => 'El enlace de Facebook debe ser una URL válida',

            'instagram.required' => 'El enlace de Instagram es obligatorio',
            'instagram.string' => 'El enlace de Instagram debe ser una cadena de texto',
            'instagram.max' => 'El enlace de Instagram no puede exceder los 255 caracteres',
            'instagram.min' => 'El enlace de Instagram debe tener al menos 10 caracteres',
            'instagram.url' => 'El enlace de Instagram debe ser una URL válida',

            'email_contact.required' => 'El email de contacto es obligatorio',
            'email_contact.string' => 'El email debe ser una cadena de texto',
            'email_contact.max' => 'El email no puede exceder los 255 caracteres',
            'email_contact.min' => 'El email debe tener al menos 10 caracteres',
            'email_contact.email' => 'Debe ingresar un email válido',
        ]);
        if ($request->file('logo')) {
            $path = $request->file('logo')->store('images', 'public');
            $ConfigWeb->logo = $path;
        }
        $ConfigWeb->facebook = $request->facebook;
        $ConfigWeb->instagram = $request->instagram;
        $ConfigWeb->email_contact = $request->email;
        $ConfigWeb->save();
        return redirect()->route('config.index')
            ->with('success', 'Configuración actualizada correctamente.');
    }
}
