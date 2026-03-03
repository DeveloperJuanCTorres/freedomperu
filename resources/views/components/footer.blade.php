<footer class="main-footer">

    <div class="container footer-top">
        <div class="row">

            <!-- MARCA -->
            <div class="col-lg-4 col-md-6 mb-4">
                <img width="70" src="images/logo-freedom.png" alt="">
                <img width="150" src="images/freedom.png" alt="">
                <p class="footer-text">
                    Creamos polos personalizados de alta calidad.
                    Diseña tu estilo, expresa tu identidad.
                </p>

                <div class="footer-social">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-tiktok"></i></a>
                    <a href="#"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>

            <!-- ENLACES -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5>Explorar</h5>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Inicio</a></li>
                    <li><a href="{{ route('shop.index') }}">Tienda</a></li>
                    <li><a href="{{ route('design.index') }}">Personalizar</a></li>
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </div>

            <!-- AYUDA -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5>Ayuda</h5>
                <ul class="footer-links">
                    <li><a href="#">Preguntas frecuentes</a></li>
                    <li><a href="#">Política de envíos</a></li>
                    <li><a href="#">Términos y condiciones</a></li>
                    <li><a href="#">Libro de reclamaciones</a></li>
                </ul>
            </div>

            <!-- NEWSLETTER -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5>Suscríbete</h5>
                <p class="footer-text">Recibe promociones y novedades.</p>

                <form class="footer-newsletter">
                    <input type="email" placeholder="Tu correo">
                    <button type="submit">Enviar</button>
                </form>
            </div>

        </div>
    </div>

    <!-- BOTTOM -->
    <div class="footer-bottom">
        <div class="container d-flex justify-content-between flex-wrap">
            <p>© {{ date('Y') }} POLOLAB. Todos los derechos reservados.</p>
            <p>Desarrollado con ❤️ en Perú</p>
        </div>
    </div>

</footer>