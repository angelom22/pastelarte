<div class="search_overlay dn-992">
    <div class="mk-fullscreen-search-overlay" id="mk-search-overlay">
        <a href="#" class="mk-fullscreen-close" id="mk-fullscreen-close-button"><i class="fa fa-times"></i></a>
        <div id="mk-fullscreen-search-wrapper">
            <form action="{{route('cursos.search')}}" method="POST" id="mk-fullscreen-searchform">
            @method('POST')
            @csrf
            <input type="text" autocomplete="off" value="{{session('search[cursos]')}}" name="search" placeholder="Buscar cursos..." id="mk-fullscreen-search-input">
            <i class="flaticon-magnifying-glass fullscreen-search-icon"><input value="" type="submit"></i>
            </form>
        </div>
    </div>
</div>