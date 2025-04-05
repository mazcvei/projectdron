@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="text-align: center">Configuración web</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('success'))
    <div class="col-12 mt-3">
        <div class="alert alert-success" style="text-align: center">
            <h3>{{session('success')}}</h3>
        </div>
    </div>
    @endif
    <div class="col-md-6 m-auto">
    <form action="{{ route('config.update',$config) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Logo</label>
            <img style="width:100%" src="{{asset('storage/'.$config->logo)}}">
            <input type="file" name="logo" accept="image/*">
        </div>
        <div class="mb-3">
            <label for="facebook" class="form-label">Facebook</label>
            <input type="text" value="{{$config->facebook}}" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" value="{{ old('facebook') }}">
        </div>
        <div class="mb-3">
            <label for="instagram" class="form-label">Instagram</label>
            <input type="text" value="{{$config->instagram}}" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" value="{{ old('instagram') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email de contacto</label>
            <input type="text" value="{{$config->email_contact}}" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('config.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    </div>
   
</div>



@endsection