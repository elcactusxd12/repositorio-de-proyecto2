@extends('adminlte::page')

@section('title', 'Detalle de la Empresa')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-3 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold">
                    <i class="fas fa-building text-navy mr-2"></i> Detalle de la Empresa
                </h1>
                <p class="text-muted text-sm mb-0">Información completa del registro de empresa en el sistema.</p>
            </div>
            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                <a href="{{ route('companies.index') }}" class="btn btn-secondary btn-sm shadow-sm px-3 mr-1">
                    <i class="fas fa-arrow-left mr-1"></i> Regresar
                </a>
                @isset($company->id_empresa)
                    <a href="{{ route('companies.edit', $company->id_empresa) }}" class="btn btn-warning btn-sm shadow-sm px-3 text-dark font-weight-bold">
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
            <div class="col-lg-12">
                <div class="card card-navy card-outline shadow-lg border-0 rounded-lg">
                    {{-- Encabezado de la tarjeta --}}
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                        <h3 class="card-title font-weight-bold text-navy mb-0">
                            <i class="fas fa-info-circle text-navy mr-2"></i> Información de la empresa
                        </h3>
                        <div class="card-tools ml-auto">
                            <span class="badge bg-navy px-3 py-2 shadow-sm font-weight-bold">
                                ID: #{{ $company->id_empresa }}
                            </span>
                        </div>
                    </div>

                    {{-- Cuerpo de la tarjeta --}}
                    <div class="card-body bg-white p-4">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <p class="text-navy font-weight-bold border-bottom pb-2 mb-3 text-uppercase small">
                                    <i class="fas fa-id-card mr-1"></i> Datos Generales de la Empresa
                                </p>
                                
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped table-bordered align-middle mb-4">
                                        <tbody>
                                            <tr>
                                                <th class="bg-light text-muted" style="width: 30%;">
                                                    <i class="fas fa-hashtag mr-1 text-navy"></i> ID Empresa:
                                                </th>
                                                <td class="font-weight-bold text-dark">
                                                    <code>{{ $company->id_empresa }}</code>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light text-muted">
                                                    <i class="fas fa-building mr-1 text-navy"></i> Nombre de la Empresa:
                                                </th>
                                                <td class="font-weight-bold text-dark text-lg">
                                                    {{ $company->nombre_empresa }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light text-muted">
                                                    <i class="fas fa-map-marker-alt mr-1 text-navy"></i> Dirección:
                                                </th>
                                                <td class="text-dark">
                                                    <i class="fas fa-map-marker-alt mr-1 text-danger"></i> 
                                                    {{ $company->direccion ?: 'Sin dirección registrada' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light text-muted">
                                                    <i class="fas fa-phone-alt mr-1 text-navy"></i> Teléfono:
                                                </th>
                                                <td class="text-dark font-weight-bold">
                                                    <i class="fas fa-phone-alt mr-1 text-success"></i> 
                                                    {{ $company->telefono ?: 'Sin teléfono registrado' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light text-muted">
                                                    <i class="far fa-calendar-alt mr-1 text-navy"></i> Fecha de Registro:
                                                </th>
                                                <td>
                                                    <span class="badge badge-light border px-2 py-1 text-dark">
                                                        {{ $company->fecha_registro ? \Carbon\Carbon::parse($company->fecha_registro)->format('d/m/Y H:i') : 'No registrada' }}
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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