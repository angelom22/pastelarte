<div class="user_board">
    <div class="user_profile">
        <div class="media">
            <div class="media-body">
                <h4 class="mt-0">Escritorio</h4>
            </div>
        </div>
    </div>
    <div class="dashbord_nav_list">
        <ul>
            @auth
            <li {{ request()->is('dashboard') ? 'class=active' : '' }} ><a href="{{url('dashboard')}}"><span class="flaticon-puzzle-1"></span> Inicio</a></li>
            <li {{ request()->is('estudiante/cursos') ? 'class=active' : '' }} ><a href="{{route('estudiante.cursos')}}"><span class="flaticon-online-learning"></span>Mis Cursos</a></li>
            <li {{ request()->is('estudiante/orders') ? 'class=active' : '' }} ><a href="{{route('estudiante.orders')}}"><span class="flaticon-shopping-bag-1"></span> Facturas</a></li>
            <li {{ request()->is('estudiante/credit-card') ? 'class=active' : '' }} ><a href="{{route('estudiante.billing.credit_card_form')}}"><span class="flaticon-shopping-bag-1"></span> Datos de Pago</a></li>
            <li><a href="#"><span class="flaticon-rating"></span> Valoraciones</a></li>
            <li><a href="#"><span class="flaticon-speech-bubble"></span> Certificados</a></li>
            <li><a href="#"><span class="flaticon-like"></span> Lista de Deseos</a></li>
            @endauth

            @if( auth()->user()->roles(([1])) )

                @can('haveaccess','course.admin')
                <li {{ request()->is('admin/curso') ? 'class=active' : '' }} ><a href="{{route('admin.curso')}}"><span class="flaticon-online-learning"></span>Cursos</a></li>
                @endcan
                @can('haveaccess','course.admin')
                <li {{ request()->is('admin/lecciones') ? 'class=active' : '' }} ><a href="{{route('admin.lecciones')}}"><span class="flaticon-online-learning"></span>Lecciones</a></li>
                @endcan
                @can('haveaccess','career.admin')
                <li {{ request()->is('admin/carrera') ? 'class=active' : '' }} ><a href="{{route('admin.carrera')}}"><span class="flaticon-online-learning"></span>Carreras</a></li>
                @endcan
                @can('haveaccess','blog.admin')
                <!-- @if(auth()->user()->roles[0]->full_access == 'yes') -->
                <li class="{{ request()->is('admin/blog') ? 'active' : '' }} nav-item dropdown ">
                    <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="flaticon-add-contact"></span>
                    Blog
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('admin.blog') }}">Publicaciones</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#tituloBlog">Crear Publicación</a>
                    </div>
                </li>
                <!-- @endif -->
                @endcan
                @can('haveaccess','event.admin')
                <li {{ request()->is('admin/evento') ? 'class=active' : '' }} ><a href="{{route('admin.evento')}}"><span class="flaticon-add-contact"></span>Eventos</a></li>
                @endcan
                @can('haveaccess','role.index')
                <li {{ request()->is('role') ? 'class=active' : '' }} ><a href="{{route('role.index')}}"><span class="flaticon-add-contact"></span>Roles</a></li>
                @endcan
                @can('haveaccess','user.index')
                <li {{ request()->is('user') ? 'class=active' : '' }} ><a href="{{route('user.index')}}"><span class="flaticon-user"></span>Usuarios</a></li>
                @endcan

            @endif
        </ul>
        <h4>Cuenta</h4>
        <ul>
            <li><a href="{{route('user.edit', Auth::user())}}"><span class="flaticon-settings"></span> Ajustes</a></li>
            <!-- <li><a href="page-login.html"><span class="flaticon-logout"></span> Logout</a></li> -->
            <li>
                <a class="" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    <span class="flaticon-logout"></span>
                        {{ __('Salir') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>