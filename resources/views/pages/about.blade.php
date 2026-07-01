@extends('layouts.app')

@section('title', 'Nosotros')

<style>
    :root {
        --primary: #1f0a34;
        --primary-light: #35204a;
        --secondary: #984800;
        --accent: #ff8e3b;
        --surface: #fdf8fd;
        --on-surface: #1c1b1f;
        --on-surface-variant: #4a454d;
        --outline-variant: #ccc4ce;
        --white: #fff;
        --transition-smooth: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1)
    }

    body {
        font-family: "Inter", sans-serif;
        background-color: var(--surface);
        color: var(--on-surface);
        overflow-x: hidden;
        -webkit-font-smoothing: antialiased
    }

    h1,
    h2,
    h3,
    h4,
    .font-headline {
        font-family: "Manrope", sans-serif;
        font-weight: 800;
        letter-spacing: -0.02em
    }


    /* Hero Section */
    .hero-section {
        padding: 180px 0 120px;
        background: linear-gradient(135deg, var(--primary) 0%, #11051d 100%);
        color: var(--white);
        position: relative;
        overflow: hidden
    }

    .hero-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url(https://lh3.googleusercontent.com/aida-public/AB6AXuAlEE2rb35InVYvCyKjWwirQrwX-_ai2vgO302jrOieQrdn751x7_viqRsjzsME30WapoSLRZDBH1dbwnnHKWVa8FKEEv09f5X-clo7tBh7LSKZubPgfvbv1X1pBEoCOY6etNZtvh7nfE7WUnRezoqBwW2_tj0yxHa1AvCMNsKSoYPoAInPVKSXrDQlJ08am4dqPHW7fCVGWGjpoFf2P1iFMyhwl1JhfGg7VlkB4uTDDf7d3GXbxmYsN1V_mZsrUDQC0rVuUFMoBQ);
        background-size: cover;
        background-position: center;
        opacity: 0.15;
        mix-blend-mode: overlay
    }

    .hero-label {
        color: var(--accent);
        text-transform: uppercase;
        letter-spacing: 0.3em;
        font-weight: 700;
        font-size: 0.85rem;
        display: block;
        margin-bottom: 1.5rem
    }

    .hero-title {
        font-size: clamp(2.5rem, 6vw, 5rem);
        line-height: 1.1;
        margin-bottom: 2rem
    }

    /* Essencia Cards */
    .card-essencia {
        border: none;
        background: var(--white);
        padding: 3rem 2rem;
        transition: var(--transition-smooth);
        height: 100%;
        border-bottom: 4px solid transparent
    }

    .card-essencia:hover {
        transform: translatey(-15px);
        box-shadow: 0 30px 60px rgba(31, 10, 52, 0.08);
        border-bottom-color: var(--secondary)
    }

    .card-essencia i {
        font-size: 2.5rem;
        color: var(--primary);
        margin-bottom: 1.5rem;
        display: block
    }

    /* Proceso Creativo */
    .process-row {
        position: relative;
        padding: 4rem 0
    }

    .process-step {
        text-align: center;
        position: relative;
        z-index: 1
    }

    .process-icon-wrapper {
        width: 100px;
        height: 100px;
        background: var(--primary);
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        font-size: 2rem;
        transition: var(--transition-smooth);
        border: 5px solid var(--surface);
        box-shadow: 0 0 0 1px var(--outline-variant)
    }

    .process-step:hover .process-icon-wrapper {
        background: var(--secondary);
        transform: scale(1.1)
    }

    /* Collective */
    .collective-member {
        position: relative;
        overflow: hidden;
        aspect-ratio: 4/5
    }

    .member-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: grayscale(100%);
        transition: var(--transition-smooth)
    }

    .member-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 2rem;
        background: linear-gradient(to top, rgba(31, 10, 52, 0.9) 0%, transparent 100%);
        color: var(--white);
        transform: translatey(20px);
        opacity: 0;
        transition: var(--transition-smooth)
    }

    .collective-member:hover .member-overlay {
        transform: translatey(0);
        opacity: 1
    }

    .collective-member:hover .member-img {
        filter: grayscale(0%);
        transform: scale(1.05)
    }

    /* Scroll Animations */
    .reveal {
        opacity: 0;
        transform: translatey(40px);
        transition: all 0.8s cubic-bezier(0.2, 0.8, 0.2, 1)
    }

    .reveal.visible {
        opacity: 1;
        transform: translatey(0)
    }

    /* Footer */
    footer {
        background-color: var(--primary);
        color: var(--white);
        /* padding: 80px 0 40px */
    }

    .footer-link {
        color: rgba(255, 255, 255, 0.6);
        text-decoration: none;
        transition: color 0.3s;
        font-size: 0.9rem
    }

    .footer-link:hover {
        color: var(--accent)
    }

    .newsletter-input {
        background: transparent;
        border: none;
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 0;
        color: white;
        padding: 10px 0;
        width: 100%
    }

    .newsletter-input:focus {
        outline: none;
        border-bottom-color: var(--accent)
    }

    @media (max-width: 991px) {
        .hero-section {
            padding: 140px 0 80px
        }

        .hero-title {
            font-size: 3rem
        }

        .process-row::before {
            display: none
        }
    }
</style>

@section('content')

<main>
    <!-- Hero Section -->
    <section class="hero-section text-center text-lg-start">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 reveal">
                    <span class="hero-label">Manifiesto Freedom</span>
                    <h1 class="hero-title font-headline">EXPRESA TU LIBERTAD A TRAVÉS DEL ESTILO.</h1>
                    <p class="lead mb-5 text-white-50">No somos una marca de ropa. Somos el lienzo para tu propia identidad. En un mundo de copias masivas, reclamamos el derecho a la singularidad radical.</p>
                    <div class="d-flex gap-3 justify-content-center justify-content-lg-start">
                        <a class="btn btn-light rounded-0 px-4 py-3 fw-bold" href="#">VER COLECCIONES</a>
                        <a class="btn btn-outline-light rounded-0 px-4 py-3 fw-bold" href="#">CREAR DISEÑO</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Nuestra Esencia -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="row text-center mb-5 reveal">
                <div class="col-lg-8 mx-auto">
                    <h2 class="display-5 font-headline mb-3">NUESTRA ESENCIA</h2>
                    <p class="text-muted">Combinamos la artesanía tradicional con la visión digital más avanzada.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4 reveal" style="transition-delay: 0.1s">
                    <div class="card-essencia text-center">
                        <i class="fa-solid fa-wand-magic-sparkles"></i>
                        <h3 class="h4 font-headline mb-3">DISEÑO ÚNICO</h3>
                        <p class="text-muted mb-0">Cada trazo es el reflejo de tu personalidad. Sin plantillas, sin límites, solo pura expresión creativa.</p>
                    </div>
                </div>
                <div class="col-md-4 reveal" style="transition-delay: 0.2s">
                    <div class="card-essencia text-center">
                        <i class="fa-solid fa-gem"></i>
                        <h3 class="h4 font-headline mb-3">CALIDAD PREMIUM</h3>
                        <p class="text-muted mb-0">Utilizamos algodón pima peruano de la más alta densidad y tintas ecológicas que perduran en el tiempo.</p>
                    </div>
                </div>
                <div class="col-md-4 reveal" style="transition-delay: 0.3s">
                    <div class="card-essencia text-center">
                        <i class="fa-solid fa-fingerprint"></i>
                        <h3 class="h4 font-headline mb-3">IDENTIDAD PROPIA</h3>
                        <p class="text-muted mb-0">Nuestras prendas son armas de distinción. Diseñadas por ti, confeccionadas por maestros para durar.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Proceso Creativo -->
    <section class="py-5 bg-surface border-top border-bottom">
        <div class="container py-5">
            <div class="row mb-5 reveal">
                <div class="col-12 text-center">
                    <h2 class="display-5 font-headline">EL PROCESO ALQUÍMICO</h2>
                    <p class="text-secondary fw-bold text-uppercase small tracking-widest">Del bit a la fibra</p>
                </div>
            </div>
            <div class="row process-row">
                <div class="col-lg-4 process-step reveal" style="transition-delay: 0.1s">
                    <div class="process-icon-wrapper">
                        <i class="fa-solid fa-desktop"></i>
                    </div>
                    <h4 class="font-headline h5">01. ARTE DIGITAL</h4>
                    <p class="text-muted px-lg-4">Tu visión se digitaliza con precisión milimétrica en nuestro entorno 3D de alta fidelidad.</p>
                </div>
                <div class="col-lg-4 process-step reveal" style="transition-delay: 0.2s">
                    <div class="process-icon-wrapper">
                        <i class="fa-solid fa-bolt"></i>
                    </div>
                    <h4 class="font-headline h5">02. LÁSER DE PRECISIÓN</h4>
                    <h4 class="font-headline h5"></h4>
                    <p class="text-muted px-lg-4">Transferimos el diseño mediante tecnología láser que respeta la integridad de cada fibra.</p>
                </div>
                <div class="col-lg-4 process-step reveal" style="transition-delay: 0.3s">
                    <div class="process-icon-wrapper">
                        <i class="fa-solid fa-hand-fist"></i>
                    </div>
                    <h4 class="font-headline h5">03. TOQUE MAESTRO</h4>
                    <p class="text-muted px-lg-4">Cada prenda recibe un acabado final a mano en nuestro atelier para garantizar la excelencia.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- The Collective -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="row align-items-end mb-5 reveal">
                <div class="col-md-6">
                    <h2 class="display-5 font-headline mb-0">THE COLLECTIVE</h2>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="text-muted mb-0">Las mentes disruptivas detrás de la personalización radical.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-6 col-lg-3 reveal" style="transition-delay: 0.1s">
                    <div class="collective-member">
                        <img alt="Architect" class="member-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDqtOa6RC1w2DoNzP-ShDM2U7yLssOx9v2teud8M4x4WL15zXdJIWhILf647UqnJxuyXH4cVk__XHyCsQOm8CdyPnUuN_Ge9ICPGVtP-7H_-ILmFBRNz1SlMUMpg9QQmCGWZ1N52MtqY8mRj8wg-fgTZfOp6RAlv6IyGaEkCqQ0cNjvZl8tlbWXeS7hoZdskoRuf4tBi2ZrKF_9vH-GkXZQkpzrvBilZWGxiJf8JlVH0UcweKxc-ZVeWou2yJOSQNpC_oJpC5LNoA" />
                        <div class="member-overlay">
                            <h5 class="mb-1 fw-bold">MARCUS R.</h5>
                            <p class="small mb-2 opacity-75">Lead Architect</p>
                            <div class="d-flex gap-2">
                                <a class="text-white small" href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a class="text-white small" href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 reveal" style="transition-delay: 0.2s">
                    <div class="collective-member">
                        <img alt="Alchemist" class="member-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCzUTbx0-LlpIvIV40-dpSVpcsrVQkIsSJXFGqGoEAfuMjJk5RyiWpn4tq9VKNVDiX4Jaot4sjJdrYFsAL28xPz4-0LPyKg0hT_Esl2X83T7tZHscGRLAF0rIJ_Lpr3XDbH-aIK9pnZ79_WC4APOvWHtAyQczXcYbvQNS30Kr_sMiaqhNrAR-a_gAIUnSS2eD_K3ziEob8_MbnhngPQzQ60-_1rcAQV9kpgOB-xEUYI8hFBru4vMCJl0uxaftmJfHcw9KE1wlXprw" />
                        <div class="member-overlay">
                            <h5 class="mb-1 fw-bold">ELENA V.</h5>
                            <p class="small mb-2 opacity-75">Textile Alchemist</p>
                            <div class="d-flex gap-2">
                                <a class="text-white small" href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a class="text-white small" href="#"><i class="fa-brands fa-behance"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 reveal" style="transition-delay: 0.3s">
                    <div class="collective-member">
                        <img alt="Visualizer" class="member-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBdowJiIxdoQuQW62oFNxerHkvrsnYFUaD2fGHyYDho2aQujQEv2EkivSFOaDbLMurP3OD-XHRGBtkBd6Xw2WbN7ki8fbzxb5PalGCAy2m4eBZP_NUmUeCYPfGY7pIwT2mQ-EbQJ2QCq78H72QzabdJ0jQyJ7YX0aQPrv_9F3QiOKM8ZcwwkqAF76D084mVXFl-ulwef4yHIugYQT86AioEZPK6ThjjFr_cpPThHWn37rMrh0upLeY3D1H4A1F2dmdQVfzMEt8E-g" />
                        <div class="member-overlay">
                            <h5 class="mb-1 fw-bold">JULIÁN M.</h5>
                            <p class="small mb-2 opacity-75">Digital Visualizer</p>
                            <div class="d-flex gap-2">
                                <a class="text-white small" href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a class="text-white small" href="#"><i class="fa-brands fa-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 reveal" style="transition-delay: 0.4s">
                    <div class="collective-member">
                        <img alt="Artisan" class="member-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBT41tlNQLGNGd19KiSdOR6y_orX0Lheg1UAgd1nK1h7muShc60CRDDUX8biKf2_wQ9wlLxq3pNvNHbmVuUP78P-jw5oqt6_tF4qsYm_qsTAHr-AF-E8qZSRCw0n36UBdMrMhilm9dR1jtuzUf27SJFfZdyvPawL0yykAhxGZMtrJEvIn7u-ol_-sSpMBumxCqyyBQg5XrUIvRJYvVRd9mzaFkRp0C3EHE2xc3Bm84-2eUl7jQnoM9qVlG7dRqrtDeFd_H3zNOSEg" />
                        <div class="member-overlay">
                            <h5 class="mb-1 fw-bold">SARA L.</h5>
                            <p class="small mb-2 opacity-75">Master Artisan</p>
                            <div class="d-flex gap-2">
                                <a class="text-white small" href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a class="text-white small" href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<script>
    // Reveal animation on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px"
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    // Navbar transparency on scroll
    window.addEventListener('scroll', () => {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.style.padding = '0.5rem 0';
            navbar.style.boxShadow = '0 10px 30px rgba(0,0,0,0.05)';
        } else {
            navbar.style.padding = '1rem 0';
            navbar.style.boxShadow = 'none';
        }
    });
</script>
@endsection