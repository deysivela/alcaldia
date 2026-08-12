@php
    /**
     * Listado documental reutilizable (Gaceta, Transparencia, Informes).
     * Parámetros: $documents, $label, $searchPlaceholder, $emptyText, $intro, $showSearch
     */
    $documents = $documents ?? collect();
    $label = $label ?? 'Documento';
    $searchPlaceholder = $searchPlaceholder ?? 'Buscar por código, título o descripción...';
    $emptyText = $emptyText ?? 'Todavía no hay documentos publicados en esta categoría.';
    $intro = $intro ?? null;
    $showSearch = $showSearch ?? true;
    $total = count($documents);
    $listId = 'doc-list-' . str_slug($label);
@endphp
<div class="gam-doc-panel" id="{{ $listId }}">
    @if($intro || $showSearch)
        <div class="gam-doc-toolbar {{ $intro ? '' : 'gam-doc-toolbar--search-only' }}">
            @if($intro)
                <div class="gam-doc-toolbar-info">
                    <p class="gam-doc-intro">{{ $intro }}</p>
                </div>
            @endif
            @if($showSearch)
                <div class="gam-doc-search-wrap">
                    <label class="sr-only" for="{{ $listId }}-search">Buscar documentos</label>
                    <i class="ti-search" aria-hidden="true"></i>
                    <input class="form-control gam-doc-search" id="{{ $listId }}-search" type="search"
                        placeholder="{{ $searchPlaceholder }}" autocomplete="off"
                        data-gam-search="#{{ $listId }}-items" data-gam-item=".gam-doc-row"
                        data-gam-empty="#{{ $listId }}-empty">
                </div>
            @endif
        </div>
    @endif

    @if($total)
        <div class="gam-doc-list" id="{{ $listId }}-items">
            @foreach($documents as $doc)
                @php
                    $titulo = $doc->entity ?: ($doc->name_document ?: $label);
                    $codigo = $doc->cod;
                    $fecha = $doc->date_creation ? date('d/m/Y', strtotime($doc->date_creation)) : null;
                    $archivo = $doc->file;
                    if ($archivo && !preg_match('#^https?://#i', $archivo)) {
                        $archivo = asset($archivo);
                    }
                @endphp
                <article class="gam-doc-row buscar">
                    <span class="gam-doc-row-icon" aria-hidden="true">
                        <img src="{{ asset('client/images/pdf.png') }}" alt="">
                    </span>
                    <div class="gam-doc-row-main">
                        <span class="gam-doc-row-tag">
                            {{ $label }}@if($codigo) · {{ $codigo }}@endif
                        </span>
                        <h3 class="gam-doc-row-title">{{ $titulo }}</h3>
                        @if($doc->description)
                            <p class="gam-doc-row-desc">{{ str_limit($doc->description, 190) }}</p>
                        @endif
                    </div>
                    <div class="gam-doc-row-side">
                        @if($fecha)
                            <span class="gam-doc-row-date"><i class="ti-calendar"></i> {{ $fecha }}</span>
                        @endif
                        @if($archivo)
                            <div class="gam-doc-row-actions">
                                <a class="btn btn-outline-success btn-rounded btn-sm" href="{{ $archivo }}"
                                    target="_blank" rel="noopener">Ver</a>
                                <a class="btn btn-success-gradiant btn-rounded btn-sm" href="{{ $archivo }}"
                                    download="{{ $codigo ?: $titulo }}" aria-label="Descargar {{ $titulo }}">
                                    <i class="fa fa-download"></i> PDF
                                </a>
                            </div>
                        @else
                            <span class="gam-doc-row-date">Archivo no disponible</span>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
        <p class="gam-doc-empty" id="{{ $listId }}-empty" hidden>
            <i class="ti-face-sad"></i> No encontramos documentos con ese criterio. Intenta con otro término.
        </p>
    @else
        <p class="gam-doc-empty">{{ $emptyText }}</p>
    @endif
</div>
