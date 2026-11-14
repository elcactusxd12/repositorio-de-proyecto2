<div class="row">
    {{-- Columna Izquierda: Nombre del Grupo --}}
    <div class="col-md-6 pr-md-4">
        <div class="form-group mb-3">
            <label for="nombre_grupo" class="small font-weight-bold text-navy mb-1">
                <i class="fas fa-users mr-1 text-navy"></i> Nombre del Grupo <span class="text-danger">*</span>
            </label>
            <input type="text" name="nombre_grupo" class="form-control form-control-sm @error('nombre_grupo') is-invalid @enderror" value="{{ old('nombre_grupo', $group?->nombre_grupo) }}" id="nombre_grupo" placeholder="Ej. Familia, Trabajo, VIP">
            {!! $errors->first('nombre_grupo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    {{-- Columna Derecha: Fecha de Registro --}}
    <div class="col-md-6 pl-md-4">
        <div class="form-group mb-3">
            <label for="fecha_registro" class="small font-weight-bold text-navy mb-1">
                <i class="far fa-calendar-alt mr-1 text-navy"></i> Fecha de Registro
            </label>
            <input type="date" name="fecha_registro" class="form-control form-control-sm @error('fecha_registro') is-invalid @enderror" value="{{ old('fecha_registro', $group?->fecha_registro) }}" id="fecha_registro">
            {!! $errors->first('fecha_registro', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    {{-- Botones de Acción dentro del formulario --}}
    <div class="col-12 mt-3 border-top pt-3 d-flex justify-content-between">
        <a href="{{ route('groups.index') }}" class="btn btn-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left mr-1"></i> Cancelar
        </a>
        <button type="submit" class="btn bg-navy btn-sm shadow-sm px-4">
            <i class="fas {{ isset($group) && $group->exists ? 'fa-sync-alt' : 'fa-save' }} mr-1"></i> 
            {{ isset($group) && $group->exists ? 'Actualizar Grupo' : 'Guardar Grupo' }}
        </button>
    </div>
</div>