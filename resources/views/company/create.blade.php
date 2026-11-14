@extends('adminlte::page')

@section('title', 'Nueva Empresa')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold">
                    <i class="fas fa-building text-navy mr-2"></i> Gestión de Empresas
                </h1>
            </div>
            <div class="col-sm-6 text-sm-right">
                <a href="{{ route('companies.index') }}" class="btn btn-secondary btn-sm shadow-sm">
                    <i class="fas fa-arrow-left mr-1"></i> Regresar al Listado
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        {{-- Tarjeta centrada y proporcionada, evitando el ancho excesivo --}}
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card card-outline card-navy shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-white py-3">
                        <h3 class="card-title font-weight-bold text-navy">
                            <i class="fas fa-plus-circle mr-2"></i> Registrar Nueva Empresa
                        </h3>
                    </div>
                    <div class="card-body bg-white p-4">
                        <form method="POST" action="{{ route('companies.store') }}" role="form" enctype="multipart/form-data">
                            @csrf
                            @include('company.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('layouts.admin')
@stop