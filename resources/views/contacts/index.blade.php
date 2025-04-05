@extends('layouts.app')

@section('content')
<div class="container">
    <dv class="row">
        @if (session('success'))
        <div class="col-12 mt-3">
            <div class="alert alert-success" style="text-align: center">
                <h3>{{session('success')}}</h3>
            </div>
        </div>
        @endif
        <div class="col-12">
            <h1>Solicitudes de contacto</h1>
        </div>
 
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th rowspan="2">Mensaje</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name_lastname }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>
                        <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" style="display:inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>



@endsection