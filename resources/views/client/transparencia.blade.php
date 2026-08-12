@extends('client.layouts.index')
@section('title', 'Transparencia | GAM Llallagua')
@section('content')
    @include('client.partials.page-banner', [
        'title' => 'Dirección de Transparencia',
        'subtitle' => 'Y lucha contra la corrupción',
        'image' => asset('client/images/transparencia/banner-bg.jpg'),
    ])

    <section class="gam-inner-section">
        <div class="container">
            @include('client.partials.doc-list', [
                'documents' => $it,
                'label' => 'Informe de transparencia',
                'showSearch' => false,
                'emptyText' => 'Todavía no hay informes de transparencia publicados.',
            ])

            <aside class="gam-alcalde-links" aria-label="Secciones relacionadas" data-aos="fade-up"
                data-aos-duration="900">
                <span class="gam-side-label">También puede consultar</span>
                <div class="gam-alcalde-links-row">
                    <a class="gam-alcalde-link" href="{{ route('gacetas') }}">
                        <i class="icon-Folder-Bookmark" aria-hidden="true"></i>
                        <span>
                            <strong>Gaceta Municipal</strong>
                            <em>Normativa vigente</em>
                        </span>
                        <i class="ti-arrow-right" aria-hidden="true"></i>
                    </a>
                    <a class="gam-alcalde-link" href="{{ route('documentos_importantes') }}">
                        <i class="icon-Files" aria-hidden="true"></i>
                        <span>
                            <strong>Documentos importantes</strong>
                            <em>Publicaciones clave</em>
                        </span>
                        <i class="ti-arrow-right" aria-hidden="true"></i>
                    </a>
                    <a class="gam-alcalde-link" href="{{ route('informes-gestion') }}">
                        <i class="icon-File-Search" aria-hidden="true"></i>
                        <span>
                            <strong>Informes de gestión</strong>
                            <em>Rendición de cuentas</em>
                        </span>
                        <i class="ti-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </aside>
        </div>
    </section>

    <section class="gam-section gam-section--white">
        <div class="container">
            @include('client.partials.section-heading', [
                'title' => 'Ley Anticorrupción Marcelo Quiroga Santa Cruz',
                'subtitle' => 'Dípticos informativos sobre los delitos de corrupción y sus consecuencias.',
            ])
            @php
                $dipticos = [
                    [
                        'img' => 'client/images/transparencia/img1.png',
                        'title' => 'Enriquecimiento ilícito',
                        'text' => 'Información sobre la ley en contra del enriquecimiento ilícito.',
                        'file' => 'client/document/transparencia/enrequicimiento-ilicito.pdf',
                    ],
                    [
                        'img' => 'client/images/transparencia/img2.png',
                        'title' => 'Obstrucción a la justicia',
                        'text' => 'Información sobre la ley en contra de la obstrucción a la justicia.',
                        'file' => 'client/document/transparencia/obstruccion.pdf',
                    ],
                    [
                        'img' => 'client/images/transparencia/img3.png',
                        'title' => 'Peculado',
                        'text' => 'Ley en contra del peculado cometido por funcionarios públicos.',
                        'file' => 'client/document/transparencia/peculado.pdf',
                    ],
                    [
                        'img' => 'client/images/transparencia/img5.png',
                        'title' => 'Uso indebido de bienes',
                        'text' => 'Díptico informativo sobre el uso indebido de bienes del Estado.',
                        'file' => 'client/document/transparencia/uso-indebido.pdf',
                    ],
                    [
                        'img' => 'client/images/transparencia/img6.png',
                        'title' => 'Declaración jurada',
                        'text' => 'Díptico informativo sobre las declaraciones juradas de bienes y rentas.',
                        'file' => 'client/document/transparencia/declaracion-jurada.pdf',
                    ],
                ];
            @endphp
            <div class="gam-leaflet-grid">
                @foreach($dipticos as $i => $diptico)
                    <article class="gam-leaflet" data-aos="fade-up" data-aos-duration="{{ 700 + ($i * 70) }}">
                        <div class="gam-leaflet-media">
                            <img src="{{ asset($diptico['img']) }}" alt="{{ $diptico['title'] }}" loading="lazy">
                        </div>
                        <div class="gam-leaflet-body">
                            <h3>{{ $diptico['title'] }}</h3>
                            <p>{{ $diptico['text'] }}</p>
                            <a class="gam-text-link" href="{{ asset($diptico['file']) }}" target="_blank" rel="noopener">
                                Descargar díptico <i class="ti-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="gam-section gam-section--soft" id="contacto">
        <div class="container">
            <div class="gam-split-content-block gam-split-content-block--reverse">
                <aside class="gam-side-card gam-side-card--light">
                    <h3>Unidad de Transparencia</h3>
                    <ul class="gam-side-list">
                        <li>
                            <span class="gam-side-label">Dirección</span>
                            <span>Av. 10 de Noviembre, Edificio Municipal (6.º piso)</span>
                        </li>
                        <li>
                            <span class="gam-side-label">Responsable</span>
                            <span>Abg. Marcelo Espejo Motiño</span>
                        </li>
                        <li>
                            <span class="gam-side-label">Correo electrónico</span>
                            <a href="mailto:gamllallagua.transparencia@gmail.com">gamllallagua.transparencia@gmail.com</a>
                        </li>
                    </ul>
                </aside>
                <div class="gam-split-content-main">
                    <h2 class="gam-heading-sm">Tu denuncia contribuye a una gestión más transparente</h2>
                    <p>La Dirección de Transparencia recibe y canaliza denuncias sobre posibles hechos de corrupción
                        en la administración municipal. La atención es gratuita y se garantiza la confidencialidad
                        de la información proporcionada.</p>
                    <ul class="gam-check-list">
                        <li><i class="sl-icon-check"></i> Presenta tu denuncia de forma presencial o por correo electrónico.</li>
                        <li><i class="sl-icon-check"></i> Adjunta los documentos o pruebas que respalden tu denuncia.</li>
                        <li><i class="sl-icon-check"></i> Recibe seguimiento del caso por parte de la unidad responsable.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
