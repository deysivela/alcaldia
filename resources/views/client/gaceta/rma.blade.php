@extends('client.layouts.index')
@section('title', 'Resoluciones Municipales Administrativas | GAM Llallagua')
@section('content')
    @include('client.partials.page-banner', [
        'eyebrow' => 'Gaceta Municipal',
        'title' => 'Resoluciones Municipales Administrativas',
        'subtitle' => 'Resoluciones administrativas del Órgano Ejecutivo Municipal',


    ])
    <section class="gam-inner-section">
        <div class="container">
            @include('client.partials.doc-list', [
                'documents' => $rma,
                'label' => 'Resolución administrativa',
                'intro' => 'Resoluciones municipales administrativas (R.M.A.) publicadas por el municipio.',
                'searchPlaceholder' => 'Buscar R.M.A. por código, título o descripción...',
                'emptyText' => 'Todavía no hay resoluciones administrativas publicadas.',
            ])
            @include('client.partials.doc-nav')
        </div>
    </section>
@endsection
