<div class="card shadow-sm rounded-4 border-0 mb-4">

    <div class="card-header bg-white border-0 pt-4 px-4">

        <h4 class="fw-bold mb-1">

            <i class="fas fa-credit-card text-primary me-2"></i>

            Método de Pago

        </h4>

        <small class="text-muted">

            Selecciona cómo deseas pagar tu pedido.

        </small>

    </div>

    <div class="card-body p-4">

        <div class="row g-3">

            <!-- Yape -->

            <div class="col-md-6">

                <label class="payment-card">

                    <input
                        type="radio"
                        name="payment_method"
                        value="yape"
                        checked>

                    <div class="payment-content">

                        <img
                            src="{{ asset('images/payments/yape.png') }}"
                            height="45"
                            class="mb-3">

                        <h5 class="fw-bold">

                            Yape

                        </h5>

                        <p class="text-muted small mb-0">

                            Pago mediante código QR.

                        </p>

                    </div>

                </label>

            </div>

            <!-- Plin -->

            <div class="col-md-6">

                <label class="payment-card">

                    <input
                        type="radio"
                        name="payment_method"
                        value="plin">

                    <div class="payment-content">

                        <img
                            src="{{ asset('images/payments/plin.png') }}"
                            height="45"
                            class="mb-3">

                        <h5 class="fw-bold">

                            Plin

                        </h5>

                        <p class="text-muted small mb-0">

                            Transferencia inmediata.

                        </p>

                    </div>

                </label>

            </div>

            <!-- Tarjeta -->

            <div class="col-md-6">

                <label class="payment-card">

                    <input
                        type="radio"
                        name="payment_method"
                        value="card">

                    <div class="payment-content">

                        <i class="far fa-credit-card fa-3x text-primary mb-3"></i>

                        <h5 class="fw-bold">

                            Tarjeta

                        </h5>

                        <p class="text-muted small mb-0">

                            Visa, Mastercard y más.

                        </p>

                    </div>

                </label>

            </div>

            <!-- Transferencia -->

            <div class="col-md-6">

                <label class="payment-card">

                    <input
                        type="radio"
                        name="payment_method"
                        value="bank">

                    <div class="payment-content">

                        <i class="fas fa-university fa-3x text-success mb-3"></i>

                        <h5 class="fw-bold">

                            Transferencia

                        </h5>

                        <p class="text-muted small mb-0">

                            BCP, BBVA, Interbank, Scotiabank.

                        </p>

                    </div>

                </label>

            </div>

        </div>

        <div class="alert alert-info mt-4 mb-0">

            <i class="fas fa-lock me-2"></i>

            Todos los pagos son procesados de forma segura.

        </div>

    </div>

</div>