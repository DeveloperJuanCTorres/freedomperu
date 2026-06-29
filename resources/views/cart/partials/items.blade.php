@forelse(Cart::getContent() as $item)

<div class="cart-item py-4 border-bottom">

    <div class="row align-items-center">

        <!-- Imagen -->

        <div class="col-4 col-md-2">

            <img
                src="{{ asset('storage/'.$item->attributes->image) }}"
                class="img-fluid rounded-3 border"
                style="aspect-ratio:1/1;object-fit:cover;">

        </div>

        <!-- Información -->

        <div class="col-8 col-md-5">

            <h5 class="fw-bold mb-2">

                {{ $item->name }}

            </h5>

            @if(isset($item->attributes->size))

            <div class="small text-muted mb-2">

                Talla:

                <strong>

                    {{ $item->attributes->size }}

                </strong>

            </div>

            @endif

            <div class="small text-muted mb-2">

                Color

                <span
                    class="ms-2 rounded-circle border d-inline-block"
                    style="
                                            width:18px;
                                            height:18px;
                                            background:{{ $item->attributes->color }};
                                            vertical-align:middle;">
                </span>

            </div>

            <div class="text-muted">

                S/

                {{ number_format($item->price,2) }}

            </div>

        </div>

        <!-- Cantidad -->

        <div class="col-md-3 mt-4 mt-md-0">

            <div
                class="quantity-group"
                data-id="{{ $item->id }}">

                <button
                    class="btn btn-light quantity-minus">

                    <i class="fas fa-minus"></i>

                </button>

                <input
                    type="text"
                    class="form-control text-center quantity-input"
                    value="{{ $item->quantity }}"
                    readonly>

                <button
                    class="btn btn-light quantity-plus">

                    <i class="fas fa-plus"></i>

                </button>

            </div>

        </div>

        <!-- Total -->

        <div class="col-md-2 text-md-end mt-4 mt-md-0">

            <div
                class="fw-bold fs-5 mb-3">

                S/

                {{ number_format($item->price*$item->quantity,2) }}

            </div>

            <button
                class="btn btn-link text-danger p-0 remove-cart"
                data-id="{{ $item->id }}">

                <i class="fas fa-trash me-1"></i>

                Eliminar

            </button>

        </div>

    </div>

</div>

@empty

<div class="text-center py-5">

    <img
        src="{{ asset('images/empty-cart.svg') }}"
        style="max-width:220px"
        class="mb-4">

    <h3 class="fw-bold">

        Tu carrito está vacío

    </h3>

    <p class="text-muted">

        Parece que todavía no agregaste ningún producto.

    </p>

    <a
        href="{{ route('shop.index') }}"
        class="btn btn-dark rounded-pill px-5">

        <i class="fas fa-store me-2"></i>

        Ir a la tienda

    </a>

</div>

@endforelse