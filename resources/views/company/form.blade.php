<div class="row">
    {{-- Columna Izquierda --}}
    <div class="col-md-6 pr-md-4">
        {{-- Nombre Empresa --}}
        <div class="form-group mb-3">
            <label for="nombre_empresa" class="small font-weight-bold text-navy mb-1">
                <i class="fas fa-building mr-1 text-navy"></i> Nombre de la Empresa <span class="text-danger">*</span>
            </label>
            <input type="text" name="nombre_empresa" class="form-control form-control-sm @error('nombre_empresa') is-invalid @enderror" value="{{ old('nombre_empresa', $company?->nombre_empresa) }}" id="nombre_empresa" placeholder="Ej. Tech Solutions S.A.C.">
            {!! $errors->first('nombre_empresa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        {{-- Dirección --}}
        <div class="form-group mb-3">
            <label for="direccion" class="small font-weight-bold text-navy mb-1">
                <i class="fas fa-map-marker-alt mr-1 text-navy"></i> Dirección
            </label>
            <input type="text" name="direccion" class="form-control form-control-sm @error('direccion') is-invalid @enderror" value="{{ old('direccion', $company?->direccion) }}" id="direccion" placeholder="Ej. Av. Pardo N° 123 - Chimbote">
            {!! $errors->first('direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    {{-- Columna Derecha --}}
    <div class="col-md-6 pl-md-4">
        {{-- Teléfono --}}
        <div class="form-group mb-3">
            <label for="telefono" class="small font-weight-bold text-navy mb-1">
                <i class="fas fa-phone-alt mr-1 text-navy"></i> Teléfono
            </label>
            <input type="text" name="telefono" class="form-control form-control-sm @error('telefono') is-invalid @enderror" value="{{ old('telefono', $company?->telefono) }}" id="telefono" placeholder="Ej. 043-123456 / 987654321">
            {!! $errors->first('telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        {{-- Fecha Registro --}}
        <div class="form-group mb-3">
            <label for="fecha_registro" class="small font-weight-bold text-navy mb-1">
                <i class="far fa-calendar-alt mr-1 text-navy"></i> Fecha de Registro
            </label>
            <input type="date" name="fecha_registro" class="form-control form-control-sm @error('fecha_registro') is-invalid @enderror" value="{{ old('fecha_registro', $company?->fecha_registro) }}" id="fecha_registro">
            {!! $errors->first('fecha_registro', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    {{-- Botones de Acción dentro del formulario --}}
    <div class="col-12 mt-3 border-top pt-3 d-flex justify-content-between">
        <a href="{{ route('companies.index') }}" class="btn btn-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left mr-1"></i> Cancelar
        </a>
        <button type="submit" class="btn bg-navy btn-sm shadow-sm px-4">
            <i class="fas {{ isset($company) && $company->exists ? 'fa-sync-alt' : 'fa-save' }} mr-1"></i> 
            {{ isset($company) && $company->exists ? 'Actualizar Empresa' : 'Guardar Empresa' }}
        </button>
    </div>
</div>