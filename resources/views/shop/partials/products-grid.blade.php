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
@foreach($products as $product)
<div class="col-12 col-sm-6 col-md-6 col-lg-4">
    <div class="product-card">
        <div class="product-img-container">
            <canvas
                id="canvas-product-{{ $product->id }}"
                width="2000"
                height="2600"
                class="product-canvas"
                data-shirt="{{ asset('images/polo_base_frontal.png') }}"
                data-design="{{ asset('storage/'.$product->image) }}">
            </canvas>

            <button class="btn-add-cart" data-product="{{ $product->id }}">
                <i class="fas fa-cart-plus"></i>
            </button>

        </div>
        <div class="d-flex justify-content-between px-4">
            <div>
                <h3 class="h5 mb-1">{{ $product->name }}</h3>
                <!-- <p class="text-muted small">{{ $product->description }}</p> -->
                <div class="mt-2">
                    @foreach($colors as $color)

                        <span
                            class="color-box"
                            style="background: {{ $color->hex_code }}"
                            data-product="{{ $product->id }}"
                            data-color="{{ $color->hex_code }}"
                            data-color-id="{{ $color->id }}">
                        </span>
                    @endforeach
                </div>
            </div>
            <span class="fw-bold h5">S/ {{ $product->base_price }}</span>
        </div>
    </div>
</div>
@endforeach