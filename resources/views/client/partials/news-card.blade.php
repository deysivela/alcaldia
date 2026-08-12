@php
    /** Tarjeta de noticia secundaria. Parámetros: $item, $limit, $variant */
    $limit = $limit ?? 130;
    $variant = $variant ?? 'card';
    $newsDate = date('d/m/Y', strtotime($item->fecha));
    $newsPhoto = asset($item->photo);
@endphp
@if($variant === 'row')
    <article class="gam-news-row" data-news-modal data-title="{{ $item->titulo }}" data-date="{{ $newsDate }}"
        data-photo="{{ $newsPhoto }}">
        <a href="#" class="gam-news-row-media js-news-open" aria-label="Leer noticia: {{ $item->titulo }}">
            <img src="{{ $newsPhoto }}" alt="{{ $item->titulo }}" loading="lazy">
        </a>
        <div class="gam-news-row-body">
            <span class="gam-news-date">{{ $newsDate }}</span>
            <h3><a href="#" class="js-news-open">{{ str_limit(strip_tags($item->titulo), 80) }}</a></h3>
        </div>
        <div class="js-news-full d-none" aria-hidden="true">{!! $item->contenido !!}</div>
    </article>
@else
    <article class="gam-news-card" data-news-modal data-title="{{ $item->titulo }}" data-date="{{ $newsDate }}"
        data-photo="{{ $newsPhoto }}">
        <a href="#" class="gam-news-card-media js-news-open" aria-label="Leer noticia: {{ $item->titulo }}">
            <img src="{{ $newsPhoto }}" alt="{{ $item->titulo }}" loading="lazy">
        </a>
        <div class="gam-news-card-body">
            <span class="gam-news-date">{{ $newsDate }}</span>
            <h3><a href="#" class="js-news-open">{{ $item->titulo }}</a></h3>
            <p>{{ str_limit(strip_tags($item->contenido), $limit) }}</p>
            <a href="#" class="gam-text-link js-news-open">
                Seguir leyendo <i class="ti-arrow-right"></i>
            </a>
        </div>
        <div class="js-news-full d-none" aria-hidden="true">{!! $item->contenido !!}</div>
    </article>
@endif
