@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        @if (session('success'))
        <div class="col-12 mt-3">
            <div class="alert alert-success" style="text-align: center">
                <h3>{{session('success')}}</h3>
            </div>
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="col-md-12" style="text-align: center">
            <h1>Solicitar servicio</h1>
        </div>
        <div class="col-md-6 m-auto">
            <form action="{{ route('request.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="company" class="form-label">Nombre empresa</label>
                    <input type="text" class="form-control @error('company') is-invalid @enderror" id="company"
                        name="company" required value="{{ old(key: 'company') }}">
                    @error('company')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="cif" class="form-label">CIF</label>
                    <input type="text" class="form-control @error('cif') is-invalid @enderror" id="cif" name="cif"
                        required value="{{ old('cif') }}">
                    @error('cif')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                        required value="{{ old('phone') }}">
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input required type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Direción de la finca</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                        name="address" required value="{{ old('address') }}">
                    @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Fecha de la prueba</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date_start"
                        value="{{ old('date') }}">
                    @error('date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="crop_type" class="form-label">Tipo de cultivo</label>
                    <select class="form-select" id="crop_type" name="crop_type_id">
                        @foreach(\App\Models\CropType::all() as $crop)
                            <option value="{{$crop->id}}">{{$crop->name}}</option>
                        @endforeach
                    </select>
                    @error('crop_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="service_Type" class="form-label">Tipo de servicio</label>
                    <select class="form-select" id="service_Type" name="service_type_id">
                        @foreach(\App\Models\ServiceType::all() as $service)
                            <option value="{{$service->id}}">{{$service->title}}</option>
                        @endforeach
                    </select>
                    @error('service_Type')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('home') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>


</div>



@endsection