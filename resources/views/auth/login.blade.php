@extends('layouts.app')

@section('content')

    <!-- Inner Page Breadcrumb -->
    <section class="inner_page_breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 text-center">
                    <div class="breadcrumb_content">
                        <h4 class="breadcrumb_title">Logın</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ 'url/' }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Logın</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our LogIn Register -->
    <section class="our-log bgc-fa">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-6 offset-lg-3">
                    <div class="login_form inner_page">
                    <form method="POST" action="#" id="login">
                        <!-- <form method="POST" action="javascript: Login(this)" class="login" id="login"> -->
                        @csrf
                            <div class="heading">
                                <h3 class="text-center">Ingrese a su cuenta</h3>
                                <p class="text-center">¿No tienes una cuenta? <a class="text-thm" href="{{url('register')}}">¡Regístrate!</a></p>
                            </div>
                                <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Correo Electronico">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                            <div class="form-group custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input"  name="remember" id="exampleCheck1" id="remember" {{ old('remember') ? 'checked' : '' }} >
                                <label class="custom-control-label" for="exampleCheck1">Recordarme</label>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('¿Se te olvidó tu contraseña?') }}
                                </a>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-log btn-block btn-thm2">Login</button>
                            <hr>
                            <div class="row mt40">
                                <div class="col-lg">
                                    <button type="submit" class="btn btn-block color-white bgc-fb"><i class="fa fa-facebook float-left mt5"></i> Facebook</button>
                                </div>
                                <div class="col-lg">
                                    <button type="submit" class="btn btn-block color-white bgc-gogle"><i class="fa fa-google float-left mt5"></i> Google</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')
    <!-- Validación login -->
    <script type="text/javascript" src="{{ asset('js/login.js') }}"></script>
@endpush


