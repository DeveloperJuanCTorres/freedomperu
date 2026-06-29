<div class="card shadow-sm rounded-4 border-0 mb-4">

    <div class="card-header bg-white border-0 pt-4 px-4">

        <h4 class="fw-bold mb-1">

            <i class="fas fa-truck text-primary me-2"></i>

            Método de Entrega

        </h4>

        <small class="text-muted">

            Selecciona cómo deseas recibir tu pedido.

        </small>

    </div>

    <div class="card-body p-4">

        <div class="row g-3">

            <!-- Delivery -->

            <div class="col-md-6">

                <label class="delivery-card">

                    <input
                        type="radio"
                        name="shipping_method"
                        value="delivery"
                        checked>

                    <div class="delivery-content">

                        <i class="fas fa-truck fa-2x mb-3 text-primary"></i>

                        <h5 class="fw-bold">

                            Delivery

                        </h5>

                        <p class="text-muted small mb-0">

                            Recibe tu pedido en la dirección indicada.

                        </p>

                    </div>

                </label>

            </div>

            <!-- Recojo -->

            <div class="col-md-6">

                <label class="delivery-card">

                    <input
                        type="radio"
                        name="shipping_method"
                        value="pickup">

                    <div class="delivery-content">

                        <i class="fas fa-store fa-2x mb-3 text-success"></i>

                        <h5 class="fw-bold">

                            Recojo en Tienda

                        </h5>

                        <p class="text-muted small mb-0">

                            Recoge tu pedido sin costo de envío.

                        </p>

                    </div>

                </label>

            </div>

        </div>

        <!-- Información dinámica -->

        <div
            class="alert alert-light border mt-4 mb-0"
            id="shippingInfo">

            <i class="fas fa-info-circle text-primary me-2"></i>

            El costo del envío se calculará según el distrito seleccionado.

        </div>

    </div>

</div>

<div class="card shadow-sm rounded-4 border-0 mb-4">

    <div class="card-header bg-white border-0 pt-4 px-4">

        <h4 class="fw-bold mb-1">

            <i class="fas fa-map-marker-alt text-primary me-2"></i>

            Dirección de Entrega

        </h4>

        <small class="text-muted">

            Indica dónde deseas recibir tu pedido.

        </small>

    </div>

    <div class="card-body p-4">

        <div class="row">

            <!-- Departamento -->

            <div class="col-md-4 mb-4">

                <label class="form-label fw-semibold">

                    Departamento

                </label>

                <select
                    name="department"
                    id="department"
                    class="form-select form-select-lg">

                    <option value="">Seleccione...</option>

                </select>

            </div>

            <!-- Provincia -->

            <div class="col-md-4 mb-4">

                <label class="form-label fw-semibold">

                    Provincia

                </label>

                <select
                    name="province"
                    id="province"
                    class="form-select form-select-lg"
                    disabled>

                    <option value="">Seleccione...</option>

                </select>

            </div>

            <!-- Distrito -->

            <div class="col-md-4 mb-4">

                <label class="form-label fw-semibold">

                    Distrito

                </label>

                <select
                    name="district"
                    id="district"
                    class="form-select form-select-lg"
                    disabled>

                    <option value="">Seleccione...</option>

                </select>

            </div>

            <!-- Dirección -->

            <div class="col-12 mb-4">

                <label class="form-label fw-semibold">

                    Dirección

                </label>

                <input
                    type="text"
                    name="address"
                    class="form-control form-control-lg"
                    placeholder="Av., Calle, Jr., Número">

            </div>

            <!-- Referencia -->

            <div class="col-12 mb-4">

                <label class="form-label fw-semibold">

                    Referencia

                </label>

                <textarea
                    name="reference"
                    rows="3"
                    class="form-control"
                    placeholder="Ejemplo: Frente al parque, edificio azul, tercer piso..."></textarea>

            </div>

        </div>

    </div>

</div>


