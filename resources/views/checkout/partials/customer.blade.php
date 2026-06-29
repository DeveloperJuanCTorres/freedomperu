<div class="card shadow-sm rounded-4 border-0 mb-4">

    <div class="card-header bg-white border-0 pt-4 px-4">

        <h4 class="fw-bold mb-1">

            <i class="fas fa-user-circle text-primary me-2"></i>

            Información del Cliente

        </h4>

        <small class="text-muted">

            Completa tus datos para generar el pedido.

        </small>

    </div>

    <div class="card-body p-4">

        <div class="row">

            <!-- Nombre -->

            <div class="col-md-6 mb-4">

                <label class="form-label fw-semibold">

                    Nombre

                </label>

                <input
                    type="text"
                    name="first_name"
                    class="form-control form-control-lg"
                    placeholder="Juan"
                    value="{{ old('first_name', auth()->user()->first_name ?? '') }}">

            </div>

            <!-- Apellidos -->

            <div class="col-md-6 mb-4">

                <label class="form-label fw-semibold">

                    Apellidos

                </label>

                <input
                    type="text"
                    name="last_name"
                    class="form-control form-control-lg"
                    placeholder="Pérez García"
                    value="{{ old('last_name', auth()->user()->last_name ?? '') }}">

            </div>

            <!-- Email -->

            <div class="col-md-6 mb-4">

                <label class="form-label fw-semibold">

                    Correo electrónico

                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control form-control-lg"
                    placeholder="correo@ejemplo.com"
                    value="{{ old('email', auth()->user()->email ?? '') }}">

            </div>

            <!-- Celular -->

            <div class="col-md-6 mb-4">

                <label class="form-label fw-semibold">

                    Celular

                </label>

                <input
                    type="text"
                    name="phone"
                    class="form-control form-control-lg"
                    placeholder="987654321"
                    value="{{ old('phone') }}">

            </div>

            <!-- Tipo Documento -->

            <div class="col-md-4 mb-4">

                <label class="form-label fw-semibold">

                    Documento

                </label>

                <select
                    class="form-select form-select-lg"
                    name="document_type">

                    <option value="dni">

                        DNI

                    </option>

                    <option value="ce">

                        Carnet de Extranjería

                    </option>

                    <option value="ruc">

                        RUC

                    </option>

                </select>

            </div>

            <!-- Número -->

            <div class="col-md-8 mb-4">

                <label class="form-label fw-semibold">

                    Número de documento

                </label>

                <input
                    type="text"
                    name="document_number"
                    class="form-control form-control-lg"
                    placeholder="Ingrese el número">

            </div>

            <!-- Comprobante -->

            <div class="col-md-6 mb-4">

                <label class="form-label fw-semibold">

                    Comprobante

                </label>

                <select
                    class="form-select form-select-lg"
                    name="voucher_type">

                    <option value="boleta">

                        Boleta

                    </option>

                    <option value="factura">

                        Factura

                    </option>

                </select>

            </div>

            <!-- Empresa -->

            <div class="col-md-6 mb-4" id="companyField" style="display:none;">

                <label class="form-label fw-semibold">

                    Razón Social

                </label>

                <input
                    type="text"
                    name="company_name"
                    class="form-control form-control-lg"
                    placeholder="Empresa SAC">

            </div>

            <!-- Observaciones -->

            <div class="col-12">

                <label class="form-label fw-semibold">

                    Observaciones (Opcional)

                </label>

                <textarea
                    class="form-control"
                    rows="4"
                    name="notes"
                    placeholder="Ejemplo: Entregar después de las 5:00 pm"></textarea>

            </div>

        </div>

    </div>

</div>

<script>

document.addEventListener("DOMContentLoaded",function(){

    const voucher=document.querySelector('[name="voucher_type"]');
    const company=document.getElementById("companyField");

    function toggleCompany(){

        if(voucher.value==="factura"){

            company.style.display="block";

        }else{

            company.style.display="none";

        }

    }

    voucher.addEventListener("change",toggleCompany);

    toggleCompany();

});

</script>