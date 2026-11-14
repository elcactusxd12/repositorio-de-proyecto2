@extends('adminlte::page')

@section('title', 'Operadores de Telefonía')

{{-- Habilitar el plugin de DataTables configurado en adminlte.php --}}
@section('plugins.Datatables', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-12 col-sm-6 mb-2 mb-sm-0">
                <h1 class="m-0 text-dark font-weight-bold">
                    <i class="fas fa-id-card text-navy mr-2"></i> Operadores de Telefonía
                </h1>
            </div>
            <div class="col-12 col-sm-6 text-sm-right">
                <a href="{{ route('operators.create') }}" class="btn btn-primary btn-md shadow-sm">
                    <i class="fas fa-plus-circle mr-1"></i> Nuevo Operador
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="icon fas fa-check-circle mr-1"></i> {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card card-navy card-outline shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h3 class="card-title font-weight-bold text-navy">
                            <i class="fas fa-list mr-1"></i> Registro de Operadores
                        </h3>
                    </div>
                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table id="example" class="table table-hover table-striped mb-0 text-nowrap align-middle w-100">
                                <thead class="bg-light text-uppercase fs-7 text-secondary">
                                    <tr>
                                        <th style="width: 60px;" class="text-center py-3">#</th>
                                        <th style="width: 100px;" class="text-center py-3">ID</th>
                                        <th class="py-3">Nombre del Operador</th>
                                        <th class="py-3">Fecha de Registro</th>
                                        <th style="width: 150px;" class="text-center py-3">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($operators as $operator)
                                        <tr>
                                            <td class="text-center align-middle font-weight-bold text-muted">{{ $loop->iteration }}</td>
                                            <td class="text-center align-middle">
                                                <span class="badge badge-light border px-2 py-1">#{{ $operator->id_operador }}</span>
                                            </td>
                                            <td class="align-middle font-weight-bold text-dark">
                                                {{ $operator->nombre_operador }}
                                            </td>
                                            <td class="align-middle text-muted">
                                                <i class="far fa-calendar-alt mr-1 text-secondary"></i> 
                                                {{ \Carbon\Carbon::parse($operator->fecha_registro)->format('d/m/Y h:i A') }}
                                            </td>
                                            <td class="text-center align-middle">
                                                <form action="{{ route('operators.destroy', $operator->id_operador) }}" method="POST" class="d-inline">
                                                    <a class="btn btn-sm btn-info shadow-sm mr-1" href="{{ route('operators.show', $operator->id_operador) }}" data-toggle="tooltip" title="Ver detalles">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-warning shadow-sm text-white mr-1" href="{{ route('operators.edit', $operator->id_operador) }}" data-toggle="tooltip" title="Editar operador">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm" data-toggle="tooltip" title="Eliminar operador" onclick="return confirm('¿Estás seguro de eliminar este operador?')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-4 text-muted">
                                                <i class="fas fa-folder-open fa-2x mb-2 d-block"></i> No se encontraron operadores registrados.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('layouts.admin')
@stop