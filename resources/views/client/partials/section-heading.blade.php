@php
    $eyebrow = $eyebrow ?? null;
    $title = $title ?? '';
    $subtitle = $subtitle ?? null;
    $align = $align ?? 'center';
@endphp
<div class="gam-section-heading text-{{ $align }}" data-aos="fade-up" data-aos-duration="900">
    <h2 class="gam-heading">{{ $title }}</h2>
    @if($subtitle)
        <p class="gam-lead">{{ $subtitle }}</p>
    @endif
</div>
