@extends('layouts.app')

@section('content')

<!-- HERO CAROUSEL -->
<section class="hero-section" style="padding-top: 80px;">
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
</section>



<!-- DISEÑOS DESTACADOS -->
<section class="featured-section py-5">
    <div class="container">

        <div class="section-header text-center">
            <h2>Diseños Destacados</h2>
            <p>Descubre nuestros diseños más populares</p>
        </div>

        <div class="row g-4">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-6">
                    <div class="design-card">
                        <img src="{{ asset('storage/'.$product->image) }}" alt="">
                        <div class="design-info">
                            <h5>{{ $product->name }}</h5>
                            <span>+ S/ {{ number_format($product->base_price,2) }}</span>
                        </div>
                        <a href="{{ route('design.show',$product->slug) }}" class="overlay-link"></a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>


<!-- PERSONALIZA TU POLO PRO -->
<section class="custom-section-pro">
    <div class="container">
        <div class="row align-items-center">

            <!-- PREVIEW VISUAL -->
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

            <!-- CONTENIDO -->
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
</section>



<!-- CATEGORÍAS -->
<div class="container">
    <div class="swiper categorySwiper py-4">
        
            <div class="swiper-wrapper">

                @foreach($categories as $category)
                    <div class="swiper-slide">
                        <div class="category-card-pro">
                            <img src="{{ asset('storage/'.$category->image) }}">
                            <div class="category-info">
                                <h5>{{ $category->name }}</h5>
                            </div>
                            <a href="{{ route('shop.index',['taxonomy'=>$category->slug]) }}"></a>
                        </div>
                    </div>
                @endforeach

            </div>
    </div>
</div>



<!-- SECCIÓN CONFIANZA -->
<section class="trust-section py-5">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-4">
                <i class="icon-box bi bi-truck"></i>
                <h5>Envíos Rápidos</h5>
            </div>
            <div class="col-md-4">
                <i class="icon-box bi bi-shield-check"></i>
                <h5>Pagos Seguros</h5>
            </div>
            <div class="col-md-4">
                <i class="icon-box bi bi-star"></i>
                <h5>Calidad Premium</h5>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container text-center">
        <h2>¿Listo para crear tu diseño?</h2>
        <p>Hazlo único. Hazlo tuyo.</p>
        <a href="{{ route('design.index') }}" class="btn-cta">
            Comenzar Ahora
        </a>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {

        new Swiper(".categorySwiper", {
            slidesPerView: 4,
            spaceBetween: 25,
            loop: true,
            autoplay: { delay: 3000 },
            breakpoints: {
                320: { slidesPerView: 1 },
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 4 }
            }
        });

        document.querySelectorAll('.color-options span').forEach(el => {
            el.addEventListener('click', function(){
                document.getElementById('shirtBase').style.backgroundColor =
                    this.dataset.color;
            });
        });

    });
</script>

<script>
document.querySelectorAll('.color-options-pro span').forEach(el => {
    el.addEventListener('click', function(){

        document.querySelectorAll('.color-options-pro span')
            .forEach(s => s.style.border = '3px solid transparent');

        this.style.border = '3px solid #fff';

        document.getElementById('shirtBase').style.filter =
            `drop-shadow(0 25px 40px rgba(0,0,0,0.4)) hue-rotate(0deg)`;

    });
});
</script>
@endpush

@endsection
