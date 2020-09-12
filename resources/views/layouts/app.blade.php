<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>
    <meta name="keywords" content="escuela de pasteleria, cursos, cursos online, educacion, reposteria, aprendizaje, decoracion de tortas, cupcake cursos, cursos de tortas, pasapalos, educacion online resporteria, estudiantes, entrenamiento, pastel arte, escuela online de pasteleria">
    <meta name="description" content="@yield('meta_description', 'Pastel Arte - Escuela de pastelería y decoración de tortas')">
    <meta name="robots" content="index, follow">
    <meta name="google" content="nositelinkssearchbox">
    <!-- css file -->
    
    <title>@yield('meta_title',  "Pastel Arte | Escuela online de pastelería | Decoración de tortas | cursos" )
    </title>
    <!-- <title>Pastel Arte | Escuela online de pastelería | Decoración de tortas | cursos</title> -->
    <!-- <title>{{ config('app.name', 'Pastel Arte') }}</title> -->

    <!-- css file -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
    <link href="{{asset('img/favicon.ico')}}" sizes="128x128" rel="shortcut icon" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <!-- <script src="{{ asset('css/app.css') }}" defer></script> -->

     <!-- PNotify -->
     <link href="{{asset('plugins/pnotify/dist/PNotifyBrightTheme.css')}}" rel="stylesheet" type="text/css" />

    <!-- Menesaje ToastrJS -->
    <link rel="stylesheet" href="{{asset('plugins/toastrJS/build/toastr.min.css')}}">

    @stack('css')
</head>

<body>
    
    <div id="app" class="wrapper">
        <div class="preloader"></div>
            <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      
                        <ul class="navbar-nav mr-auto">
                        @can('haveaccess','role.index')
                            <li class="nav-item"><a href="{{route('role.index')}}" class="nav-link">Roles</a></li>
                        @endcan
                        @can('haveaccess','user.index')
                            <li class="nav-item"><a href="{{route('user.index')}}" class="nav-link">Usuarios</a></li>
                        @endcan
                        </ul>

                       
                        <ul class="navbar-nav ml-auto">
                            
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav> -->

        <!-- Main Header Nav -->
        @include('layouts.nav')

        <!-- Modal Login-->
        
        @include('resources.modal_login')

        <!-- Main Header Nav For Mobile -->
        @include('layouts.mobile-menu')
            
        @yield('content')

        <!-- Our Footer -->
        @include('layouts.footer')

        <!-- Modal Cursos-->
        @include('resources.modal_curso')

        <a class="scrollToHome" href="#"><i class="flaticon-up-arrow-1"></i></a>

    </div>
    
    <!-- <script type="text/javascript" src="{{asset('js/app.js')}}"></script> -->
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-migrate-3.0.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.mmenu.all.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/ace-responsive-menu.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/isotop.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/snackbar.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/simplebar.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/parallax.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/scrollto.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-scrolltofixed-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.counterup.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/progressbar.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/slider.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/timepicker.js')}}"></script>

    <!-- Custom script for all pages --> 
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/login.js') }}"></script>


    <!-- PNotify -->
    <script type="text/javascript" src="{{asset('plugins/pnotify/dist/iife/PNotify.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/pnotify/dist/iife/PNotifyButtons.js')}}"></script>
    
    <script type="text/javascript" src="{{asset('plugins/toastrJS/build/toastr.min.js')}}"></script>

    <!-- Script para trabajar el modal -->
    @unless(Auth::user())
        <script>
        if(window.location.hash === '#login')
            {
                $('#Modal_Login').modal('show');
            }

            $('#Modal_Login').on('hide.bs.modal', function(){
                window.location.hash = '#';
            });
            
            $('#Modal_Login').on('shown.bs.modal', function(){
                $('#email').focus();
                window.location.hash = '#login';
            });
        </script>
    @endunless

    @if(Session::has('welcome'))
    <script>
        toastr.success('{{ session('welcome') }}');
    </script>
    @elseif(Session::has('bye'))
    <script>
        toastr.error('{{ session('bye') }}')
    </script>
    @elseif(Session::has('registro'))
    <script>
        toastr.success('{{ session('registro') }}')
    </script>
    @endif
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>

    @stack('js')

</body>
</html>
