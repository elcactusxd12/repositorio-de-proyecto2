@extends('adminlte::page')

@section('title', 'Detalle del Grupo')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-3 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold">
                    <i class="fas fa-layer-group text-navy mr-2"></i> Detalle del Grupo
                </h1>
                <p class="text-muted text-sm mb-0">Información completa de la categoría o grupo registrado.</p>
            </div>
            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                <a href="{{ route('groups.index') }}" class="btn btn-secondary btn-sm shadow-sm px-3 mr-1">
                    <i class="fas fa-arrow-left mr-1"></i> Regresar
                </a>
                @isset($group->id_grupo)
                    <a href="{{ route('groups.edit', $group->id_grupo) }}" class="btn btn-warning btn-sm shadow-sm px-3 text-dark font-weight-bold">
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
                            <i class="fas fa-info-circle text-navy mr-2"></i> Información del grupo
                        </h3>
                        <div class="card-tools ml-auto">
                            <span class="badge bg-navy px-3 py-2 shadow-sm font-weight-bold">
                                ID: #{{ $group->id_grupo }}
                            </span>
                        </div>
                    </div>

                    {{-- Cuerpo de la tarjeta --}}
                    <div class="card-body bg-white p-4">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <p class="text-navy font-weight-bold border-bottom pb-2 mb-3 text-uppercase small">
                                    <i class="fas fa-id-card mr-1"></i> Datos Generales del Grupo
                                </p>
                                
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped table-bordered align-middle mb-4">
                                        <tbody>
                                            <tr>
                                                <th class="bg-light text-muted" style="width: 30%;">
                                                    <i class="fas fa-hashtag mr-1 text-navy"></i> ID Grupo:
                                                </th>
                                                <td class="font-weight-bold text-dark">
                                                    <code>{{ $group->id_grupo }}</code>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light text-muted">
                                                    <i class="fas fa-users mr-1 text-navy"></i> Nombre del Grupo:
                                                </th>
                                                <td class="font-weight-bold text-dark text-lg">
                                                    <span class="badge badge-primary px-3 py-1">
                                                        {{ $group->nombre_grupo }}
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light text-muted">
                                                    <i class="far fa-calendar-alt mr-1 text-navy"></i> Fecha de Registro:
                                                </th>
                                                <td>
                                                    <span class="badge badge-light border px-2 py-1 text-dark">
                                                        {{ $group->fecha_registro ? \Carbon\Carbon::parse($group->fecha_registro)->format('d/m/Y H:i') : 'No registrada' }}
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