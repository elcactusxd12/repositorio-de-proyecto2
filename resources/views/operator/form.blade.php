<div class="row">
    {{-- Columna Izquierda: Nombre del Operador --}}
    <div class="col-md-6 pr-md-4">
        <div class="form-group mb-3">
            <label for="nombre_operador" class="small font-weight-bold text-navy mb-1">
                <i class="fas fa-network-wired mr-1 text-navy"></i> Nombre del Operador <span class="text-danger">*</span>
            </label>
            <input type="text" name="nombre_operador" class="form-control form-control-sm @error('nombre_operador') is-invalid @enderror" value="{{ old('nombre_operador', $operator?->nombre_operador) }}" id="nombre_operador" placeholder="Ej. Claro, Movistar, Entel">
            {!! $errors->first('nombre_operador', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    {{-- Columna Derecha: Fecha de Registro --}}
    <div class="col-md-6 pl-md-4">
        <div class="form-group mb-3">
            <label for="fecha_registro" class="small font-weight-bold text-navy mb-1">
                <i class="far fa-calendar-alt mr-1 text-navy"></i> Fecha de Registro
            </label>
            <input type="date" name="fecha_registro" class="form-control form-control-sm @error('fecha_registro') is-invalid @enderror" value="{{ old('fecha_registro', $operator?->fecha_registro) }}" id="fecha_registro">
            {!! $errors->first('fecha_registro', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    {{-- Botones de Acción dentro del formulario --}}
    <div class="col-12 mt-3 border-top pt-3 d-flex justify-content-between">
        <a href="{{ route('operators.index') }}" class="btn btn-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left mr-1"></i> Cancelar
        </a>
        <button type="submit" class="btn bg-navy btn-sm shadow-sm px-4">
            <i class="fas {{ isset($operator) && $operator->exists ? 'fa-sync-alt' : 'fa-save' }} mr-1"></i> 
            {{ isset($operator) && $operator->exists ? 'Actualizar Operador' : 'Guardar Operador' }}
        </button>
    </div>
</div>