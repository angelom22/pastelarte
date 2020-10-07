
    <li class="list-inline-item"><a href="#"><i class="fa fa-star{{ $rating >= 1 ? ' yellow' : '' }}"></i></a></li>
            <i class="fa-2x fa fa-star{{ $rating >= 2 ? ' yellow' : '' }}"></i>
    <li class="list-inline-item"><a href="#"><i class="fa fa-star{{ $rating >= 3 ? ' yellow' : '' }}"></i></a></li>
    <li class="list-inline-item"><a href="#"><i class="fa fa-star{{ $rating >= 4 ? ' yellow' : '' }}"></i></a></li>
    <li class="list-inline-item"><a href="#"><i class="fa fa-star{{ $rating >= 5 ? ' yellow' : '' }}"></i></a></li>
    <!-- hide counter on reviews loop -->
    @if(!isset($hideCounter))
        <li class="list-inline-item">
            <h3>({{ $curso->reviews->count() }})</h3>
        </li>
    @endif

