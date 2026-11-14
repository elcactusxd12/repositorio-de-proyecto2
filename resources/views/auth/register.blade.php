
@extends('adminlte::master')

@section('adminlte_css')
    @vite(['resources/css/estilos_register.css'])
    @yield('css')
@endsection

@section('body')

    <div class="login-wrapper-custom">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="row justify-content-center w-100">
                <div class="col-xl-9 col-lg-10 col-md-12 d-flex justify-content-center">

                    {{-- TARJETA PRINCIPAL DE DOS COLUMNAS --}}
                    <div class="card border-0 overflow-hidden flex-row shadow-lg w-100"
                        style="border-radius: 16px; background: #ffffff; max-width: 920px;">

                        {{-- =========================================
                             COLUMNA IZQUIERDA: FORMULARIO DE REGISTRO
                        ========================================== --}}
                        <div class="card-body p-4 p-md-5 col-12 col-md-6 d-flex flex-column justify-content-center bg-white">

                            {{-- ENCABEZADO --}}
                            <div class="text-center mb-3">

                                <img src="{{ asset('img/Agenda.png') }}"
                                    alt="Logo Agenda"
                                    class="mb-2 shadow-sm rounded"
                                    style="max-height: 50px; width: auto;">

                                <h3 class="font-weight-bold text-dark mb-1"
                                    style="letter-spacing: -0.5px;">
                                    Crear Cuenta
                                </h3>

                                <p class="text-muted small mb-3">
                                    Regístrate para acceder al sistema
                                </p>

                            </div>

                            {{-- FORMULARIO --}}
                            <form action="{{ route('register') }}" method="POST">
                                @csrf

                                {{-- NOMBRE COMPLETO --}}
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">

                                        <input type="text"
                                            name="name"
                                            class="form-control px-3 py-2 @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}"
                                            placeholder="Nombre completo"
                                            style="border-radius: 8px 0 0 8px; font-size: 0.95rem;"
                                            required
                                            autofocus>

                                        <div class="input-group-append">
                                            <span class="input-group-text text-muted px-3"
                                                style="border-radius: 0 8px 8px 0;">
                                                <i class="fas fa-user"></i>
                                            </span>
                                        </div>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                {{-- CORREO ELECTRÓNICO --}}
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">

                                        <input type="email"
                                            name="email"
                                            class="form-control px-3 py-2 @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}"
                                            placeholder="Correo electrónico"
                                            style="border-radius: 8px 0 0 8px; font-size: 0.95rem;"
                                            required>

                                        <div class="input-group-append">
                                            <span class="input-group-text text-muted px-3"
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

                                {{-- CONTRASEÑA --}}
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">

                                        <input type="password"
                                            name="password"
                                            class="form-control px-3 py-2 @error('password') is-invalid @enderror"
                                            placeholder="Contraseña"
                                            style="border-radius: 8px 0 0 8px; font-size: 0.95rem;"
                                            required>

                                        <div class="input-group-append">
                                            <span class="input-group-text text-muted px-3"
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

                                {{-- CONFIRMAR CONTRASEÑA --}}
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">

                                        <input type="password"
                                            name="password_confirmation"
                                            class="form-control px-3 py-2"
                                            placeholder="Repetir contraseña"
                                            style="border-radius: 8px 0 0 8px; font-size: 0.95rem;"
                                            required>

                                        <div class="input-group-append">
                                            <span class="input-group-text text-muted px-3"
                                                style="border-radius: 0 8px 8px 0;">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                        </div>

                                    </div>
                                </div>

                                {{-- BOTÓN DE REGISTRO --}}
                                <div class="form-group mb-3 mt-4">

                                    <button type="submit"
                                        class="btn btn-block font-weight-bold text-white shadow-sm py-2 btn-senati-login"
                                        style="font-size: 0.95rem;">

                                        Registrarse
                                        <i class="fas fa-user-plus ml-1 small"></i>

                                    </button>

                                </div>

                                {{-- ENLACE PARA VOLVER AL LOGIN --}}
                                <div class="text-center pt-3 border-top border-light">

                                    <a href="{{ route('login') }}"
                                        class="small font-weight-bold login-link-senati">

                                        ¿Ya tienes una cuenta? Inicia sesión

                                    </a>

                                </div>

                            </form>

                        </div>


                        {{-- =========================================
                             COLUMNA DERECHA: PANEL CORPORATIVO SENATI
                        ========================================== --}}
                        <div class="col-md-6 d-none d-md-flex flex-column justify-content-center align-items-center text-center p-5 text-white senati-brand-panel">

                            <div class="senati-brand-content">

                                {{-- ICONO PRINCIPAL --}}
                                <div class="mb-4">

                                    <span class="fa-stack fa-3x" style="opacity: 0.95;">

                                        <i class="fas fa-circle fa-stack-2x text-white"
                                            style="opacity: 0.08; transform: scale(1.3);">
                                        </i>

                                        <i class="fas fa-user-shield fa-stack-1x text-white"></i>

                                    </span>

                                </div>

                                {{-- TÍTULO --}}
                                <h2 class="font-weight-bold mb-2"
                                    style="letter-spacing: -0.5px;">

                                    Registro Agenda 2026

                                </h2>

                                {{-- SEPARADOR --}}
                                <div style="width: 45px; height: 3px; background: rgba(255, 255, 255, 0.4); margin: 12px auto; border-radius: 2px;">
                                </div>

                                {{-- DESCRIPCIÓN --}}
                                <p class="small text-light px-4 mb-0"
                                    style="opacity: 0.85; line-height: 1.6;">

                                    Sistema integral de gestión y control administrativo institucional
                                    &bull; SENATI 2026

                                </p>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
