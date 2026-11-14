```blade
@extends('adminlte::master')

@section('body')

    {{-- CONTENEDOR PRINCIPAL --}}
    <div class="d-flex min-vh-100 justify-content-center align-items-center"
        style="
            background: radial-gradient(circle at 50% 50%, #f1f5f9 0%, #cbd5e1 100%) !important;
            height: 100vh;
            width: 100vw;
            margin: 0;
            position: fixed;
            top: 0;
            left: 0;
            overflow: hidden;
        ">

        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-9 col-lg-10 col-md-12 d-flex justify-content-center">

                    {{-- TARJETA PRINCIPAL --}}
                    <div class="card border-0 overflow-hidden flex-row shadow-lg w-100"
                        style="
                            border-radius: 16px;
                            background: #ffffff;
                            max-width: 920px;
                        ">

                        {{-- COLUMNA IZQUIERDA: FORMULARIO --}}
                        <div class="card-body p-4 p-md-5 col-12 col-md-6 d-flex flex-column justify-content-center bg-white">

                            <div class="text-center mb-4">

                                <img src="{{ asset('img/Agenda.png') }}"
                                    alt="Logo Agenda"
                                    class="mb-3 shadow-sm rounded"
                                    style="max-height: 50px; width: auto;">

                                <h3 class="font-weight-bold text-dark mb-1"
                                    style="letter-spacing: -0.5px;">
                                    Restablecer Contraseña
                                </h3>

                                <p class="text-muted small mb-3">
                                    Ingresa tu nueva contraseña para actualizar el acceso.
                                </p>

                            </div>

                            {{-- MENSAJE DE ÉXITO --}}
                            @if (session('status'))
                                <div class="alert alert-success small" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{-- FORMULARIO DE RESTABLECIMIENTO --}}
                            <form action="{{ route('password.update') }}" method="POST">
                                @csrf

                                {{-- TOKEN OCULTO REQUERIDO POR LARAVEL --}}
                                <input type="hidden" name="token" value="{{ $token }}">

                                {{-- CORREO ELECTRÓNICO --}}
                                <div class="form-group mb-3">

                                    <div class="input-group">

                                        <input type="email"
                                            name="email"
                                            class="form-control bg-light border-0 px-3 py-2 @error('email') is-invalid @enderror"
                                            value="{{ $email ?? old('email') }}"
                                            placeholder="Correo electrónico"
                                            style="
                                                border-radius: 8px 0 0 8px;
                                                font-size: 0.95rem;
                                            "
                                            required
                                            autofocus>

                                        <div class="input-group-append">
                                            <span class="input-group-text bg-light border-0 text-muted px-3"
                                                style="border-radius: 0 8px 8px 0;">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                        </div>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                {{-- NUEVA CONTRASEÑA --}}
                                <div class="form-group mb-3">

                                    <div class="input-group">

                                        <input type="password"
                                            name="password"
                                            class="form-control bg-light border-0 px-3 py-2 @error('password') is-invalid @enderror"
                                            placeholder="Nueva contraseña"
                                            style="
                                                border-radius: 8px 0 0 8px;
                                                font-size: 0.95rem;
                                            "
                                            required>

                                        <div class="input-group-append">
                                            <span class="input-group-text bg-light border-0 text-muted px-3"
                                                style="border-radius: 0 8px 8px 0;">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                        </div>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                {{-- CONFIRMAR NUEVA CONTRASEÑA --}}
                                <div class="form-group mb-3">

                                    <div class="input-group">

                                        <input type="password"
                                            name="password_confirmation"
                                            class="form-control bg-light border-0 px-3 py-2"
                                            placeholder="Confirmar contraseña"
                                            style="
                                                border-radius: 8px 0 0 8px;
                                                font-size: 0.95rem;
                                            "
                                            required>

                                        <div class="input-group-append">
                                            <span class="input-group-text bg-light border-0 text-muted px-3"
                                                style="border-radius: 0 8px 8px 0;">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                        </div>

                                    </div>
                                </div>

                                {{-- BOTÓN RESTABLECER CONTRASEÑA --}}
                                <div class="form-group mb-3 mt-4">

                                    <button type="submit"
                                        class="btn btn-block font-weight-bold text-white shadow-sm py-2"
                                        style="
                                            background: linear-gradient(135deg, #003366 0%, #002244 100%);
                                            border-radius: 8px;
                                            border: none;
                                        ">

                                        Restablecer Contraseña
                                        <i class="fas fa-check-circle ml-1 small"></i>

                                    </button>

                                </div>

                                {{-- VOLVER AL LOGIN --}}
                                <div class="text-center pt-3 border-top border-light">

                                    <a href="{{ route('login') }}"
                                        class="small font-weight-bold"
                                        style="color: #003366;">

                                        <i class="fas fa-arrow-left mr-1"></i>
                                        Volver al inicio de sesión

                                    </a>

                                </div>

                            </form>

                        </div>

                        {{-- COLUMNA DERECHA: PANEL CORPORATIVO SENATI --}}
                        <div class="col-md-6 d-none d-md-flex flex-column justify-content-center align-items-center text-center p-5 text-white"
                            style="
                                background: linear-gradient(135deg, #00264d 0%, #001122 100%);
                                position: relative;
                                overflow: hidden;
                            ">

                            {{-- EFECTO DECORATIVO GLOW --}}
                            <div style="
                                position: absolute;
                                top: -80px;
                                right: -80px;
                                width: 250px;
                                height: 250px;
                                background: radial-gradient(circle, rgba(0, 102, 204, 0.35) 0%, rgba(0, 51, 102, 0) 70%);
                                border-radius: 50%;
                            "></div>

                            {{-- CONTENIDO DEL PANEL --}}
                            <div style="position: relative; z-index: 2;">

                                {{-- ICONO DE SEGURIDAD --}}
                                <div class="mb-4">

                                    <span class="fa-stack fa-3x" style="opacity: 0.95;">

                                        <i class="fas fa-circle fa-stack-2x text-white"
                                            style="opacity: 0.08; transform: scale(1.3);"></i>

                                        <i class="fas fa-shield-alt fa-stack-1x text-white"></i>

                                    </span>

                                </div>

                                {{-- TÍTULO --}}
                                <h2 class="font-weight-bold mb-2"
                                    style="letter-spacing: -0.5px;">
                                    Nueva Clave Agenda 2026
                                </h2>

                                <div style="
                                    width: 45px;
                                    height: 3px;
                                    background: rgba(255, 255, 255, 0.4);
                                    margin: 12px auto;
                                    border-radius: 2px;
                                "></div>

                                {{-- DESCRIPCIÓN --}}
                                <p class="small text-light px-4 mb-4"
                                    style="opacity: 0.85; line-height: 1.6;">

                                    Sistema integral de gestión y control administrativo institucional
                                    &bull; SENATI 2026

                                </p>

                                {{-- INFORMACIÓN INSTITUCIONAL --}}
                                <div class="border-top pt-3"
                                    style="border-color: rgba(255, 255, 255, 0.2) !important;">

                                    <p class="small text-light mb-2">
                                        <i class="fas fa-code mr-1"></i>
                                        Sistema de Agenda Telefónica
                                    </p>

                                    <p class="small text-light mb-2">
                                        Desarrollado usando PHP + Laravel + AdminLTE
                                    </p>

                                    <p class="small text-light mb-2">
                                        Curso: BackEnd Developer Web
                                    </p>

                                    <p class="small text-light mb-2">
                                        Tercer Semestre | SENATI
                                    </p>

                                    <p class="small text-light mb-0"
                                        style="opacity: 0.75;">

                                        &copy; 2026 Ing. Wilmer Vera Ostios
                                        <br>
                                        wvera@senati.pe
                                        <br>
                                        Todos los derechos reservados.

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
```