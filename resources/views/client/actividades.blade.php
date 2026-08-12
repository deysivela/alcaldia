@extends('client.layouts.index')
@section('title', 'Actividades | GAM Llallagua')
@section('content')
@php
    $categorias = [
        [
            'id' => 'cursos',
            'label' => 'Cursos',
            'icon' => 'ti-book',
            'texto' => 'Formación práctica con duración definida y certificado de participación.',
        ],
        [
            'id' => 'seminarios',
            'label' => 'Seminarios',
            'icon' => 'ti-microphone',
            'texto' => 'Encuentros con especialistas sobre temas de interés municipal.',
        ],
        [
            'id' => 'talleres',
            'label' => 'Talleres',
            'icon' => 'ti-pencil-alt',
            'texto' => 'Sesiones participativas para aprender haciendo, en grupos reducidos.',
        ],
        [
            'id' => 'charlas',
            'label' => 'Charlas',
            'icon' => 'ti-comment-alt',
            'texto' => 'Espacios abiertos de orientación ciudadana y prevención.',
        ],
    ];
@endphp

    @include('client.partials.page-banner', [
        'eyebrow' => 'Formación ciudadana',
        'title' => 'Actividades',
        'subtitle' => 'Cursos, seminarios, talleres y charlas del municipio de Llallagua',
        'image' => asset('client/images/actividades/banner-bg.jpg'),
        'align' => 'left',
    ])

    <section class="gam-inner-section gam-actividades-page">
        <div class="container">
            <div class="gam-actividades-intro" data-aos="fade-up" data-aos-duration="800">
                <div class="gam-actividades-intro-copy">
                    <h2 class="gam-heading">Aprender, participar y crecer en comunidad</h2>
                    <p class="gam-lead">
                        El GAM Llallagua organiza actividades formativas abiertas a la ciudadanía:
                        cursos, seminarios, talleres y charlas para fortalecer capacidades,
                        prevenir riesgos y promover el desarrollo local.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="gam-section gam-section--white" id="modalidades" aria-label="Tipos de actividad">
        <div class="container">
            <div class="gam-actividades-types" data-aos="fade-up" data-aos-duration="850">
                @foreach($categorias as $cat)
                    <article class="gam-actividades-type">
                        <span class="gam-actividades-type-icon" aria-hidden="true">
                            <i class="{{ $cat['icon'] }}"></i>
                        </span>
                        <h3>{{ $cat['label'] }}</h3>
                        <p>{{ $cat['texto'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="gam-inner-section" id="agenda" aria-labelledby="agenda-titulo">
        <div class="container">
            <div class="mb-4" data-aos="fade-up" data-aos-duration="800">
                <span class="gam-eyebrow">Agenda formativa</span>
                <h2 class="gam-heading" id="agenda-titulo">Próximas actividades</h2>
            </div>

            <div class="gam-empty-state gam-actividades-coming-soon" data-aos="fade-up" data-aos-duration="900">
                <i class="ti-calendar" aria-hidden="true"></i>
                <h2 class="gam-heading-sm">Próximamente serán publicadas aquí</h2>
                <p>
                    Estamos preparando la agenda de cursos, seminarios, talleres y charlas.
                    Muy pronto encontrarás en esta sección las convocatorias, fechas y lugares
                    de cada actividad municipal.
                </p>
            </div>
        </div>
    </section>

    <section class="gam-inner-section gam-section--white" id="participar" aria-labelledby="participar-titulo">
        <div class="container">
            <div class="gam-actividades-cta" data-aos="fade-up" data-aos-duration="900">
                <div>
                    <span class="gam-eyebrow">Información</span>
                    <h2 class="gam-heading" id="participar-titulo">Mantente atento</h2>
                    <p class="gam-lead text-left">
                        Cuando se publiquen las actividades, las inscripciones se realizarán
                        en ventanilla municipal o según la convocatoria de cada curso, seminario o taller.
                    </p>
                </div>
                <ul class="gam-subalc-facts gam-actividades-facts">
                    <li>
                        <span class="gam-subalc-fact-icon" aria-hidden="true">
                            <i class="icon-Map-Marker2"></i>
                        </span>
                        <span class="gam-subalc-fact-copy">
                            <span class="gam-side-label">Atención</span>
                            <strong>Av. 10 de Noviembre · Edificio Central</strong>
                        </span>
                    </li>
                    <li>
                        <span class="gam-subalc-fact-icon" aria-hidden="true">
                            <i class="ti-info-alt"></i>
                        </span>
                        <span class="gam-subalc-fact-copy">
                            <span class="gam-side-label">Importante</span>
                            <strong>Vuelve pronto para conocer las nuevas convocatorias</strong>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
