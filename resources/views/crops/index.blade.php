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
            <h1>Tipos de Cultivo</h1>
            <a href="{{ route('crop.create') }}" class="btn btn-primary">Nuevo Tipo</a>
        </div>
 
   

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cropTypes as $cropType)
                <tr>
                    <td>{{ $cropType->id }}</td>
                    <td>{{ $cropType->name }}</td>
                    <td>
                        <a href="{{ route('crop.edit', $cropType->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('crop.destroy', $cropType->id) }}" method="POST" style="display:inline">
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