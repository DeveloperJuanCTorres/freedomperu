<div class="flex-grow-1">

    @forelse(Cart::getContent() as $item)

        <div class="d-flex gap-3 mb-4 align-items-center pb-3 border-bottom">

            <img
                class="rounded"
                width="70"
                height="70"
                style="object-fit:cover"
                src="{{ asset('storage/'.$item->attributes->image) }}">

            <div class="flex-grow-1">

                <h6 class="mb-1 fw-bold">
                    {{ $item->name }}
                </h6>

                <small class="text-muted d-block">

                    Cantidad: {{ $item->quantity }}

                </small>

                <small class="text-muted d-block">

                    Color:
                    <span
                        style="
                        display:inline-block;
                        width:15px;
                        height:15px;
                        border-radius:50%;
                        background:{{ $item->attributes->color }};
                        border:1px solid #ddd;">
                    </span>

                </small>

                <p class="text-muted small mb-0">

                    S/ {{ number_format($item->price,2) }}

                </p>

            </div>

            <button
                class="btn btn-sm btn-light remove-cart"
                data-id="{{ $item->id }}">

                <i class="fa fa-trash"></i>

            </button>

        </div>

    @empty

        <div class="text-center py-5">

            <i class="fa fa-shopping-bag fa-3x text-muted mb-3"></i>

            <h6>Tu carrito está vacío</h6>

        </div>

    @endforelse

</div>

<div class="border-top pt-4">

    <div class="d-flex justify-content-between mb-2">

        <span class="text-muted">
            Subtotal
        </span>

        <span class="fw-bold">

            S/ {{ number_format(Cart::getSubTotal(),2) }}

        </span>

    </div>

    <div class="d-flex justify-content-between mb-4">

        <span class="h5 fw-bolder">

            Total

        </span>

        <span class="h5 fw-bolder text-primary">

            S/ {{ number_format(Cart::getTotal(),2) }}

        </span>

    </div>

    <a
        href="#"
        class="btn btn-dark w-100 py-3 fw-bold rounded-1"
        style="background:#1f0a34;">

        Finalizar Compra

    </a>

    <button
        class="btn btn-link w-100 mt-2 text-dark text-decoration-none small"
        data-bs-dismiss="offcanvas">

        Seguir comprando

    </button>

</div>