@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 100%;padding: 0;">
    <div class="row">
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
        <div class="col-12">
            <div class="video-background">
                <video autoplay muted loop playsinline>
                    <source src="{{asset('videos/v2.mp4')}}" type="video/mp4">
                    Tu navegador no soporta videos en HTML5.
                </video>
                <div class="content">
                    <h1>Servicio de Drones para Agricultura</h1>
                    <p>Optimización de la producción agrícola . Eficiencia demostrada. Nuestra tecnología reduce costes,
                        tiempo y recursos al minimizar la cantidad de productos fitosanitarios y detectar plagas de manera
                        temprana aplicando tratamientos localizados.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">


    <div class="row seccion1">
        <div class="col-md-12 col-lg-4">
            <img class="img-about" style="height: 400px" src="images/img1.jpeg" alt=""></div>
        <div class="col-md-12 col-lg-8">
            <div class="row">
                <div class="col-md-8 sub_container">
                    <h1 class="title">Sobre nosotros</h1>
                    <p>En DroneSolutions, somos apasionados por la innovación y el cuidado del campo. Nos dedicamos a
                        ofrecer servicios de drones especializados para la agricultura, ayudando a los agricultores a
                        optimizar sus cultivos de manera eficiente y sostenible. Con tecnología de última generación,
                        aplicamos herbicidas, fungicidas y realizamos análisis multiespectrales para detectar problemas
                        tempranos en los cultivos. Nuestro equipo está comprometido con la precisión, el ahorro de
                        tiempo y la reducción del impacto ambiental. Confía en nosotros para proteger y mejorar tus
                        cosechas, porque en DroneSolutions, tu éxito es nuestra misión. ¡Volamos contigo hacia el futuro
                        de la agricultura!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid section3">
        <div class="row">
            <div class="col-12">
                <h1 class="title mb-4 mt-4"><span class="color-titulo">Nuestros</span> Servicios</h1>
            </div>
            <div class="col-12 col-md-4">
                <div class="row">
                    <div class="col-12">
                        <h3 class="subtitle">Aplicación Herbicida</h3>
                        <p>🌾 Ofrecemos aplicación de herbicidas con drones para mantener tus cultivos libres de malezas
                            de
                            manera precisa y eficiente. Usamos tecnología avanzada para aplicar herbicidas, insecticidas
                            o abonos de forma controlada, minimizando desperdicios y reduciendo el impacto ambiental.
                            Nos adaptamos a terrenos de cualquier tamaño, garantizando cobertura uniforme y evitando el
                            pisoteo de cultivos. Con drones, ahorramos tiempo frente a métodos tradicionales. Confía en
                            nosotros para cuidar tus plantas y suelos, ¡sin complicaciones!</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="row">
                    <div class="col-12">
                        <h3 class="subtitle">Multiespectral</h3>
                        <p>🚁🌾Nuestro servicio de detección multiespectral te permite supervisar y analizar cada
                            centímetro
                            de tus campos de manera eficiente, reduciendo el tiempo que pasas caminando por el terreno.
                            Con imágenes de alta resolución y vista aérea, ampliamos zonas de interés sin perder
                            claridad, facilitando la identificación inmediata y el etiquetado GPS de:
                        <ul>
                            <li>Poblaciones de malas hierbas</li>
                            <li>Escaso crecimiento de la cosecha</li>
                            <li>Daños bióticos</li>
                            <li>Daños abióticos</li>
                            <li>Estrés hídrico o fallo del sistema de riego</li>
                        </ul>

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="row">
                    <div class="col-12">
                        <h3 class="subtitle">Aplicación Fungicida</h3>
                        <p>🌱 Protegemos tus cultivos de hongos y enfermedades con nuestro servicio de aplicación de
                            fungicidas mediante drones. Distribuimos los productos de forma precisa y uniforme,
                            asegurando que cada planta reciba la dosis correcta. Este método es rápido, eficiente y más
                            respetuoso con el medio ambiente que las aplicaciones manuales o con maquinaria pesada.
                            Optimizamos el uso de fungicidas, reduciendo el riesgo de contaminación y cuidando la salud
                            de tus cultivos. Déjanos encargarnos de la protección de tus plantas, ¡para que solo te
                            preocupes por verlas crecer sanas y fuertes!</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container section4 mt-4" id="contacto">
        <div class="row">
            <div class="col-12">
                <h1 class="title mb-4 mt-4"><span class="color-titulo">Contáctanos</span></h1>
            </div>
            <div class="col-12 col-md-12">
                <form method="POST" action="{{route('enviar_contacto')}}">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-12 col-md-4">
                            <label for="input_name" class="form-label">Nombre y apellidos</label>
                            <input required type="text" name="name" id="input_name" class="form-control">
                        </div>

                        <div class="mb-3 col-12 col-md-4">
                            <label class="form-label"> Email:</label><br />
                            <input required class="form-control" type="email" name="email" autocomplete="off"
                                placeholder="email@dominio.es" pattern="[a-z0-9._%+-]+@[a-z]+\.[a-z]{2,4}$" />
                        </div>
                        <div class="mb-3 col-12 col-md-4">
                            <label class="form-label"> Teléfono:</label><br />
                            <input class="form-control" type="tel" name="phone" />
                        </div>
                        <div class="mb-3 col-12 col-md-12">
                            <label class="form-label"> Mensaje </label><br>
                            <textarea class="form-control" rows="5" name="text_message"></textarea>
                        </div>
                    </div>
                    <button class="btn btn-lg btn-primary" type="submit">Enviar</button>
                </form>
                <p>O escríbenos un correo a <strong>{{$config->email_contact}}</strong>.</p>
            </div>

            <div class="col-12">
                <h1 class="title mb-4 mt-4">Galería</h1>
            </div>
            <div class="col-md-3 noPadding">
                <img class="img-final" src="{{asset('images/g10.jpeg')}}" alt="">
            </div>
            <div class="col-md-3 noPadding">
                <img class="img-final" src="{{asset('images/g11.jpeg')}}" alt="">
            </div>
            <div class="col-md-3 noPadding">
                <img class="img-final" src="{{asset('images/g4.jpeg')}}" alt="">
            </div>
            <div class="col-md-3 noPadding">
                <img class="img-final" src="{{asset('images/g5.jpeg')}}" alt="">
            </div>
            <div class="col-md-3 noPadding">
                <img class="img-final" src="{{asset('images/g6.jpeg')}}" alt="">
            </div>
            <div class="col-md-3 noPadding">
                <img class="img-final" src="{{asset('images/g7.jpeg')}}" alt="">
            </div>
            <div class="col-md-3 noPadding">
                <img class="img-final" src="{{asset('images/g8.jpeg')}}" alt="">
            </div>
            <div class="col-md-3 noPadding">
                <img class="img-final" src="{{asset('images/g9.jpeg')}}" alt="">
            </div>

        </div>
    </div>
</div>



@endsection