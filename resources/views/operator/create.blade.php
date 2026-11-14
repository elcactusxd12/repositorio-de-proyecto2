@extends('adminlte::page')

@section('title', 'Nuevo Operador')

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
        {{-- Tarjeta centrada y proporcionada --}}
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card card-outline card-navy shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-white py-3">
                        <h3 class="card-title font-weight-bold text-navy">
                            <i class="fas fa-plus-circle mr-2"></i> Registrar Nuevo Operador
                        </h3>
                    </div>
                    <div class="card-body bg-white p-4">
                        <form method="POST" action="{{ route('operators.store') }}" role="form" enctype="multipart/form-data">
                            @csrf
                            @include('operator.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text-muted small py-1 w-100">
        <div class="mb-2 mb-md-0 text-center text-md-left">
            <span class="font-weight-bold text-dark">
                <i class="fas fa-graduation-cap text-navy mr-1"></i> SENATI &bull; Ingeniería de Software <span class="badge badge-light border text-navy ml-1">III Semestre</span>
            </span>
            <span class="text-muted ml-md-2 d-block d-sm-inline-block mt-1 mt-sm-0">
                &copy; 2026 <strong>Ing. Wilmer Vera Ostios</strong>
            </span>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <span class="badge badge-pill badge-light border text-success px-2 py-1 mr-2 shadow-sm">
                <i class="fas fa-circle mr-1" style="font-size: 7px;"></i> 100% Funcional
            </span>
            <span class="text-secondary font-weight-bold">
                <i class="fas fa-code-branch mr-1 text-navy"></i> Versión 1.1.0
            </span>
        </div>
    </div>
@endsection