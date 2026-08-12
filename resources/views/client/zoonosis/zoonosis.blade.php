@extends('client.layouts.index')
@section('title', 'Unidad de Zoonosis | GAM Llallagua')
@section('content')
@php
    $servicios = [
        [
            'icon' => 'ti-heart',
            'titulo' => 'Vacunación antirrábica',
            'texto' => 'Jornadas periódicas para perros y gatos en barrios y subalcaldías del municipio.',
        ],
        [
            'icon' => 'ti-reload',
            'titulo' => 'Esterilización',
            'texto' => 'Control poblacional responsable de animales de compañía, con campañas coordinadas.',
        ],
        [
            'icon' => 'ti-shield',
            'titulo' => 'Control de zoonosis',
            'texto' => 'Prevención de enfermedades que pueden transmitirse de animales a personas.',
        ],
        [
            'icon' => 'ti-announcement',
            'titulo' => 'Tenencia responsable',
            'texto' => 'Charlas y actividades educativas para el cuidado y bienestar de las mascotas.',
        ],
    ];
@endphp

    @include('client.partials.page-banner', [
        'eyebrow' => 'Salud y bienestar animal',
        'title' => 'Unidad de Zoonosis',
        'subtitle' => 'Campañas municipales y voluntariado por los animales de Llallagua',
        'image' => asset('client/images/actividades/banner-bg.jpg'),
        'align' => 'left',
    ])

    <section class="gam-inner-section gam-zoonosis-page">
        <div class="container">
            <div class="gam-zoonosis-intro" data-aos="fade-up" data-aos-duration="800">
                <div class="gam-zoonosis-intro-copy">
                    <h2 class="gam-heading">Cuidado animal en el municipio</h2>
                    <p class="gam-lead">
                        La Unidad de Zoonosis del GAM Llallagua impulsa campañas de vacunación,
                        esterilización y educación ciudadana. Trabaja junto a organizaciones
                        voluntarias para proteger la salud de las familias y el bienestar de los animales.
                    </p>
                </div>
                <nav class="gam-zoonosis-jump" aria-label="Ir a una sección">
                    <span class="gam-side-label">Ir a</span>
                    <div class="gam-zoonosis-jump-list">
                        <a class="gam-chip" href="#servicios">Servicios</a>
                        <a class="gam-chip" href="#animales-sos">Animales S.O.S.</a>
                        <a class="gam-chip" href="#cronogramas">Cronogramas</a>
                    </div>
                </nav>
            </div>
        </div>
    </section>

    <section class="gam-section gam-section--white" id="servicios" aria-label="Campañas y servicios">
        <div class="container">
            @include('client.partials.section-heading', [
                'title' => 'Campañas y servicios',
                'subtitle' => 'Acciones permanentes orientadas a la salud animal y la prevención de zoonosis.',
                'align' => 'left',
            ])

            <div class="gam-zoonosis-services">
                @foreach($servicios as $i => $servicio)
                    <article class="gam-zoonosis-service" data-aos="fade-up" data-aos-duration="{{ 700 + ($i * 60) }}">
                        <span class="gam-zoonosis-service-icon" aria-hidden="true">
                            <i class="{{ $servicio['icon'] }}"></i>
                        </span>
                        <h3>{{ $servicio['titulo'] }}</h3>
                        <p>{{ $servicio['texto'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="gam-zoonosis-partner" id="animales-sos" aria-labelledby="animales-sos-titulo">
        <div class="container">
            <article class="gam-zoonosis-partner-grid" data-aos="fade-up" data-aos-duration="900">
                <div class="gam-zoonosis-partner-body">
                    <span class="gam-eyebrow">Organización de voluntarios</span>
                    <h2 class="gam-heading" id="animales-sos-titulo">Animales S.O.S. Filial Llallagua</h2>
                    <p class="gam-lead text-left">
                        Organización de Voluntarios por el Bienestar Animal, sin fines de lucro.
                        Filial de Animales SOS Bolivia, trabaja desde enero de 2014 en la ciudad de Llallagua,
                        tercera sección de la Provincia Bustillo del Departamento de Potosí.
                    </p>

                    <ul class="gam-zoonosis-tags" aria-label="Datos de la organización">
                        <li>Sin fines de lucro</li>
                        <li>Voluntarios desde 2014</li>
                        <li>Filial Animales SOS Bolivia</li>
                    </ul>
                </div>

                <aside class="gam-zoonosis-partner-aside" aria-label="Información de contacto">
                    <h3 class="gam-zoonosis-aside-title">Información de contacto</h3>

                    <ul class="gam-subalc-facts gam-zoonosis-facts">
                        <li>
                            <span class="gam-subalc-fact-icon" aria-hidden="true">
                                <i class="icon-Phone"></i>
                            </span>
                            <span class="gam-subalc-fact-copy">
                                <span class="gam-side-label">Teléfono</span>
                                <a href="tel:+4959178612129">+49 591 78612129</a>
                            </span>
                        </li>
                        <li>
                            <span class="gam-subalc-fact-icon" aria-hidden="true">
                                <i class="icon-Envelope"></i>
                            </span>
                            <span class="gam-subalc-fact-copy">
                                <span class="gam-side-label">Correo electrónico</span>
                                <a href="mailto:karen_msg@yahoo.es">karen_msg@yahoo.es</a>
                            </span>
                        </li>
                    </ul>

                    <div class="gam-zoonosis-actions">
                        <a class="btn btn-success-gradiant"
                            href="https://animalessos.org"
                            target="_blank" rel="noopener noreferrer">
                            Sitio web
                            <i class="ti-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-outline-success"
                            href="https://www.facebook.com/animalessosllallagua/?locale=es_LA"
                            target="_blank" rel="noopener noreferrer">
                            <i class="icon-Facebook m-r-5" aria-hidden="true"></i>
                            Facebook
                        </a>
                    </div>
                </aside>
            </article>
        </div>
    </section>

    <section class="gam-inner-section gam-section--white" id="cronogramas" aria-labelledby="cronogramas-titulo">
        <div class="container">
            <div class="mb-4" data-aos="fade-up" data-aos-duration="800">
                <span class="gam-eyebrow">Agenda oficial</span>
                <h2 class="gam-heading" id="cronogramas-titulo">Cronogramas y documentos</h2>
                <p class="gam-lead text-left">
                    Consulte los cronogramas de campañas, vacunación y actividades de la Unidad de Zoonosis.
                </p>
            </div>

            @if(count($cronogramas))
                <div class="gam-news-secondary-grid" data-aos="fade-up" data-aos-duration="900">
                    @foreach($cronogramas as $item)
                        @include('client.partials.cultura-card', [
                            'item' => $item,
                            'limit' => 150,
                            'fallbackTitle' => 'Cronograma de zoonosis',
                        ])
                    @endforeach
                </div>
            @else
                <div class="gam-empty-state">
                    <i class="ti-calendar"></i>
                    <h2 class="gam-heading-sm">Todavía no hay cronogramas ni documentos publicados</h2>
                    <p>Pronto publicaremos las campañas y jornadas de la Unidad de Zoonosis.</p>
                </div>
            @endif
        </div>
    </section>

    @include('client.partials.cultura-detail-modal')
@endsection
