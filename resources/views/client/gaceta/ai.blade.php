@extends('client.layouts.index')
@section('title', 'Auditoría Interna | GAM Llallagua')
@section('content')
    @include('client.partials.page-banner', [
        'eyebrow' => 'Control interno',
        'title' => 'Informes de Auditoría Interna',
        'subtitle' => 'Informes de la Unidad de Auditoría Interna del municipio',


    ])
    <section class="gam-inner-section">
        <div class="container">
            @include('client.partials.doc-list', [
                'documents' => $ai,
                'label' => 'Informe de auditoría',
                'intro' => 'Informes de auditoría interna disponibles para consulta y descarga.',
                'searchPlaceholder' => 'Buscar informe por código, título o descripción...',
                'emptyText' => 'Todavía no hay informes de auditoría publicados.',
            ])
            @include('client.partials.doc-nav')
        </div>
    </section>
@endsection
