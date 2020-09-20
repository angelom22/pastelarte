<header class="header-nav menu_style_home_one dashbord_pages navbar-scrolltofixed stricky main-menu">
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
            <a href="{{('/')}}" class="navbar_brand float-left dn-smd">
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
                        <li><a href="{{ url('/cursos') }}">Todos los cursos</a></li>
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
                        <li><a href="#">Pastelería</a></li>
                        <li><a href="#">Decoración de tortas</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('evento')}}"><span class="title">Eventos</span></a>
                </li>
                <li>
                    <a href="{{url('blog')}}"><span class="title">Blog</span></a>
                </li>
                <li class="last">
                    <a href="{{url('contacto')}}"><span class="title">Contacto</span></a>
                </li>
            </ul>
            <ul class="header_user_notif pull-right dn-smd">
                <li class="user_notif">
                    <div class="dropdown">
                        <a class="notification_icon" href="#" data-toggle="dropdown"><span class="flaticon-email"></span></a>
                        <div class="dropdown-menu notification_dropdown_content">
                            <div class="so_heading">
                                <p>Notifications</p>
                            </div>
                            <div class="so_content" data-simplebar="init">
                                <ul>
                                    <li>
                                        <h5>Status Update</h5>
                                        <p>This is an automated server response message. All systems are online.</p>
                                    </li>
                                    <li>
                                        <h5>Status Update</h5>
                                        <p>This is an automated server response message. All systems are online.</p>
                                    </li>
                                    <li>
                                        <h5>Status Update</h5>
                                        <p>This is an automated server response message. All systems are online.</p>
                                    </li>
                                    <li>
                                        <h5>Status Update</h5>
                                        <p>This is an automated server response message. All systems are online.</p>
                                    </li>
                                    <li>
                                        <h5>Status Update</h5>
                                        <p>This is an automated server response message. All systems are online.</p>
                                    </li>
                                    <li>
                                        <h5>Status Update</h5>
                                        <p>This is an automated server response message. All systems are online.</p>
                                    </li>
                                    <li>
                                        <h5>Status Update</h5>
                                        <p>This is an automated server response message. All systems are online.</p>
                                    </li>
                                </ul>
                            </div>
                            <a class="view_all_noti text-thm" href="#">View all alerts</a>
                        </div>
                    </div>
                </li>
                <li class="user_notif">
                    <div class="dropdown">
                        <a class="notification_icon" href="#" data-toggle="dropdown"><span class="flaticon-alarm"></span></a>
                        <div class="dropdown-menu notification_dropdown_content">
                            <div class="so_heading">
                                <p>Notifications</p>
                            </div>
                            <div class="so_content" data-simplebar="init">
                                <ul>
                                    <li>
                                        <h5>Status Update</h5>
                                        <p>This is an automated server response message. All systems are online.</p>
                                    </li>
                                    <li>
                                        <h5>Status Update</h5>
                                        <p>This is an automated server response message. All systems are online.</p>
                                    </li>
                                    <li>
                                        <h5>Status Update</h5>
                                        <p>This is an automated server response message. All systems are online.</p>
                                    </li>
                                    <li>
                                        <h5>Status Update</h5>
                                        <p>This is an automated server response message. All systems are online.</p>
                                    </li>
                                    <li>
                                        <h5>Status Update</h5>
                                        <p>This is an automated server response message. All systems are online.</p>
                                    </li>
                                    <li>
                                        <h5>Status Update</h5>
                                        <p>This is an automated server response message. All systems are online.</p>
                                    </li>
                                    <li>
                                        <h5>Status Update</h5>
                                        <p>This is an automated server response message. All systems are online.</p>
                                    </li>
                                </ul>
                            </div>
                            <a class="view_all_noti text-thm" href="#">View all alerts</a>
                        </div>
                    </div>
                </li>
                <li class="user_setting">
                    <div class="dropdown">
                        <a class="btn dropdown-toggle" href="#" data-toggle="dropdown">
                        @if (Session::has('registro'))
                        <img class="rounded-circle" src="{{Auth::user()->avatar}}" style="height: 50px; width:50px; object-fit: cover;
                            object-position: center center;" alt="{{Auth::user()->name}}"> 
                        @elseif(Auth::user()->avatar)
                        <img class="rounded-circle" src="/storage/{{Auth::user()->avatar}}" style="height: 50px; width:50px; object-fit: cover; object-position: center center;" alt="{{Auth::user()->name}}"> 
                        @endif
                            <!-- <img class="rounded-circle" src="/storage/{{Auth::user()->avatar}}" style="height: 50px; width:50px; object-fit: cover; object-position: center center;" alt="avatar"> -->
                        </a>
                        <div class="dropdown-menu">
                            <div class="user_set_header">
                                <img class="float-left" src="/storage/{{Auth::user()->avatar}}" style="height:50px; width:50px; object-fit: cover; object-position: center center;" alt="avatar">
                                <p>{{Auth::user()->name}} <br><span class="address">{{Auth::user()->email}}</span></p>
                            </div>
                            <div class="user_setting_content">
                                <a class="dropdown-item active" href="{{route('admin.user', Auth::user())}}">Mi Perfil</a>
                                <a class="dropdown-item" href="#">Mensajes</a>
                                <!-- <a class="dropdown-item" href="#">Purchase history</a> -->
                                <a class="dropdown-item" href="#">Ayuda</a>
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
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</header>
