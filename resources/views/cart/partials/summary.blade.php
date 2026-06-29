<div class="card border-0 shadow-sm rounded-4 summary-card sticky-top"
     style="top:100px;">

    <div class="card-body p-4">

        <h4 class="fw-bold mb-4">

            Resumen del Pedido

        </h4>

        {{-- Cupón --}}

        <div class="mb-4">

            <label class="form-label fw-semibold">

                ¿Tienes un cupón?

            </label>

            <div class="input-group">

                <input
                    type="text"
                    class="form-control rounded-start-pill"
                    placeholder="Código">

                <button
                    class="btn btn-outline-dark rounded-end-pill">

                    Aplicar

                </button>

            </div>

        </div>

        <hr>

        <div class="d-flex justify-content-between mb-3">

            <span class="text-muted">

                Productos

            </span>

            <strong>

                {{ Cart::getTotalQuantity() }}

            </strong>

        </div>

        <div class="d-flex justify-content-between mb-3">

            <span class="text-muted">

                Subtotal

            </span>

            <strong>

                S/ {{ number_format(Cart::getSubTotal(),2) }}

            </strong>

        </div>

        <div class="d-flex justify-content-between mb-3">

            <span class="text-muted">

                Descuento

            </span>

            <strong class="text-success">

                S/ 0.00

            </strong>

        </div>

        <div class="d-flex justify-content-between mb-4">

            <span class="text-muted">

                Envío

            </span>

            <span>

                Se calculará

            </span>

        </div>

        <hr>

        <div class="d-flex justify-content-between align-items-center mb-4">

            <span class="h4 fw-bold">

                Total

            </span>

            <span class="summary-total">

                S/ {{ number_format(Cart::getTotal(),2) }}

            </span>

        </div>

        <div class="summary-benefits mb-4">

            <div class="item">

                <i class="fas fa-shield-alt"></i>

                Pago 100% seguro

            </div>

            <div class="item">

                <i class="fas fa-truck"></i>

                Envíos a todo el Perú

            </div>

            <div class="item">

                <i class="fas fa-check-circle"></i>

                Productos personalizados

            </div>

            <div class="item">

                <i class="fas fa-headset"></i>

                Soporte personalizado

            </div>

        </div>

        <a
            href="{{ route('checkout.index') }}"
            class="btn btn-checkout">

            Continuar al Pago

        </a>

        <a
            href="{{ route('shop.index') }}"
            class="btn btn-shopping btn-outline-dark mt-3">

            Seguir Comprando

        </a>

    </div>

</div>