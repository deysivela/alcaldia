@extends('client.layouts.index')
@section('title', 'Informes de Gestión | GAM Llallagua')
@section('content')
    @include('client.partials.page-banner', [
        'eyebrow' => 'Rendición de cuentas',
        'title' => 'Informes de Gestión',
        'subtitle' => 'Resultados de la gestión del Gobierno Autónomo Municipal de Llallagua',


    ])
    <section class="gam-inner-section">
        <div class="container">
            @include('client.partials.doc-list', [
                'documents' => $ig,
                'label' => 'Informe de gestión',
                'intro' => 'Informes de gestión y rendición pública de cuentas por período.',
                'searchPlaceholder' => 'Buscar informe por código, título o descripción...',
                'emptyText' => 'Todavía no hay informes de gestión publicados.',
            ])
            @include('client.partials.doc-nav')
        </div>
    </section>
@endsection
