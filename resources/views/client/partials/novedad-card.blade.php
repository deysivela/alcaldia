@php
    $isPdf = !empty($item['is_pdf']) || ($variant ?? '') === 'docs';
    $titleLimit = $isPdf ? 95 : 70;
    $descLimit = $isPdf ? 150 : 90;
    $preview = $item['preview'] ?? '';
@endphp
<a class="gam-novedades-card {{ $isPdf ? 'is-pdf' : 'is-media' }}"
    href="{{ $item['url'] }}"
    @if(!empty($item['open_file'])) target="_blank" rel="noopener noreferrer" @endif
    title="{{ $item['title'] }}">
    <span class="gam-novedades-media">
        <img src="{{ $preview }}"
            alt="{{ $item['title'] }}"
            loading="eager"
            decoding="async"
            class="{{ $isPdf ? 'gam-novedades-media-pdf' : 'gam-novedades-media-photo' }}">
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
    </span>
</a>
