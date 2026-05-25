@extends('layouts.app')

@section('content')

<!-- Hero Carousel -->
<div class="carousel slide" data-bs-ride="carousel" id="heroCarousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img alt="Custom Hoodie" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDYl4OWqM_sH5H0c4ql6oovO4dJ9Rop2DSH_D8Y8wjMsgrfCct2J7ShNdu3xaeJ1mqbXvI0k82osc8METRSX3pBNnn4f24Lrk7O5wvKkqgFa1_TeQNRTHzDnQBxrL37jtLlCwGtGcvuhqZ0beng8Sxu0h5OlxoOiCp_SDMQBoa0W8ixlsLomqdbAzlWb0vAZv4FhBzs-XMNeFQ_N0GjKSKyCYh7ZVoo93n8sp8WS0Sc3YTMltAn4Vtdk_w_05WHpGcmIxrQGu__eg" />
            <div class="carousel-caption">
                <span class="hero-tagline">Colección Atelier 2024</span>
                <h1 class="hero-title text-white">Tu Libertad,<br /><span style="color: #ffb689;">Tu Diseño.</span></h1>
                <div class="d-flex gap-3">
                    <a href="{{ route('shop.index') }}"
                    class="btn btn-lg btn-hero-primary px-5 py-3">
                        Ver Colección
                    </a>

                    <a href="{{ route('design.index') }}"
                    class="btn btn-lg btn-hero-outline px-5 py-3">
                        Personalizar
                    </a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img alt="Custom Apparel" src="https://lh3.googleusercontent.com/aida-public/AB6AXuACr5nwviZL0r4rJLb85BsTUCnSH-IUnmYxLchAof5hVyNHgI3aloo0w5nncou4N-hOidsvIqk39dLCqISLOQ80Ba1oRqUJOuGxVeeRLU4TkEH3YbE3ZMK7EOLASX5D5FerLJ09JAF6ZXiJeSVf_P2cb9j3nVOIIxGDa3ryUk2NQt86rmdkhWXX-sstCEcjrcOPKr3lZLhL11NsA3tBRQRB37fnH5J-VkWJtRp-LIYGgj9BcxI1a8_3l-RGnmVkW9hf4rW06IwDEQ" />
            <div class="carousel-caption">
                <span class="hero-tagline">Esencia Urbana</span>
                <h1 class="hero-title text-white">Crea sin <span style="color: #ffb689;">Límites.</span></h1>
                <div class="d-flex gap-3">
                    <a href="{{ route('shop.index') }}"
                    class="btn btn-lg btn-hero-primary px-5 py-3">
                        Ver Colección
                    </a>

                    <a href="{{ route('design.index') }}"
                    class="btn btn-lg btn-hero-outline px-5 py-3">
                        Personalizar
                    </a>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#heroCarousel" type="button">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#heroCarousel" type="button">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
<!-- Categories -->
<div class="container py-4">
    <div class="text-center mb-5 mt-4">
        <h2 class="display-5 fw-bold mb-3">Categorías</h2>
        <p class="text-muted mx-auto" style="max-width: 600px;">Selecciona y crea una prenda única para tu look.</p>
    </div>
    <div class="row g-4">
        <div class="col-6 col-md-4 col-lg">
            <div class="category-card position-relative overflow-hidden rounded-4 shadow-sm h-100" style="transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); cursor: pointer; aspect-ratio: 3/4;"><img alt="Polos" class="w-100 h-100 object-fit-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCtrGB7_Ge8FI0z_3Med6ldRIkIaizkCAWIzUKoN_56iKyrjlLzVSIkHJ0P2gx7rMu7D_VWnTltBdrTtTQTfJQS-hWsJzc20_xPQYuMCoqmXmyYrWxAotq9vw44HzLX9sIEVetwPc0qZszIBcYnkkWQrfJIc6XefqiuHKrkyC0F1Rmz5KE_f1vxm_ZgKrkw1JMGA2Z3keT0itO3gZt7jK-JucgV5ei3ObviEvpPTZZWZAAt-gteSB40okl9OEf3jzXPzOjMpdXTPg" />
                <div class="position-absolute bottom-0 start-0 end-0 p-4 bg-black bg-opacity-10 backdrop-blur-md" style="backdrop-filter: blur(10px); background: linear-gradient(transparent, rgba(0,0,0,0.7));">
                    <h4 class="text-white h5 mb-0 fw-bold">Polos</h4>
                    <p class="text-white-50 small mb-0">Esenciales Premium</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg">
            <div class="category-card position-relative overflow-hidden rounded-4 shadow-sm h-100" style="transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); cursor: pointer; aspect-ratio: 3/4;"><img alt="Poleras" class="w-100 h-100 object-fit-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDCtveXnM3Y__m8DhfbGxbE8k59T8hVFCcdiVxjIt0tq1UcAilJ_WjCqJUt7sjSJzSWHi-JCoWmXK3eH6lY_iD5pPqB3KWHMqOV5BFxdWoMv_bRv9QGFCFgpOJHB8KqYlRLCt7JuDTApnSIFYagLs_OHG26JddTKF4dwsE-ICTU4Ym-Z753ghmaM8Y41rm7MbHS3QjmC5fxa0mfk8X1Zf3zWdfN7ibSjPWO1JsDpZy5-f9_aCi5IxE-ZlQXaLjlonHLL3rBS3q8Wg" />
                <div class="position-absolute bottom-0 start-0 end-0 p-4 bg-black bg-opacity-10 backdrop-blur-md" style="backdrop-filter: blur(10px); background: linear-gradient(transparent, rgba(0,0,0,0.7));">
                    <h4 class="text-white h5 mb-0 fw-bold">Poleras</h4>
                    <p class="text-white-50 small mb-0">Fleece &amp; Confort</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg">
            <div class="category-card position-relative overflow-hidden rounded-4 shadow-sm h-100" style="transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); cursor: pointer; aspect-ratio: 3/4;"><img alt="Llaveros" class="w-100 h-100 object-fit-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAZu5gfHQqzu0O4S8U389XvbitfrK4Vp_w95V0Lra9ZA5FePswf1nTOeZzq-AkLp3D4ycFIycayXJiEj2s1rhzvQbmPkLf4Aec5JQi8QRI4rGwfm-scZ7bohzZG1KgCI2Q96pcypkqsV7UssW1nDF30nbrZRV7GftRuuCoQdDxe_iN7SZ4sYC7lw16ISZMVVGrfLocejCA_fiZZnH3zGM4LyiokVpvEl3hgAd-nXeAnCqabuOLz6C1KNGUR1zzE71LeOf7JcqG2Eg" />
                <div class="position-absolute bottom-0 start-0 end-0 p-4 bg-black bg-opacity-10 backdrop-blur-md" style="backdrop-filter: blur(10px); background: linear-gradient(transparent, rgba(0,0,0,0.7));">
                    <h4 class="text-white h5 mb-0 fw-bold">Llaveros</h4>
                    <p class="text-white-50 small mb-0">Accesorios Únicos</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg">
            <div class="category-card position-relative overflow-hidden rounded-4 shadow-sm h-100" style="transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); cursor: pointer; aspect-ratio: 3/4;"><img alt="Gorras" class="w-100 h-100 object-fit-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBE-lI9RbKaCTaT94dkj8J6u3VAQ8Tm-6KjhNm2qgDa3eIIlBCI9ypcIE0iAPVkGuqjIqjpuGWueMcz8-00I3JS8VIOEfudY6djTnqQSC5AMoAa4sfPWT5C55ekREVd1DmFCUhwayd5kKL0xq7wu2TOelvwzRCZAMrVUiPoQZbJV03kvI68clhVd7jqDJGy7_x6lXhlwI_whOdj3x8vrgOyCRbRhD5EJJZveuVCq2VAFBNhRDiTFtcG107vAaeVBKjPjLX4ux4N_g" />
                <div class="position-absolute bottom-0 start-0 end-0 p-4 bg-black bg-opacity-10 backdrop-blur-md" style="backdrop-filter: blur(10px); background: linear-gradient(transparent, rgba(0,0,0,0.7));">
                    <h4 class="text-white h5 mb-0 fw-bold">Gorras</h4>
                    <p class="text-white-50 small mb-0">Streetwear Craft</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg">
            <div class="category-card position-relative overflow-hidden rounded-4 shadow-sm h-100" style="transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); cursor: pointer; aspect-ratio: 3/4;"><img alt="Tomatodo" class="w-100 h-100 object-fit-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDscQ5ObCBJk4tp1mkmW_rXYPdsukmIu8m5LqPJrVWCvm8FLI8IbVQw6VB0IHIJO4gpnY5rg31yFEck6-DQT24q1vloj94a-MGw83KlmcGyuS7l6bwy1fXq7LaBYbSywVz6oill5EqdHl-Z2NZT3hIqu6bYYD_rQp6Vsm8_NYzDQZY5hOf_In0uoo02rkQPuuD4PQHB_bI4SVsTb0RbKYlhK-jHWvZG6AktLGTSuQDs04YmNkhh28g1f9FUvCi10A5uK051RBfdIw" />
                <div class="position-absolute bottom-0 start-0 end-0 p-4 bg-black bg-opacity-10 backdrop-blur-md" style="backdrop-filter: blur(10px); background: linear-gradient(transparent, rgba(0,0,0,0.7));">
                    <h4 class="text-white h5 mb-0 fw-bold">Tomatodo</h4>
                    <p class="text-white-50 small mb-0">Estilo &amp; Hidratación</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Full-Width Featured Products Section -->
<section class="py-5 container-fluid">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <h2 class="display-6 fw-bold mb-0">Productos Destacados</h2>
                <p class="text-muted mt-2">La base perfecta para crear tu estilo.</p>
            </div>
            <a class="text-decoration-none fw-bold" href="#" style="color: var(--secondary-color);">Ver todo <i class="fas fa-arrow-right ms-2"></i></a>
        </div>
    </div>
    <div class="row g-4 px-4">
        <!-- CARD PERSONALIZAR -->
        <div class="col-12 col-sm-6 col-md-6 col-lg-4">

            <a href="{{ route('design.index') }}"
            class="text-decoration-none">

                <div class="product-card custom-design-card">

                    <!-- Imagen -->
                    <div class="product-img-container position-relative overflow-hidden">

                        <img
                            src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=900&q=80"
                            alt="Personaliza tu polo"
                            class="custom-product-img">

                        <!-- Overlay -->
                        <div class="custom-overlay">

                            <span class="custom-badge">
                                DISEÑA TU ESTILO
                            </span>

                            <h3 class="custom-title">
                                Crea tu<br>
                                propio diseño
                            </h3>

                            <p class="custom-text">
                                Personaliza polos, poleras y más con tu identidad.
                            </p>

                            <div class="custom-btn">
                                Personalizar Ahora
                                <i class="fas fa-arrow-right ms-2"></i>
                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>
        <!-- Product 1 -->
        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
            <div class="product-card">
                <div class="product-img-container">
                    <img alt="Polo Premium" id="img-prod-1" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD0L9bvgUaYIfcRAi_1GCOvQGGHk57YDoE8Sm6i1jT3fZJGaAAwq7d8IqVz7lzBt0TqRjupHiqLBhlw3If0OXDpHVJ3nTgiTjezwsUqnMG3qMRK8H4IbWxTND_iR8y6xLp8MxXUiwbzJWZa5rtNoWWrE5Z47UIy0XoHNdakRPpOeVOuPCuG2GzGcplz1qP-sEXZUDDQnUWdUslJvJpeUc27D0X4mq-V5LrYNoGijN8d-jwLgXdfUq6XyHBQsFR3vKcRglV-vKBl6A" />
                    <button class="btn-add-cart"><i class="fas fa-cart-plus"></i></button>
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="h5 mb-1">Polo Premium Atelier</h3>
                        <p class="text-muted small">100% Algodón Pima</p>
                        <div class="mt-2">
                            <span class="color-swatch" onclick="changeImg('img-prod-1', 'https://lh3.googleusercontent.com/aida-public/AB6AXuD0L9bvgUaYIfcRAi_1GCOvQGGHk57YDoE8Sm6i1jT3fZJGaAAwq7d8IqVz7lzBt0TqRjupHiqLBhlw3If0OXDpHVJ3nTgiTjezwsUqnMG3qMRK8H4IbWxTND_iR8y6xLp8MxXUiwbzJWZa5rtNoWWrE5Z47UIy0XoHNdakRPpOeVOuPCuG2GzGcplz1qP-sEXZUDDQnUWdUslJvJpeUc27D0X4mq-V5LrYNoGijN8d-jwLgXdfUq6XyHBQsFR3vKcRglV-vKBl6A')" style="background-color: #ffffff;"></span>
                            <span class="color-swatch" onclick="changeImg('img-prod-1', 'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?auto=format&amp;fit=crop&amp;q=80&amp;w=800')" style="background-color: #1f0a34;"></span>
                            <span class="color-swatch" style="background-color: #984800;"></span>
                        </div>
                    </div>
                    <span class="fw-bold h5">S/ 89.00</span>
                </div>
            </div>
        </div>
        <!-- Product 2 -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
            <div class="product-card">
                <div class="product-img-container">
                    <img alt="Polera Custom" id="img-prod-2" src="https://lh3.googleusercontent.com/aida-public/AB6AXuACr5nwviZL0r4rJLb85BsTUCnSH-IUnmYxLchAof5hVyNHgI3aloo0w5nncou4N-hOidsvIqk39dLCqISLOQ80Ba1oRqUJOuGxVeeRLU4TkEH3YbE3ZMK7EOLASX5D5FerLJ09JAF6ZXiJeSVf_P2cb9j3nVOIIxGDa3ryUk2NQt86rmdkhWXX-sstCEcjrcOPKr3lZLhL11NsA3tBRQRB37fnH5J-VkWJtRp-LIYGgj9BcxI1a8_3l-RGnmVkW9hf4rW06IwDEQ" />
                    <button class="btn-add-cart"><i class="fas fa-cart-plus"></i></button>
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="h5 mb-1">Polera Oversize Custom</h3>
                        <p class="text-muted small">Heavyweight Fleece</p>
                        <div class="mt-2">
                            <span class="color-swatch" style="background-color: #cbd5e1;"></span>
                            <span class="color-swatch" style="background-color: #000000;"></span>
                            <span class="color-swatch" style="background-color: #35204a;"></span>
                        </div>
                    </div>
                    <span class="fw-bold h5">S/ 149.00</span>
                </div>
            </div>
        </div>
        <!-- Product 3 -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
            <div class="product-card">
                <div class="product-img-container">
                    <img alt="Gorra Urban" id="img-prod-3" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC4btxm6XSMNRzzK2N3D-6wwtoQjQgjMRywAw_vyIhxnKbkGLS96XBaA5o-Y1WTd8o3_lk5nvf3TErN_iY7VB6cQ_Tibe_7PFzqexltE0-eGDzHlwyAJsKIEHpD4uUNUoC4eSzxC1yc8PU-va3bJvjxEodZjmzXMOY_euHV4bOpa7I5x4BmF5NIxLaEz4Ezw9M7MJQ1Mc0YiWdNbymfsLyCFjUMx_OAq_X0JbN_pivCJRworO4SjddexHYZcI9-H4vZFkMgNzc4Pg" />
                    <button class="btn-add-cart"><i class="fas fa-cart-plus"></i></button>
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="h5 mb-1">Gorra Urban Craft</h3>
                        <p class="text-muted small">Premium Canvas</p>
                        <div class="mt-2">
                            <span class="color-swatch" style="background-color: #000000;"></span>
                            <span class="color-swatch" style="background-color: #ffffff;"></span>
                            <span class="color-swatch" style="background-color: #f58634;"></span>
                        </div>
                    </div>
                    <span class="fw-bold h5">S/ 55.00</span>
                </div>
            </div>
        </div>
        <!-- Product 4 (Added for col-lg-3 layout) -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
            <div class="product-card">
                <div class="product-img-container">
                    <img alt="Tomatodo Custom" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDscQ5ObCBJk4tp1mkmW_rXYPdsukmIu8m5LqPJrVWCvm8FLI8IbVQw6VB0IHIJO4gpnY5rg31yFEck6-DQT24q1vloj94a-MGw83KlmcGyuS7l6bwy1fXq7LaBYbSywVz6oill5EqdHl-Z2NZT3hIqu6bYYD_rQp6Vsm8_NYzDQZY5hOf_In0uoo02rkQPuuD4PQHB_bI4SVsTb0RbKYlhK-jHWvZG6AktLGTSuQDs04YmNkhh28g1f9FUvCi10A5uK051RBfdIw" />
                    <button class="btn-add-cart"><i class="fas fa-cart-plus"></i></button>
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="h5 mb-1">Tomatodo Freedom</h3>
                        <p class="text-muted small">Acero Inoxidable</p>
                    </div>
                    <span class="fw-bold h5">S/ 45.00</span>
                </div>
            </div>
        </div>
        <!-- Product 5 -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
            <div class="product-card">
                <div class="product-img-container">
                    <img alt="Polera Custom" id="img-prod-2" src="https://lh3.googleusercontent.com/aida-public/AB6AXuACr5nwviZL0r4rJLb85BsTUCnSH-IUnmYxLchAof5hVyNHgI3aloo0w5nncou4N-hOidsvIqk39dLCqISLOQ80Ba1oRqUJOuGxVeeRLU4TkEH3YbE3ZMK7EOLASX5D5FerLJ09JAF6ZXiJeSVf_P2cb9j3nVOIIxGDa3ryUk2NQt86rmdkhWXX-sstCEcjrcOPKr3lZLhL11NsA3tBRQRB37fnH5J-VkWJtRp-LIYGgj9BcxI1a8_3l-RGnmVkW9hf4rW06IwDEQ" />
                    <button class="btn-add-cart"><i class="fas fa-cart-plus"></i></button>
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="h5 mb-1">Polera Oversize Custom</h3>
                        <p class="text-muted small">Heavyweight Fleece</p>
                        <div class="mt-2">
                            <span class="color-swatch" style="background-color: #cbd5e1;"></span>
                            <span class="color-swatch" style="background-color: #000000;"></span>
                            <span class="color-swatch" style="background-color: #35204a;"></span>
                        </div>
                    </div>
                    <span class="fw-bold h5">S/ 149.00</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Customization CTA -->
<section class="custom-cta-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h2 class="display-3 fw-bolder lh-1 mb-4">Diseña sin <br /><span style="color: #ffb689; font-style: italic;">límites.</span></h2>
                <p class="lead opacity-75 mb-5" style="max-width: 500px;">Nuestra herramienta de personalización 3D te permite visualizar cada detalle en tiempo real de tu diseño.</p>
                <div class="d-flex flex-column flex-md-row align-items-md-center gap-4">
                    <button class="btn btn-lg btn-warning fw-bold px-4 py-3 shadow-lg" style="background-color: var(--secondary-color); border: none; color: white;">
                        Diseñar Ahora <i class="fas fa-paint-brush ms-2"></i>
                    </button>
                    <div class="d-flex align-items-center gap-2">
                        <div class="d-flex -space-x-2">
                            <img alt="user" class="rounded-circle border border-2 border-dark" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCgsBT779-B1keCyaqG1kcBiJfYUbJwQ4zptIwwefA5w--6Y1-Iyq_HtYOgrG1GesPXCz0W8yQopYRzJcclHc427ULNG5nvXzDOnTkDB2_v0QcV--0Xoa7rda_DEbmOFnOrmKcOj00mtpOMTm25jmIBmjSq-NDfRmZuAk0I4OITSr-KPkLNnfrHbA3ZoTy79zLLU-ITMzllDtyh9muyfLEXaQ2e4aEctkkkH_RKq-Qb3OJbPJYGavarEnhJb-LuDPxEtaHbJB55cA" width="40" />
                            <img alt="user" class="rounded-circle border border-2 border-dark ms-n2" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCdvS6flnpM_HzlAgwXonEUPSHcdsYzcdOPKv3ZLWvpbpPwTTIVh9kawuQlFSm76i-aJzpFUn8fWm-cgpSV8tzzHNREvF54sMHaKZl63F7FGspNkh0-YJ53q_7Y12hrGEpjSmFJptF63yXAYMnPHZofAKQ9SJ9AVKKQAv0zDfK5MAXrJd2aJT-Ounkhdxlywl7yjFqB8caiK1DfQ6oGFEWgMHx3q0UJGuTetgMr-MFJEjIKtkHWiEKqYmVPYoh7r-2UrUaKN9067Q" width="40" />
                            <img alt="user" class="rounded-circle border border-2 border-dark ms-n2" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDoCG21DQ2SZv0RkN8hx2ju20EpSacINjUqGrdLicBAGUbrdBlMCDCVpNTmbIeFcTkjuOWuR8GXNOEznPltF1CZVRSfVijile_rcsSpyIc6EzpAUUwxVsJOuj8XN368Efb1lPm0S4kEIXuSIHLjaJXmy1PziBkZ3kxKyoMDKoDkagnFJVsmtjcuIYhv-YysXdHbXpSNWI5ECorhKcs4f6H2UZpLlkMF9wxp_mZOkJIVn5gMGttlqj9uglcN9ayWhboiiKldg6Zp8Q" width="40" />
                        </div>
                        <span class="small opacity-75 ms-2">Más de 5,000 diseños creados hoy</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="design-preview-container">
                    <!-- <div class="floating-badge">
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <span class="bg-success rounded-circle" style="width: 8px; height: 8px;"></span>
                            <span class="text-uppercase fw-bold" style="font-size: 0.6rem; letter-spacing: 1px;">En Vivo</span>
                        </div>
                        <span class="opacity-75">Cambiando color a: <span style="color: #ffb689;">Atelier Purple</span></span>
                    </div> -->
                    <div class="text-center position-relative">
                        <img alt="3D Customizer" class="img-fluid" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA1LoaOHovfArW3vANul0vvuxy2yvNmVASNU70KKosXCzfJ7HFafku7CxnDBgmu1Djq5QUeqlLdIxR6vx5BkQMJAd07HzYSH8c_2AMtVM1UrZhW5CweV8jP3RL3LfbX48Btm76Wdnb6oV4Dk8uTdwair2td6bYAkDZpVGNu7jKLOTqtUqUtn3vzPMIJJe3M-WFc6vUKIk_XdpOSQsSc_PIdd2wqshc0LjDqgOZd8S2noYWa8WAexvanIlgXbDhMUb-eCVb2ShO5Mg" />
                        <div class="position-absolute top-50 start-50 translate-middle border border-dashed border-warning opacity-50 rounded" style="width: 150px; height: 150px; display: flex; align-items: center; justify-content: center;">
                            <span class="badge bg-warning text-dark text-uppercase small">Área de estampado</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<!-- HERO CAROUSEL -->
<!-- <section class="hero-section" style="padding-top: 70px;">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">

            @foreach($banners as $key => $banner)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <div class="hero-slide"
                    style="background-image: url('{{ asset('storage/' . str_replace('\\', '/', $banner->image)) }}')">

                    <div class="hero-overlay"></div>

                    <div class="container hero-content">
                        <h1>{{ $banner->title }}</h1>
                        <p>{{ $banner->subtitle }}</p>

                        @if($banner->button_link)
                        <a href="{{ $banner->button_link }}" class="btn-hero">
                            {{ $banner->button_text ?? 'Explorar' }}
                        </a>
                        @endif
                    </div>

                </div>
            </div>
            @endforeach

        </div>
    </div>
</section> -->

{{-- TAXONOMIES --}}
<!-- <section class="shop-taxonomies">

    <div class="taxonomy-scroll">

        @foreach($categories as $taxonomy)
        <a href="{{ route('shop.index',['taxonomy'=>$taxonomy->id]) }}"
            class="taxonomy-item {{ request('taxonomy') == $taxonomy->id ? 'active' : '' }}">
            <div class="taxonomy-icon">
                <img src="{{ asset('storage/'.$taxonomy->image) }}">
            </div>
            <span>{{ $taxonomy->name }}</span>
        </a>
        @endforeach
    </div>
</section> -->

<!-- DISEÑOS DESTACADOS -->
<!-- <section class="featured-section py-5">
    <div class="container">

        <div class="section-header text-center">
            <h2>Diseños Destacados</h2>
            <p>Descubre nuestros diseños más populares</p>
        </div>

        <div class="row g-4">
            @foreach($products as $product)
            <div class="col-lg-4 mb-4">
                <div class="product-card">

                    <div class="product-image">
                        @if($product->taxonomies->contains('name','Poleras'))
                        <canvas
                            id="canvas-{{ $product->id }}"
                            width="420"
                            height="520"
                            style=" width: 100% !important; height: auto !important;"
                            data-image="{{ asset('images/polera_base_frontal.png') }}"
                            data-design="{{ asset('storage/'.$product->image) }}">
                        </canvas>
                        @else
                        <canvas
                            id="canvas-{{ $product->id }}"
                            width="400"
                            height="500"
                            data-image="{{ asset('images/polo_base_frontal.png') }}"
                            data-design="{{ asset('storage/'.$product->image) }}">
                        </canvas>
                        @endif
                    </div>

                    <div class="product-info">

                        <h6>{{ $product->name }}</h6>

                       
                        <div class="product-colors">
                            @foreach($colors as $color)

                            <span
                                class="color-box"
                                style="background: {{ $color->hex_code }}"
                                data-color="{{ $color->hex_code }}"
                                data-product="{{ $product->id }}">
                            </span>

                            @endforeach
                        </div>

                    </div>

                </div>
            </div>
            @endforeach
        </div>

    </div>
</section> -->


<!-- PERSONALIZA TU POLO PRO -->
<!-- <section class="custom-section-pro">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 text-center mb-5 mb-lg-0">
                <div class="custom-preview-pro">
                    <img id="shirtBase"
                        src="{{ asset('images/shirt-base.png') }}"
                        class="shirt-base">

                    <img id="designOverlay"
                        src="{{ asset('images/sample-design.png') }}"
                        class="design-overlay">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="custom-content-pro">
                    <span class="badge-custom">Personalización Premium</span>

                    <h2>Crea un Polo <br><strong>Único para Ti</strong></h2>

                    <p>
                        Elige colores, aplica diseños y visualiza tu creación
                        en tiempo real con calidad profesional.
                    </p>

                    <div class="color-options-pro">
                        <span data-color="#ffffff" style="background:#ffffff"></span>
                        <span data-color="#000000" style="background:#000000"></span>
                        <span data-color="#331E4F" style="background:#331E4F"></span>
                        <span data-color="#C0392B" style="background:#C0392B"></span>
                    </div>

                    <a href="{{ route('design.index') }}" class="btn-custom-pro">
                        Diseñar Ahora
                    </a>
                </div>
            </div>

        </div>
    </div>
</section> -->


@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {

        new Swiper(".categorySwiper", {
            slidesPerView: 4,
            spaceBetween: 25,
            loop: true,
            autoplay: {
                delay: 3000
            },
            breakpoints: {
                320: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 4
                }
            }
        });

        document.querySelectorAll('.color-options span').forEach(el => {
            el.addEventListener('click', function() {
                document.getElementById('shirtBase').style.backgroundColor =
                    this.dataset.color;
            });
        });

    });
</script>

<script>
    document.querySelectorAll('.color-options-pro span').forEach(el => {
        el.addEventListener('click', function() {

            document.querySelectorAll('.color-options-pro span')
                .forEach(s => s.style.border = '3px solid transparent');

            this.style.border = '3px solid #fff';

            document.getElementById('shirtBase').style.filter =
                `drop-shadow(0 25px 40px rgba(0,0,0,0.4)) hue-rotate(0deg)`;

        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        let canvases = {};

        document.querySelectorAll("canvas[id^='canvas-']").forEach(canvasEl => {

            let productId = canvasEl.id.replace("canvas-", "");
            let canvas = new fabric.Canvas(canvasEl.id, {
                selection: false
            });

            let shirtPath = canvasEl.dataset.image;
            let designPath = canvasEl.dataset.design;

            /* POLO BASE */

            fabric.Image.fromURL(shirtPath, function(shirt) {

                shirt.set({
                    left: 0,
                    top: 0,
                    selectable: false,
                    evented: false
                });

                shirt.scaleToWidth(canvas.width);

                canvas.add(shirt);
                canvas.sendToBack(shirt);

                /* ===== COLOR ALEATORIO ===== */

                let colors = document.querySelectorAll(
                    `.color-box[data-product="${productId}"]`
                );

                if (colors.length) {

                    let randomIndex = Math.floor(Math.random() * colors.length);
                    let randomColor = colors[randomIndex].dataset.color;

                    shirt.filters = [
                        new fabric.Image.filters.BlendColor({
                            color: randomColor,
                            mode: 'multiply',
                            alpha: 1
                        })
                    ];

                    shirt.applyFilters();
                }

                /* DISEÑO DEL PRODUCTO */

                if (designPath) {

                    fabric.Image.fromURL(designPath, function(design) {

                        design.scaleToWidth(160);

                        design.set({
                            left: canvas.width / 2,
                            top: canvas.height / 3.2,
                            originX: 'center',
                            originY: 'center',
                            selectable: true,
                            evented: false
                        });

                        canvas.add(design);
                        canvas.bringToFront(design);

                        canvas.renderAll();

                    });

                }

                canvases[productId] = {
                    canvas: canvas,
                    shirt: shirt
                };

                canvas.renderAll();

            });

        });

        /* CAMBIAR COLOR */

        document.querySelectorAll('.color-box').forEach(btn => {

            btn.addEventListener('click', function() {

                let productId = this.dataset.product;
                let color = this.dataset.color;

                let shirt = canvases[productId].shirt;
                let canvas = canvases[productId].canvas;

                shirt.filters = [
                    new fabric.Image.filters.BlendColor({
                        color: color,
                        mode: 'multiply',
                        alpha: 1
                    })
                ];

                shirt.applyFilters();
                canvas.renderAll();

            });

        });

    });
</script>
@endpush

@endsection