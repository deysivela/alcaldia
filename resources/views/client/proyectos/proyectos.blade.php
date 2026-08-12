@extends('client.layouts.index')
@section('title', 'Proyectos | GAM Llallagua')
@section('content')
    @include('client.partials.page-banner', [
        'title' => 'Nuestros Proyectos',
        'subtitle' => 'Obras e iniciativas para el desarrollo de Llallagua',
        'image' => asset('client/images/proyectos/banner-bg3.jpg'),
    ])

    @php
        $proyectos = collect();
        foreach ($saluds as $item) {
            $proyectos->push(['item' => $item, 'slug' => 'salud', 'label' => 'Salud']);
        }
        foreach ($educacions as $item) {
            $proyectos->push(['item' => $item, 'slug' => 'educacion', 'label' => 'Educación']);
        }
        foreach ($deportes as $item) {
            $proyectos->push(['item' => $item, 'slug' => 'deporte', 'label' => 'Deporte']);
        }
        foreach ($culturas as $item) {
            $proyectos->push(['item' => $item, 'slug' => 'cultura', 'label' => 'Cultura']);
        }
        $total = $proyectos->count();
    @endphp

    <section class="gam-section gam-section--white gam-projects">
        <div class="container">
            <div class="gam-projects-intro" data-aos="fade-up" data-aos-duration="800">
                <div class="gam-projects-intro-copy">
                    <h2 class="gam-heading">Obras que transforman el municipio</h2>
                    <p class="gam-lead text-left">Proyectos de salud, educación, deporte y cultura impulsados por el
                        Gobierno Autónomo Municipal de Llallagua.</p>
                </div>
            </div>

            <div class="gam-projects-toolbar" data-aos="fade-up" data-aos-duration="900">
                <p class="gam-projects-toolbar-label">Filtrar por área</p>
                <nav class="filterby gam-projects-filters" aria-label="Filtro de proyectos">
                    <a href="javascript:void(0)" class="active" data-filter="*">Todo</a>
                    <a href="javascript:void(0)" data-filter=".salud">Salud</a>
                    <a href="javascript:void(0)" data-filter=".educacion">Educación</a>
                    <a href="javascript:void(0)" data-filter=".deporte">Deporte</a>
                    <a href="javascript:void(0)" data-filter=".cultura">Cultura</a>
                </nav>
            </div>

            @if($total)
                <div class="row portfolio-box gam-projects-grid">
                    @foreach($proyectos as $entry)
                        @php
                            $proyecto = $entry['item'];
                            $photo = $proyecto->photo;
                            if ($photo && strpos($photo, 'http') !== 0 && strpos($photo, '/') !== 0) {
                                $photo = asset($photo);
                            }
                        @endphp
                        <div class="col-lg-4 col-md-6 filter {{ $entry['slug'] }} mb-4">
                            <article class="gam-project-card">
                                <div class="gam-project-media">
                                    <img src="{{ $photo }}" alt="{{ $proyecto->name }}" loading="lazy">
                                    <span class="gam-project-tag">{{ $entry['label'] }}</span>
                                </div>
                                <div class="gam-project-body">
                                    <h3>{{ $proyecto->name }}</h3>
                                    @if(!empty($proyecto->place))
                                        <p>
                                            <i class="icon-Map-Marker2" aria-hidden="true"></i>
                                            {{ $proyecto->place }}
                                        </p>
                                    @endif
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="gam-projects-empty" data-aos="fade-up">
                    <i class="icon-Edit-Map" aria-hidden="true"></i>
                    <h3>Pronto publicaremos nuevos proyectos</h3>
                    <p>Esta sección se actualizará con las obras e iniciativas municipales.</p>
                </div>
            @endif
        </div>
    </section>
@endsection

@section('script')
<script>
    $(function () {
        $('.gam-projects-filters').on('click', 'a', function () {
            $(this).addClass('active').siblings().removeClass('active');
        });
    });
</script>
@endsection
