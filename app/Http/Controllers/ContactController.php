<?php

namespace App\Http\Controllers;
use App\Models\ConfigWeb;
use App\Models\Contact;
use Resend\Laravel\Facades\Resend;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendContact(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'phone' => ['required', 'digits_between:9,15'],
            'text_message'=>['required','min:10','string'],
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.min' => 'El nombre debe tener al menos :min caracteres.',
            'name.max' => 'El nombre no puede tener más de :max caracteres.',
        
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser una cadena de texto.',
            'email.lowercase' => 'El correo electrónico debe estar en minúsculas.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'email.max' => 'El correo electrónico no puede tener más de :max caracteres.',
        
            'phone.required' => 'El número de teléfono es obligatorio.',
            'phone.digits_between' => 'El número de teléfono debe tener entre :min y :max dígitos.',
        
            'text_message.required' => 'El mensaje es obligatorio.',
            'text_message.string' => 'El mensaje debe ser una cadena de texto.',
            'text_message.min' => 'El mensaje debe tener al menos :min caracteres.',
        ]);
        $view = View::make('email_contact', $request->all())->render();

        Resend::emails()->send([
            'from'      => 'ProjectDron <contacto@resend.dev>',
            'to'        => 'mario.azcvei@hotmail.com', //rferfer76@gmail.com
            'subject'   => 'Solicitud de contacto',
            'html'      => $view,
        ]);
        Contact::create([
            'name_lastname' => $request->name,
            'email' => $request->email, 
            'phone' => $request->phone,
            'message' => $request->text_message,
        ]);
        return redirect()->route('home')->with('success', 'Contacto enviado correctamente.');
    }

    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }
}
