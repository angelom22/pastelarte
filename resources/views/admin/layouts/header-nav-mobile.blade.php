<div id="page" class="stylehome1 h0">
    <div class="mobile-menu">
        <ul class="header_user_notif dashbord_pages_mobile_version pull-right">
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
                    <img class="rounded-circle" src="/storage/{{Auth::user()->avatar}}"  style="height: 50px; width:50px;" alt="{{Auth::user()->name}}"></a>
                    <div class="dropdown-menu">
                        <div class="user_set_header">
                            <img class="float-left" src="/storage/{{Auth::user()->avatar}}"  style="height: 50px; width:50px;" alt="{{Auth::user()->name}}">
                            <p>{{Auth::user()->name}} <br><span class="address">{{Auth::user()->email}}</span></p>
                        </div>
                        <div class="user_setting_content">
                            <a class="dropdown-item active" href="#">Mi Perfil</a>
                            <a class="dropdown-item" href="#">Mensajes</a>
                            <!-- <a class="dropdown-item" href="#">Purchase history</a> -->
                            <a class="dropdown-item" href="#">Reportar Problema</a>
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
        <div class="header stylehome1 dashbord_mobile_logo dashbord_pages">
            <div class="main_logo_home2">
                <img class="nav_logo_img img-fluid float-left mt20" src="{{asset('img/header-logo.png')}}" alt="header-logo.png">
            </div>
            <ul class="menu_bar_home2">
                <li class="list-inline-item"></li>
                <li class="list-inline-item"><a href="#menu"><span></span></a></li>
            </ul>
        </div>
    </div><!-- /.mobile-menu -->
    <nav id="menu" class="stylehome1">
        <ul>
            <li><a href="{{ url('cursos') }}">Cursos</a></li>
            <li>
                    <span>Carreras</span>
                    <ul>
                        <li><a href="#">Pastelería</a></li>
                        <li><a href="#">Decoración de tortas</a></li>
                    </ul>
            </li>
            <li><a href="{{ url('evento') }}">Eventos</a></li>
            <li><a href="{{ url('blog') }}">Blog</a></li>
            <li><a href="{{ url('contacto') }}">Contacto</a></li>
            <li><a href="{{ url('login') }}"><span class="flaticon-user"></span> Entrar</a></li>
            <li><a href="{{ url('register') }}"><span class="flaticon-edit"></span> Registrar</a></li>
        </ul>
    </nav>
</div>