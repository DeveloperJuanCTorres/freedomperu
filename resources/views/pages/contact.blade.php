@extends('layouts.app')

<style>
    :root {
        --primary-color: #1f0a34;
        --secondary-color: #984800;
        --surface-color: #fdf8fd;
        --on-surface: #1c1b1f;
        --on-surface-variant: #4a454d;
        --outline-color: #7b757e;
        --border-radius-custom: 0.125rem;
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--surface-color);
        color: var(--on-surface);
        overflow-x: hidden;
    }

    h1,
    h2,
    h3,
    h4,
    .navbar-brand {
        font-family: 'Manrope', sans-serif;
        font-weight: 800;
    }

    /* Navbar Custom Styles */
    .navbar {
        background-color: rgba(253, 248, 253, 0.9) !important;
        backdrop-filter: blur(20px);
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        padding: 1.25rem 0;
    }

    .navbar-brand {
        letter-spacing: -1px;
        font-size: 1.5rem;
        color: var(--primary-color) !important;
    }

  

    /* Hero Section */
    .hero-contact {
        background: linear-gradient(rgba(31, 10, 52, 0.85), rgba(31, 10, 52, 0.85)), url('https://lh3.googleusercontent.com/aida-public/AB6AXuAO-yQW99dWQ1jpjNmf3alB6SPGFjM7xe7WkkXa-ww4IJ5zAxCg4PFJy6G-hAlqieJJizSrsH7Owige5BQvbeGYptYUntY6oqFSv53NVvi-lUe-dLDEIfaxJxd9-0SKI37feU_jIe6ivcxMrhYUrN3H5VmIsMUoZg62Ru1FU2Lc5S3duY6vvkmPTrLg7VD9NwkEbRTKSO0N4rulcxSh0JDet7Tp6ujHbUpB1z_wRDJUB_UvVKtU8dqjs_9yHwfMNDIgMAA-GVx0Ow');
        background-size: cover;
        background-position: center;
        height: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        clip-path: polygon(0 0, 100% 0, 100% 85%, 0% 100%);
        /* margin-bottom: 4rem; */
    }

    /* Form Visibility & Aesthetics */
    .form-control,
    .form-select {
        border: 1px solid var(--outline-color);
        border-radius: var(--border-radius-custom);
        padding: 0.75rem 1rem;
        background-color: #ffffff;
        transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(31, 10, 52, 0.05);
        background-color: #fff;
    }

    label {
        font-weight: 600;
        font-size: 0.85rem;
        margin-bottom: 0.5rem;
        color: var(--primary-color);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Premium Button */
    .btn-premium {
        background-color: var(--primary-color) !important;
        color: white !important;
        padding: 1rem 2.5rem !important;
        font-weight: 700 !important;
        border-radius: var(--border-radius-custom) !important;
        border: none !important;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
        text-transform: uppercase !important;
        letter-spacing: 1px !important;
        position: relative !important;
        overflow: hidden !important;
        display: inline-flex !important;
        align-items: center !important;
        gap: 10px !important;
    }

    .btn-premium:hover {
        background-color: #35204a !important;
        color: white !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 10px 20px rgba(31, 10, 52, 0.15) !important;
    }

    .btn-premium:active {
        transform: translateY(0) !important;
    }

    /* Contact Info Blocks */
    .info-card {
        display: flex;
        gap: 1.5rem;
        margin-bottom: 2.5rem;
    }

    .info-icon {
        width: 50px;
        height: 50px;
        background: var(--primary-color);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        border-radius: var(--border-radius-custom);
        flex-shrink: 0;
    }

    .info-content h4 {
        font-size: 1.1rem;
        margin-bottom: 0.25rem;
        color: var(--primary-color);
    }

    .info-content p {
        color: var(--on-surface-variant);
        line-height: 1.6;
        margin: 0;
    }

    /* Accordion Styles */
    .accordion-item {
        border: none;
        margin-bottom: 1rem;
        background-color: #fff;
        border-radius: var(--border-radius-custom) !important;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.02);
    }

    .accordion-button {
        font-weight: 700;
        color: var(--primary-color);
        background-color: #fff;
        padding: 1.5rem;
        border-radius: var(--border-radius-custom) !important;
    }

    .accordion-button:not(.collapsed) {
        background-color: #fff;
        color: var(--secondary-color);
        box-shadow: none;
    }

    .accordion-button:focus {
        box-shadow: none;
        border-color: rgba(31, 10, 52, 0.1);
    }

    .accordion-body {
        color: var(--on-surface-variant);
        padding: 0 1.5rem 1.5rem 1.5rem;
        line-height: 1.7;
    }

    /* Map styling */
    .map-container {
        height: 300px;
        border-radius: var(--border-radius-custom);
        overflow: hidden;
        filter: grayscale(1);
        transition: filter 0.5s ease;
        background: #eee;
    }

    .map-container:hover {
        filter: grayscale(0);
    }

    /* Offcanvas Customization */
    .offcanvas {
        background-color: var(--surface-color);
    }

    footer {
        background-color: #f1ecf2;
        /* padding: 5rem 0 3rem; */
        margin-top: 5rem;
    }
</style>

@section('title','Contáctanos')

@section('content')

<header class="hero-contact">
    <div class="container">
        <h1 class="display-3 mb-3">Ponte en Contacto</h1>
        <p class="lead max-width-600 mx-auto opacity-75">Elevamos la simplicidad a una forma de arte. Permítenos ayudarte a materializar tu visión única.</p>
    </div>
</header>

<div class="container my-5 pt-5">
    <div class="row g-5">
        <!-- Contact Information -->
        <div class="col-lg-5">
            <h2 class="h1 mb-5">Ubícanos</h2>
            <div class="info-card">
                <div class="info-icon"><i class="fa-solid fa-location-dot"></i></div>
                <div class="info-content">
                    <h4>Dirección</h4>
                    <p>Av. America 316 San Carlos - JLO<br />Chiclayo, Perú</p>
                </div>
            </div>
            <div class="info-card">
                <div class="info-icon"><i class="fa-solid fa-phone"></i></div>
                <div class="info-content">
                    <h4>Teléfono</h4>
                    <p>+51 976687566</p>
                </div>
            </div>
            <div class="info-card">
                <div class="info-icon"><i class="fa-solid fa-envelope"></i></div>
                <div class="info-content">
                    <h4>Email</h4>
                    <p>freedomperu2022@gmail.com</p>
                </div>
            </div>
            <div class="info-card">
                <div class="info-icon"><i class="fa-solid fa-clock"></i></div>
                <div class="info-content">
                    <h4>Horario</h4>
                    <p>Lunes a Viernes: 10:00 - 19:00<br />Sábados: 10:00 - 14:00</p>
                </div>
            </div>
            <div class="mt-5">
                <h4 class="mb-3 fs-6 fw-bold text-uppercase opacity-50">Síguenos</h4>
                <div class="d-flex gap-3">
                    <a class="btn btn-outline-dark rounded-circle d-flex align-items-center justify-content-center" href="https://www.instagram.com/freedomperu2022/" target="_blank" style="width: 45px; height: 45px;"><i class="fa-brands fa-instagram"></i></a>
                    <a class="btn btn-outline-dark rounded-circle d-flex align-items-center justify-content-center" href="https://www.facebook.com/Freedomperu" target="_blank" style="width: 45px; height: 45px;"><i class="fa-brands fa-facebook-f"></i></a>
                    <a class="btn btn-outline-dark rounded-circle d-flex align-items-center justify-content-center" href="https://www.tiktok.com/@freedomperu2022" target="_blank" style="width: 45px; height: 45px;"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>
            <!-- <div class="map-container mt-5 shadow-sm">
                <img alt="Ubicación Lima" class="w-100 h-100 object-fit-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBDgSAelP1hZZT_LiITb02B9TJVJ3j_ZN5fXo8TaP3Yx8NiD8H5TQMu_KfHnAlvcy7-ErCePfcLJFaQzlBl2sVBNJdVgCugc_fDoDQV4Qs6sxMXnrDyVde5I9eScf540pTNLnz-6gS1CmSvvNZcseoo4IMVMLqH757RS6FXrzqdwKpTUCeKjbZ9BqueQEpBVsbF2xrxlH8g6mu5lcotlqoiKnCyZX4IKvhDLUHeI35wXeinBRZQnR7nlOVuFQz-QkTc2R9CZA3ZXQ" />
            </div> -->
        </div>
        <!-- Contact Form -->
        <div class="col-lg-7">
            <div class="bg-white p-4 p-md-5 rounded shadow-sm border">
                <h3 class="mb-4 pb-2 border-bottom">Envíanos un mensaje</h3>
                <form action="#" class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label" for="name">Nombre Completo</label>
                        <input class="form-control" id="name" placeholder="Escribe tu nombre" required="" type="text" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" id="email" placeholder="nombre@ejemplo.com" required="" type="email" />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="subject">Asunto</label>
                        <select class="form-select" id="subject">
                            <option disabled="" selected="">Selecciona un motivo</option>
                            <option value="bespoke">Personalización Bespoke</option>
                            <option value="order">Estado de Pedido</option>
                            <option value="collab">Colaboraciones</option>
                            <option value="other">Otros</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="message">Mensaje</label>
                        <textarea class="form-control" id="message" placeholder="Cuéntanos sobre tu proyecto..." rows="5"></textarea>
                    </div>
                    <div class="col-12 text-end">
                        <button class="btn btn-premium" type="submit">
                            Enviar Mensaje <i class="fa-solid fa-arrow-right-long ms-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row g-5 pt-5">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.076772078941!2d-79.8438509252445!3d-6.760493193236141!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x904ceec554871813%3A0xd0b3503f63538f26!2sAm%C3%A9rica%20316%2C%20Jos%C3%A9%20Leonardo%20Ortiz%2014002!5e0!3m2!1ses!2spe!4v1782879148899!5m2!1ses!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
    </div>
</div>


<!-- FAQ Section -->
<!-- <section class="py-5" style="background-color: #f7f2f8;">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="h1">Preguntas Frecuentes</h2>
            <p class="text-muted">Todo lo que necesitas saber antes de empezar</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                  
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" data-bs-target="#collapseOne" data-bs-toggle="collapse" type="button">
                                ¿Cuánto tiempo toma la personalización bespoke?
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse show" data-bs-parent="#faqAccordion" id="collapseOne">
                            <div class="accordion-body">
                                Cada pieza bespoke requiere una atención meticulosa. El proceso de diseño y confección artesanal toma entre 10 a 15 días hábiles, garantizando que cada detalle cumpla con nuestros estándares de excelencia.
                            </div>
                        </div>
                    </div>
                  
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" data-bs-target="#collapseTwo" data-bs-toggle="collapse" type="button">
                                ¿Realizan envíos internacionales?
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse" data-bs-parent="#faqAccordion" id="collapseTwo">
                            <div class="accordion-body">
                                Sí, llevamos la libertad de nuestro atelier a cualquier parte del mundo a través de servicios de mensajería premium como DHL Express, asegurando que tu pedido llegue en perfectas condiciones.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" data-bs-target="#collapseThree" data-bs-toggle="collapse" type="button">
                                ¿Puedo visitar el atelier para una asesoría?
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse" data-bs-parent="#faqAccordion" id="collapseThree">
                            <div class="accordion-body">
                                Absolutamente. Te recomendamos agendar una cita previa a través de nuestro formulario o WhatsApp para brindarte una experiencia de personalización exclusiva y dedicada en nuestro estudio de San Isidro.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<script>
    document.addEventListener("click", function(e){

        const btn = e.target.closest(".remove-cart");

        if(!btn) return;

        const id = btn.dataset.id;

        fetch("{{ route('cart.remove') }}",{

            method:"POST",

            headers:{
                "Content-Type":"application/json",
                "X-CSRF-TOKEN":"{{ csrf_token() }}"
            },

            body:JSON.stringify({
                id:id
            })

        })
        .then(r=>r.json())
        .then(data=>{

            document.getElementById("cart-content").innerHTML = data.html;

            const cartCount = document.getElementById("cart-count");

            if(cartCount){
                cartCount.textContent = data.count;
            }

        });

    });
</script>

@endsection