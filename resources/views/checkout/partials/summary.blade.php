<div class="card border-0 shadow-lg rounded-4 checkout-summary">

    <div class="card-body p-4">

        <h4 class="fw-bold mb-4">

            <i class="fas fa-shopping-bag text-primary me-2"></i>

            Resumen del Pedido

        </h4>

        {{-- Productos --}}

        <div class="checkout-products">

            @foreach(Cart::getContent() as $item)

                <div class="d-flex align-items-center mb-4">

                    <img
                        src="{{ asset('storage/'.$item->attributes->image) }}"
                        width="70"
                        height="70"
                        class="rounded-3 border"
                        style="object-fit:cover">

                    <div class="ms-3 flex-grow-1">

                        <h6 class="fw-bold mb-1">

                            {{ $item->name }}

                        </h6>

                        <small class="text-muted d-block">

                            Color:

                            <span
                                style="
                                width:15px;
                                height:15px;
                                border-radius:50%;
                                display:inline-block;
                                background:{{ $item->attributes->color }};
                                border:1px solid #ddd;">
                            </span>

                            {{ $item->attributes->color_name }}

                        </small>

                        <small class="text-muted">

                            Cantidad: {{ $item->quantity }}

                        </small>

                    </div>

                    <div class="text-end">

                        <strong>

                            S/

                            {{ number_format($item->price*$item->quantity,2) }}

                        </strong>

                    </div>

                </div>

            @endforeach

        </div>

        <hr>

        {{-- Cupón --}}

        <div class="mb-4">

            <label class="fw-semibold mb-2">

                Cupón de descuento

            </label>

            <div class="input-group">

                <input
                    class="form-control"
                    placeholder="Código">

                <button
                    class="btn btn-outline-primary">

                    Aplicar

                </button>

            </div>

        </div>

        <hr>

        {{-- Totales --}}

        <div class="d-flex justify-content-between mb-3">

            <span>

                Productos

            </span>

            <strong>

                {{ Cart::getTotalQuantity() }}

            </strong>

        </div>

        <div class="d-flex justify-content-between mb-3">

            <span>

                Subtotal

            </span>

            <strong>

                S/ {{ number_format(Cart::getSubTotal(),2) }}

            </strong>

        </div>

        <div class="d-flex justify-content-between mb-3">

            <span>

                Descuento

            </span>

            <strong class="text-success">

                S/ 0.00

            </strong>

        </div>

        <div class="d-flex justify-content-between mb-3">

            <span>

                Envío

            </span>

            <strong id="shippingCost">

                S/ 0.00

            </strong>

        </div>

        <hr>

        <div class="d-flex justify-content-between align-items-center mb-4">

            <span class="h5 fw-bold">

                Total

            </span>

            <span
                class="h3 fw-bold text-primary"
                id="checkoutTotal">

                S/ {{ number_format(Cart::getTotal(),2) }}

            </span>

        </div>

        <button
            class="btn btn-primary w-100 py-3 rounded-pill fw-bold">

            <i class="fas fa-lock me-2"></i>

            Confirmar Pedido

        </button>

        <div class="text-center mt-4">

            <small class="text-muted">

                Al confirmar aceptas nuestros términos y condiciones.

            </small>

        </div>

    </div>

</div>