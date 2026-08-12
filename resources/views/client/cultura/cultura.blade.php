@extends('client.layouts.index')
@section('title', 'Secretaría de Culturas | GAM Llallagua')
@section('content')
    @include('client.partials.page-banner', [
        'eyebrow' => 'Identidad y tradición',
        'title' => 'Secretaría de Culturas',
        'subtitle' => 'Folklore, festividades y patrimonio del municipio de Llallagua',
        'image' => asset('client/images/cultura/cultura.gif'),
        'align' => 'left',
        'extraClass' => 'gam-page-banner--media',
        'aspect' => '600 / 253',
    ])

    <section class="gam-inner-section gam-cultura-page">
        <div class="container">
            <div class="gam-cultura-intro" data-aos="fade-up" data-aos-duration="800">
                <div class="gam-cultura-intro-copy">
                    <h2 class="gam-heading">Cultura viva del norte potosino</h2>
                    <p class="gam-lead">
                        La Secretaría de Culturas impulsa la identidad llallagueña a través de festividades,
                        música folklórica, gastronomía típica y el cuidado del patrimonio local.
                    </p>
                </div>
                <nav class="gam-cultura-jump" aria-label="Ir a una sección">
                    <span class="gam-side-label">Ir a</span>
                    <div class="gam-cultura-jump-list">
                        <a class="gam-chip" href="#festividad">Festividad</a>
                        <a class="gam-chip" href="#cronogramas">Cronogramas</a>
                        <a class="gam-chip" href="#contacto">Contacto</a>
                    </div>
                </nav>
            </div>
        </div>
    </section>

    <section class="gam-cultura-feature" id="festividad" aria-labelledby="festividad-titulo">
        <div class="container">
            <article class="gam-cultura-feature-grid" data-aos="fade-up" data-aos-duration="900">
                <figure class="gam-cultura-feature-media">
                    <img src="{{ asset('client/images/cultura/asuncion.jpg') }}"
                        alt="Festividad de la Virgen de la Asunción en Llallagua"
                        width="720" height="720" loading="eager">
                    <figcaption>Agosto · Llallagua</figcaption>
                </figure>

                <div class="gam-cultura-feature-body">
                    <span class="gam-eyebrow">Fiesta patronal</span>
                    <h2 class="gam-heading" id="festividad-titulo">Virgen de la Asunción</h2>
                    <p class="gam-lead text-left">
                        Celebración central del calendario cultural municipal. Música folklórica,
                        danzas, gastronomía típica y la participación de fraternidades y vecinos
                        de las siete subalcaldías.
                    </p>

                    <ul class="gam-cultura-highlights">
                        <li>
                            <i class="ti-calendar" aria-hidden="true"></i>
                            <span>
                                <strong>Fecha</strong>
                                <em>Agosto · Norte Potosí, Bolivia</em>
                            </span>
                        </li>
                        <li>
                            <i class="ti-music-alt" aria-hidden="true"></i>
                            <span>
                                <strong>Tradición</strong>
                                <em>Folklore, danza y platos típicos potosinos</em>
                            </span>
                        </li>
                        <li>
                            <i class="ti-flag-alt" aria-hidden="true"></i>
                            <span>
                                <strong>Organiza</strong>
                                <em>Secretaría de Culturas · GAM Llallagua</em>
                            </span>
                        </li>
                    </ul>

                    <div class="gam-cultura-note" role="status">
                        <i class="ti-time" aria-hidden="true"></i>
                        <div>
                            <strong>Programa oficial</strong>
                            <p>Consulte más abajo los cronogramas y actividades publicadas por la Unidad de Culturas.</p>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <section class="gam-inner-section gam-section--white" id="cronogramas" aria-labelledby="cronogramas-titulo">
        <div class="container">
            <div class="mb-4" data-aos="fade-up" data-aos-duration="800">
                <span class="gam-eyebrow">Agenda oficial</span>
                <h2 class="gam-heading" id="cronogramas-titulo">Cronogramas y actividades</h2>
                <p class="gam-lead text-left">
                    Consulte los cronogramas de la festividad de la Virgen de la Asunción
                    y otras actividades culturales del municipio.
                </p>
            </div>

            @if(count($cronogramas))
                <div class="gam-news-secondary-grid" data-aos="fade-up" data-aos-duration="900">
                    @foreach($cronogramas as $item)
                        @include('client.partials.cultura-card', [
                            'item' => $item,
                            'limit' => 150,
                            'fallbackTitle' => 'Actividad cultural',
                        ])
                    @endforeach
                </div>
            @else
                <div class="gam-empty-state">
                    <i class="ti-calendar"></i>
                    <h2 class="gam-heading-sm">Todavía no hay cronogramas ni actividades publicados</h2>
                    <p>Pronto publicaremos el programa oficial de actividades culturales.</p>
                </div>
            @endif
        </div>
    </section>

    @include('client.partials.cultura-detail-modal')

    <section class="gam-inner-section" id="contacto" aria-labelledby="contacto-titulo">
        <div class="container">
            <div class="gam-cultura-contact" data-aos="fade-up" data-aos-duration="900">
                <span class="gam-eyebrow">Atención ciudadana</span>
                <h2 class="gam-heading" id="contacto-titulo">Unidad de Culturas</h2>
                <p class="gam-lead text-left">
                    Acérquese a la oficina municipal para consultas sobre festividades,
                    actividades culturales y coordinación con fraternidades o instituciones.
                </p>

                <ul class="gam-subalc-facts gam-cultura-facts">
                    <li>
                        <span class="gam-subalc-fact-icon" aria-hidden="true">
                            <i class="icon-Map-Marker2"></i>
                        </span>
                        <span class="gam-subalc-fact-copy">
                            <span class="gam-side-label">Dirección</span>
                            <strong>Av. 10 de Noviembre, Edificio Central — planta baja (puerta trasera)</strong>
                        </span>
                    </li>
                    <li>
                        <span class="gam-subalc-fact-icon" aria-hidden="true">
                            <i class="icon-Envelope"></i>
                        </span>
                        <span class="gam-subalc-fact-copy">
                            <span class="gam-side-label">Correo electrónico</span>
                            <a href="mailto:unid-culturagamllallagua@hotmail.com">unid-culturagamllallagua@hotmail.com</a>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
