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
            <h1>Servicios</h1>
            <a href="{{ route('services.create') }}" class="btn btn-primary">Nuevo servicio</a>
        </div>
 

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->title }}</td>
                    <td>{{ $service->description }}</td>
                    <td>
                        <img style="width: 100%" src="{{asset('storage/'.$service->image)}}">
                    </td>
                    <td>
                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline">
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