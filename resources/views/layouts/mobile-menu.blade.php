<div id="page" class="stylehome1 h0">
    <div class="mobile-menu">
        <div class="header stylehome1">
            <div class="main_logo_home2">
                <img class="nav_logo_img img-fluid float-left mt20" src="{{asset('img/header-logo2.png')}}" alt="header-logo.png">
                <!-- <span>Pastel Arte</span> -->
            </div>
            <ul class="menu_bar_home2">
                <li class="list-inline-item"></li>
                <li class="list-inline-item"><a href="#menu"><span></span></a></li>
            </ul>
        </div>
    </div><!-- /.mobile-menu -->
    <nav id="menu" class="stylehome1">
        <ul>
            <li>
                    <span>Cursos</span>
                    <ul>
                        <li><a href="{{ url('cursos') }}">Todos los cursos</a></li>
                        <li><a href="#">Técnicas de pastelería</a></li>
                        <li><a href="#">Masas</a></li>
                        <li><a href="#">Decoración de tortas comerciales</a></li>
                        <li><a href="#">Técnicas en fondant</a></li>
                    </ul>
            </li>
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