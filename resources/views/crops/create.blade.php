@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12" style="text-align: center">
            <h1>Nuevo Tipo de Cultivo</h1>
        </div>
        <div class="col-md-6 m-auto">
            <form action="{{ route('crop.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('crop.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
   
  
</div>



@endsection