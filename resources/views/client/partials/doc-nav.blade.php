@php
    /** Navegación entre categorías documentales. */
    $rutaActual = Route::currentRouteName();
    $categorias = [
        ['route' => 'leyes-municipales', 'label' => 'Leyes municipales'],
        ['route' => 'resoluciones-municipales', 'label' => 'Resoluciones municipales'],
        ['route' => 'resoluciones-mun-adm', 'label' => 'Resoluciones administrativas'],
        ['route' => 'decretos-ediles', 'label' => 'Decretos ediles'],
        ['route' => 'informes-gestion', 'label' => 'Informes de gestión'],
        ['route' => 'auditoria-interna', 'label' => 'Auditoría interna'],
        ['route' => 'documentos_importantes', 'label' => 'Documentos importantes'],
        ['route' => 'transparencia', 'label' => 'Transparencia'],
    ];
@endphp
<nav class="gam-doc-nav" aria-label="Categorías de documentos">
    <span class="gam-doc-nav-label">Otras categorías</span>
    <div class="gam-doc-nav-chips">
        @foreach($categorias as $categoria)
            <a class="gam-chip {{ $rutaActual === $categoria['route'] ? 'gam-chip--active' : '' }}"
                href="{{ route($categoria['route']) }}"
                @if($rutaActual === $categoria['route']) aria-current="page" @endif>
                {{ $categoria['label'] }}
            </a>
        @endforeach
    </div>
</nav>
