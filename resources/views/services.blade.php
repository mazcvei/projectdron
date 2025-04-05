@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="text-align: center">Nuestros Servicios</h1>
    <section class="mt-4">
            @foreach($services as $service) 
                <article>
                    <div class="content-article">
                        <h3 class="subtitle">{{$service->title}}</h3>
                        <p>{{$service->description}}</p>
                       
                    </div>
                    <div class="img-article">
                        <img src="{{asset('storage/'.$service->image)}}" alt="Imagen servicio">
                    </div>
                </article>
                <hr>
            @endforeach
      

    </section>
</div>



@endsection