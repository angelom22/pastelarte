@extends('layouts.app')

@section('content')

    <!-- Inner Page Breadcrumb -->
    <section class="inner_page_breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 text-center">
                    <div class="breadcrumb_content">
                        <h4 class="breadcrumb_title">Registro</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ 'url/' }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Registro</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>


<section class="our-log bgc-fa">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-6 offset-lg-3">
                    <div class="login_form inner_page">
                        <form method="POST" action="#" id="registro">
                        @csrf
                            <div class="form-group">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Usuario">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Correo Electronico">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Contaseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" autocomplete="new-password"  placeholder="Confirmar Contraseña">
                            </div>
                            <button type="submit" class="btn btn-log btn-block btn-thm2">{{ __('Registrar') }}</button>
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

@endpush