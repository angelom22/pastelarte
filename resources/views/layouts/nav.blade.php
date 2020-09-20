<header class="header-nav menu_style_home_one navbar-scrolltofixed stricky main-menu">
    <div class="container-fluid">
        <!-- Ace Responsive Menu -->
        <nav>
            <!-- Menu Toggle btn-->
            <div class="menu-toggle">
                <img class="nav_logo_img img-fluid" src="{{asset('img/header-logo.png')}}" alt="header-logo.png">
                <button type="button" id="menu-btn">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <a href="{{url('/')}}" class="navbar_brand float-left dn-smd">
                <img class="logo1 img-fluid" src="{{asset('img/header-logo.png')}}" alt="header-logo.png">
                <img class="logo2 img-fluid" src="{{asset('img/header-logo2.png')}}" alt="header-logo2.png">
                <span>Pastel Arte</span>
            </a>
            <!-- Responsive Menu Structure-->
            <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
            <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
                <li style="display: none;">
                    <a href="{{url('/')}}"><span class="title">Home</span></a>
                </li>
                <li>
                    <a href="#"><span class="title">Cursos</span></a>
                    <!-- Level Two-->
                    <ul>
                        <li><a href="{{ url('cursos') }}">Todos los cursos</a></li>
                        <li><a href="#">Técnicas de pastelería</a></li>
                        <li><a href="#">Masas</a></li>
                        <li><a href="#">Decoración de tortas comerciales</a></li>
                        <li><a href="#">Técnicas en fondant</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="title">Carreras</span></a>
                    <!-- Level Two-->
                    <ul>
                        <li><a href="{{ url('cursosingle') }}">Pastelería</a></li>
                        <li><a href="{{ url('cursosingle') }}">Decoración de tortas</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('evento') }}"><span class="title">Eventos</span></a>
                </li>
                <li>
                    <a href="{{url('blog')}}"><span class="title">Blog</span></a>
                </li>
                <li class="last">
                    <a href="{{url('contacto')}}"><span class="title">Contacto</span></a>
                </li>
            </ul>
            <ul class="sign_up_btn pull-right dn-smd mt20">
            @guest
                @if (Route::has('register'))
                    <li class="list-inline-item list_s"><a href="#" class="btn flaticon-user" data-toggle="modal" data-target="#Modal_Login"> <span class="dn-lg">{{ __('Login') }}/{{ __('Registro') }}</span></a>
                @endif
            @else

            <img src="/storage/{{Auth::user()->avatar}}" style="object-fit: cover;
                object-position: center center;" width="100px" class="rounded-circle img-fluid img-avatar" alt="{{Auth::user()->name}}"> 

            <li class="list-inline-item list_s">
                
                <a id="navbarDropdown" style="font-size: 12px;" class="btn nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{url('dashboard')}}"> <i class="fa fa-user fa-fw"></i> Dashboard</a>
                    <span class="dropdown-divider"></span>
                    <a class="dropdown-item" href="#"> <i class="fa fa-bookmark fa-fw"></i> Mis cursos</a>
                    <a class="dropdown-item" href="{{route('admin.user', Auth::user())}}"> <i class="fa fa-cog fa-fw"></i> Configurar Cuenta</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    <i class="fa fa-arrow-left fa-fw"></i>
                        {{ __('Salir') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                
            </li>

            @endguest

            <li class="list-inline-item list_s">
                <div class="cart_btn">
                    <ul class="cart">
                        <li>
                            <a href="#" class="btn cart_btn flaticon-shopping-bag"><span>5</span></a>
                            <ul class="dropdown_content">
                                <li class="list_content">
                                    <a href="#">
                                        <img class="float-left" src="http://via.placeholder.com/50x50" alt="50x50">
                                        <p>Dolar Sit Amet</p>
                                        <small>1 × $7.90</small>
                                        <span class="close_icon float-right"><i class="fa fa-plus"></i></span>
                                    </a>
                                </li>
                                <li class="list_content">
                                    <a href="#">
                                        <img class="float-left" src="http://via.placeholder.com/50x50" alt="50x50">
                                        <p>Lorem Ipsum</p>
                                        <small>1 × $7.90</small>
                                        <span class="close_icon float-right"><i class="fa fa-plus"></i></span>
                                    </a>
                                </li>
                                <li class="list_content">
                                    <a href="#">
                                        <img class="float-left" src="http://via.placeholder.com/50x50" alt="50x50">
                                        <p>Is simply</p>
                                        <small>1 × $7.90</small>
                                        <span class="close_icon float-right"><i class="fa fa-plus"></i></span>
                                    </a>
                                </li>
                                <li class="list_content">
                                    <h5>Subtotal: $57.70</h5>
                                    <a href="#" class="btn btn-thm cart_btns">View cart</a>
                                    <a href="#" class="btn btn-thm3 checkout_btns">Checkout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <!-- Button trigger modal -->
        </nav>
    </div>
</header>