@extends('adminlte::page')

@section('title', 'Gestión de Contactos')

{{-- Habilitar el plugin de DataTables configurado en adminlte.php --}}
@section('plugins.Datatables', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-12 col-sm-6 mb-2 mb-sm-0">
                <h1 class="m-0 text-dark font-weight-bold">
                    <i class="fas fa-address-book text-navy mr-2"></i> Gestión de Contactos
                </h1>
            </div>
            <div class="col-12 col-sm-6 text-sm-right">
                <a href="{{ route('contacts.create') }}" class="btn btn-primary btn-md shadow-sm">
                    <i class="fas fa-plus-circle mr-1"></i> Nuevo Contacto
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
                            <i class="fas fa-list mr-1"></i> Listado General de Contactos
                        </h3>
                    </div>
                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table id="example" class="table table-hover table-striped mb-0 text-nowrap align-middle w-100">
                                <thead class="bg-light text-uppercase fs-7 text-secondary">
                                    <tr>
                                        <th style="width: 50px;" class="text-center py-3">#</th>
                                        <th style="width: 80px;" class="text-center py-3">ID</th>
                                        <th class="py-3">Nombres y Apellidos</th>
                                        <th class="py-3">Móvil</th>
                                        <th class="py-3">Correo</th>
                                        <th class="py-3">Empresa</th>
                                        <th class="py-3">Operador</th>
                                        <th class="py-3">Grupo</th>
                                        <th style="width: 150px;" class="text-center py-3">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($contacts as $contact)
                                        <tr>
                                            <td class="text-center align-middle font-weight-bold text-muted">{{ $loop->iteration }}</td>
                                            <td class="text-center align-middle">
                                                <span class="badge badge-light border px-2 py-1">#{{ $contact->id_contacto }}</span>
                                            </td>
                                            <td class="align-middle font-weight-bold text-dark">
                                                {{ $contact->nombres }} {{ $contact->apellidos }}
                                            </td>
                                            <td class="align-middle text-muted">
                                                <i class="fas fa-mobile-alt mr-1 text-success"></i> {{ $contact->telefono_movil }}
                                            </td>
                                            <td class="align-middle text-muted">
                                                <i class="fas fa-envelope mr-1 text-info"></i> {{ $contact->correo ?? 'No registrado' }}
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-secondary px-2 py-1">
                                                    {{ $contact->company->nombre_empresa ?? $contact->id_empresa }}
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-info px-2 py-1">
                                                    {{ $contact->operator->nombre_operador ?? $contact->id_operador }}
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge badge-primary px-2 py-1">
                                                    {{ $contact->group->nombre_grupo ?? $contact->id_grupo }}
                                                </span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <form action="{{ route('contacts.destroy', $contact->id_contacto) }}" method="POST" class="d-inline">
                                                    <a class="btn btn-sm btn-info shadow-sm mr-1" href="{{ route('contacts.show', $contact->id_contacto) }}" data-toggle="tooltip" title="Ver detalles">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-warning shadow-sm text-white mr-1" href="{{ route('contacts.edit', $contact->id_contacto) }}" data-toggle="tooltip" title="Editar contacto">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm" data-toggle="tooltip" title="Eliminar contacto" onclick="return confirm('¿Estás seguro de eliminar este contacto?')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center py-4 text-muted">
                                                <i class="fas fa-address-book fa-2x mb-2 d-block"></i> No se encontraron contactos registrados.
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