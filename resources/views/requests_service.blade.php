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
            <h1>Solicitudes de servicio</h1>
        </div>
 
   

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Compañía</th>
                <th>CIF</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Fecha servicio</th>
                <th>Tipo servicio</th>
                <th>Tipo cultivo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $request)
                <tr>
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->company }}</td>
                    <td>{{ $request->cif }}</td>
                    <td>{{ $request->phone }}</td>
                    <td>{{ $request->email }}</td>
                    <td>{{ $request->address }}</td>
                    <td>{{ $request->date_start }}</td>
                    <td>{{ $request->service_type->title }}</td>
                    <td>{{ $request->crop_type->name }}</td>
                    <td>
        
                        <a href="{{route('request.destroy',$request->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>



@endsection