<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top py-3">
    <div class="container">
        <a class="navbar-brand" href="#">FREEDOM</a>
        <button class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Inicio</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('shop.*') ? 'active' : '' }}" href="{{ route('shop.index') }}">Tienda</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('design.*') ? 'active' : '' }}" href="{{ route('design.index') }}">Personalizar</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Nosotros</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contacto</a></li>
            </ul>
            <div class="d-flex align-items-center gap-4">
                <div class="input-group input-group-sm" style="max-width: 200px;"><span class="input-group-text bg-light border-0 rounded-start-pill ps-3"><i class="fas fa-search text-muted"></i></span><input class="form-control bg-light border-0 rounded-end-pill py-2" placeholder="Buscar..." style="font-size: 0.85rem;" type="text" /></div>
            </div>
        </div>
    </div>
</nav>



<!-- <header class="main-header">
    <div class="container header-container">

        <a href="{{ route('home') }}" class="logo">
            <img class="logo-img" width="200" src="images/logo.png" alt="">
        </a>

        <nav class="nav-desktop">
            <a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Inicio</a>
            <a class="{{ request()->routeIs('shop.*') ? 'active' : '' }}" href="{{ route('shop.index') }}">Tienda</a>
            <a class="{{ request()->routeIs('design.*') ? 'active' : '' }}" href="{{ route('design.index') }}">Personalizar</a>
            <a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Nosotros</a>
            <a class="{{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contacto</a>
        </nav>
        <div class="nav-desktop">
            <form action="{{ route('shop.index') }}" method="GET" class="header-search">
                <input
                    type="text"
                    name="search"
                    placeholder="Buscar polos o diseños..."
                    value="{{ request('search') }}">

                <button type="submit">
                    <i class="bi bi-search"></i>
                </button>

            </form>
        </div>

        <div class="header-actions">
            <a href="{{ route('cart.index') }}" class="cart-icon text-white">
                <i class="bi bi-bag"></i>
                <span class="cart-count">{{ count(session('cart', [])) }}</span>
            </a>

         
            <div class="mobile-toggle" id="mobileToggle">
                <i class="bi bi-list"></i>
            </div>
        </div>

    </div>
</header>

<div class="mobile-menu" id="mobileMenu">
    <div class="menu-overlay" id="menuOverlay"></div>
    <a href="{{ route('home') }}">Inicio</a>
    <a href="{{ route('shop.index') }}">Tienda</a>
    <a href="{{ route('design.index') }}">Personalizar</a>
    <a href="{{ route('about') }}">Nosotros</a>
    <a href="{{ route('contact') }}">Contacto</a>
</div> -->


<button class="btn btn-primary position-fixed end-0 translate-middle-y shadow-lg d-flex align-items-center justify-content-center p-0" data-bs-target="#offcanvasCart" data-bs-toggle="offcanvas" style="top: 50%; width: 60px; height: 60px; border-radius: 20px 0 0 20px; z-index: 1050; background-color: #1f0a34; border: none;" type="button">
    <div class="position-relative"><i class="fas fa-shopping-bag fs-4 text-white"></i><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">2</span></div>
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

