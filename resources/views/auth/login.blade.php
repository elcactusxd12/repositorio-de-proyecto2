
@extends('adminlte::master')

{{-- Estilos personalizados --}}
@section('adminlte_css')
    @vite(['resources/css/estilos_login.css'])
    @yield('css')
@endsection

@section('body')

<div class="login-wrapper-custom">

    <div class="container d-flex justify-content-center align-items-center">
        <div class="row justify-content-center w-100">

            <div class="col-xl-9 col-lg-10 col-md-12 d-flex justify-content-center">

                {{-- TARJETA PRINCIPAL --}}
                <div class="card border-0 overflow-hidden flex-row shadow-lg w-100"
                     style="border-radius: 16px; background: #ffffff; max-width: 900px;">

                    {{-- COLUMNA IZQUIERDA: FORMULARIO --}}
                    <div class="card-body p-4 p-md-5 col-12 col-md-6 d-flex flex-column justify-content-center bg-white">

                        <div class="text-center mb-4">

                            <img src="{{ asset('img/Agenda.png') }}"
                                 alt="Logo Agenda"
                                 class="mb-3 shadow-sm rounded"
                                 style="max-height: 55px; width: auto;">

                            <h3 class="font-weight-bold text-dark mb-1"
                                style="letter-spacing: -0.5px;">
                                ¡Bienvenido!
                            </h3>

                            <p class="text-muted small">
                                Ingresa tus credenciales para acceder al sistema
                            </p>

                        </div>

                        <form action="{{ route('login') }}" method="POST">
                            @csrf

                            {{-- CORREO ELECTRÓNICO --}}
                            <div class="form-group mb-3">

                                <div class="input-group input-group-alternative">

                                    <input type="email"
                                           name="email"
                                           class="form-control bg-light border-0 px-3 py-2 @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}"
                                           placeholder="Correo electrónico"
                                           style="border-radius: 8px 0 0 8px; font-size: 0.95rem;"
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

                            {{-- CONTRASEÑA --}}
                            <div class="form-group mb-3">

                                <div class="input-group input-group-alternative">

                                    <input type="password"
                                           name="password"
                                           class="form-control bg-light border-0 px-3 py-2 @error('password') is-invalid @enderror"
                                           placeholder="Contraseña"
                                           style="border-radius: 8px 0 0 8px; font-size: 0.95rem;"
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

                            {{-- OPCIONES Y BOTÓN --}}
                            <div class="row align-items-center mb-4 mt-2">

                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">

                                        <input type="checkbox"
                                               name="remember"
                                               class="custom-control-input"
                                               id="remember"
                                               {{ old('remember') ? 'checked' : '' }}>

                                        <label class="custom-control-label small text-secondary font-weight-normal"
                                               for="remember"
                                               style="cursor: pointer;">
                                            Recuérdame
                                        </label>

                                    </div>
                                </div>

                                <div class="col-6 text-right">
                                    <button type="submit"
                                            class="btn btn-block font-weight-bold text-white shadow-sm py-2 btn-senati-login">

                                        Ingresar
                                        <i class="fas fa-arrow-right ml-1 small"></i>

                                    </button>
                                </div>

                            </div>

                            {{-- ENLACES --}}
                            <div class="text-center pt-3 border-top border-light">

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                       class="small text-muted d-block mb-1 login-link-hover">
                                        ¿Olvidaste tu contraseña?
                                    </a>
                                @endif

                                <a href="{{ route('register') }}"
                                   class="small font-weight-bold login-link-senati">
                                    ¿No tienes una cuenta? Regístrate
                                </a>

                            </div>

                        </form>

                    </div>

                    {{-- COLUMNA DERECHA: PANEL CORPORATIVO SENATI --}}
                    <div class="col-md-6 d-none d-md-flex flex-column justify-content-center align-items-center text-center p-5 text-white"
                         style="background: linear-gradient(135deg, #003366 0%, #001f3f 100%); position: relative; overflow: hidden;">

                        {{-- ELEMENTO DECORATIVO --}}
                        <div style="position: absolute; top: -50px; right: -50px; width: 200px; height: 200px; background: rgba(255, 255, 255, 0.04); border-radius: 50%;">
                        </div>

                        <div class="mb-4 position-relative">

                            <span class="fa-stack fa-3x" style="opacity: 0.95;">

                                <i class="fas fa-circle fa-stack-2x text-white"
                                   style="opacity: 0.1; transform: scale(1.2);">
                                </i>

                                <i class="fas fa-calendar-check fa-stack-1x text-white"></i>

                            </span>

                        </div>

                        <h2 class="font-weight-bold mb-2"
                            style="letter-spacing: -0.5px;">
                            Agenda 2026
                        </h2>

                        <div style="width: 40px; height: 3px; background: rgba(255, 255, 255, 0.5); margin: 12px auto; border-radius: 2px;">
                        </div>

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

@endsection
