<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top py-4 custom-navbar-header">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" height="60">
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
                <input id="searchProduct" type="text" placeholder="Buscar productos...">
            </div>

        </div>
    </div>
</nav>

<!-- Offcanvas Mobile -->
<div class="offcanvas offcanvas-start custom-offcanvas"
     tabindex="-1"
     id="mobileMenu">

    <div class="offcanvas-header border-bottom border-light border-opacity-10">
        <a class="navbar-brand fw-bold" href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" height="40">
        </a>

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

            <span class="floating-badge" id="cart-count">
                {{ Cart::getTotalQuantity() }}
            </span>

        </div>

        <!-- Text -->
        <div class="floating-text d-none d-md-flex">
            <span class="small-text">Tus productos</span>
            <span class="big-text">Carrito</span>
        </div>

    </div>

</button>


<div aria-labelledby="offcanvasCartLabel" class="offcanvas offcanvas-end" id="offcanvasCart" tabindex="-1">
    <div class="offcanvas-header border-bottom py-4">
        <h5 class="offcanvas-title fw-bolder" id="offcanvasCartLabel">Tu Carrito</h5><button aria-label="Close" class="btn-close" data-bs-dismiss="offcanvas" type="button"></button>
    </div>
    <div class="offcanvas-body">
        <div class="d-flex flex-column h-100">
            <div id="cart-content">

                @include('components.cart-items')

            </div>
        </div>
    </div>
</div>

