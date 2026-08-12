@extends('client.layouts.index')
@section('title', 'Gaceta Municipal | GAM Llallagua')
@section('content')
    @include('client.partials.page-banner', [
        'title' => 'Gaceta Municipal',
        'subtitle' => 'Consulta y descarga leyes, resoluciones, decretos e informes del Gobierno Autónomo Municipal de Llallagua.',
        'plain' => true,
        'align' => 'center',
    ])

    <section class="gam-inner-section gam-gaceta-hub">
        <div class="container">
            <div class="gam-gaceta-layout">
                <div class="gam-gaceta-main">
                    <div class="gam-gaceta-block" data-aos="fade-up" data-aos-duration="700">
                        <header class="gam-gaceta-block-head">
                            <h2 class="gam-heading-sm">Normativa municipal</h2>
                            <p>Documentos aprobados por el Concejo Municipal y el Órgano Ejecutivo.</p>
                        </header>
                        <div class="gam-gaceta-grid">
                            <a href="{{ route('leyes-municipales') }}" class="gam-gaceta-tile">
                                <span class="gam-gaceta-tile-icon" aria-hidden="true"><i class="icon-Folder-Bookmark"></i></span>
                                <span class="gam-gaceta-tile-body">
                                    <strong>Leyes municipales</strong>
                                    <small>Normas de mayor jerarquía del Concejo Municipal.</small>
                                </span>
                                <i class="ti-arrow-right" aria-hidden="true"></i>
                            </a>
                            <a href="{{ route('resoluciones-municipales') }}" class="gam-gaceta-tile">
                                <span class="gam-gaceta-tile-icon" aria-hidden="true"><i class="icon-File-HorizontalText"></i></span>
                                <span class="gam-gaceta-tile-body">
                                    <strong>Resoluciones municipales</strong>
                                    <small>Decisiones del Concejo sobre asuntos específicos.</small>
                                </span>
                                <i class="ti-arrow-right" aria-hidden="true"></i>
                            </a>
                            <a href="{{ route('resoluciones-mun-adm') }}" class="gam-gaceta-tile">
                                <span class="gam-gaceta-tile-icon" aria-hidden="true"><i class="icon-File-Edit"></i></span>
                                <span class="gam-gaceta-tile-body">
                                    <strong>Resoluciones administrativas</strong>
                                    <small>Resoluciones del Órgano Ejecutivo (R.M.A.).</small>
                                </span>
                                <i class="ti-arrow-right" aria-hidden="true"></i>
                            </a>
                            <a href="{{ route('decretos-ediles') }}" class="gam-gaceta-tile">
                                <span class="gam-gaceta-tile-icon" aria-hidden="true"><i class="icon-File-ClipboardFileText"></i></span>
                                <span class="gam-gaceta-tile-body">
                                    <strong>Decretos ediles</strong>
                                    <small>Disposiciones emitidas por la Alcaldía Municipal.</small>
                                </span>
                                <i class="ti-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <div class="gam-gaceta-block" data-aos="fade-up" data-aos-duration="800">
                        <header class="gam-gaceta-block-head">
                            <h2 class="gam-heading-sm">Informes y transparencia</h2>
                            <p>Documentos de control, gestión y rendición de cuentas.</p>
                        </header>
                        <div class="gam-gaceta-grid">
                            <a href="{{ route('informes-gestion') }}" class="gam-gaceta-tile">
                                <span class="gam-gaceta-tile-icon gam-gaceta-tile-icon--alt" aria-hidden="true"><i class="icon-Bar-Chart"></i></span>
                                <span class="gam-gaceta-tile-body">
                                    <strong>Informes de gestión</strong>
                                    <small>Resultados de la gestión municipal por período.</small>
                                </span>
                                <i class="ti-arrow-right" aria-hidden="true"></i>
                            </a>
                            <a href="{{ route('auditoria-interna') }}" class="gam-gaceta-tile">
                                <span class="gam-gaceta-tile-icon gam-gaceta-tile-icon--alt" aria-hidden="true"><i class="icon-File-Search"></i></span>
                                <span class="gam-gaceta-tile-body">
                                    <strong>Auditoría interna</strong>
                                    <small>Informes de la Unidad de Auditoría Interna.</small>
                                </span>
                                <i class="ti-arrow-right" aria-hidden="true"></i>
                            </a>
                            <a href="{{ route('transparencia') }}" class="gam-gaceta-tile">
                                <span class="gam-gaceta-tile-icon gam-gaceta-tile-icon--alt" aria-hidden="true"><i class="icon-Eye"></i></span>
                                <span class="gam-gaceta-tile-body">
                                    <strong>Informes de transparencia</strong>
                                    <small>Rendición de cuentas y lucha contra la corrupción.</small>
                                </span>
                                <i class="ti-arrow-right" aria-hidden="true"></i>
                            </a>
                            <a href="{{ route('documentos_importantes') }}" class="gam-gaceta-tile gam-gaceta-tile--accent">
                                <span class="gam-gaceta-tile-icon gam-gaceta-tile-icon--accent" aria-hidden="true"><i class="icon-Files"></i></span>
                                <span class="gam-gaceta-tile-body">
                                    <strong>Documentos importantes</strong>
                                    <small>Documentación destacada de interés general.</small>
                                </span>
                                <i class="ti-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <aside class="gam-gaceta-aside" data-aos="fade-left" data-aos-duration="800">
                    <div class="gam-side-card gam-side-card--light">
                        <h3>Cómo consultar</h3>
                        <ol class="gam-steps gam-steps--dark">
                            <li>
                                <strong>Elige la categoría</strong>
                                <span>Selecciona el tipo de documento que necesitas.</span>
                            </li>
                            <li>
                                <strong>Usa el buscador</strong>
                                <span>Filtra por código, título o descripción.</span>
                            </li>
                            <li>
                                <strong>Ver o descargar</strong>
                                <span>Abre el PDF en el navegador o guárdalo.</span>
                            </li>
                        </ol>
                        <hr>
                        <p class="gam-muted">¿No encuentras un documento?</p>
                        <a class="btn btn-success-gradiant btn-rounded btn-md btn-arrow" href="{{ url('/#contact') }}">
                            <span>Solicitar información <i class="ti-arrow-right"></i></span>
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
