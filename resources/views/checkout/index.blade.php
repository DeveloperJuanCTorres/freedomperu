@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@endpush

@section('title','Checkout')

@section('content')

<!-- =========================================
HEADER
========================================== -->

<section class="cart-header">

    <div class="container">

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb mb-3">

                <li class="breadcrumb-item">

                    <a href="{{ route('home') }}">

                        Inicio

                    </a>

                </li>

                <li class="breadcrumb-item">

                    <a href="{{ route('cart.index') }}">

                        Carrito

                    </a>

                </li>

                <li class="breadcrumb-item active">

                    Checkout

                </li>

            </ol>

        </nav>

        <h1 class="fw-bold mb-2">

            <i class="fas fa-credit-card me-2 text-primary"></i>

            Finalizar Compra

        </h1>

        <p class="text-muted mb-0">

            Completa tu información para procesar tu pedido.

        </p>

    </div>

</section>



<!-- =========================================
CONTENIDO
========================================== -->

<section class="py-5">

    <div class="container">

        <form
            action="{{ route('orders.store') }}"
            method="POST"
            id="checkoutForm">

            @csrf

            <div class="row g-5">

                <!-- =======================
                FORMULARIOS
                ======================== -->

                <div class="col-lg-8">

                    <div class="checkout-left">

                        @include('checkout.partials.customer')

                        @include('checkout.partials.shipping')

                        @include('checkout.partials.payment')

                    </div>

                </div>

                <!-- =======================
                RESUMEN
                ======================== -->

                <div class="col-lg-4">

                    <div class="sticky-top"
                         style="top:100px;">

                        @include('checkout.partials.summary')

                    </div>

                </div>

            </div>

        </form>

    </div>

</section>

@endsection

@push('scripts')

<script src="{{ asset('js/checkout.js') }}"></script>

<script>
    $(document).ready(function () {

        function toggleDeliveryAddress() {

            let method = $('input[name="shipping_method"]:checked').val();

            if (method === 'delivery') {

                $('#deliveryAddressCard').stop(true, true).slideDown(300);

                $('#shippingInfo')
                    .html('<i class="fas fa-info-circle text-primary me-2"></i> El costo del envío se calculará según el distrito seleccionado.');

            } else {

                $('#deliveryAddressCard').stop(true, true).slideUp(300);

                $('#shippingInfo')
                    .html('<i class="fas fa-store text-success me-2"></i> Recogerás tu pedido en nuestra tienda. No se aplicarán costos de envío.');

            }

        }

        toggleDeliveryAddress();

        $('input[name="shipping_method"]').on('change', function () {
            toggleDeliveryAddress();
        });

    });

    function toggleDeliveryAddress() {

        let method = $('input[name="shipping_method"]:checked').val();

        if (method === 'delivery') {

            $('#deliveryAddressCard').slideDown(300);

        } else {

            $('#deliveryAddressCard').slideUp(300);

            $('#deliveryAddressCard')
                .find('input[type="text"], textarea')
                .val('');

            $('#deliveryAddressCard')
                .find('select')
                .prop('selectedIndex', 0);

        }

    }
</script>

@endpush