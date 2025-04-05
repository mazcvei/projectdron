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
        <div class="col-12 col-md-12" style="text-align: center">
         <h1>Nuevo Dron</h1>
        </div>
        <div class="col-md-6 m-auto">
            <form action="{{ route('drones.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Modelo</label>
                    <input type="text"  class="form-control @error('title') is-invalid @enderror" id="title" name="title" >
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="registration_number" class="form-label">Matrícula</label>
                    <input type="text"  class="form-control @error('registration_number') is-invalid @enderror" id="registration_number" name="registration_number" >
                    @error('registration_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Imagen</label>
                    
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" >
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
               
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('drones.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
          
        </div>
    </div>
   
   

</div>



@endsection