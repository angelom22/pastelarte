@extends('layouts.app')

@section('content')

<!-- Inner Page Breadcrumb -->
<section class="inner_page_breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 text-center">
                <div class="breadcrumb_content">
                    <h4 class="breadcrumb_title">RESTABLECER CONTRASEÑA</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">restablecimiento de contraseña</li>
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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        <div class="heading">
                            <h3 class="text-center">Restablecimiento de contraseña</h3>
                        </div>
                        @csrf
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="
                                    Correo Electrónico">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                        </div> 
                        <button type="submit" class="btn btn-log btn-block btn-thm2">Enviar enlace</button>  	 
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
    

@endsection
