@php
    $eyebrow = $eyebrow ?? null;
    $title = $title ?? '';
    $subtitle = $subtitle ?? 'Gobierno Autónomo Municipal de Llallagua';
    $image = $image ?? asset('client/images/gaceta/banner-bg.jpg');
    $align = $align ?? 'center';
    $extraClass = $extraClass ?? '';
    $aspect = $aspect ?? null;
    $plain = $plain ?? false;
    $textless = $textless ?? false;

    $bannerClasses = 'banner-innerpage gam-page-banner gam-page-banner--' . $align;
    if ($plain) {
        $bannerClasses .= ' gam-page-banner--plain';
        $bannerStyle = null;
    } else {
        $bannerStyle = 'background-image:url(' . $image . ')';
        if ($aspect) {
            $bannerStyle .= ';--gam-banner-aspect:' . $aspect;
        }
    }
    if ($textless) {
        $bannerClasses .= ' gam-page-banner--textless';
    }
    if ($extraClass) {
        $bannerClasses .= ' ' . $extraClass;
    }
@endphp
<header class="{{ $bannerClasses }}"
    @if($bannerStyle) style="{{ $bannerStyle }}" @endif>
    @unless($textless)
        <div class="container">
            <div class="row {{ $align === 'center' ? 'justify-content-center' : '' }}">
                <div class="col-lg-9 align-self-center text-{{ $align }}">
                    @if($eyebrow)
                        <span class="gam-banner-eyebrow">{{ $eyebrow }}</span>
                    @endif
                    <h1 class="title">{{ $title }}</h1>
                    @if($subtitle)
                        <h6 class="subtitle op-8">{{ $subtitle }}</h6>
                    @endif
                </div>
            </div>
        </div>
    @endunless
</header>
