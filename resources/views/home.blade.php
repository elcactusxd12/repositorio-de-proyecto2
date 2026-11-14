
@extends('layouts.admin')

{{-- @extends('adminlte::page') --}}

@section('title', 'Panel de Control | Agenda 2026')

@section('plugins.Datatables', true)


{{-- =========================================================
    ESTILOS DEL DASHBOARD
========================================================= --}}

@section('adminlte_css')
    @vite(['resources/css/dashboard.css'])
    @yield('css')
@stop


{{-- =========================================================
    ENCABEZADO DEL DASHBOARD
========================================================= --}}

@section('content_header')

    <div
        class="dashboard-welcome d-flex flex-column flex-md-row align-items-md-center justify-content-between p-3 p-md-4 mb-4 text-white rounded shadow-sm"
        style="background: linear-gradient(135deg, #001f3f 0%, #003366 100%); border-left: 5px solid #17a2b8;"
    >

        <div class="d-flex align-items-center mb-3 mb-md-0">

            <div
                class="dashboard-welcome__icon d-flex align-items-center justify-content-center bg-white text-primary rounded-circle mr-3 shadow-sm"
                style="width: 54px; height: 54px; font-size: 24px; flex-shrink: 0; color: #003366 !important;"
            >
                <i class="fas fa-address-book"></i>
            </div>

            <div>
                <h1 class="h3 font-weight-bold mb-1">
                    ¡Bienvenido, {{ Auth::user()->name }}!
                </h1>

                <p class="mb-0 text-light small" style="opacity: 0.85;">
                    Administra tus contactos, empresas y grupos desde un solo lugar.
                </p>
            </div>

        </div>

        <div
            class="dashboard-welcome__date d-flex align-items-center bg-white bg-opacity-10 px-3 py-2 rounded border border-light border-opacity-25 text-nowrap small"
            style="background: rgba(0,0,0,0.15);"
        >
            <i class="far fa-calendar-alt mr-2"></i>

            {{ now()->format('d/m/Y') }}

            <span class="mx-2">|</span>

            <i class="far fa-clock mr-1"></i>

            {{ now()->format('H:i:s') }}
        </div>

    </div>

@stop


{{-- =========================================================
    CONTENIDO PRINCIPAL
========================================================= --}}

@section('content')

    <div class="container-fluid dashboard-page">


        {{-- =================================================
            1. INDICADORES PRINCIPALES
        ================================================== --}}

        <div class="row dashboard-kpi-row">

            {{-- TOTAL DE CONTACTOS --}}

            <div class="col-xl-3 col-sm-6">

                <div class="dashboard-kpi dashboard-kpi--blue">

                    <div class="dashboard-kpi__top">
                        <span class="dashboard-kpi__label">
                            Total de contactos
                        </span>

                        <span class="dashboard-kpi__icon">
                            <i class="fas fa-users"></i>
                        </span>
                    </div>

                    <div class="dashboard-kpi__value">
                        {{ number_format($totalContacts) }}
                    </div>

                    <div class="dashboard-kpi__footer">

                        <span>
                            <i class="fas fa-chart-line mr-1"></i>
                            {{ $contactCompanyRate }}% con empresa asignada
                        </span>

                        <span class="dashboard-kpi__tag">
                            REGISTROS
                        </span>

                    </div>

                    <div class="dashboard-kpi__progress">
                        <span
                            class="dashboard-progress-fill"
                            data-progress="{{ $contactCompanyRate }}"
                        ></span>
                    </div>

                </div>

            </div>


            {{-- TOTAL DE EMPRESAS --}}

            <div class="col-xl-3 col-sm-6">

                <div class="dashboard-kpi dashboard-kpi--green">

                    <div class="dashboard-kpi__top">
                        <span class="dashboard-kpi__label">
                            Empresas
                        </span>

                        <span class="dashboard-kpi__icon">
                            <i class="fas fa-building"></i>
                        </span>
                    </div>

                    <div class="dashboard-kpi__value">
                        {{ number_format($totalCompanies) }}
                    </div>

                    <div class="dashboard-kpi__footer">

                        <span>
                            <i class="fas fa-check-circle mr-1"></i>
                            {{ $companiesWithContacts }} con contactos
                        </span>

                        <strong>
                            {{ $companyCoverage }}%
                        </strong>

                    </div>

                    <div class="dashboard-kpi__progress">
                        <span
                            class="dashboard-progress-fill"
                            data-progress="{{ $companyCoverage }}"
                        ></span>
                    </div>

                </div>

            </div>


            {{-- TOTAL DE GRUPOS --}}

            <div class="col-xl-3 col-sm-6">

                <div class="dashboard-kpi dashboard-kpi--purple">

                    <div class="dashboard-kpi__top">
                        <span class="dashboard-kpi__label">
                            Grupos
                        </span>

                        <span class="dashboard-kpi__icon">
                            <i class="fas fa-layer-group"></i>
                        </span>
                    </div>

                    <div class="dashboard-kpi__value">
                        {{ number_format($totalGroups) }}
                    </div>

                    <div class="dashboard-kpi__footer">

                        <span>
                            <i class="fas fa-check-circle mr-1"></i>
                            {{ $groupsWithContacts }} con contactos
                        </span>

                        <strong>
                            {{ $groupCoverage }}%
                        </strong>

                    </div>

                    <div class="dashboard-kpi__progress">
                        <span
                            class="dashboard-progress-fill"
                            data-progress="{{ $groupCoverage }}"
                        ></span>
                    </div>

                </div>

            </div>


            {{-- TOTAL DE USUARIOS --}}

            <div class="col-xl-3 col-sm-6">

                <div class="dashboard-kpi dashboard-kpi--orange">

                    <div class="dashboard-kpi__top">
                        <span class="dashboard-kpi__label">
                            Usuarios del sistema
                        </span>

                        <span class="dashboard-kpi__icon">
                            <i class="fas fa-user-shield"></i>
                        </span>
                    </div>

                    <div class="dashboard-kpi__value">
                        {{ number_format($totalUsers) }}
                    </div>

                    <div class="dashboard-kpi__footer">

                        <span>
                            <i class="fas fa-lock mr-1"></i>
                            Cuentas registradas
                        </span>

                        <span class="dashboard-kpi__tag">
                            ACCESO
                        </span>

                    </div>

                    <div class="dashboard-kpi__progress">
                        <span style="width: 100%"></span>
                    </div>

                </div>

            </div>

        </div>


        {{-- =================================================
            2. ACCESOS RÁPIDOS
        ================================================== --}}

        <div class="dashboard-section-heading">

            <div>
                <h5>
                    <i class="fas fa-bolt"></i>
                    Accesos rápidos
                </h5>

                <p>
                    Accede directamente a los módulos principales.
                </p>
            </div>

        </div>


        <div class="row dashboard-shortcuts">


            {{-- MÓDULO CONTACTOS --}}

            <div class="col-xl-3 col-sm-6">

                <a
                    href="{{ route('contacts.index') }}"
                    class="dashboard-shortcut"
                >

                    <span class="dashboard-shortcut__icon shortcut-blue">
                        <i class="fas fa-address-book"></i>
                    </span>

                    <span class="dashboard-shortcut__text">
                        <strong>Contactos</strong>
                        <small>Gestionar registros</small>
                    </span>

                    <i class="fas fa-chevron-right dashboard-shortcut__arrow"></i>

                </a>

            </div>


            {{-- MÓDULO EMPRESAS --}}

            <div class="col-xl-3 col-sm-6">

                <a
                    href="{{ route('companies.index') }}"
                    class="dashboard-shortcut"
                >

                    <span class="dashboard-shortcut__icon shortcut-green">
                        <i class="fas fa-building"></i>
                    </span>

                    <span class="dashboard-shortcut__text">
                        <strong>Empresas</strong>
                        <small>Catálogo corporativo</small>
                    </span>

                    <i class="fas fa-chevron-right dashboard-shortcut__arrow"></i>

                </a>

            </div>


            {{-- MÓDULO GRUPOS --}}

            <div class="col-xl-3 col-sm-6">

                <a
                    href="{{ route('groups.index') }}"
                    class="dashboard-shortcut"
                >

                    <span class="dashboard-shortcut__icon shortcut-purple">
                        <i class="fas fa-layer-group"></i>
                    </span>

                    <span class="dashboard-shortcut__text">
                        <strong>Grupos</strong>
                        <small>Clasificación de contactos</small>
                    </span>

                    <i class="fas fa-chevron-right dashboard-shortcut__arrow"></i>

                </a>

            </div>


            {{-- MÓDULO OPERADORES --}}

            <div class="col-xl-3 col-sm-6">

                <a
                    href="{{ route('operators.index') }}"
                    class="dashboard-shortcut"
                >

                    <span class="dashboard-shortcut__icon shortcut-orange">
                        <i class="fas fa-network-wired"></i>
                    </span>

                    <span class="dashboard-shortcut__text">
                        <strong>Operadores</strong>
                        <small>Gestión de operadores</small>
                    </span>

                    <i class="fas fa-chevron-right dashboard-shortcut__arrow"></i>

                </a>

            </div>

        </div>


        {{-- =================================================
            3. SECCIÓN DE ANALÍTICA
        ================================================== --}}

        <div class="row dashboard-middle-row">


            {{-- DISTRIBUCIÓN DE CONTACTOS POR EMPRESA --}}

            <div class="col-lg-7">

                <div class="dashboard-panel h-100">

                    <div class="dashboard-panel__header">

                        <div>
                            <h5>
                                <i class="fas fa-chart-pie"></i>
                                Distribución por empresa
                            </h5>

                            <p>
                                Participación de cada empresa en el total de contactos.
                            </p>
                        </div>

                        <span class="dashboard-panel__badge">
                            ANÁLISIS
                        </span>

                    </div>


                    @if($totalContacts > 0 && $companiesDistribution->count() > 0)

                        <div class="dashboard-chart-layout">

                            {{-- GRÁFICO CIRCULAR --}}

                            <div class="dashboard-chart-wrap">

                                <canvas
                                    id="companyDoughnutChart"
                                    data-labels='@json($companiesDistribution->pluck("nombre_empresa"))'
                                    data-totals='@json($companiesDistribution->pluck("total"))'
                                    data-percentages='@json($companiesDistribution->pluck("percentage"))'
                                    data-total="{{ $totalContacts }}"
                                ></canvas>

                                <div class="dashboard-chart-center">
                                    <strong>
                                        {{ number_format($totalContacts) }}
                                    </strong>

                                    <span>Contactos</span>
                                </div>

                            </div>


                            {{-- LEYENDA DEL GRÁFICO --}}

                            <div
                                class="dashboard-chart-legend"
                                id="companyChartLegend"
                            >

                                @foreach($companiesDistribution as $company)

                                    <div class="dashboard-legend-item">

                                        <span class="dashboard-legend-dot"></span>

                                        <span
                                            class="dashboard-legend-name"
                                            title="{{ $company->nombre_empresa }}"
                                        >
                                            {{ $company->nombre_empresa }}
                                        </span>

                                        <strong>
                                            {{ number_format($company->total) }}
                                        </strong>

                                        <span class="dashboard-legend-percent">
                                            {{ $company->percentage }}%
                                        </span>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    @else

                        <div class="dashboard-empty-state">

                            <i class="fas fa-chart-pie"></i>

                            <span>
                                Aún no hay contactos suficientes para generar la distribución.
                            </span>

                        </div>

                    @endif

                </div>

            </div>


            {{-- USUARIOS DEL SISTEMA --}}

            <div class="col-lg-5">

                <div class="dashboard-panel h-100">

                    <div class="dashboard-panel__header">

                        <div>
                            <h5>
                                <i class="fas fa-user-shield"></i>
                                Usuarios del sistema
                            </h5>

                            <p>
                                Últimas cuentas registradas.
                            </p>
                        </div>

                        <span class="dashboard-panel__count">
                            {{ $totalUsers }}
                        </span>

                    </div>


                    <div class="table-responsive px-2 py-2">

                        <table
                            id="tablaHomeUsuarios"
                            class="table table-hover table-striped mb-0 text-nowrap align-middle w-100"
                            style="font-size: 0.85rem;"
                        >

                            <thead class="thead-light" style="display: none;">
                                <tr>
                                    <th>Usuario</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($systemUsers as $usr)

                                    <tr>

                                        <td class="align-middle border-0">

                                            <div class="d-flex align-items-center">

                                                <div
                                                    class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center mr-2 shadow-sm"
                                                    style="width: 32px; height: 32px; font-weight: bold; font-size: 0.75rem; flex-shrink: 0;"
                                                >
                                                    {{ strtoupper(mb_substr($usr->name ?? '?', 0, 1)) }}
                                                </div>

                                                <div style="overflow: hidden; text-overflow: ellipsis;">

                                                    <strong
                                                        class="text-dark d-block"
                                                        style="line-height: 1.2;"
                                                    >
                                                        {{ $usr->name }}
                                                    </strong>

                                                    <span class="text-muted small">
                                                        {{ $usr->email }}
                                                    </span>

                                                </div>

                                            </div>

                                        </td>

                                        <td class="align-middle border-0 text-right">

                                            <span class="badge badge-light border px-2 py-1 text-muted">
                                                Registrado
                                            </span>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td
                                            colspan="2"
                                            class="text-center py-4 text-muted border-0"
                                        >
                                            <i class="fas fa-user-slash fa-2x mb-2 d-block"></i>
                                            No hay usuarios registrados.
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>


                    <div class="dashboard-users-footer mt-auto pt-3 border-top">

                        <i class="fas fa-shield-alt mr-1"></i>
                        Acceso protegido al sistema

                    </div>

                </div>

            </div>

        </div>


        {{-- =================================================
            4. CONTACTOS RECIENTEMENTE REGISTRADOS
        ================================================== --}}

        <div class="dashboard-panel dashboard-recent-panel">

            <div class="dashboard-panel__header">

                <div>
                    <h5>
                        <i class="fas fa-history"></i>
                        Contactos recientemente registrados
                    </h5>

                    <p>
                        Últimos registros almacenados en la base de datos.
                    </p>
                </div>

                <a
                    href="{{ route('contacts.index') }}"
                    class="dashboard-view-all"
                >
                    Ver contactos
                    <i class="fas fa-arrow-right ml-1"></i>
                </a>

            </div>


            <div class="table-responsive">

                <table
                    id="tablaHomeContactos"
                    class="table dashboard-table table-hover w-100"
                >

                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th>Contacto</th>
                            <th>Empresa</th>
                            <th>Teléfono móvil</th>
                            <th>Fecha de registro</th>
                        </tr>
                    </thead>


                    <tbody>

                        @forelse($recentContacts as $contact)

                            <tr>

                                {{-- ID DEL CONTACTO --}}

                                <td class="text-center">

                                    <span class="dashboard-id">
                                        #{{ $contact->id_contacto }}
                                    </span>

                                </td>


                                {{-- NOMBRE DEL CONTACTO --}}

                                <td>

                                    <div class="dashboard-contact-name">

                                        <span class="dashboard-contact-avatar">
                                            {{ strtoupper(
                                                mb_substr($contact->nombres ?? '', 0, 1) .
                                                mb_substr($contact->apellidos ?? '', 0, 1)
                                            ) }}
                                        </span>

                                        <strong>
                                            {{ $contact->nombres }}
                                            {{ $contact->apellidos }}
                                        </strong>

                                    </div>

                                </td>


                                {{-- EMPRESA --}}

                                <td>
                                    {{ $contact->nombre_empresa ?: 'Sin empresa asignada' }}
                                </td>


                                {{-- TELÉFONO MÓVIL --}}

                                <td>

                                    <i class="fas fa-phone-alt dashboard-muted-icon"></i>

                                    {{ $contact->telefono_movil ?: 'No registrado' }}

                                </td>


                                {{-- FECHA DE REGISTRO --}}

                                <td>

                                    @if($contact->fecha_registro)

                                        {{ \Carbon\Carbon::parse($contact->fecha_registro)->format('d/m/Y') }}

                                    @else

                                        <span class="text-muted">
                                            Sin fecha
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td
                                    colspan="5"
                                    class="text-center py-4 text-muted"
                                >
                                    Todavía no hay contactos registrados.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@stop


{{-- =========================================================
    JAVASCRIPT DEL DASHBOARD
========================================================= --}}

@section('js')

    {{-- Chart.js para el gráfico circular --}}

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>


    {{-- DataTables para la tabla de usuarios del dashboard --}}

    <script>
        $(document).ready(function () {

            $('#tablaHomeUsuarios').DataTable({

                pageLength: 4,

                lengthChange: false,

                searching: false,

                ordering: false,

                info: true,

                autoWidth: false,

                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                }

            });

        });
    </script>


    {{-- JavaScript propio del dashboard mediante Vite --}}

    @vite(['resources/js/dashboard.js'])

@stop
