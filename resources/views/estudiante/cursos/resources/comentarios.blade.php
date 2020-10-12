<div class="sfeedbacks">
    <div class="mbp_pagination_comments">
        <h4 class="aii_title">{{ __("Valoraciones") }} </h4>
        @forelse($curso->reviews as $review)
        <div class="mbp_pagination_comments">
            <div class="mbp_first media csv1">
                <img src="/storage/{{ $review->autor->avatar }}" class="mr-3" alt="{{ $review->autor->name }}">
                <div class="media-body">
                    <h4 class="sub_title mt-0">{{ $review->autor->name }}
                        <span class="sspd_review float-right">
                        @include('estudiante.cursos.resources.valoraciones', ['rating' => $review->stars, 'hideCounter' => true])
                        </span>										    		
                    </h4>
                    <a class="sspd_postdate fz14" href="#">({{ $review->created_at->format('d/m/Y') }})</a>
                    <p class="fz15 mt20">{{ $review->review }}</p>
                
                </div>
            </div>
        </div>
        <div class="custom_hr"></div>
        @empty
            <div class="alert alert-dark">
                <i class="fa fa-info-circle"></i>
                {{ __("Este curso todavía no tiene valoraciones") }}
            </div>
        @endforelse
    </div>
</div>
