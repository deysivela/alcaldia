@php
    $rutaActual = Route::currentRouteName();

    $grupoMunicipio = ['alcalde', 'autoridades', 'personal', 'escala-salarial', 'subalcaldias'];
    $grupoDocumentos = [
        'gacetas',
        'leyes-municipales',
        'resoluciones-municipales',
        'resoluciones-mun-adm',
        'decretos-ediles',
        'auditoria-interna',
        'informes-gestion',
        'documentos_importantes',
    ];
    $grupoServicios = ['proyectos', 'actividades', 'cultura', 'turismo', 'zoonosis'];
@endphp
<div class="topbar">
    <div class="header12 po-relative">
        <div class="container">
            <nav class="navbar navbar-expand-lg hover-dropdown h12-nav" aria-label="Navegación principal">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img class="img" src="{{ asset('client/images/log.png') }}"
                        alt="Escudo del Gobierno Autónomo Municipal de Llallagua">
                    <span class="brand-copy">
                        <span class="brand-eyebrow">Gobierno Autónomo Municipal</span>
                        <span class="brand-title">de Llallagua</span>
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header12a"
                    aria-controls="header12a" aria-expanded="false" aria-label="Abrir menú de navegación">
                    <span class="ti-menu"></span>
                </button>
                <div class="collapse navbar-collapse" id="header12a">
                    <a class="navbar-brand-mobile" href="{{ route('index') }}">
                        <img class="img" src="{{ asset('client/images/logo.png') }}"
                            alt="Escudo del Gobierno Autónomo Municipal de Llallagua">
                    </a>
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        {{-- En móvil el logo no es accesible como enlace de inicio evidente --}}
                        <li class="nav-item d-lg-none {{ $rutaActual === 'index' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('index') }}">Inicio</a>
                        </li>

                        <li
                            class="nav-item dropdown gam-has-mega {{ in_array($rutaActual, $grupoMunicipio) ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" id="nav-municipio" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Municipio <i class="fa fa-angle-down m-l-5"></i>
                            </a>
                            <div class="dropdown-menu b-none font-14 gam-mega" aria-labelledby="nav-municipio">
                                <div class="gam-mega-grid">
                                    <div class="gam-mega-col">
                                        <h6 class="gam-mega-title">Institución</h6>
                                        <a class="dropdown-item" href="{{ url('/#mivi') }}">Misión y visión</a>
                                        <a class="dropdown-item" href="{{ route('alcalde') }}">Alcalde Municipal</a>
                                        <a class="dropdown-item" href="{{ route('autoridades') }}">Autoridades</a>
                                        <a class="dropdown-item" href="{{ route('personal') }}">Personal</a>
                                        <a class="dropdown-item" href="{{ route('escala-salarial') }}">Escala
                                            salarial</a>
                                    </div>
                                    <div class="gam-mega-col">
                                        <h6 class="gam-mega-title gam-mega-title--link">
                                            <a href="{{ route('subalcaldias') }}">
                                                Subalcaldías <i class="ti-arrow-right" aria-hidden="true"></i>
                                            </a>
                                        </h6>
                                        <a class="dropdown-item" href="{{ route('subalcaldias') }}#central">Central</a>
                                        <a class="dropdown-item" href="{{ route('subalcaldias') }}#siglo">Siglo XX</a>
                                        <a class="dropdown-item" href="{{ route('subalcaldias') }}#22">22 de
                                            Diciembre</a>
                                        <a class="dropdown-item" href="{{ route('subalcaldias') }}#catavi">Catavi</a>
                                        <a class="dropdown-item" href="{{ route('subalcaldias') }}#chullpa">Chullpa</a>
                                        <a class="dropdown-item" href="{{ route('subalcaldias') }}#sicoya">Sikuya</a>
                                        <a class="dropdown-item"
                                            href="{{ route('subalcaldias') }}#sakamarca">Sakamarca</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li
                            class="nav-item dropdown gam-has-mega {{ in_array($rutaActual, $grupoDocumentos) ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" id="nav-documentos"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Documentos <i class="fa fa-angle-down m-l-5"></i>
                            </a>
                            <div class="dropdown-menu b-none font-14 gam-mega" aria-labelledby="nav-documentos">
                                <div class="gam-mega-grid">
                                    <div class="gam-mega-col">
                                        <h6 class="gam-mega-title gam-mega-title--link">
                                            <a href="{{ route('gacetas') }}">
                                                Gaceta Municipal <i class="ti-arrow-right" aria-hidden="true"></i>
                                            </a>
                                        </h6>
                                        <a class="dropdown-item" href="{{ route('leyes-municipales') }}">Leyes
                                            municipales</a>
                                        <a class="dropdown-item"
                                            href="{{ route('resoluciones-municipales') }}">Resoluciones municipales</a>
                                        <a class="dropdown-item"
                                            href="{{ route('resoluciones-mun-adm') }}">Resoluciones administrativas</a>
                                        <a class="dropdown-item" href="{{ route('decretos-ediles') }}">Decretos
                                            ediles</a>
                                    </div>
                                    <div class="gam-mega-col">
                                        <h6 class="gam-mega-title">Informes</h6>
                                        <a class="dropdown-item" href="{{ route('informes-gestion') }}">Informes de
                                            gestión</a>
                                        <a class="dropdown-item" href="{{ route('auditoria-interna') }}">Auditoría
                                            interna</a>
                                        <a class="dropdown-item"
                                            href="{{ route('documentos_importantes') }}">Documentos importantes</a>
                                        <a class="dropdown-item" href="{{ route('transparencia') }}">Informes de
                                            transparencia</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item {{ $rutaActual === 'transparencia' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('transparencia') }}">Transparencia</a>
                        </li>

                        <li
                            class="nav-item dropdown gam-has-mega {{ in_array($rutaActual, $grupoServicios) ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" id="nav-servicios"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Servicios <i class="fa fa-angle-down m-l-5"></i>
                            </a>
                            <div class="dropdown-menu b-none font-14 gam-mega" aria-labelledby="nav-servicios">
                                <div class="gam-mega-grid">
                                    <div class="gam-mega-col">
                                        <h6 class="gam-mega-title">Gestión municipal</h6>
                                        <a class="dropdown-item" href="{{ route('proyectos') }}">Proyectos y
                                            obras</a>
                                        <a class="dropdown-item" href="{{ route('actividades') }}">Actividades</a>
                                        <a class="dropdown-item" href="{{ route('zoonosis') }}">Zoonosis</a>
                                    </div>
                                    <div class="gam-mega-col">
                                        <h6 class="gam-mega-title">Cultura y turismo</h6>
                                        <a class="dropdown-item" href="{{ route('cultura') }}">Cultura</a>
                                        <a class="dropdown-item" href="{{ route('turismo') }}">Turismo</a>
                                        <a class="dropdown-item" href="{{ url('/#mivi') }}">Datos del municipio</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item {{ in_array($rutaActual, ['noticias', 'details']) ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('noticias') }}">Noticias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-cta" href="{{ url('/#contact') }}">Contacto</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
