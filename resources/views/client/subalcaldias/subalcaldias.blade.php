@extends('client.layouts.index')
@section('title', 'Subalcaldías | GAM Llallagua')
@section('content')
@php
    $distritos = [
        [
            'id' => 'central',
            'nombre' => 'Central',
            'img' => 'sub.jpg',
            'resumen' => 'Sede principal del Gobierno Autónomo Municipal de Llallagua.',
            'contactos' => [
                ['tipo' => 'direccion', 'etiqueta' => 'Dirección', 'valor' => 'Av. 10 de noviembre S/N'],
                ['tipo' => 'telefono', 'etiqueta' => 'Oficina central', 'valor' => '(02) 5822728 · (02) 5820158', 'tel' => '+59125822728'],
                ['tipo' => 'telefono', 'etiqueta' => 'Dir. financiera', 'valor' => '(02) 5820514', 'tel' => '+59125820514'],
                ['tipo' => 'telefono', 'etiqueta' => 'Dpto. eléctrico', 'valor' => '(02) 5820487', 'tel' => '+59125820487'],
            ],
        ],
        [
            'id' => 'siglo',
            'nombre' => 'Siglo XX',
            'img' => 'siglo.jpg',
            'resumen' => 'Atención municipal en el distrito minero de Siglo XX.',
            'contactos' => [
                ['tipo' => 'direccion', 'etiqueta' => 'Dirección', 'valor' => 'Plaza del Minero Siglo XX'],
                ['tipo' => 'telefono', 'etiqueta' => 'Oficina', 'valor' => '(02) 5820814', 'tel' => '+59125820814'],
            ],
        ],
        [
            'id' => '22',
            'nombre' => '22 de Diciembre',
            'img' => '22.jpg',
            'resumen' => 'Presencia institucional en el distrito 22 de Diciembre.',
            'contactos' => [
                [
                    'tipo' => 'direccion',
                    'etiqueta' => 'Dirección',
                    'valor' => 'Av. Norte Potosí, entre calle Ecuador y Villarroel, lado colegio “Martín Cárdenas”',
                ],
                ['tipo' => 'telefono', 'etiqueta' => 'Oficina', 'valor' => '(02) 5822657', 'tel' => '+59125822657'],
            ],
        ],
        [
            'id' => 'catavi',
            'nombre' => 'Catavi',
            'img' => 'catavi.jpg',
            'resumen' => 'Servicios municipales para la población de Catavi.',
            'contactos' => [
                ['tipo' => 'direccion', 'etiqueta' => 'Dirección', 'valor' => 'S/N'],
                ['tipo' => 'telefono', 'etiqueta' => 'Oficina', 'valor' => '(02) 5821272', 'tel' => '+59125821272'],
            ],
        ],
        [
            'id' => 'chullpa',
            'nombre' => 'Chullpa',
            'img' => 'chullpa.jpg',
            'resumen' => 'Atención local para el distrito de Chullpa.',
            'contactos' => [
                ['tipo' => 'direccion', 'etiqueta' => 'Dirección', 'valor' => 'Av. 31 de octubre, entre Busch y 23 de marzo'],
                ['tipo' => 'info', 'etiqueta' => 'Oficina', 'valor' => 'S/N'],
            ],
        ],
        [
            'id' => 'sicoya',
            'nombre' => 'Sikuya',
            'img' => 'sicoya.jpg',
            'resumen' => 'Oficina distrital al servicio de Sikuya.',
            'contactos' => [
                [
                    'tipo' => 'direccion',
                    'etiqueta' => 'Dirección',
                    'valor' => 'Camino Llallagua–Catavi, entre calle Catavi y Av. Barzola',
                ],
                ['tipo' => 'info', 'etiqueta' => 'Oficina', 'valor' => 'S/N'],
            ],
        ],
        [
            'id' => 'sakamarca',
            'nombre' => 'Sakamarca',
            'img' => 'sakamarca.jpg',
            'resumen' => 'Presencia municipal en el distrito de Sakamarca.',
            'contactos' => [
                ['tipo' => 'direccion', 'etiqueta' => 'Dirección', 'valor' => 'Calle 4, entre calle D y E'],
                ['tipo' => 'info', 'etiqueta' => 'Oficina', 'valor' => 'S/N'],
            ],
        ],
    ];
@endphp

<header class="gam-page-banner gam-page-banner--subalc">
    <img
        src="{{ asset('client/images/subalcaldia/sub.jpg') }}"
        alt="Subalcaldías del Gobierno Autónomo Municipal de Llallagua"
        width="1600"
        height="638"
        decoding="async"
        fetchpriority="high"
    >
</header>

<section class="gam-inner-section gam-subalc-page">
    <div class="container">
        <div class="gam-subalc-intro gam-subalc-intro--center">
            <div class="gam-subalc-intro-copy">
                <h2 class="gam-heading">Oficinas por distrito</h2>
            </div>
        </div>

        <nav class="gam-subalc-jump gam-subalc-jump--center" aria-label="Ir a una subalcaldía">
            <div class="gam-subalc-jump-list">
                @foreach($distritos as $distrito)
                    <a class="gam-subalc-jump-link" href="#{{ $distrito['id'] }}">{{ $distrito['nombre'] }}</a>
                @endforeach
            </div>
        </nav>
    </div>
</section>

<section class="gam-subalc-directory" aria-label="Listado de subalcaldías">
    @foreach($distritos as $i => $distrito)
        <article
            class="gam-subalc-card {{ $i % 2 === 1 ? 'gam-subalc-card--reverse' : '' }}"
            id="{{ $distrito['id'] }}"
            @if($i > 1) data-aos="fade-up" data-aos-duration="{{ 500 + ($i * 30) }}" @endif
        >
            <div class="container">
                <div class="gam-subalc-card-grid">
                    <figure class="gam-subalc-media {{ $distrito['id'] === 'central' ? 'gam-subalc-media--full' : '' }}">
                        <img
                            src="{{ asset('client/images/subalcaldia/' . $distrito['img']) }}"
                            alt="Subalcaldía {{ $distrito['nombre'] }}"
                            width="1400"
                            height="900"
                            loading="{{ $i < 2 ? 'eager' : 'lazy' }}"
                            decoding="async"
                            @if($i === 0) fetchpriority="high" @endif
                        >
                        <figcaption>Subalcaldía</figcaption>
                    </figure>

                    <div class="gam-subalc-body">
                        <h2 class="gam-heading-sm">{{ $distrito['nombre'] }}</h2>
                        <p class="gam-subalc-summary">{{ $distrito['resumen'] }}</p>

                        <ul class="gam-subalc-facts">
                            @foreach($distrito['contactos'] as $contacto)
                                <li>
                                    <span class="gam-subalc-fact-icon" aria-hidden="true">
                                        @if($contacto['tipo'] === 'direccion')
                                            <i class="icon-Map-Marker2"></i>
                                        @elseif($contacto['tipo'] === 'telefono')
                                            <i class="fa fa-phone"></i>
                                        @else
                                            <i class="ti-info-alt"></i>
                                        @endif
                                    </span>
                                    <span class="gam-subalc-fact-copy">
                                        <span class="gam-side-label">{{ $contacto['etiqueta'] }}</span>
                                        @if(!empty($contacto['tel']))
                                            <a href="tel:{{ $contacto['tel'] }}">{{ $contacto['valor'] }}</a>
                                        @else
                                            <strong>{{ $contacto['valor'] }}</strong>
                                        @endif
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </article>
    @endforeach
</section>
@endsection
