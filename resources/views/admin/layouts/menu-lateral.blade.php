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
            <!-- <li class="active"><a href="page-dashboard.html"><span class="flaticon-puzzle-1"></span> Dashboard</a></li>
            <li><a href="page-my-courses.html"><span class="flaticon-online-learning"></span> My Courses</a></li>
            <li><a href="page-my-order.html"><span class="flaticon-shopping-bag-1"></span> Order</a></li>
            <li><a href="page-my-message.html"><span class="flaticon-speech-bubble"></span> Messages</a></li>
            <li><a href="page-my-review.html"><span class="flaticon-rating"></span> Reviews</a></li>
            <li><a href="page-my-bookmarks.html"><span class="flaticon-like"></span> Bookmarks</a></li>
            <li><a href="page-my-listing.html"><span class="flaticon-add-contact"></span> Add listing</a></li> -->
            
            <li {{ request()->is('dashboard') ? 'class=active' : '' }} ><a href="{{url('dashboard')}}"><span class="flaticon-puzzle-1"></span> Dashboard</a></li>
            @if(auth()->user()->roles[0]->full_access == 'yes')
            <li class="{{ request()->is('blog/create') ? 'active' : '' }} nav-item dropdown ">
                <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="flaticon-add-contact"></span>
                Blog
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{route('BlogCreate')}}">Crear Blog</a>
                </div>
            </li>
            @endif
            @can('haveaccess','role.index')
            <li {{ request()->is('role') ? 'class=active' : '' }} ><a href="{{route('role.index')}}"><span class="flaticon-add-contact"></span>Roles</a></li>
            @endcan
            @can('haveaccess','user.index')
            <li {{ request()->is('user') ? 'class=active' : '' }} ><a href="{{route('user.index')}}"><span class="flaticon-user"></span>Usuarios</a></li>
            @endcan
        </ul>
        <h4>Cuenta</h4>
        <ul>
            <li><a href="page-my-setting.html"><span class="flaticon-settings"></span> Settings</a></li>
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