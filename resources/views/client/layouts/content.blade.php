@extends('client.layouts.index')
@section('title', 'Gobierno Autónomo Municipal de Llallagua')
@section('content')
    @include('client.layouts.slider')

    @include('client.partials.novedades')

    {{-- 1. Conoce Llallagua: mosaico informativo + cifras + línea de tiempo --}}
    <section class="gam-section gam-section--white" id="mivi">
        <div class="container">
            @include('client.partials.section-heading', [
                'title' => 'Conoce Llallagua',
                'subtitle' => 'Datos referenciales, misión institucional, cifras y símbolos del municipio.',
            ])
            <div class="gam-info-grid">
                <article class="gam-info-card gam-info-card--wide" data-aos="fade-up" data-aos-duration="800">
                    <header class="gam-info-head">
                        <span class="gam-info-icon"><i class="icon-Map-Marker2"></i></span>
                        <div>
                            <h3>Datos referenciales</h3>
                            <p>Nombre, gentilicio, fecha de creación y símbolos del municipio.</p>
                        </div>
                    </header>
                    <dl class="gam-data-rows">
                        <div>
                            <dt>Nombre</dt>
                            <dd>Llallagua</dd>
                        </div>
                        <div>
                            <dt>Gentilicio</dt>
                            <dd>Llallagueño, Llallagueña</dd>
                        </div>
                        <div>
                            <dt>Creación</dt>
                            <dd>22 de diciembre de 1957</dd>
                        </div>
                        <div>
                            <dt>Colores</dt>
                            <dd>Verde y blanco, representativos de la bandera municipal</dd>
                        </div>
                        <div>
                            <dt>Festividad</dt>
                            <dd>Virgen de la Asunción, del 13 al 16 de agosto, en fecha fija. Organizada por Asconfolk
                                (Asociación de Conjuntos Folklóricos de Llallagua), es el mayor centro de atracción del
                                norte de Potosí.</dd>
                        </div>
                    </dl>
                </article>

                <article class="gam-info-card gam-info-card--dark gam-info-card--tall" data-aos="fade-up"
                    data-aos-duration="850">
                    <header class="gam-info-head">
                        <span class="gam-info-icon"><i class="icon-Eye"></i></span>
                        <div>
                            <h3>Misión y visión</h3>
                            <p>Compromiso institucional con el desarrollo local.</p>
                        </div>
                    </header>
                    <h4>Misión</h4>
                    <p>El Gobierno Autónomo del Municipio de Llallagua es la entidad de derecho público con personería
                        jurídica y patrimonio propio que representa a los vecinos de su jurisdicción. Su misión es
                        satisfacer las demandas de la sociedad mediante bienes, normas y servicios orientados al
                        bienestar económico, social, cultural y ambiental, y al desarrollo de sus vocaciones productivas
                        con una administración equitativa y plural de sus recursos.</p>
                    <h4>Visión</h4>
                    <p>Consolidarse como ciudad intermedia de oportunidades, con infraestructura urbana y rural de
                        vanguardia, mayor acceso a servicios básicos, desarrollo humano articulado a la economía local,
                        calidad ambiental, identidad cultural y valores ciudadanos comunes, en el marco del vivir bien
                        y la visión plural.</p>
                </article>

                <article class="gam-info-card gam-info-card--wide" data-aos="fade-up" data-aos-duration="900">
                    <header class="gam-info-head">
                        <span class="gam-info-icon"><i class="icon-Location-2"></i></span>
                        <div>
                            <h3>Ubicación y límites</h3>
                        </div>
                    </header>
                    <dl class="gam-data-rows">
                        <div>
                            <dt>Ubicación</dt>
                            <dd>Norte del departamento de Potosí, provincia Rafael Bustillos, tercera sección municipal.
                            </dd>
                        </div>
                        <div>
                            <dt>Acceso</dt>
                            <dd>Ruta Oruro – Huanuni – Llallagua: 95 km de Oruro y más de 200 km de Potosí.</dd>
                        </div>
                        <div>
                            <dt>Límites</dt>
                            <dd>Este: Chayanta · Oeste: Poopó y Huanuni (Oruro) · Norte: Caripuyo · Sur: Uncía.</dd>
                        </div>
                    </dl>
                </article>
            </div>

            <article class="gam-hymn-block" data-aos="fade-up" data-aos-duration="950">
                <header class="gam-hymn-head">
                    <div class="gam-hymn-title">
                        <span class="gam-hymn-icon" aria-hidden="true"><i class="icon-Music-Note2"></i></span>
                        <div>
                            <h3>Himno a Llallagua</h3>
                            <p>Letra y música: Liborio Salvatierra Sangueza</p>
                        </div>
                    </div>
                    <audio class="gam-hymn-audio" src="{{ asset('client/multimedia/llallagua.mp3') }}" controls
                        preload="metadata" type="audio/mpeg"></audio>
                </header>
                <div class="gam-hymn-sheet">
                    <div class="gam-hymn-stanza">
                        <p>De estirpe morena, Llallagua bendita<br>
                            Bañada de gloria estaño y sudor.<br>
                            Un pueblo pujante con paso triunfante,<br>
                            Marcha altivo con fuerza y valor.</p>
                        <p>Tierra legendaria, Llallagua grandiosa<br>
                            Tus hijos anhelan justicia y verdad<br>
                            América entera de pie te saluda<br>
                            Porque tú eres bastión de libertad</p>
                    </div>
                    <div class="gam-hymn-stanza gam-hymn-stanza--chorus">
                        <p>Tu nombre por siempre retumbará<br>
                            El mundo entero escuchará<br>
                            De valientes mineros la gloria<br>
                            Que han escrito con sangre la historia</p>
                    </div>
                    <div class="gam-hymn-stanza">
                        <p>Crisol de esperanza, Llallagua radiante<br>
                            Faro que iluminas con luz del saber<br>
                            La juventud, la ciencia atesoran tu tierra<br>
                            Rompiendo cadenas a un nuevo amanecer</p>
                        <p>Tierra de titanes, Llallagua misteriosa<br>
                            De mitos leyendas e historia sin par<br>
                            Pueblo incomparable, pujanza eterna<br>
                            Con seres laboriosos en pos de libertad.</p>
                    </div>
                </div>
            </article>

            @php
                $hitos = [
                    [
                        'año' => '1899',
                        'titulo' => 'Creación como Cantón',
                        'texto' => 'Llallagua es creada como Cantón mediante Decreto Supremo del 27 de diciembre.',
                    ],
                    [
                        'año' => '1957',
                        'titulo' => 'Capital de la Tercera Sección',
                        'texto' =>
                            'Por Ley del 22 de diciembre se instituye como capital de la Tercera Sección de la provincia Rafael Bustillo.',
                    ],
                    [
                        'año' => '1958',
                        'titulo' => 'Independencia administrativa',
                        'texto' =>
                            'Desde el 1 de agosto adquiere independencia administrativa respecto de la comuna de Uncía.',
                    ],
                    [
                        'año' => '1986',
                        'titulo' => 'Reconocida como ciudad',
                        'texto' => 'La Ley del 10 de noviembre reconoce oficialmente a Llallagua como ciudad.',
                    ],
                ];
            @endphp
            <div class="gam-metrics" data-aos="fade-up" data-aos-duration="900">
                <div class="gam-metrics-grid">
                    <div class="gam-metric gam-metric--lead">
                        <strong class="counter">41.686</strong>
                        <span>Habitantes</span>
                    </div>
                    <div class="gam-metric">
                        <strong class="counter">19.749</strong>
                        <span>Varones</span>
                    </div>
                    <div class="gam-metric">
                        <strong class="counter">21.937</strong>
                        <span>Mujeres</span>
                    </div>
                    <div class="gam-metric">
                        <strong class="counter">3.901</strong>
                        <span>m s. n. m.</span>
                    </div>
                    <div class="gam-metric">
                        <strong>7</strong>
                        <span>Subalcaldías</span>
                    </div>
                </div>
            </div>

            <div class="gam-chronicle" data-aos="fade-up" data-aos-duration="1000">
                <header class="gam-chronicle-head">
                    <h3>Información histórica</h3>
                    <p>Hitos que marcan el camino institucional de Llallagua.</p>
                </header>
                <ol class="gam-chronicle-list">
                    @foreach ($hitos as $hito)
                        <li>
                            <time datetime="{{ $hito['año'] }}">{{ $hito['año'] }}</time>
                            <div>
                                <h4>{{ $hito['titulo'] }}</h4>
                                <p>{{ $hito['texto'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </section>

    {{-- 2. Documentos y trámites: bento (un bloque grande + tiles) --}}
    <section class="gam-section gam-section--soft" id="servicios">
        <div class="container">
            @include('client.partials.section-heading', [
                'title' => 'Documentos y trámites frecuentes',
                'subtitle' => 'Lo que la población consulta con más frecuencia, ordenado por tipo de documento.',
            ])

            <div class="gam-bento">
                <a class="gam-bento-hero" href="{{ route('gacetas') }}" data-aos="fade-up" data-aos-duration="800">
                    <span class="gam-bento-hero-icon"><i class="icon-Folder-Bookmark"></i></span>
                    <div>
                        <h3>Toda la normativa municipal en un solo lugar</h3>
                        <p>Leyes municipales, resoluciones, resoluciones administrativas y decretos ediles publicados
                            para su consulta y descarga en PDF.</p>
                        <span class="gam-bento-link">Consultar la Gaceta <i class="ti-arrow-right"></i></span>
                    </div>
                </a>

                <a class="gam-bento-tile" href="{{ route('transparencia') }}" data-aos="fade-up" data-aos-duration="850">
                    <i class="icon-File-Search"></i>
                    <strong>Transparencia</strong>
                    <span>Informes de transparencia y lucha contra la corrupción.</span>
                </a>
                <a class="gam-bento-tile" href="{{ route('informes-gestion') }}" data-aos="fade-up" data-aos-duration="900">
                    <i class="icon-Files"></i>
                    <strong>Informes de gestión</strong>
                    <span>Rendición pública de cuentas del municipio.</span>
                </a>
                <a class="gam-bento-tile" href="{{ route('auditoria-interna') }}" data-aos="fade-up"
                    data-aos-duration="950">
                    <i class="icon-Folder-Search"></i>
                    <strong>Auditoría interna</strong>
                    <span>Informes de auditoría publicados.</span>
                </a>
                <a class="gam-bento-tile gam-bento-tile--accent" href="{{ route('documentos_importantes') }}"
                    data-aos="fade-up" data-aos-duration="1000">
                    <i class="icon-Bookmark"></i>
                    <strong>Documentos importantes</strong>
                    <span>Documentación destacada del municipio.</span>
                </a>

                <div class="gam-bento-aside" data-aos="fade-up" data-aos-duration="1050">
                    <h3>Otros servicios</h3>
                    <a class="gam-aside-link" href="{{ route('proyectos') }}">
                        <i class="icon-Edit-Map"></i> Proyectos y obras
                    </a>
                    <a class="gam-aside-link" href="{{ route('escala-salarial') }}">
                        <i class="icon-Coins"></i> Escala salarial
                    </a>
                    <a class="gam-aside-link" href="{{ route('actividades') }}">
                        <i class="icon-Calendar-4"></i> Actividades
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- 3. Cultura y turismo: doble panel fotográfico --}}
    <section class="gam-discover" aria-label="Cultura y turismo">
        <a class="gam-discover-panel" href="{{ route('cultura') }}" data-aos="fade-up" data-aos-duration="800">
            <span class="gam-discover-media gam-discover-media--cultura" aria-hidden="true"></span>
            <span class="gam-discover-body">
                <span class="gam-discover-eyebrow">Identidad y tradición</span>
                <h2>Unidad de Cultura</h2>
                <p>Folklore, festividad de la Virgen de la Asunción y el compromiso de cuidar la identidad llallagueña.</p>
                <span class="gam-discover-meta">
                    <span>Festividad</span>
                    <span>Folklore</span>
                    <span>Patrimonio</span>
                </span>
                <span class="gam-discover-cta">
                    Explorar cultura <i class="ti-arrow-right" aria-hidden="true"></i>
                </span>
            </span>
        </a>

        <a class="gam-discover-panel gam-discover-panel--alt" href="{{ route('turismo') }}" data-aos="fade-up"
            data-aos-duration="900">
            <span class="gam-discover-media gam-discover-media--turismo" aria-hidden="true"></span>
            <span class="gam-discover-body">
                <span class="gam-discover-eyebrow">Destino norte potosino</span>
                <h2>Unidad de Turismo</h2>
                <p>Minería, paisaje y sitios emblemáticos para descubrir Llallagua como destino con historia propia.</p>
                <span class="gam-discover-meta">
                    <span>Sitios</span>
                    <span>Historia</span>
                    <span>Naturaleza</span>
                </span>
                <span class="gam-discover-cta">
                    Descubrir turismo <i class="ti-arrow-right" aria-hidden="true"></i>
                </span>
            </span>
        </a>
    </section>

    {{-- 4. Subalcaldías: mosaico territorial --}}
    <section class="gam-section gam-section--soft gam-subalc-home" id="subalcaldias">
        <div class="container">
            <div class="gam-subalc-head" data-aos="fade-up" data-aos-duration="800">
                <div class="gam-subalc-head-copy">
                    <span class="gam-eyebrow">Territorio municipal</span>
                    <h2 class="gam-heading">Subalcaldías</h2>
                    <p class="gam-lead text-left">Siete distritos con presencia institucional del Gobierno Autónomo
                        Municipal de Llallagua.</p>
                </div>
                <a class="btn btn-success-gradiant btn-rounded btn-md btn-arrow" href="{{ route('subalcaldias') }}">
                    <span>Ver las 7 subalcaldías <i class="ti-arrow-right"></i></span>
                </a>
            </div>
            @php
                $subalcaldias = [
                    ['nombre' => 'Central', 'img' => 'central.jpg', 'anchor' => 'central'],
                    ['nombre' => 'Siglo XX', 'img' => 'siglo.jpg', 'anchor' => 'siglo'],
                    ['nombre' => '22 de Diciembre', 'img' => '22.jpg', 'anchor' => '22'],
                    ['nombre' => 'Catavi', 'img' => 'catavi.jpg', 'anchor' => 'catavi'],
                    ['nombre' => 'Chullpa', 'img' => 'chullpa.jpg', 'anchor' => 'chullpa'],
                    ['nombre' => 'Sikuya', 'img' => 'sicoya.jpg', 'anchor' => 'sicoya'],
                    ['nombre' => 'Sakamarca', 'img' => 'sakamarca.jpg', 'anchor' => 'sakamarca'],
                ];
            @endphp
            <div class="gam-mosaic">
                @foreach ($subalcaldias as $i => $sub)
                    <a class="gam-mosaic-tile {{ $i === 0 ? 'gam-mosaic-tile--lead' : ($i >= 5 ? 'gam-mosaic-tile--wide' : '') }}"
                        href="{{ route('subalcaldias') }}#{{ $sub['anchor'] }}" data-aos="fade-up"
                        data-aos-duration="{{ 650 + $i * 50 }}">
                        <img src="{{ asset('client/images/subalcaldia/' . $sub['img']) }}"
                            alt="Subalcaldía {{ $sub['nombre'] }}" loading="lazy">
                        <span class="gam-mosaic-caption">
                            <small>Subalcaldía</small>
                            <strong>{{ $sub['nombre'] }}</strong>
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 5. Noticias: composición editorial (una destacada + secundarias) --}}
    @php $news = isset($news) ? $news : collect(); @endphp
    <section class="gam-section gam-section--white" id="noticias">
        <div class="container">
            <div class="gam-section-bar">
                <div>
                    <h2 class="gam-heading">Noticias del municipio</h2>
                </div>
                <a class="btn btn-success-gradiant btn-rounded btn-md btn-arrow" href="{{ route('noticias') }}">
                    <span>Ver todas las noticias <i class="ti-arrow-right"></i></span>
                </a>
            </div>

            @if ($news->count())
                @php
                    $destacada = $news->first();
                    $secundarias = $news->slice(1)->take(3);
                @endphp
                <div class="gam-editorial">
                    <article class="gam-editorial-main" data-aos="fade-up" data-aos-duration="800"
                        data-news-modal data-title="{{ $destacada->titulo }}"
                        data-date="{{ date('d/m/Y', strtotime($destacada->fecha)) }}"
                        data-photo="{{ asset($destacada->photo) }}">
                        <a class="gam-editorial-media js-news-open" href="#"
                            aria-label="Leer noticia: {{ $destacada->titulo }}">
                            <img src="{{ asset($destacada->photo) }}" alt="{{ $destacada->titulo }}">
                        </a>
                        <div class="gam-editorial-body">
                            <span class="gam-news-date">{{ date('d/m/Y', strtotime($destacada->fecha)) }}</span>
                            <h3><a href="#" class="js-news-open">{{ $destacada->titulo }}</a></h3>
                            <p>{{ str_limit(strip_tags($destacada->contenido), 230) }}</p>
                            <a class="btn btn-success-gradiant btn-rounded btn-md btn-arrow js-news-open"
                                href="#">
                                <span>Seguir leyendo <i class="ti-arrow-right"></i></span>
                            </a>
                        </div>
                        <div class="js-news-full d-none" aria-hidden="true">{!! $destacada->contenido !!}</div>
                    </article>

                    <div class="gam-editorial-side" data-aos="fade-left" data-aos-duration="900">
                        <h3 class="gam-editorial-side-title">Últimas publicaciones</h3>
                        @forelse($secundarias as $item)
                            @include('client.partials.news-card', ['item' => $item, 'variant' => 'row'])
                        @empty
                            <p class="gam-muted">Pronto publicaremos más noticias.</p>
                        @endforelse
                        <a class="gam-text-link" href="{{ route('noticias') }}">
                            Ir al archivo de noticias <i class="ti-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @else
                <div class="gam-editorial-placeholder">
                    <div class="gam-news-feature gam-news-feature--placeholder">
                        <div class="gam-news-feature-body">
                            <h3>Entrega de obras, agenda municipal y novedades institucionales</h3>
                            <p>Consulta las publicaciones del Gobierno Autónomo Municipal de Llallagua.</p>
                            <a class="btn btn-info-gradiant btn-rounded btn-md" href="{{ route('noticias') }}">
                                Ir a las noticias
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    @include('client.layouts.contact')
@endsection
