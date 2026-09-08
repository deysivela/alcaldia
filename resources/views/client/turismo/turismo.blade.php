@extends('client.layouts.index')
@section('title', 'Dirección de Turismo | GAM Llallagua')
@section('content')
@php
    $rutas = [
        [
            'id' => 'etno',
            'titulo' => 'Etno-ecoturismo',
            'texto' => 'Descubre los secretos que esconden las altas mesetas de la cordillera oriental.',
            'img' => 'etno-ecoturismo.jpg',
        ],
        [
            'id' => 'siglo',
            'titulo' => 'Siglo XX',
            'texto' => 'La historia de los yacimientos estanníferos más grandes del continente americano.',
            'img' => 'sigloxx.jpg',
        ],
        [
            'id' => 'catavi',
            'titulo' => 'Catavi',
            'texto' => 'Recorrido por la memoria minera y los atractivos del distrito de Catavi.',
            'img' => 'catavi.jpg',
        ],
    ];

    $sitios = [
        [
            'titulo' => 'Planta Zinc and Float',
            'img' => 'planta-zink-and-float.jpg',
            'texto' => 'Construcción de 1946. Procesaba carga mineralizada y, por suspensión en agua, separaba el estaño de las rocas.',
        ],
        [
            'titulo' => 'Plaza del Minero',
            'img' => 'plaza-minero.jpg',
            'texto' => 'Plaza histórica testigo de las luchas sindicales. Alberga el edificio sindical y la radio La Voz del Minero.',
        ],
        [
            'titulo' => 'Teatro Simón I. Patiño',
            'img' => 'teatro-simon-patinio.jpg',
            'texto' => 'Obra de piedra labrada y techo a dos aguas. Uno de los teatros mejor conservados de las poblaciones mineras.',
        ],
        [
            'titulo' => 'Bocamina Siglo XX',
            'img' => 'bocamina-siglo-xx.jpg',
            'texto' => 'También conocida como Nivel 650. Habilitada entre 1914 y 1918; se prolonga hasta la Virgen de la Concepción.',
        ],
        [
            'titulo' => 'Desmontes Siglo XX',
            'img' => 'desmonte-siglo-xx.jpg',
            'texto' => 'Montañas artificiales visibles al llegar a Llallagua: residuos de la roca mineralizada del cerro Juan del Valle.',
        ],
        [
            'titulo' => 'Piscina 1° de Mayo',
            'img' => 'piscina-primero-mayo.jpg',
            'texto' => 'Infraestructura de inicios del siglo XX, remodelada en 1968 y 2010. Precursora de la natación boliviana.',
        ],
    ];
@endphp

    @include('client.partials.page-banner', [
        'eyebrow' => 'Destino norte potosino',
        'title' => 'Turismo',
        'subtitle' => 'Sitios, rutas e historia del municipio de Llallagua',
        'image' => asset('client/images/turismo/img1.jpg'),
        'align' => 'left',
        'extraClass' => 'gam-page-banner--media',
        'aspect' => '2100 / 1059',
    ])

    <section class="gam-inner-section gam-turismo-page">
        <div class="container">
            <div class="gam-turismo-intro" data-aos="fade-up" data-aos-duration="800">
                <div class="gam-turismo-intro-copy">
                    <h2 class="gam-heading">Sitios y atractivos turísticos</h2>
                    <p class="gam-lead">
                        Explore las rutas del municipio y conozca lugares emblemáticos de la historia minera
                        y el paisaje del norte potosino.
                    </p>
                </div>
                <nav class="gam-turismo-jump" aria-label="Ir a una sección">
                    <span class="gam-side-label">Ir a</span>
                    <div class="gam-turismo-jump-list">
                        <a class="gam-chip" href="#rutas">Rutas</a>
                        <a class="gam-chip" href="#sitios">Lugares</a>
                        <a class="gam-chip" href="#contacto">Contacto</a>
                    </div>
                </nav>
            </div>
        </div>
    </section>

    <section class="gam-turismo-routes" id="rutas" aria-label="Rutas turísticas">
        @foreach($rutas as $i => $ruta)
            <article
                class="gam-turismo-route {{ $i % 2 === 1 ? 'gam-turismo-route--reverse' : '' }}"
                id="{{ $ruta['id'] }}"
                data-aos="fade-up"
                data-aos-duration="{{ 700 + ($i * 50) }}"
            >
                <div class="container">
                    <div class="gam-turismo-route-grid">
                        <figure class="gam-turismo-route-media">
                            <img
                                src="{{ asset('client/images/turismo/' . $ruta['img']) }}"
                                alt="Mapa de la ruta {{ $ruta['titulo'] }}"
                                loading="{{ $i === 0 ? 'eager' : 'lazy' }}"
                            >
                            <a class="gam-turismo-expand"
                                href="{{ asset('client/images/turismo/' . $ruta['img']) }}"
                                target="_blank" rel="noopener">
                                Ver mapa completo <i class="ti-arrow-right" aria-hidden="true"></i>
                            </a>
                        </figure>
                        <div class="gam-turismo-route-body">
                            <span class="gam-eyebrow">Ruta turística</span>
                            <h2 class="gam-heading-sm">{{ $ruta['titulo'] }}</h2>
                            <p>{{ $ruta['texto'] }}</p>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach
    </section>

    <section class="gam-section gam-section--white" id="sitios" aria-labelledby="sitios-titulo">
        <div class="container">
            <div class="gam-section-heading text-left" data-aos="fade-up" data-aos-duration="800">
                <h2 class="gam-heading" id="sitios-titulo">Lugares turísticos</h2>
                <p class="gam-lead">Municipio de Llallagua</p>
            </div>

            <div class="gam-turismo-places">
                @foreach($sitios as $i => $sitio)
                    <article class="gam-turismo-place" data-aos="fade-up" data-aos-duration="{{ 700 + ($i * 40) }}">
                        <figure class="gam-turismo-place-media">
                            <img
                                src="{{ asset('client/images/turismo/' . $sitio['img']) }}"
                                alt="{{ $sitio['titulo'] }}"
                                loading="lazy"
                            >
                        </figure>
                        <div class="gam-turismo-place-body">
                            <h3>{{ $sitio['titulo'] }}</h3>
                            <p>{{ $sitio['texto'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="gam-inner-section" id="contacto" aria-labelledby="contacto-titulo">
        <div class="container">
            <div class="gam-turismo-contact" data-aos="fade-up" data-aos-duration="900">
                <span class="gam-eyebrow">Atención ciudadana</span>
                <h2 class="gam-heading" id="contacto-titulo">Unidad de Turismo</h2>
                <p class="gam-lead text-left">
                    Consulte rutas, sitios de interés y orientación turística del municipio.
                </p>

                <ul class="gam-subalc-facts gam-turismo-facts">
                    <li>
                        <span class="gam-subalc-fact-icon" aria-hidden="true">
                            <i class="icon-Map-Marker2"></i>
                        </span>
                        <span class="gam-subalc-fact-copy">
                            <span class="gam-side-label">Dirección</span>
                            <strong>Av. 10 de Noviembre, Edificio municipal (3.er piso)</strong>
                        </span>
                    </li>
                    <li>
                        <span class="gam-subalc-fact-icon" aria-hidden="true">
                            <i class="icon-Administrator"></i>
                        </span>
                        <span class="gam-subalc-fact-copy">
                            <span class="gam-side-label">Responsable</span>
                            <strong>Claudia Cruz Mamani</strong>
                        </span>
                    </li>
                    <li>
                        <span class="gam-subalc-fact-icon" aria-hidden="true">
                            <i class="fa fa-phone"></i>
                        </span>
                        <span class="gam-subalc-fact-copy">
                            <span class="gam-side-label">Teléfono</span>
                            <strong>
                                <a href="tel:+59125822816">(02) 5822816</a> (oficina)
                            </strong>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
