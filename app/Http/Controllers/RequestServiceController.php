<?php

namespace App\Http\Controllers;

use App\Models\RequestService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Resend\Laravel\Facades\Resend;
use Illuminate\Support\Facades\View;
class RequestServiceController extends Controller
{
    public function index()
    {
        $requests = RequestService::all();
        return view('requests_service',compact('requests'));
    }
    public function create()
    {
        return view('request_service');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company' => 'required|string|max:100',
            'cif' => 'required|string|size:9|regex:/^[A-Za-z][0-9]{7}[A-Za-z0-9]$/',
            'phone' => 'required|string|regex:/^[0-9]{9,15}$/',
            'email' => 'required|email:rfc,dns|max:100',
            'address' => 'required|string|max:255',
            'date_start' => 'required|date|after_or_equal:today',
            'crop_type_id' => ['required', Rule::exists('crop_types', 'id')],
            'service_type_id' => ['required', Rule::exists('service_types', 'id')]
        ], [
            'company.required' => 'El nombre de la empresa es obligatorio.',
            'company.string' => 'El nombre debe ser texto válido.',
            'company.max' => 'El nombre no puede exceder los 100 caracteres.',

            'cif.required' => 'El CIF es obligatorio.',
            'cif.size' => 'El CIF debe tener exactamente 9 caracteres.',
            'cif.regex' => 'El formato del CIF no es válido (Ejemplo: A1234567B).',

            'phone.required' => 'El teléfono es obligatorio.',
            'phone.regex' => 'El teléfono debe contener entre 9 y 15 dígitos.',

            'email.required' => 'El email es obligatorio.',
            'email.email' => 'Debe ingresar un email válido.',
            'email.max' => 'El email no puede exceder los 100 caracteres.',

            'address.required' => 'La dirección es obligatoria.',
            'address.max' => 'La dirección no puede exceder los 255 caracteres.',

            'date_start.required' => 'La fecha es obligatoria.',
            'date_start.date' => 'Debe ingresar una fecha válida.',
            'date_start.after_or_equal' => 'La fecha no puede ser anterior al día actual.',

            'crop_type_id.required' => 'Debe seleccionar un tipo de cultivo.',
            'crop_type_id.exists' => 'El tipo de cultivo seleccionado no es válido.',

            'service_type_id.required' => 'Debe seleccionar un tipo de servicio.',
            'service_type_id.exists' => 'El tipo de servicio seleccionado no es válido.'
        ]);

        $view = View::make('email_request_service', $validated)->render();

        Resend::emails()->send([
            'from'      => 'ProjectDron <contacto@resend.dev>',
            'to'        => 'rferfer76@gmail.com', //rferfer76@gmail.com
            'subject'   => 'Solicitud de servicio',
            'html'      => $view,
        ]);
        
        RequestService::create($validated);

        return redirect()->route('home')->with('success', 'Solicitud registrada correctamente.');
    }
    public function destroy(RequestService $RequestService)
    {
        $RequestService->delete();
    }
}
