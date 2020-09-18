<div class="dashboard_navigationbar dn db-991">
    <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10"></i> Escritorio</button>
        <ul id="myDropdown" class="dropdown-content">
            <li {{ request()->is('dashboard') ? 'class=active' : '' }} ><a href="page-dashboard.html"><span class="flaticon-puzzle-1"></span> Dashboard</a></li>
            @can('haveaccess','blog.admin')
            <li {{ request()->is('blog/create') ? 'class=active' : '' }} ><a href="{{route('BlogCreate')}}"><span class="flaticon-add-contact"></span>Blog</a></li>
            @endcan
            @can('haveaccess','role.index')
            <li {{ request()->is('role') ? 'class=active' : '' }} ><a href="{{route('role.index')}}"><span class="flaticon-add-contact"></span>Roles</a></li>
            @endcan
            @can('haveaccess','user.index')
            <li {{ request()->is('user') ? 'class=active' : '' }} ><a href="{{route('user.index')}}"><span class="flaticon-user"></span>Usuarios</a></li>
            @endcan
        </ul>
    </div>
</div>