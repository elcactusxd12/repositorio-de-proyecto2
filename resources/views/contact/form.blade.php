<div class="row">
    {{-- Columna Izquierda: Datos Personales y Relaciones --}}
    <div class="col-md-6 pr-md-4">
        {{-- Nombres --}}
        <div class="form-group mb-3">
            <label for="nombres" class="font-weight-bold text-navy">
                <i class="fas fa-user mr-1 text-navy"></i> Nombres <span class="text-danger">*</span>
            </label>
            <input type="text" name="nombres" class="form-control @error('nombres') is-invalid @enderror" value="{{ old('nombres', $contact?->nombres) }}" id="nombres" placeholder="Ingrese nombres">
            {!! $errors->first('nombres', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        {{-- Apellidos --}}
        <div class="form-group mb-3">
            <label for="apellidos" class="font-weight-bold text-navy">
                <i class="fas fa-user-tag mr-1 text-navy"></i> Apellidos <span class="text-danger">*</span>
            </label>
            <input type="text" name="apellidos" class="form-control @error('apellidos') is-invalid @enderror" value="{{ old('apellidos', $contact?->apellidos) }}" id="apellidos" placeholder="Ingrese apellidos">
            {!! $errors->first('apellidos', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        {{-- Empresa (Select relacional) --}}
        <div class="form-group mb-3">
            <label for="id_empresa" class="font-weight-bold text-navy">
                <i class="fas fa-building mr-1 text-navy"></i> Empresa <span class="text-danger">*</span>
            </label>
            <select name="id_empresa" id="id_empresa" class="form-control @error('id_empresa') is-invalid @enderror">
                <option value="">-- Seleccione una empresa --</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id_empresa }}" {{ old('id_empresa', $contact?->id_empresa) == $company->id_empresa ? 'selected' : '' }}>
                        {{ $company->nombre_empresa }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('id_empresa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        {{-- Operador (Select relacional) --}}
        <div class="form-group mb-3">
            <label for="id_operador" class="font-weight-bold text-navy">
                <i class="fas fa-network-wired mr-1 text-navy"></i> Operador <span class="text-danger">*</span>
            </label>
            <select name="id_operador" id="id_operador" class="form-control @error('id_operador') is-invalid @enderror">
                <option value="">-- Seleccione un operador --</option>
                @foreach($operators as $operator)
                    <option value="{{ $operator->id_operador }}" {{ old('id_operador', $contact?->id_operador) == $operator->id_operador ? 'selected' : '' }}>
                        {{ $operator->nombre_operador }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('id_operador', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        {{-- Grupo (Select relacional) --}}
        <div class="form-group mb-3">
            <label for="id_grupo" class="font-weight-bold text-navy">
                <i class="fas fa-users mr-1 text-navy"></i> Grupo <span class="text-danger">*</span>
            </label>
            <select name="id_grupo" id="id_grupo" class="form-control @error('id_grupo') is-invalid @enderror">
                <option value="">-- Seleccione un grupo --</option>
                @foreach($groups as $group)
                    <option value="{{ $group->id_grupo }}" {{ old('id_grupo', $contact?->id_grupo) == $group->id_grupo ? 'selected' : '' }}>
                        {{ $group->nombre_grupo }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('id_grupo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        {{-- Descripción del Grupo --}}
        <div class="form-group mb-3">
            <label for="descripcion_grupo" class="font-weight-bold text-navy">
                <i class="fas fa-tag mr-1 text-navy"></i> Descripción del Grupo
            </label>
            <input type="text" name="descripcion_grupo" class="form-control @error('descripcion_grupo') is-invalid @enderror" value="{{ old('descripcion_grupo', $contact?->descripcion_grupo) }}" id="descripcion_grupo" placeholder="Ej. Familia, Trabajo, VIP">
            {!! $errors->first('descripcion_grupo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    {{-- Columna Derecha: Teléfonos, Correo y Fechas --}}
    <div class="col-md-6 pl-md-4">
        {{-- Teléfono Móvil --}}
        <div class="form-group mb-3">
            <label for="telefono_movil" class="font-weight-bold text-navy">
                <i class="fas fa-mobile-alt mr-1 text-navy"></i> Teléfono Móvil <span class="text-danger">*</span>
            </label>
            <input type="text" name="telefono_movil" class="form-control @error('telefono_movil') is-invalid @enderror" value="{{ old('telefono_movil', $contact?->telefono_movil) }}" id="telefono_movil" placeholder="Ej. 987654321">
            {!! $errors->first('telefono_movil', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        {{-- Teléfono Casa --}}
        <div class="form-group mb-3">
            <label for="telefono_casa" class="font-weight-bold text-navy">
                <i class="fas fa-phone mr-1 text-navy"></i> Teléfono de Casa
            </label>
            <input type="text" name="telefono_casa" class="form-control @error('telefono_casa') is-invalid @enderror" value="{{ old('telefono_casa', $contact?->telefono_casa) }}" id="telefono_casa" placeholder="Opcional">
            {!! $errors->first('telefono_casa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        {{-- Correo Electrónico --}}
        <div class="form-group mb-3">
            <label for="correo" class="font-weight-bold text-navy">
                <i class="fas fa-envelope mr-1 text-navy"></i> Correo Electrónico
            </label>
            <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo', $contact?->correo) }}" id="correo" placeholder="correo@ejemplo.com">
            {!! $errors->first('correo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        {{-- Fecha de Cumpleaños --}}
        <div class="form-group mb-3">
            <label for="fecha_cumpleanios" class="font-weight-bold text-navy">
                <i class="fas fa-birthday-cake mr-1 text-navy"></i> Fecha de Cumpleaños
            </label>
            <input type="date" name="fecha_cumpleanios" class="form-control @error('fecha_cumpleanios') is-invalid @enderror" value="{{ old('fecha_cumpleanios', $contact?->fecha_cumpleanios) }}" id="fecha_cumpleanios">
            {!! $errors->first('fecha_cumpleanios', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        {{-- Observaciones --}}
        <div class="form-group mb-3">
            <label for="observaciones" class="font-weight-bold text-navy">
                <i class="fas fa-comment-alt mr-1 text-navy"></i> Observaciones
            </label>
            <textarea name="observaciones" rows="3" class="form-control @error('observaciones') is-invalid @enderror" id="observaciones" placeholder="Notas adicionales...">{{ old('observaciones', $contact?->observaciones) }}</textarea>
            {!! $errors->first('observaciones', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    {{-- Botones de Acción dentro del formulario --}}
    <div class="col-12 mt-3 border-top pt-3 d-flex justify-content-between">
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left mr-1"></i> Cancelar
        </a>
        <button type="submit" class="btn bg-navy shadow-sm px-4">
            <i class="fas {{ isset($contact) && $contact->exists ? 'fa-sync-alt' : 'fa-save' }} mr-1"></i> 
            {{ isset($contact) && $contact->exists ? 'Actualizar Contacto' : 'Guardar Contacto' }}
        </button>
    </div>
</div>