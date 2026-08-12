@extends('client.layouts.index')
@section('title', 'Nómina de Autoridades | GAM Llallagua')
@section('content')
    @php
        $prioridadCargo = [
            'ALCALDE MUNICIPAL' => 1,
            'PRESIDENTE DEL CONCEJO' => 2,
        ];

        $porCargo = $employees
            ->groupBy(function ($autoridad) {
                return optional($autoridad->charges)->charge_employee ?: 'Autoridad municipal';
            })
            ->sortBy(function ($grupo, $cargo) use ($prioridadCargo) {
                $clave = mb_strtoupper(trim($cargo));
                $orden = $prioridadCargo[$clave] ?? 100;
                return sprintf('%03d-%s', $orden, $clave);
            });
    @endphp

    <section class="gam-inner-section gam-autoridades-page">
        <div class="container">
            <header class="gam-autoridades-head" data-aos="fade-up" data-aos-duration="700">
                <h1 class="gam-heading">Nómina de Autoridades</h1>
                <p class="gam-lead">
                    Autoridades electas y designadas del Gobierno Autónomo Municipal de Llallagua
                </p>
            </header>

            @if ($porCargo->isNotEmpty())
                <div class="gam-autoridades-board" data-aos="fade-up" data-aos-duration="800">
                    @foreach($porCargo as $cargo => $grupo)
                        @php
                            $cargoId = 'cargo-' . preg_replace('/[^a-z0-9]+/', '-', mb_strtolower($cargo));
                        @endphp
                        <article class="gam-autoridad-block" aria-labelledby="{{ $cargoId }}">
                            <header class="gam-autoridad-block-head">
                                <h2 class="gam-autoridad-cargo" id="{{ $cargoId }}">{{ $cargo }}</h2>
                                @if ($grupo->count() > 1)
                                    <span class="gam-autoridad-qty">{{ $grupo->count() }}</span>
                                @endif
                            </header>
                            <ul class="gam-autoridades-names">
                                @foreach($grupo as $autoridad)
                                    <li>
                                        {{ trim($autoridad->name . ' ' . $autoridad->last_name) }}
                                    </li>
                                @endforeach
                            </ul>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="gam-autoridades-empty-static" data-aos="fade-up" data-aos-duration="800">
                    <i class="icon-Business-Mens" aria-hidden="true"></i>
                    <p>Pronto publicaremos la nómina de autoridades municipales.</p>
                </div>
            @endif

            <aside class="gam-alcalde-links" aria-label="Secciones relacionadas" data-aos="fade-up"
                data-aos-duration="900">
                <span class="gam-side-label">También puede consultar</span>
                <div class="gam-alcalde-links-row">
                    <a class="gam-alcalde-link" href="{{ route('alcalde') }}">
                        <i class="icon-Administrator" aria-hidden="true"></i>
                        <span>
                            <strong>Alcalde Municipal</strong>
                            <em>Autoridad ejecutiva</em>
                        </span>
                        <i class="ti-arrow-right" aria-hidden="true"></i>
                    </a>
                    <a class="gam-alcalde-link" href="{{ route('personal') }}">
                        <i class="icon-Business-Mens" aria-hidden="true"></i>
                        <span>
                            <strong>Personal dependiente</strong>
                            <em>Nómina municipal</em>
                        </span>
                        <i class="ti-arrow-right" aria-hidden="true"></i>
                    </a>
                    <a class="gam-alcalde-link" href="{{ route('escala-salarial') }}">
                        <i class="icon-Coins" aria-hidden="true"></i>
                        <span>
                            <strong>Escala salarial</strong>
                            <em>Remuneraciones</em>
                        </span>
                        <i class="ti-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </aside>
        </div>
    </section>
@endsection
