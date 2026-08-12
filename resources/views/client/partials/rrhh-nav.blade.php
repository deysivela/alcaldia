@php
    $rutaActual = Route::currentRouteName();
    $secciones = [
        ['route' => 'autoridades', 'label' => 'Autoridades'],
        ['route' => 'personal', 'label' => 'Personal dependiente'],
        ['route' => 'escala-salarial', 'label' => 'Escala salarial'],
        ['route' => 'alcalde', 'label' => 'Alcalde Municipal'],
    ];
@endphp
<nav class="gam-rrhh-nav" aria-label="Secciones relacionadas">
    @foreach($secciones as $seccion)
        <a class="gam-rrhh-nav-link {{ $rutaActual === $seccion['route'] ? 'is-active' : '' }}"
            href="{{ route($seccion['route']) }}"
            @if($rutaActual === $seccion['route']) aria-current="page" @endif>
            {{ $seccion['label'] }}
        </a>
    @endforeach
</nav>
