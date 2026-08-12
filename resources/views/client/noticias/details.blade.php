@extends('client.layouts.index')
@section('title', $detail->titulo . ' | GAM Llallagua')
@section('content')
    @include('client.partials.page-banner', [
        'image' => asset('client/images/news/img.jpg'),
        'textless' => true,
    ])
    <section class="gam-inner-section">
        <div class="container">
            <div class="gam-article-layout">
                <article class="gam-article">
                    <h1 class="sr-only">{{ $detail->titulo }}</h1>
                    <figure class="gam-article-figure">
                        <img src="{{ asset($detail->photo) }}" alt="{{ $detail->titulo }}" class="img-fluid">
                    </figure>
                    <div class="gam-article-meta">
                        <span class="gam-news-date"><i class="ti-calendar"></i>
                            {{ date('d/m/Y', strtotime($detail->fecha)) }}</span>
                    </div>
                    <div class="gam-article-content">{!! $detail->contenido !!}</div>
                    <div class="gam-article-footer">
                        <a href="{{ route('noticias') }}" class="btn btn-outline-success btn-rounded btn-md">
                            <i class="ti-arrow-left"></i> Volver a noticias
                        </a>
                        <a class="gam-share-link"
                            href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('details', $detail->id)) }}"
                            target="_blank" rel="noopener" aria-label="Compartir en Facebook">
                            <i class="icon-Facebook"></i> Compartir
                        </a>
                    </div>
                </article>

                <aside class="gam-article-aside">
                    <div class="gam-side-card gam-side-card--light">
                        <h3>También te puede interesar</h3>
                        <a class="gam-doc-link" href="{{ route('noticias') }}">
                            <span><strong>Todas las noticias</strong><small>Archivo de publicaciones</small></span>
                            <i class="ti-arrow-right"></i>
                        </a>
                        <a class="gam-doc-link" href="{{ route('gacetas') }}">
                            <span><strong>Gaceta Municipal</strong><small>Normativa municipal</small></span>
                            <i class="ti-arrow-right"></i>
                        </a>
                        <a class="gam-doc-link" href="{{ route('transparencia') }}">
                            <span><strong>Transparencia</strong><small>Informes públicos</small></span>
                            <i class="ti-arrow-right"></i>
                        </a>
                        <a class="gam-doc-link" href="{{ route('proyectos') }}">
                            <span><strong>Proyectos</strong><small>Obras e inversión</small></span>
                            <i class="ti-arrow-right"></i>
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
