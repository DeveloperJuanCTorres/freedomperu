<header class="main-header">
    <div class="container header-container">

        <a href="{{ route('home') }}" class="logo">
            <img width="70" src="images/logo-freedom.png" alt="">
            <img width="150" src="images/freedom.png" alt="">
        </a>

        <nav class="nav-desktop">
            <a href="{{ route('shop.index') }}">Tienda</a>
            <a href="{{ route('design.index') }}">Personalizar</a>
            <a href="#">Nosotros</a>
            <a href="#">Contacto</a>
        </nav>

        <div class="header-actions">
            <a href="{{ route('cart.index') }}" class="cart-icon">
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
    <a href="{{ route('shop.index') }}">Tienda</a>
    <a href="{{ route('design.index') }}">Personalizar</a>
    <a href="#">Nosotros</a>
    <a href="#">Contacto</a>
</div>