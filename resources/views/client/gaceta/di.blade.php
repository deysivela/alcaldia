@extends('client.layouts.index')
@section('title', 'Documentos Importantes | GAM Llallagua')
@section('content')
    @include('client.partials.page-banner', [
        'eyebrow' => 'Información destacada',
        'title' => 'Documentos Importantes',
        'subtitle' => 'Documentación destacada del Gobierno Autónomo Municipal de Llallagua',


    ])
    <section class="gam-inner-section">
        <div class="container">
            @include('client.partials.doc-list', [
                'documents' => $docimport,
                'label' => 'Documento',
                'intro' => 'Documentos de interés general para la población del municipio.',
                'searchPlaceholder' => 'Buscar documento por código, título o descripción...',
                'emptyText' => 'Todavía no hay documentos importantes publicados.',
            ])
            @include('client.partials.doc-nav')
        </div>
    </section>
@endsection
