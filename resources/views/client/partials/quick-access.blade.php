@php
    $accesos = [
        [
            'url' => route('gacetas'),
            'icon' => 'icon-Folder-Bookmark',
            'label' => 'Gacetas',
            'desc' => 'Leyes, resoluciones y decretos',
        ],
        [
            'url' => route('transparencia'),
            'icon' => 'icon-File-Search',
            'label' => 'Transparencia',
            'desc' => 'Informes y rendición de cuentas',
        ],
        [
            'url' => route('noticias'),
            'icon' => 'icon-Speach-Bubble',
            'label' => 'Noticias',
            'desc' => 'Actualidad del municipio',
        ],
        [
            'url' => route('proyectos'),
            'icon' => 'icon-Edit-Map',
            'label' => 'Proyectos',
            'desc' => 'Obras e inversión pública',
        ],
        [
            'url' => route('autoridades'),
            'icon' => 'icon-Business-Mens',
            'label' => 'RRHH',
            'desc' => 'Autoridades y personal',
        ],
        [
            'url' => url('/#contact'),
            'icon' => 'icon-Envelope',
            'label' => 'Contacto',
            'desc' => 'Formulario de consultas',
            'accent' => true,
        ],
    ];
@endphp
<section class="gam-quick-access" id="accesos" aria-labelledby="accesos-title">
    <div class="container">
        <h2 class="sr-only" id="accesos-title">Accesos rápidos</h2>
        <div class="gam-quick-grid">
            @foreach($accesos as $i => $acceso)
                <a class="gam-quick-item {{ !empty($acceso['accent']) ? 'gam-quick-item--accent' : '' }}"
                    href="{{ $acceso['url'] }}" data-aos="fade-up" data-aos-duration="{{ 600 + ($i * 80) }}">
                    <span class="gam-quick-icon"><i class="{{ $acceso['icon'] }}"></i></span>
                    <span class="gam-quick-label">{{ $acceso['label'] }}</span>
                    <span class="gam-quick-desc">{{ $acceso['desc'] }}</span>
                    <span class="gam-quick-arrow" aria-hidden="true"><i class="ti-arrow-right"></i></span>
                </a>
            @endforeach
        </div>
    </div>
</section>
