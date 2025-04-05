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
            <h1>Drones</h1>
            <a href="{{ route('drones.create') }}" class="btn btn-primary">Nuevo dron</a>
        </div>
 

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Modelo</th>
                <th>Matrícula</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($drones as $dron)
                <tr>
                    <td>{{ $dron->id }}</td>
                    <td>{{ $dron->model }}</td>
                    <td>{{ $dron->registration_number }}</td>
                    <td>
                        <img style="width: 100%" src="{{asset('storage/'.$dron->image)}}">
                    </td>
                    <td>
                        <a href="{{ route('drones.edit', $dron->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('drones.destroy', $dron->id) }}" method="POST" style="display:inline">
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