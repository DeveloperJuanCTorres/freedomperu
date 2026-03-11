@extends('layouts.app')

@section('title', 'Nosotros')

@section('content')

<div class="about-page">

    <!-- HERO -->
    <section class="about-hero text-center text-white d-flex align-items-center" 
        style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('images/banner.jpg') }}') center/cover; height: 400px;">
        
        <div class="container">
            <h1 class="display-4 font-weight-bold">Sobre Nosotros</h1>
            <p class="lead mt-3">
                Creamos polos personalizados que cuentan historias, transmiten identidad y reflejan tu estilo.
            </p>
        </div>
    </section>

    <!-- QUIÉNES SOMOS -->
    <section class="py-5 bg-blue">
        <div class="container">
            <div class="row align-items-center">
                
                <div class="col-md-6 mb-4">
                    <img src="{{ asset('images/freedom-image.jpg') }}" class="img-fluid rounded shadow" alt="Equipo">
                </div>

                <div class="col-md-6">
                    <h2 class="font-weight-bold mb-4 text-white">¿Quiénes Somos?</h2>
                    <p class="text-white">
                        Somos una tienda especializada en la personalización de polos para eventos, empresas, 
                        emprendimientos y uso personal. Nos apasiona convertir tus ideas en diseños únicos 
                        con acabados de alta calidad.
                    </p>
                    <p class="text-white">
                        Trabajamos con materiales premium, impresión duradera y un sistema de personalización 
                        en línea que te permite diseñar tu propio polo fácilmente.
                    </p>
                </div>

            </div>
        </div>
    </section>

   
    <!-- VALORES -->
    <section class="bg-light py-5">
        <div class="container text-center">
            <h2 class="font-weight-bold mb-5">Nuestros Valores</h2>
            <div class="row">
                
                <div class="col-md-4 mb-4">
                    <div class="gradient-card gradient-warning text-white p-4 rounded h-100 text-center">
                        <i class="fas fa-star fa-2x mb-3"></i>
                        <h5>Calidad</h5>
                        <p>Seleccionamos los mejores materiales y cuidamos cada detalle.</p>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="gradient-card gradient-info text-white p-4 rounded h-100 text-center">
                        <i class="fas fa-lightbulb fa-2x mb-3"></i>
                        <h5>Creatividad</h5>
                        <p>Impulsamos la innovación en cada diseño personalizado.</p>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="gradient-card gradient-danger text-white p-4 rounded h-100 text-center">
                        <i class="fas fa-handshake fa-2x mb-3"></i>
                        <h5>Compromiso</h5>
                        <p>Cumplimos con tiempos de entrega y garantizamos satisfacción.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-dark text-white py-5 text-center">
        <div class="container">
            <h3 class="mb-3">¿Listo para crear tu polo personalizado?</h3>
            <a href="{{ route('design.index') }}" class="btn btn-primary btn-lg px-5">
                Personaliza Ahora
            </a>
        </div>
    </section>

</div>

@endsection