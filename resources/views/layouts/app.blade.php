<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="Polos personalizados premium en Perú. Diseña tu propio polo con calidad profesional.">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <?php
        $version = '1993.5.4';
    ?>

    <!-- Fonts -->



    <!-- Typography -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    
    <link href="{{asset('css/styles.css')}}?v=<?php echo $version ?>" rel="stylesheet">
    <link href="{{asset('css/navbar.css')}}?v=<?php echo $version ?>" rel="stylesheet">
    <link href="{{asset('css/tienda.css')}}?v=<?php echo $version ?>" rel="stylesheet">
    <!-- <link href="{{asset('css/design.css')}}?v=<?php echo $version ?>" rel="stylesheet"> -->
    <!-- <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"> -->

   

    @stack('styles')

    <!-- Scripts -->
    <!-- vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
</head>
<body>
    @include('components.header')

    @yield('content')

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function changeImg(id, src) {
            document.getElementById(id).src = src;
        }
    </script>
    

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.querySelectorAll('.color-options span').forEach(el => {
        el.addEventListener('click', function(){
            document.getElementById('shirtBase').style.filter =
                `drop-shadow(0 0 0 ${this.dataset.color})`;
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>AOS.init({ duration: 1000, once: true });</script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const toggle = document.getElementById('mobileToggle');
            const menu = document.getElementById('mobileMenu');
            const overlay = document.getElementById('menuOverlay');
            const body = document.body;

            function openMenu() {
                menu.classList.add('active');
                overlay.classList.add('active');
                body.classList.add('menu-open');
                toggle.innerHTML = '<i class="bi bi-x-lg"></i>';
            }

            function closeMenu() {
                menu.classList.remove('active');
                overlay.classList.remove('active');
                body.classList.remove('menu-open');
                toggle.innerHTML = '<i class="bi bi-list"></i>';
            }

            toggle.addEventListener('click', function() {
                if(menu.classList.contains('active')) {
                    closeMenu();
                } else {
                    openMenu();
                }
            });

            overlay.addEventListener('click', closeMenu);

        });
    </script>-->
    <script src="https://cdn.jsdelivr.net/npm/fabric@4.6.0/dist/fabric.min.js"></script> 
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @stack('scripts')
</body>
</html>
