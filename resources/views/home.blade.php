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
        @foreach($categories as $category)
        <div class="col-6 col-md-4 col-lg">
            <div class="category-card position-relative overflow-hidden rounded-4 shadow-sm h-100" style="transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); cursor: pointer; aspect-ratio: 3/4;">
                <img alt="{{ $category->name }}" class="w-100 h-100 object-fit-cover" src="{{ asset('storage/' . $category->image) }}" />
                <div class="position-absolute bottom-0 start-0 end-0 p-4 bg-black bg-opacity-10 backdrop-blur-md" style="backdrop-filter: blur(10px); background: linear-gradient(transparent, rgba(0,0,0,0.7));">
                    <h4 class="text-white h5 mb-0 fw-bold">{{ $category->name }}</h4>
                    <p class="text-white-50 small mb-0">Esenciales Premium</p>
                </div>
            </div>
        </div>
        @endforeach
        
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
         @foreach($products as $product)
        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
            <div class="product-card">
                <div class="product-img-container">
                    <canvas
                        id="canvas-product-{{ $product->id }}"
                        width="600"
                        height="700"
                        class="product-canvas d-flex m-auto"
                        data-shirt="{{ asset('images/polo-base.png') }}"
                        data-design="{{ asset('storage/'.$product->image) }}">
                    </canvas>

                    <button class="btn-add-cart">
                        <i class="fas fa-cart-plus"></i>
                    </button>

                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="h5 mb-1">{{ $product->name }}</h3>
                        <!-- <p class="text-muted small">{{ $product->description }}</p> -->
                        <div class="mt-2">
                            @foreach($colors as $color)

                                <span
                                    class="color-box"
                                    style="background: {{ $color->hex_code }}"
                                    data-product="{{ $product->id }}"
                                    data-color="{{ $color->hex_code }}">
                                </span>
                            @endforeach
                        </div>
                    </div>
                    <span class="fw-bold h5">S/ 89.00</span>
                </div>
            </div>
        </div>
        @endforeach
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



@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {

        let products = {};

        document.querySelectorAll(".product-canvas").forEach(canvasElement => {

            const productId = canvasElement.id.replace('canvas-product-', '');

            const canvas = new fabric.Canvas(canvasElement.id, {
                selection: false,
                enableRetinaScaling: true
            });

            const shirtPath = canvasElement.dataset.shirt;
            const designPath = canvasElement.dataset.design;

            fabric.Image.fromURL(shirtPath, function(shirt) {

                shirt.scaleToWidth(canvas.width);

                shirt.set({
                    left: 0,
                    top: 0,
                    selectable: false,
                    evented: false
                });

                // sombra suave
                shirt.shadow = new fabric.Shadow({
                    color: 'rgba(0,0,0,0.15)',
                    blur: 20,
                    offsetY: 8
                });

                canvas.add(shirt);
                canvas.sendToBack(shirt);

                // Color inicial aleatorio
                const colors = document.querySelectorAll(
                    `.color-box[data-product="${productId}"]`
                );

                if (colors.length) {

                    const randomColor =
                        colors[Math.floor(Math.random() * colors.length)]
                        .dataset.color;

                    shirt.filters = [
                        new fabric.Image.filters.BlendColor({
                            color: randomColor,
                            mode: 'multiply',
                            alpha: 1
                        })
                    ];

                    shirt.applyFilters();
                }

                fabric.Image.fromURL(designPath, function(design) {

                    // importante para calidad
                    design.set({
                        objectCaching: false,
                        selectable: false,
                        evented: false,
                        originX: 'center',
                        originY: 'center'
                    });

                    // tamaño proporcional
                    design.scaleToWidth(canvas.width * 0.32);

                    design.set({
                        left: canvas.width / 2,
                        top: canvas.height * 0.42
                    });

                    canvas.add(design);
                    canvas.bringToFront(design);

                    canvas.renderAll();

                    products[productId] = {
                        canvas,
                        shirt,
                        design
                    };

                }, {
                    crossOrigin: 'anonymous'
                });

            }, {
                crossOrigin: 'anonymous'
            });

        });

        // Cambio de color
        document.querySelectorAll(".color-box").forEach(colorBtn => {

            colorBtn.addEventListener("click", function() {

                const productId = this.dataset.product;
                const color = this.dataset.color;

                const item = products[productId];

                if (!item) return;

                item.shirt.filters = [
                    new fabric.Image.filters.BlendColor({
                        color: color,
                        mode: 'multiply',
                        alpha: 1
                    })
                ];

                item.shirt.applyFilters();

                item.canvas.renderAll();
            });

        });

    });
</script>


@endpush

@endsection