@extends('client.layouts.index')
@section('title', 'Alcalde Municipal | GAM Llallagua')
@section('content')
    <section class="gam-inner-section gam-alcalde-page">
        <div class="container">
            <header class="gam-alcalde-head gam-alcalde-head--center" data-aos="fade-up" data-aos-duration="700">
                <h1 class="gam-heading">Alcalde Municipal</h1>
                <p class="gam-lead">Autoridad ejecutiva del Gobierno Autónomo Municipal de Llallagua</p>
            </header>

            @forelse($employees as $employee)
                @php
                    $nombreCompleto = trim($employee->name . ' ' . $employee->last_name);
                @endphp
                <article class="gam-alcalde" aria-labelledby="alcalde-nombre">
                    <div class="gam-alcalde-hero" data-aos="fade-up" data-aos-duration="800">
                        <figure class="gam-alcalde-portrait">
                            <img src="{{ asset($employee->photo) }}"
                                alt="Retrato de {{ $nombreCompleto }}, Alcalde Municipal de Llallagua"
                                width="420" height="520" loading="eager">
                        </figure>

                        <div class="gam-alcalde-identity">
                            <h2 class="gam-alcalde-name" id="alcalde-nombre">{{ $nombreCompleto }}</h2>
                            @if (!empty($employee->charge_employee))
                                <p class="gam-alcalde-role">{{ $employee->charge_employee }}</p>
                            @endif
                            <p class="gam-alcalde-meta">
                                Nacido el 28 de diciembre de 1974 en el municipio de Llallagua,
                                provincia Rafael Bustillo, departamento de Potosí.
                            </p>

                            @if ($employee->address || $employee->email || $employee->phone)
                                <dl class="gam-alcalde-facts">
                                    @if ($employee->address)
                                        <div class="gam-alcalde-fact">
                                            <dt>
                                                <i class="icon-Map-Marker2" aria-hidden="true"></i>
                                                Dirección
                                            </dt>
                                            <dd>{{ $employee->address }}</dd>
                                        </div>
                                    @endif
                                    @if ($employee->email)
                                        <div class="gam-alcalde-fact">
                                            <dt>
                                                <i class="icon-Envelope" aria-hidden="true"></i>
                                                Correo
                                            </dt>
                                            <dd>
                                                <a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a>
                                            </dd>
                                        </div>
                                    @endif
                                    @if ($employee->phone)
                                        <div class="gam-alcalde-fact">
                                            <dt>
                                                <i class="icon-Phone" aria-hidden="true"></i>
                                                Teléfono
                                            </dt>
                                            <dd>
                                                <a href="tel:{{ $employee->phone }}">{{ $employee->phone }}</a>
                                            </dd>
                                        </div>
                                    @endif
                                </dl>
                            @endif
                        </div>
                    </div>

                </article>
            @empty
                <div class="gam-empty-state" data-aos="fade-up" data-aos-duration="800">
                    <i class="icon-Administrator" aria-hidden="true"></i>
                    <h2 class="gam-heading-sm">Información no disponible</h2>
                    <p>Pronto publicaremos los datos de la autoridad ejecutiva del municipio.</p>
                </div>
            @endforelse

            <aside class="gam-alcalde-links" aria-label="Secciones relacionadas" data-aos="fade-up"
                data-aos-duration="900">
                <span class="gam-side-label">También puede consultar</span>
                <div class="gam-alcalde-links-row">
                    <a class="gam-alcalde-link" href="{{ route('autoridades') }}">
                        <i class="icon-Business-Mens" aria-hidden="true"></i>
                        <span>
                            <strong>Autoridades</strong>
                            <em>Nómina municipal</em>
                        </span>
                        <i class="ti-arrow-right" aria-hidden="true"></i>
                    </a>
                    <a class="gam-alcalde-link" href="{{ route('proyectos') }}">
                        <i class="icon-Edit-Map" aria-hidden="true"></i>
                        <span>
                            <strong>Proyectos</strong>
                            <em>Obras en ejecución</em>
                        </span>
                        <i class="ti-arrow-right" aria-hidden="true"></i>
                    </a>
                    <a class="gam-alcalde-link" href="{{ route('transparencia') }}">
                        <i class="icon-File-Search" aria-hidden="true"></i>
                        <span>
                            <strong>Transparencia</strong>
                            <em>Rendición de cuentas</em>
                        </span>
                        <i class="ti-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </aside>

        </div>
    </section>
@endsection
