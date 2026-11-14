@extends('adminlte::page')

@section('title', 'Detalle del Operador')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-3 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold">
                    <i class="fas fa-network-wired text-navy mr-2"></i> Perfil del Operador
                </h1>
                <p class="text-muted text-sm mb-0">Visualización detallada de registros y métricas del sistema.</p>
            </div>
            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                <a href="{{ route('operators.index') }}" class="btn btn-secondary btn-sm shadow-sm px-3 mr-1">
                    <i class="fas fa-arrow-left mr-1"></i> Regresar
                </a>
                @isset($operator->id_operador)
                    <a href="{{ route('operators.edit', $operator->id_operador) }}" class="btn btn-warning btn-sm shadow-sm px-3 text-dark mr-1 font-weight-bold">
                        <i class="fas fa-edit mr-1"></i> Editar
                    </a>
                @endisset
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- Columna Izquierda: Tarjeta de Presentación / Hero --}}
            <div class="col-lg-4">
                <div class="card card-navy card-outline shadow-lg border-0 rounded-lg overflow-hidden">
                    <div class="card-body text-center bg-gradient-light p-4">
                        <div class="elevation-3 bg-navy rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 85px; height: 85px;">
                            <i class="fas fa-broadcast-tower fa-2x text-white"></i>
                        </div>
                        <h4 class="font-weight-bold text-dark mb-1">{{ $operator->nombre_operador }}</h4>
                        <span class="badge bg-navy px-3 py-1 mb-3 shadow-sm">
                            <i class="fas fa-fingerprint mr-1"></i> ID #{{ $operator->id_operador }}
                        </span>
                        
                        <div class="dropdown-divider my-3"></div>

                        <div class="row text-center">
                            <div class="col-12">
                                <span class="text-muted d-block small uppercase font-weight-bold">Contactos Vinculados</span>
                                <h3 class="font-weight-bold text-navy mt-1">
                                    <i class="fas fa-address-book text-secondary mr-1"></i> 
                                    {{ method_exists($operator, 'contacts') ? $operator->contacts->count() : '0' }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-top text-muted small text-center py-2">
                        <i class="fas fa-clock mr-1"></i> Registrado el: {{ $operator->fecha_registro ? \Carbon\Carbon::parse($operator->fecha_registro)->format('d/m/Y H:i') : 'No disponible' }}
                    </div>
                </div>
            </div>

            {{-- Columna Derecha: Detalles Estructurados --}}
            <div class="col-lg-8">
                <div class="card card-navy card-outline shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-white py-3 d-flex align-items-center">
                        <h3 class="card-title font-weight-bold text-navy mb-0">
                            <i class="fas fa-info-circle mr-2 text-navy"></i> Información General y Configuración
                        </h3>
                    </div>

                    <div class="card-body bg-white p-4">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-navy font-weight-bold border-bottom pb-2 mb-3 text-uppercase small">
                                    <i class="fas fa-database mr-1"></i> DATOS TÉCNICOS DEL REGISTRO
                                </p>
                                
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped table-bordered align-middle">
                                        <tbody>
                                            <tr>
                                                <th class="bg-light text-muted" style="width: 30%;">
                                                    <i class="fas fa-hashtag mr-1 text-navy"></i> Clave Primaria:
                                                </th>
                                                <td class="font-weight-bold text-dark">
                                                    <code>id_operador = {{ $operator->id_operador }}</code>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light text-muted">
                                                    <i class="fas fa-signature mr-1 text-navy"></i> Nombre del Operador:
                                                </th>
                                                <td class="font-weight-bold text-dark text-lg">
                                                    {{ $operator->nombre_operador }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light text-muted">
                                                    <i class="fas fa-calendar-alt mr-1 text-navy"></i> Fecha de Creación:
                                                </th>
                                                <td>
                                                    <span class="badge badge-light border px-2 py-1 text-dark">
                                                        {{ $operator->fecha_registro ? \Carbon\Carbon::parse($operator->fecha_registro)->format('d/m/Y \a \las H:i:s') : 'No especificada' }}
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        {{-- Sección inferior de estado o notas adicionales --}}
                        <div class="alert alert-default-navy border mt-4 mb-0 shadow-sm">
                            <div class="media">
                                <i class="fas fa-shield-alt fa-2x text-navy mr-3 mt-1"></i>
                                <div class="media-body">
                                    <h5 class="font-weight-bold text-navy mb-1">Estado del Sistema</h5>
                                    <p class="text-muted mb-0 small">Este registro está vinculado correctamente al motor relacional del directorio telefónico. Cualquier modificación afectará el mapeo de llamadas y contactos asociados.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer')
    @include('layouts.admin')
@stop