@extends('client.layouts.index')
@section('title', 'Noticias | GAM Llallagua')
@section('content')
    @include('client.partials.page-banner', [
        'image' => asset('client/images/news/img.jpg'),
        'textless' => true,
        'extraClass' => 'gam-page-banner--media gam-page-banner--media-sm gam-page-banner--news',
        'aspect' => '1476 / 767',
    ])

    <section class="gam-inner-section">
        <div class="container">
            @if($newpages->count())
                <div class="gam-news-secondary-grid">
                    @foreach($newpages as $newpage)
                        @include('client.partials.news-card', ['item' => $newpage, 'limit' => 150])
                    @endforeach
                </div>

                <div class="gam-pagination m-t-40">
                    {{ $newpages->links() }}
                </div>
            @else
                <div class="gam-empty-state">
                    <i class="icon-Speach-Bubble"></i>
                    <h2 class="gam-heading-sm">Todavía no hay noticias publicadas</h2>
                    <p>Vuelve pronto para conocer las novedades del municipio.</p>
                    <a class="btn btn-outline-success btn-rounded btn-md" href="{{ route('index') }}">Ir al inicio</a>
                </div>
            @endif
        </div>
    </section>
@endsection
