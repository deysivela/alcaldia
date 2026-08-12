@extends('client.layouts.index')
@section('title', 'Resoluciones Municipales | GAM Llallagua')
@section('content')
    @include('client.partials.page-banner', [
        'eyebrow' => 'Gaceta Municipal',
        'title' => 'Resoluciones Municipales',
        'subtitle' => 'Resoluciones emitidas por el Concejo Municipal de Llallagua',


    ])
    <section class="gam-inner-section">
        <div class="container">
            @include('client.partials.doc-list', [
                'documents' => $rm,
                'label' => 'Resolución municipal',
                'intro' => 'Listado de resoluciones municipales publicadas para consulta ciudadana.',
                'searchPlaceholder' => 'Buscar resolución por código, título o descripción...',
                'emptyText' => 'Todavía no hay resoluciones municipales publicadas.',
            ])
            @include('client.partials.doc-nav')
        </div>
    </section>
@endsection
