@extends('client.layouts.index')
@section('title', 'Decretos Ediles | GAM Llallagua')
@section('content')
    @include('client.partials.page-banner', [
        'eyebrow' => 'Gaceta Municipal',
        'title' => 'Decretos Ediles',
        'subtitle' => 'Decretos emitidos por la Alcaldía Municipal de Llallagua',


    ])
    <section class="gam-inner-section">
        <div class="container">
            @include('client.partials.doc-list', [
                'documents' => $de,
                'label' => 'Decreto edil',
                'intro' => 'Decretos ediles ordenados por fecha de emisión.',
                'searchPlaceholder' => 'Buscar decreto por código, título o descripción...',
                'emptyText' => 'Todavía no hay decretos ediles publicados.',
            ])
            @include('client.partials.doc-nav')
        </div>
    </section>
@endsection
