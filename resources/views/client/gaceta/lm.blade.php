@extends('client.layouts.index')
@section('title', 'Leyes Municipales | GAM Llallagua')
@section('content')
    @include('client.partials.page-banner', [
        'eyebrow' => 'Gaceta Municipal',
        'title' => 'Leyes Municipales',
        'subtitle' => 'Normativa aprobada por el Concejo Municipal de Llallagua',


    ])
    <section class="gam-inner-section">
        <div class="container">
            @include('client.partials.doc-list', [
                'documents' => $lm,
                'label' => 'Ley municipal',
                'intro' => 'Ordenadas de la publicación más reciente a la más antigua.',
                'searchPlaceholder' => 'Buscar ley por código, título o descripción...',
                'emptyText' => 'Todavía no hay leyes municipales publicadas.',
            ])
            @include('client.partials.doc-nav')
        </div>
    </section>
@endsection
