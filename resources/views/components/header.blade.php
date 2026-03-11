<header class="main-header">
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

            <!-- IMPORTANTE: que tenga este ID -->
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
</div>