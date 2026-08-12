@php
    $heroSlides = [
        [
            'img' => 'client/images/sliders/covid19.jpg',
            'alt' => 'Gobierno Autónomo Municipal de Llallagua',
            'title' => 'Gobierno Autónomo Municipal de Llallagua',
            'text' => 'Esfuerzo y Desarrollo',
            'anim' => 'fadeInUp',
        ],
        [
            'img' => 'client/images/sliders/slide1.jpg',
            'alt' => 'Vista del municipio de Llallagua',
            'title' => 'Unidad, trabajo y honestidad',
            'text' => 'Adelante Llallagua con dignidad',
            'anim' => 'fadeInLeft',
        ],
        [
            'img' => 'client/images/sliders/slide2.jpg',
            'alt' => 'Edificio Central del Gobierno Autónomo Municipal de Llallagua',
            'title' => 'Gobierno Autónomo Municipal de Llallagua',
            'text' => 'Esfuerzo y Desarrollo',
            'anim' => 'fadeInUp',
        ],
        [
            'img' => 'client/images/sliders/slide0.jpg',
            'alt' => 'Festividad de la Virgen de la Asunción en Llallagua',
            'title' => 'Unidad, trabajo y honestidad',
            'text' => 'Adelante Llallagua con dignidad',
            'anim' => 'fadeInUp',
        ],
    ];
@endphp
<section id="slider-sec" class="slider4 gam-hero" aria-label="Portada institucional">
    <div id="slider4" class="carousel bs-slider slide control-round indicators-line" data-ride="carousel"
        data-pause="hover" data-keyboard="false" data-interval="7000">
        <ol class="carousel-indicators">
            @foreach ($heroSlides as $i => $slide)
                <li data-target="#slider4" data-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}"
                    aria-label="Ir a la portada {{ $i + 1 }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach ($heroSlides as $i => $slide)
                <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                    <img src="{{ asset($slide['img']) }}" alt="{{ $slide['alt'] }}" class="slide-image">
                    <div class="slide-text slide_style_left">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7 col-lg-8 col-md-10">
                                    <div class="gam-hero-copy">
                                        <h1 data-animation="animated {{ $slide['anim'] }}"
                                            class="titleslide font-bold m-0">{{ $slide['title'] }}</h1>
                                        <p class="gam-hero-sub" data-animation="animated fadeInUp">{{ $slide['text'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="slider-control">
                <a class="left carousel-control-prev font-14" href="#slider4" role="button" data-slide="prev">
                    <span class="ti-arrow-left" aria-hidden="true"></span>
                    <b class="sr-only font-normal">Anterior</b>
                </a>
                <a class="right carousel-control-next font-14" href="#slider4" role="button" data-slide="next">
                    <span class="ti-arrow-right" aria-hidden="true"></span>
                    <b class="sr-only font-normal">Siguiente</b>
                </a>
            </div>
        </div>
    </div>
</section>
