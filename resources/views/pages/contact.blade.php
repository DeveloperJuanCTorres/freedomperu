@extends('layouts.app')

@section('title','Contáctanos')

@section('content')

<div class="contact-page">

{{-- HERO --}}
<section class="contact-hero">

<div class="hero-content1">

<h1>Contáctanos</h1>

<p>
¿Tienes una idea para tu polo personalizado?
Nuestro equipo está listo para ayudarte.
</p>

</div>

</section>


{{-- INFO CONTACTO --}}
<section class="contact-info container">

<div class="row">

<div class="col-md-4">

<div class="contact-card">

<div class="icon">
<i class="fas fa-phone"></i>
</div>

<h5>Teléfono</h5>

<p>+51 999 999 999</p>

</div>

</div>


<div class="col-md-4">

<div class="contact-card">

<div class="icon">
<i class="fas fa-envelope"></i>
</div>

<h5>Email</h5>

<p>ventas@tutienda.com</p>

</div>

</div>


<div class="col-md-4">

<div class="contact-card">

<div class="icon">
<i class="fas fa-map-marker-alt"></i>
</div>

<h5>Ubicación</h5>

<p>Perú</p>

</div>

</div>

</div>

</section>



{{-- FORMULARIO --}}
<section class="contact-form-section container">

<div class="row">

<div class="col-lg-6">

<div class="contact-form-card">

<h3>Envíanos un mensaje</h3>

<form action="#" method="POST">

@csrf

<div class="form-group">

<label>Nombre</label>

<input type="text" class="form-control" name="name" required>

</div>

<div class="form-group">

<label>Email</label>

<input type="email" class="form-control" name="email" required>

</div>

<div class="form-group">

<label>Mensaje</label>

<textarea
class="form-control"
rows="5"
name="message"
required></textarea>

</div>

<button class="btn-send">

Enviar Mensaje

</button>

</form>

</div>

</div>



<div class="col-lg-6">

<div class="contact-map">

<iframe
src="https://www.google.com/maps?q=Peru&output=embed"
width="100%"
height="420"
style="border:0;"
allowfullscreen=""
loading="lazy">
</iframe>

</div>

</div>

</div>

</section>

</div>

@endsection