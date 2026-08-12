@extends('client.layouts.index')
@section('title', 'Nómina del Personal | GAM Llallagua')
@section('content')
    <section class="gam-inner-section gam-autoridades-page gam-personal-page">
        <div class="container">
            <header class="gam-autoridades-head" data-aos="fade-up" data-aos-duration="700">
                <h1 class="gam-heading">Nómina del Personal Dependiente</h1>
                <p class="gam-lead">
                    Servidores públicos del Gobierno Autónomo Municipal de Llallagua
                </p>
            </header>

            <div class="gam-doc-panel" data-aos="fade-up" data-aos-duration="800">
                <div class="gam-doc-toolbar gam-doc-toolbar--search-only">
                    <div class="gam-doc-search-wrap">
                        <label class="sr-only" for="personal-search">Buscar personal</label>
                        <i class="ti-search" aria-hidden="true"></i>
                        <input class="form-control gam-doc-search" id="personal-search" type="search"
                            placeholder="Buscar por nombre, nivel o cargo..." autocomplete="off"
                            data-gam-search="#personal-items" data-gam-item=".buscar"
                            data-gam-empty="#personal-empty">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table gam-data-table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre y apellido</th>
                                <th scope="col">Nivel</th>
                                <th scope="col">Cargo</th>
                            </tr>
                        </thead>
                        <tbody id="personal-items">
                            @forelse($employees as $personal)
                                <tr class="buscar">
                                    <td data-label="Nombre y apellido">
                                        {{ trim($personal->name . ' ' . $personal->last_name) }}
                                    </td>
                                    <td data-label="Nivel">
                                        <span class="gam-level-tag">
                                            {{ optional($personal->levels)->level_employee ?: '—' }}
                                        </span>
                                    </td>
                                    <td data-label="Cargo">
                                        {{ optional($personal->charges)->charge_employee ?: '—' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">
                                        Pronto publicaremos la nómina del personal municipal.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <p class="gam-doc-empty" id="personal-empty" hidden>
                    <i class="ti-face-sad" aria-hidden="true"></i>
                    No encontramos funcionarios con ese criterio de búsqueda.
                </p>
            </div>

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
                    <a class="gam-alcalde-link" href="{{ route('alcalde') }}">
                        <i class="icon-Administrator" aria-hidden="true"></i>
                        <span>
                            <strong>Alcalde Municipal</strong>
                            <em>Autoridad ejecutiva</em>
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
