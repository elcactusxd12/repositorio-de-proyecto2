@extends('adminlte::page')

@section('title', 'Detalle del Contacto')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-3 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold">
                    <i class="fas fa-address-card text-navy mr-2"></i> Detalle del Contacto
                </h1>
                <p class="text-muted text-sm mb-0">Información completa del registro en el directorio telefónico.</p>
            </div>
            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                <a href="{{ route('contacts.index') }}" class="btn btn-secondary btn-sm shadow-sm px-3 mr-1">
                    <i class="fas fa-arrow-left mr-1"></i> Regresar
                </a>
                @isset($contact->id_contacto)
                    <a href="{{ route('contacts.edit', $contact->id_contacto) }}" class="btn btn-warning btn-sm shadow-sm px-3 text-dark font-weight-bold">
                        <i class="fas fa-edit mr-1"></i> Editar
                    </a>
                @endisset
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="card card-navy card-outline shadow-lg border-0 rounded-lg">
            {{-- Encabezado de la tarjeta --}}
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h3 class="card-title font-weight-bold text-navy mb-0">
                    <i class="fas fa-user-circle text-navy mr-2"></i> Información del contacto
                </h3>
                <div class="card-tools ml-auto">
                    <span class="badge bg-navy px-3 py-2 shadow-sm font-weight-bold">
                        ID: #{{ $contact->id_contacto }}
                    </span>
                </div>
            </div>

            {{-- Cuerpo de la tarjeta --}}
            <div class="card-body bg-white p-4">
                <div class="row">
                    {{-- Columna Izquierda --}}
                    <div class="col-md-6 pr-md-4">
                        {{-- Datos Personales --}}
                        <p class="text-navy font-weight-bold border-bottom pb-2 mb-3 text-uppercase small">
                            <i class="fas fa-user mr-1"></i> Datos Personales
                        </p>
                        <table class="table table-sm table-borderless mb-4">
                            <tbody>
                                <tr>
                                    <th class="text-muted" width="38%">Nombres:</th>
                                    <td class="font-weight-bold text-dark">{{ $contact->nombres }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Apellidos:</th>
                                    <td class="font-weight-bold text-dark">{{ $contact->apellidos }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Fecha de cumpleaños:</th>
                                    <td class="text-dark">
                                        <i class="fas fa-birthday-cake text-warning mr-1"></i>
                                        {{ $contact->fecha_cumpleanios ? \Carbon\Carbon::parse($contact->fecha_cumpleanios)->format('d/m/Y') : 'No registrado' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        {{-- Empresa y Operador --}}
                        <p class="text-navy font-weight-bold border-bottom pb-2 mb-3 text-uppercase small">
                            <i class="fas fa-building mr-1"></i> Empresa y Operador
                        </p>
                        <table class="table table-sm table-borderless mb-3">
                            <tbody>
                                <tr>
                                    <th class="text-muted" width="38%">Empresa:</th>
                                    <td>
                                        <span class="badge badge-light border px-2 py-1 text-dark font-weight-bold">
                                            <i class="fas fa-briefcase text-navy mr-1"></i> {{ $contact->company->nombre_empresa ?? 'No disponible' }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Operador:</th>
                                    <td>
                                        <span class="badge badge-info px-2 py-1 font-weight-bold">
                                            <i class="fas fa-broadcast-tower mr-1"></i> {{ $contact->operator->nombre_operador ?? 'No disponible' }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- Columna Derecha --}}
                    <div class="col-md-6 pl-md-4 border-left-md">
                        {{-- Datos de Contacto --}}
                        <p class="text-navy font-weight-bold border-bottom pb-2 mb-3 text-uppercase small">
                            <i class="fas fa-address-book mr-1"></i> Datos de Contacto
                        </p>
                        <table class="table table-sm table-borderless mb-4">
                            <tbody>
                                <tr>
                                    <th class="text-muted" width="38%">Teléfono móvil:</th>
                                    <td class="font-weight-bold text-dark">
                                        <i class="fas fa-mobile-alt text-success mr-1"></i> {{ $contact->telefono_movil }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Teléfono de casa:</th>
                                    <td class="text-dark">
                                        <i class="fas fa-phone-alt text-secondary mr-1"></i> {{ $contact->telefono_casa ?: 'No registrado' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Correo electrónico:</th>
                                    <td class="text-dark">
                                        <i class="fas fa-envelope text-info mr-1"></i> {{ $contact->correo ?: 'No registrado' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        {{-- Información del Grupo --}}
                        <p class="text-navy font-weight-bold border-bottom pb-2 mb-3 text-uppercase small">
                            <i class="fas fa-users mr-1"></i> Información del Grupo
                        </p>
                        <table class="table table-sm table-borderless mb-3">
                            <tbody>
                                <tr>
                                    <th class="text-muted" width="38%">Grupo:</th>
                                    <td>
                                        <span class="badge badge-primary px-2 py-1 font-weight-bold">
                                            <i class="fas fa-layer-group mr-1"></i> {{ $contact->group->nombre_grupo ?? 'No disponible' }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Descripción:</th>
                                    <td class="text-muted">{{ $contact->descripcion_grupo ?: 'No registrada' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Observaciones y Fecha de Registro --}}
                <div class="row border-top pt-3 mt-3 mx-0 bg-light rounded p-3 align-items-center">
                    <div class="col-md-8 px-2 mb-2 mb-md-0">
                        <strong class="text-navy d-block mb-1">
                            <i class="fas fa-clipboard-list mr-1"></i> Observaciones:
                        </strong>
                        <span class="text-muted">{{ $contact->observaciones ?: 'Sin observaciones registradas.' }}</span>
                    </div>
                    <div class="col-md-4 px-2 text-md-right align-self-center">
                        <strong class="text-navy d-block mb-1">
                            <i class="fas fa-calendar-alt mr-1"></i> Fecha de registro:
                        </strong>
                        <span class="badge badge-light border px-2 py-1 text-muted">
                            {{ \Carbon\Carbon::parse($contact->fecha_registro)->format('d/m/Y H:i') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer')
    @include('layouts.admin')
@stop