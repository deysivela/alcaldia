@php
    $tieneImagenes = isset($novedadesImagenes) && $novedadesImagenes->count();
    $tieneDocumentos = isset($novedadesDocumentos) && $novedadesDocumentos->count();
@endphp
@if($tieneImagenes || $tieneDocumentos)
<section class="gam-novedades" id="novedades" aria-label="Publicaciones recientes">
    <div class="container">
        <div class="gam-novedades-panel">
            <div class="gam-novedades-split">
                @if($tieneImagenes)
                    <div class="gam-novedades-col gam-novedades-col--media">
                        <header class="gam-novedades-col-head">
                            <h2 class="gam-novedades-col-title">Noticias, obras públicas y actividades</h2>
                        </header>
                        <div class="gam-novedades-carousel gam-novedades-carousel--media owl-carousel owl-theme">
                            @foreach($novedadesImagenes as $item)
                                @include('client.partials.novedad-card', ['item' => $item, 'variant' => 'media'])
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($tieneDocumentos)
                    <div class="gam-novedades-col gam-novedades-col--docs">
                        <header class="gam-novedades-col-head">
                            <h2 class="gam-novedades-col-title">Leyes, resoluciones, decretos e informes</h2>
                        </header>
                        <div class="gam-novedades-carousel gam-novedades-carousel--docs owl-carousel owl-theme">
                            @foreach($novedadesDocumentos as $item)
                                @include('client.partials.novedad-card', ['item' => $item, 'variant' => 'docs'])
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <p class="gam-novedades-foot">Lo más reciente publicado por el municipio</p>
        </div>
    </div>
</section>
@endif
