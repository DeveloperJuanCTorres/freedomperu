<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top py-3 custom-navbar-header">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" height="40">
        </a>

        <!-- Mobile Button -->
        <button class="navbar-toggler border-0 shadow-none"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#mobileMenu"
                aria-controls="mobileMenu">
            <i class="fas fa-bars text-white fs-3"></i>
        </button>

        <!-- Desktop Menu -->
        <div class="collapse navbar-collapse d-none d-lg-flex" id="navbarNav">

            <!-- Center Menu -->
            <ul class="navbar-nav mx-auto gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">
                        Inicio
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('shop.*') ? 'active' : '' }}"
                       href="{{ route('shop.index') }}">
                        Tienda
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('design.*') ? 'active' : '' }}"
                       href="{{ route('design.index') }}">
                        Personalizar
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                       href="{{ route('about') }}">
                        Nosotros
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                       href="{{ route('contact') }}">
                        Contacto
                    </a>
                </li>
            </ul>

            <!-- Search -->
            <div class="navbar-search">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Buscar productos...">
            </div>

        </div>
    </div>
</nav>

<!-- Offcanvas Mobile -->
<div class="offcanvas offcanvas-start custom-offcanvas"
     tabindex="-1"
     id="mobileMenu">

    <div class="offcanvas-header border-bottom border-light border-opacity-10">
        <h5 class="offcanvas-title fw-bold text-white">
            FREEDOM
        </h5>

        <button type="button"
                class="btn-close btn-close-white shadow-none"
                data-bs-dismiss="offcanvas">
        </button>
    </div>

    <div class="offcanvas-body d-flex flex-column">

        <!-- Search Mobile -->
        <div class="navbar-search mobile-search mb-4">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Buscar productos...">
        </div>

        <!-- Mobile Menu -->
        <ul class="navbar-nav gap-2">

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                   href="{{ route('home') }}">
                    <i class="fas fa-home me-2"></i> Inicio
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('shop.*') ? 'active' : '' }}"
                   href="{{ route('shop.index') }}">
                    <i class="fas fa-store me-2"></i> Tienda
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('design.*') ? 'active' : '' }}"
                   href="{{ route('design.index') }}">
                    <i class="fas fa-palette me-2"></i> Personalizar
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                   href="{{ route('about') }}">
                    <i class="fas fa-users me-2"></i> Nosotros
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                   href="{{ route('contact') }}">
                    <i class="fas fa-envelope me-2"></i> Contacto
                </a>
            </li>

        </ul>

    </div>
</div>



<!-- <button class="btn btn-primary position-fixed end-0 translate-middle-y shadow-lg d-flex align-items-center justify-content-center p-0" data-bs-target="#offcanvasCart" data-bs-toggle="offcanvas" style="top: 50%; width: 60px; height: 60px; border-radius: 20px 0 0 20px; z-index: 1050; background-color: #1f0a34; border: none;" type="button">
    <div class="position-relative"><i class="fas fa-shopping-cart fs-4 text-white"></i><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">2</span></div>
</button> -->

<!-- Floating Customizer Button -->
<button
    class="floating-custom-btn"
    type="button"
    data-bs-toggle="offcanvas"
    data-bs-target="#offcanvasCart">

    <div class="floating-custom-content">

        <!-- Icon -->
        <div class="floating-icon-wrapper">

            <i class="fas fa-shirt"></i>

            <span class="floating-badge">
                2
            </span>

        </div>

        <!-- Text -->
        <div class="floating-text d-none d-md-flex">
            <span class="small-text">Tus diseños</span>
            <span class="big-text">Personalizar</span>
        </div>

    </div>

</button>


<div aria-labelledby="offcanvasCartLabel" class="offcanvas offcanvas-end" id="offcanvasCart" tabindex="-1">
    <div class="offcanvas-header border-bottom py-4">
        <h5 class="offcanvas-title fw-bolder" id="offcanvasCartLabel">Tu Carrito</h5><button aria-label="Close" class="btn-close" data-bs-dismiss="offcanvas" type="button"></button>
    </div>
    <div class="offcanvas-body">
        <div class="d-flex flex-column h-100">
            <div class="flex-grow-1">
                <div class="d-flex gap-3 mb-4 align-items-center pb-3 border-bottom"><img class="rounded" height="70" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD0L9bvgUaYIfcRAi_1GCOvQGGHk57YDoE8Sm6i1jT3fZJGaAAwq7d8IqVz7lzBt0TqRjupHiqLBhlw3If0OXDpHVJ3nTgiTjezwsUqnMG3qMRK8H4IbWxTND_iR8y6xLp8MxXUiwbzJWZa5rtNoWWrE5Z47UIy0XoHNdakRPpOeVOuPCuG2GzGcplz1qP-sEXZUDDQnUWdUslJvJpeUc27D0X4mq-V5LrYNoGijN8d-jwLgXdfUq6XyHBQsFR3vKcRglV-vKBl6A" style="object-fit: cover;" width="70" />
                    <div>
                        <h6 class="mb-1 fw-bold">Polo Premium Atelier</h6>
                        <p class="text-muted small mb-0">S/ 89.00 x 1</p>
                    </div>
                </div>
                <div class="d-flex gap-3 mb-4 align-items-center pb-3 border-bottom"><img class="rounded" height="70" src="https://lh3.googleusercontent.com/aida-public/AB6AXuACr5nwviZL0r4rJLb85BsTUCnSH-IUnmYxLchAof5hVyNHgI3aloo0w5nncou4N-hOidsvIqk39dLCqISLOQ80Ba1oRqUJOuGxVeeRLU4TkEH3YbE3ZMK7EOLASX5D5FerLJ09JAF6ZXiJeSVf_P2cb9j3nVOIIxGDa3ryUk2NQt86rmdkhWXX-sstCEcjrcOPKr3lZLhL11NsA3tBRQRB37fnH5J-VkWJtRp-LIYGgj9BcxI1a8_3l-RGnmVkW9hf4rW06IwDEQ" style="object-fit: cover;" width="70" />
                    <div>
                        <h6 class="mb-1 fw-bold">Polera Oversize Custom</h6>
                        <p class="text-muted small mb-0">S/ 149.00 x 1</p>
                    </div>
                </div>
            </div>
            <div class="border-top pt-4">
                <div class="d-flex justify-content-between mb-2"><span class="text-muted">Subtotal</span><span class="fw-bold">S/ 238.00</span></div>
                <div class="d-flex justify-content-between mb-4"><span class="h5 fw-bolder">Total</span><span class="h5 fw-bolder text-primary">S/ 238.00</span></div><button class="btn btn-dark w-100 py-3 fw-bold rounded-1" style="background-color: #1f0a34;">Finalizar Compra</button><button class="btn btn-link w-100 mt-2 text-dark text-decoration-none small" data-bs-dismiss="offcanvas">Seguir comprando</button>
            </div>
        </div>
    </div>
</div>

