@extends('layouts.app')

@section('title','Carrito de Compras')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@section('content')

<!-- ===========================
BANNER
============================ -->
<section class="cart-header">

    <div class="container">

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb mb-3">

                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">
                        Inicio
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    Carrito
                </li>

            </ol>

        </nav>

        <h1 class="fw-bold mb-2">

            <i class="fas fa-shopping-bag me-2 text-primary"></i>

            Carrito de Compras

        </h1>

        <p class="text-muted mb-0">

            Revisa tus productos antes de continuar con el pago.

        </p>

    </div>

</section>


<!-- ===========================
CONTENIDO
============================ -->

<section class="py-5">

    <div class="container">

        <div class="row g-5">

            <!-- =======================
            PRODUCTOS
            ======================== -->

            <div class="col-lg-8">

                <div class="card shadow-sm border-0 rounded-4">

                    <div class="card-body p-lg-4">

                        <div class="d-flex justify-content-between align-items-center mb-4">

                            <h4 class="fw-bold mb-0">

                                Productos

                            </h4>

                            <span class="badge bg-dark rounded-pill px-3 py-2">

                                {{ Cart::getTotalQuantity() }} artículos

                            </span>

                        </div>

                        <div id="cartItems">

                            @include('cart.partials.items')

                        </div>

                    </div>

                </div>

            </div>

            <!-- =======================
            RESUMEN
            (Parte 2)
            ======================== -->

            <div class="col-lg-4">

                <div id="cartSummary">

                    @include('cart.partials.summary')

                </div>

            </div>

        </div>

    </div>

</section>

@endsection