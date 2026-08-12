<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0BB70F">
    <meta name="description" content="Portal Web Institucional del Gobierno Autónomo Municipal de Llallagua.">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('client/images/favicon.png') }}">
    <title>@yield('title', 'GAM Llallagua')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{ asset('client/assets/modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/modules/aos/dist/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/modules/owl.carousel/dist/assets/owl.theme.green.css') }}" rel="stylesheet">
    <link href="{{ asset('client/assets/modules/bootstrap-touch-slider/bootstrap-touch-slider.css') }}" rel="stylesheet"
        media="all">
    <!-- This css we made it from our predefine componenet
    we just copy that css and paste here you can also do that -->
    <link href="{{ asset('client/css/demo.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/llallagua.css') }}?v={{ @filemtime(public_path('client/css/llallagua.css')) }}"
        rel="stylesheet">
    <script src="{{ asset('client/assets/modules/jquery/dist/jquery.min.js') }}"></script>
</head>

<body>
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Llallagua</p>
        </div>
    </div>
    <a class="gam-skip-link" href="#contenido">Saltar al contenido principal</a>
    <div id="main-wrapper">
        @include('client.layouts.navegacion')
        <div class="page-wrapper" id="contenido">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        <footer class="footer2 font-14 gam-footer">
            <div class="container">
                <div class="gam-footer-grid gam-footer-top gam-footer-top--contact">
                    <div class="gam-footer-brand">
                        <a class="footer-logo-link" href="{{ route('index') }}">
                            <img src="{{ asset('client/images/footer-logo.png') }}"
                                alt="Escudo del Gobierno Autónomo Municipal de Llallagua"
                                style="width: 140px; height: 54px;">
                        </a>
                        <h5 class="text-white m-t-20">GAM Llallagua</h5>
                        <p class="text-white op-7">Gobierno Autónomo Municipal de Llallagua.<br>Esfuerzo y Desarrollo.
                        </p>
                        <h6 class="text-white gam-footer-title">Redes sociales</h6>
                        <span class="social-links">
                            <a href="https://www.facebook.com/Gamll-%C3%B3Llallagua-373895499790994/" target="__blank"
                                aria-label="Facebook GAM Llallagua"><i class="icon-Facebook"></i></a>
                            <a href="https://twitter.com/GAM_LLALLAGUA" target="__blank"
                                aria-label="Twitter GAM Llallagua"><i class="icon-Twitter"></i></a>
                            <a href="https://www.youtube.com/channel/UC_SD4gNDWCW-wv9gkgmMtQQ" target="__blank"
                                aria-label="Youtube GAM Llallagua"><i class="icon-Youtube"></i></a>
                        </span>
                    </div>

                    <div class="gam-footer-refs">
                        <h6 class="text-white gam-footer-title">Dirección y Referencias Telefónicas</h6>
                        <div class="gam-footer-refs-grid">
                            <div class="gam-footer-col">
                                <ul class="list-style-none gam-footer-contact">
                                    <li>
                                        <span class="gam-footer-label">Dirección</span>
                                        <span class="text-white">Av. 10 de Noviembre, Edificio Municipal</span>
                                    </li>
                                    <li>
                                        <span class="gam-footer-label">Correo</span>
                                        <a class="text-white"
                                            href="mailto:gamllallagua2025@gmail.com">gamllallagua2025@gmail.com</a>
                                    </li>
                                    <li>
                                        <span class="gam-footer-label">Telefax</span>
                                        <a class="text-white" href="tel:025820158">02 - 5820158</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="gam-footer-col">
                                <ul class="list-style-none gam-footer-contact">
                                    <li>
                                        <span class="gam-footer-label">Oficina Central</span>
                                        <a class="text-white" href="tel:025822728">(02) 5822728</a>
                                        <a class="text-white" href="tel:025820158">(02) 5820158</a>
                                    </li>
                                    <li>
                                        <span class="gam-footer-label">Dirección Financiera</span>
                                        <a class="text-white" href="tel:025820514">(02) 5820514</a>
                                    </li>
                                    <li>
                                        <span class="gam-footer-label">Departamento Eléctrico</span>
                                        <a class="text-white" href="tel:025820487">(02) 5820487</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="gam-footer-col">
                                <ul class="list-style-none gam-footer-contact">
                                    <li>
                                        <span class="gam-footer-label">Subalcaldía Siglo XX</span>
                                        <a class="text-white" href="tel:025820814">(02) 5820814</a>
                                    </li>
                                    <li>
                                        <span class="gam-footer-label">Subalcaldía Catavi</span>
                                        <a class="text-white" href="tel:025821272">(02) 5821272</a>
                                    </li>
                                    <li>
                                        <span class="gam-footer-label">Subalcaldía 22 de Diciembre</span>
                                        <a class="text-white" href="tel:025822657">(02) 5822657</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="foot-divider m-t-30"></div>
                <div class="gam-footer-bottom">
                    <span class="text-white">Gobierno Autónomo Municipal de Llallagua</span>
                    <span class="text-success">© {{ date('Y') }} Todos los derechos reservados.</span>
                </div>
            </div>
        </footer>
        <a class="bt-top btn btn-circle btn-lg btn-info" href="#top" aria-label="Volver arriba"><i
                class="ti-arrow-up"></i></a>
    </div>
    @include('client.partials.news-detail-modal')
    <script src="{{ asset('client/assets/modules/popper/dist/popper.min.js') }}"></script>
    <script src="{{ asset('client/assets/modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client/assets/modules/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('client/js/custom.min.js') }}"></script>
    <script src="{{ asset('client/assets/modules/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.touchSwipe.min.js') }}"></script>
    <script src="{{ asset('client/assets/modules/bootstrap-touch-slider/bootstrap-touch-slider.js') }}"></script>
    <script src="{{ asset('client/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('client/js/style.js') }}"></script>
    <script src="{{ asset('client/js/type.js') }}"></script>
    <script src="{{ asset('client/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('client/js/gam.js') }}?v={{ @filemtime(public_path('client/js/gam.js')) }}"></script>
    <script type="text/javascript">
        if ($('#slider4').length) {
            $('#slider4').bsTouchSlider();
            // Solo el hero: evita que el swipe/carrusel afecte otros .carousel de la página
            $("#slider4 .carousel-inner").swipe({
                swipeLeft: function() {
                    $('#slider4').carousel('next');
                },
                swipeRight: function() {
                    $('#slider4').carousel('prev');
                },
                threshold: 50
            });
        }
        if ($('.counter').length) {
            $('.counter').counterUp({
                delay: 10
            });
        }
        if ($('.testi9').length) {
            $('.testi9').owlCarousel({
                loop: true,
                margin: 30,
                nav: false,
                dots: true,
                autoplay: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    1650: {
                        items: 1
                    }
                }
            });
        }
    </script>
    @yield('script')
</body>

</html>
