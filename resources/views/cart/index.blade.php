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

                        @if(Cart::getTotalQuantity() > 0)

                        <button 
                            id="clear-cart"
                            class="btn btn-outline-danger btn-sm mb-3">

                            <i class="fas fa-trash"></i>
                            Vaciar carrito

                        </button>

                        @endif

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


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    function refreshCart(data)
    {
        document.getElementById('cartItems').innerHTML = data.cart;

        document.getElementById('cartSummary').innerHTML = data.summary;


        const cartCount = document.getElementById('cart-count');

        if(cartCount){
            cartCount.textContent = data.count;
        }
    }

    document.addEventListener('click', function(e){

        // Aumentar cantidad

        const plus = e.target.closest('.quantity-plus');

        if(plus){

            let group = plus.closest('.quantity-group');

            updateQuantity(
                group.dataset.id,
                1
            );

        }

        // Disminuir cantidad

        const minus = e.target.closest('.quantity-minus');

        if(minus){

            let group = minus.closest('.quantity-group');

            updateQuantity(
                group.dataset.id,
                -1
            );

        }

        // Eliminar producto

        const remove = e.target.closest('.remove-cart');

        if(remove){

            fetch("{{ route('cart.remove') }}",{

                method:"POST",

                headers:{

                    "Content-Type":"application/json",

                    "X-CSRF-TOKEN":"{{ csrf_token() }}"

                },

                body:JSON.stringify({

                    id:remove.dataset.id

                })

            })
            .then(res=>res.json())
            .then(data=>{

                refreshCart(data);

            });


        }
    });

    function updateQuantity(id,action)
    {

        fetch("{{ route('cart.update') }}",{

            method:"POST",

            headers:{

                "Content-Type":"application/json",

                "X-CSRF-TOKEN":"{{ csrf_token() }}"

            },

            body:JSON.stringify({

                id:id,

                action:action

            })

        })
        .then(res=>res.json())
        .then(data=>{

            refreshCart(data);

        });
    }

    document.addEventListener('click', function(e){
        const clear = e.target.closest('#clear-cart');

        if(clear){

            Swal.fire({

                title: '¿Vaciar carrito?',
                text: 'Se eliminarán todos los productos',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, vaciar',
                cancelButtonText: 'Cancelar'

            }).then((result)=>{

                if(result.isConfirmed){

                    fetch("{{ route('cart.clear') }}",{

                        method:"POST",
                        headers:{
                            "Content-Type":"application/json",
                            "X-CSRF-TOKEN":"{{ csrf_token() }}"
                        }
                    })
                    .then(response=>response.json())
                    .then(data=>{
                        refreshCart(data);
                    });
                }
            });
        }
    });

</script>

@endsection