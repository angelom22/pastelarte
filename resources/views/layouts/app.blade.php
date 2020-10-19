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
    <link rel="stylesheet" href="{{asset('css/validation.css')}}">

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

        <!-- Main Header Nav -->
        @include('layouts.nav')

        <!-- Modal Login-->
        @include('resources.modal_login')

        <!-- Main Header Nav For Mobile -->
        @include('layouts.mobile-menu')

        @yield('content')

        <!-- Our Footer -->
        @include('layouts.footer')

        <!-- Modal CursosResumen-->
       

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
    <script type="text/javascript" src="{{asset('js/validacion.js')}}"></script>

    <!-- PNotify -->
    <script type="text/javascript" src="{{asset('plugins/pnotify/dist/iife/PNotify.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/pnotify/dist/iife/PNotifyButtons.js')}}"></script>

    <script type="text/javascript" src="{{asset('plugins/toastrJS/build/toastr.min.js')}}"></script>

    <!-- jquery-validation -->
    <script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-validation/additional-methods.min.js')}}"></script>

    <!-- Script para trabajar el modal -->
    @unless(Auth::user())
        <script>
        if(window.location.hash === '#login' || window.location.hash === '#registro')
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

    <!-- Validación login -->
    <script type="text/javascript" src="{{ asset('js/login.js') }}"></script>
    <!-- Validación Registro -->
    <script type="text/javascript" src="{{ asset('js/register.js') }}"></script>

    <!-- JQuery para anadir cursos a lista de deseos -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
    <script>
        jQuery(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".toggle-wish").unbind().on("click", function (e) {
                console.log('cliked');
                const self = $(this);
                const route = $(this).data("route");
                jQuery.ajax({
                    method: "PUT",
                    url: route,
                    beforeSend: function () {
                        $.blockUI({
                            message: '<div class="preloader"></div>'
                        });
                    },
                    success: function () {
                        self.toggleClass("text-danger");
                    },
                    complete: function () {
                        $.unblockUI();
                    }
                });
            });
        });
    </script>

    @stack('js')

</body>
</html>
