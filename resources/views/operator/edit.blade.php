@extends('adminlte::page')

@section('title', 'Detalles del Operador')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold">
                    <i class="fas fa-network-wired text-navy mr-2"></i> Gestión de Operadores
                </h1>
            </div>
            <div class="col-sm-6 text-sm-right">
                <a href="{{ route('operators.index') }}" class="btn btn-secondary btn-sm shadow-sm">
                    <i class="fas fa-arrow-left mr-1"></i> Regresar al Listado
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        {{-- Tarjeta centrada bajo el mismo estándar de create --}}
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card card-outline card-navy shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
                        <h3 class="card-title font-weight-bold text-navy m-0">
                            <i class="fas fa-eye mr-2"></i> Detalles del Operador
                        </h3>
                        <div>
                            <a href="{{ route('operators.edit', $operator->id_operador) }}" class="btn btn-warning btn-sm shadow-sm text-dark font-weight-bold">
                                <i class="fas fa-edit mr-1"></i> Editar Registro
                            </a>
                        </div>
                    </div>
                    <div class="card-body bg-white p-4">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="text-muted font-weight-bold small">ID DEL OPERADOR:</label>
                                <p class="form-control-plaintext font-weight-bold text-dark border-bottom pb-2">
                                    {{ $operator->id_operador }}
                                </p>
                            </div>

                            <div class="col-md-6 form-group">
                                <label class="text-muted font-weight-bold small">NOMBRE / DESCRIPCIÓN:</label>
                                <p class="form-control-plaintext font-weight-bold text-dark border-bottom pb-2">
                                    {{ $operator->nombre ?? $operator->descripcion ?? 'N/D' }}
                                </p>
                            </div>
                        </div>

                        <div class="mt-4 text-right">
                            <a href="{{ route('operators.index') }}" class="btn btn-secondary px-4 shadow-sm">
                                <i class="fas fa-arrow-left mr-1"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection