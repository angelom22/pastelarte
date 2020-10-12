<ul>
    <li class="list-inline-item"><a href="#"><i class="fa fa-star{{ $rating >= 1 ? ' yellow' : '' }}"></i></a></li>
    <li class="list-inline-item"><a href="#"><i class="fa fa-star{{ $rating >= 2 ? ' yellow' : '' }}"></i></a></li>
    <li class="list-inline-item"><a href="#"><i class="fa fa-star{{ $rating >= 3 ? ' yellow' : '' }}"></i></a></li>
    <li class="list-inline-item"><a href="#"><i class="fa fa-star{{ $rating >= 4 ? ' yellow' : '' }}"></i></a></li>
    <li class="list-inline-item"><a href="#"><i class="fa fa-star{{ $rating >= 5 ? ' yellow' : '' }}"></i></a></li>
    <!-- hide counter on reviews loop -->
    @if(!isset($hideCounter))
        <li class="list-inline-item">
            <a href="#">({{ $curso->reviews->count() }})</a>
        </li>
    @endif
</ul>