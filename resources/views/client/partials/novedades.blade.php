@if(isset($novedades) && $novedades->count())
<section class="gam-novedades" id="novedades" aria-label="Publicaciones recientes">
    <div class="container">
        <div class="gam-novedades-panel">
            <div class="gam-novedades-carousel owl-carousel owl-theme">
                @foreach($novedades as $item)
                    @php
                        $isPdf = !empty($item['is_pdf']);
                        $titleLimit = $isPdf ? 95 : 70;
                        $descLimit = $isPdf ? 150 : 90;
                    @endphp
                    <a class="gam-novedades-card {{ !empty($item['is_new']) ? 'is-fresh' : '' }} {{ $isPdf ? 'is-pdf' : '' }}"
                        href="{{ $item['url'] }}"
                        @if(!empty($item['open_file'])) target="_blank" rel="noopener noreferrer" @endif
                        title="{{ $item['title'] }}">
                        <span class="gam-novedades-media">
                            <img src="{{ $item['preview'] }}"
                                alt="{{ $item['title'] }}"
                                loading="{{ $loop->index < 2 ? 'eager' : 'lazy' }}"
                                decoding="async"
                                class="{{ $isPdf ? 'gam-novedades-media-pdf' : '' }}">
                            @if($isPdf)
                                <span class="gam-novedades-file-tag">PDF</span>
                            @endif
                        </span>
                        <span class="gam-novedades-card-body">
                            <span class="gam-novedades-meta">
                                <span class="gam-novedades-label">{{ $item['label'] }}</span>
                                <time datetime="{{ $item['date']->toDateString() }}">
                                    {{ $item['date']->format('d/m/Y') }}
                                </time>
                            </span>
                            @if($isPdf && !empty($item['code']) && $item['code'] !== $item['title'])
                                <span class="gam-novedades-code">{{ $item['code'] }}</span>
                            @endif
                            <span class="gam-novedades-item-title">{{ str_limit($item['title'], $titleLimit) }}</span>
                            @if(!empty($item['description']))
                                <span class="gam-novedades-item-desc">{{ str_limit($item['description'], $descLimit) }}</span>
                            @endif
                            @if(!$isPdf && !empty($item['code']))
                                <span class="gam-novedades-code">{{ $item['code'] }}</span>
                            @endif
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
