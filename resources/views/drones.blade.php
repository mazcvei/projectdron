@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="text-align: center">Nuestros Drones</h1>
    <section class="mt-4">
            @foreach($drones as $dron) 
                <article>
                    <div class="content-article">
                        <h3 class="subtitle">{{$dron->model}} ({{$dron->registration_number}})</h3>
                    </div>
                    <div class="img-article">
                        <img src="{{asset('storage/'.$dron->image)}}" alt="Imagen servicio">
                    </div>
                </article>
                <hr>
            @endforeach
      

    </section>
</div>



@endsection