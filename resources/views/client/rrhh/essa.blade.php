@extends('client.layouts.index')
@section('title', 'Escala Salarial | GAM Llallagua')
@section('content')
    <section class="gam-inner-section gam-autoridades-page">
        <div class="container">
            <header class="gam-autoridades-head" data-aos="fade-up" data-aos-duration="700">
                <h1 class="gam-heading">Escala Salarial</h1>
                <p class="gam-lead">
                    Expresada en bolivianos · Gobierno Autónomo Municipal de Llallagua
                </p>
            </header>

            <div class="gam-doc-panel" data-aos="fade-up" data-aos-duration="800">
                <div class="gam-doc-toolbar gam-doc-toolbar--search-only">
                    <div class="gam-doc-search-wrap">
                        <label class="sr-only" for="essa-search">Buscar en la escala salarial</label>
                        <i class="ti-search" aria-hidden="true"></i>
                        <input class="form-control gam-doc-search" id="essa-search" type="search"
                            placeholder="Buscar por categoría, clase o denominación..." autocomplete="off"
                            data-gam-search="#essa-items" data-gam-item=".buscar"
                            data-gam-empty="#essa-empty">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table gam-data-table">
                        <thead>
                            <tr>
                                <th scope="col">Categoría</th>
                                <th scope="col">Clase</th>
                                <th scope="col">Nivel salarial</th>
                                <th scope="col">Denominación</th>
                                <th scope="col">N.º ítems</th>
                                <th scope="col" class="text-right">Sueldo mensual</th>
                                <th scope="col" class="text-right">Costo mensual</th>
                            </tr>
                        </thead>
                        <tbody id="essa-items">
                            @forelse($salaries as $salario)
                                <tr class="buscar">
                                    <td data-label="Categoría">
                                        {{ optional($salario->salcats)->category ?: '—' }}
                                    </td>
                                    <td data-label="Clase">
                                        {{ optional($salario->clases)->clase ?: '—' }}
                                    </td>
                                    <td data-label="Nivel salarial">
                                        <span class="gam-level-tag">{{ $salario->level_salary }}</span>
                                    </td>
                                    <td data-label="Denominación">{{ $salario->denomination }}</td>
                                    <td data-label="N.º ítems">{{ $salario->nro_item }}</td>
                                    <td data-label="Sueldo mensual" class="text-right gam-num">
                                        {{ $salario->salary_monthly }}
                                    </td>
                                    <td data-label="Costo mensual" class="text-right gam-num">
                                        {{ $salario->salary_total }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">
                                        Pronto publicaremos la escala salarial municipal.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <p class="gam-doc-empty" id="essa-empty" hidden>
                    <i class="ti-face-sad" aria-hidden="true"></i>
                    No encontramos registros con ese criterio de búsqueda.
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
                    <a class="gam-alcalde-link" href="{{ route('personal') }}">
                        <i class="icon-Business-Mens" aria-hidden="true"></i>
                        <span>
                            <strong>Personal dependiente</strong>
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
                </div>
            </aside>
        </div>
    </section>
@endsection
