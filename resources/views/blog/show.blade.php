@extends('layouts.app')

@section('meta_title', $blog->title)
@section('meta_description', $blog->extracto)

@section('content')

<!-- Inner Page Breadcrumb -->
<section class="inner_page_breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 text-center">
                <div class="breadcrumb_content">
                    <h4 class="breadcrumb_title">Blog</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Blog Post Content -->
<section class="blog_post_container">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-9">
                <div class="main_blog_post_content">
                    <div class="mbp_thumb_post">
                        <div class="thumb">
                            <img class="img-fluid" src="/storage/{{$blog->file}}" style="width:982px; height:500px;" alt="{{$blog->slug}}">
                            <div class="tag">{{$blog->category->name}}</div>
                            <div class="post_date"><h2>{{$blog->created_at->format('d')}}</h2> <span>{{$blog->created_at->format('M')}}</span></div>
                        </div>
                        <div class="details">
                            <h3>{{$blog->title}}</h3>
                            <ul class="post_meta">
                                <li><a href="#"><span class="flaticon-profile"></span></a></li>
                                <li><a href="#"><span>{{$blog->user->name}}</span></a></li>
                                <li><a href="#"><span class="flaticon-comment"></span></a></li>
                                <li><a href="#disqus_thread"><span></span></a></li>
                            </ul>
                            <hr>
                            <h4>Contenido</h4>
                            <p>{!! $blog->content !!}</p>
                        </div>
                        <hr>
                        <ul class="blog_post_share">
                            @include('resources.social-links', ['description' => $blog->title])
                        </ul>
                    </div>


                    <!-- <div class="product_single_content style2 mb30">
                        <h4 class="aii_title">Comentarios</h4>
                        <div class="mbp_pagination_comments">
                            <div class="mbp_first media">
                                <img src="{{asset('img/perfil.png')}}" class="mr-3" alt="review1.png">
                                <div class="media-body">
                                    <h4 class="sub_title mt-0">Angelo meneses</h4>
                                    <a class="sspd_postdate fz14" href="#">08 septiembre</a>
                                    <p class="fz15 mt20">This is the second Photoshop course I have completed with Cristian. Worth every penny and recommend it highly. To get the most out of this course, its best to to take the Beginner to Advanced course first.</p>
                                </div>
                            </div>
                            <div class="custom_hr style3"></div>
                        </div>
                    </div> -->

                    <!-- <div class="product_single_content style2">
                        <div class="mbp_comment_form style2">
                            <h4>Agregar comentarios</h4>
                            <form class="comments_form">
                                <div class="form-group">
                                    <label for="exampleInputName1">Titulo</label>
                                    <input type="text" class="form-control" id="exampleInputName1" aria-describedby="textHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Comentario</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                                </div>
                                <button type="submit" class="btn btn-thm">Enviar <span class="flaticon-right-arrow-1"></span></button>
                            </form>
                        </div>
                    </div> -->

                    <div id="disqus_thread"></div>
                    <script>
                    /**
                    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                    /*
                    var disqus_config = function () {
                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    */
                    (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://pastel-arte.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                    })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    

                </div>
            </div>


            <div class="col-lg-4 col-xl-3 pl10 pr10">
                <div class="main_blog_post_widget_list">
                    <div class="blog_category_widget">
                        <ul class="list-group">
                            <h4 class="title">Categorías</h4>
                            @foreach($categories as $category)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{route('filtrarCategoria', $category->slug)}}">{{$category->name}}</a> <span class="float-right">{{$category->blogs->count()}}</span>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                    <div class="blog_recent_post_widget media_widget">
                        <h4 class="title">Chef Beatriz Román</h4>
                        <img src="{{ asset('img/gallery/chefroman.jpg') }}" alt="chefroman.jpg">
                    </div>
                    <div class="blog_tag_widget">
                        <h4 class="title">Etiquetas</h4>
                        @foreach($blog->tags as $tag)
                        <ul class="tag_list">
                            <li class="list-inline-item"><a href="{{route('filtrarEtiqueta', $tag->slug)}}">{{$tag->name}}</a></li>
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>


@endsection

@push('js')
<script id="dsq-count-scr" src="//pastel-arte.disqus.com/count.js" async></script>
@endpush