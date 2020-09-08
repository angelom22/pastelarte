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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
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
                            <img class="img-fluid" src="{{ asset('storage/'.$blog->file)}}" style="width:982px; height:500px" alt="{{$blog->slug}}">
                            <div class="tag">{{$blog->category->name}}</div>
                            <div class="post_date"><h2>{{$blog->created_at->format('d')}}</h2> <span>{{$blog->created_at->format('M')}}</span></div>
                        </div>
                        <div class="details">
                            <h3>{{$blog->name}}</h3>
                            <ul class="post_meta">
                                <li><a href="#"><span class="flaticon-profile"></span></a></li>
                                <li><a href="#"><span>{{$blog->user->name}}</span></a></li>
                                <li><a href="#"><span class="flaticon-comment"></span></a></li>
                                <li><a href="#"><span>7 comments</span></a></li>
                            </ul>
                            <h4>Descripción</h4>
                            <p>{!! $blog->content !!}</p>
                            <h4 class="mb0">Content</h4>
                            <ul class="bs_content_list">
                                <li><p>You will need a copy of Adobe XD 2019 or above. A free trial can be downloaded from Adobe.</p></li>
                                <li><p>No previous design experience is needed.</p></li>
                                <li><p>No previous Adobe XD skills are needed.</p></li>
                            </ul>
                            <div class="mbp_blockquote">
                                <div class="blockquote">
                                    <span class="font-italic"><i class="fa fa-quote-left"></i></span><em class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>
                                </div>
                            </div>
                            <p class="mb25">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                            <p class="mb25">It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                        <ul class="blog_post_share">
                            <li><p>Share</p></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google"></i></a></li>
                        </ul>
                    </div>
                    <div class="mbp_pagination_tab">
                        <div class="row">
                            <div class="col-sm-6 col-lg-6">
                                <div class="pag_prev">
                                    <a href="#"><span class="flaticon-left-arrow"></span>Previous Post</a> <br> <p>The bedding was hardly able</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="pag_next text-right">
                                    <a href="#">Next Post <span class="flaticon-right-arrow-1"></span></a> <br> <p>11 Tips to Help You Get New</p>
                                </div>
                            </div>
                        </div>
                        <ul>
                            <li class="list-inline-item float-left"></li>
                            <li class="list-inline-item float-right"></li>
                        </ul>
                    </div>
                    <div class="product_single_content style2 mb30">
                        <h4 class="aii_title">Reviews</h4>
                        <div class="mbp_pagination_comments">
                            <div class="mbp_first media">
                                <img src="img/resource/review1.png" class="mr-3" alt="review1.png">
                                <div class="media-body">
                                    <h4 class="sub_title mt-0">Warren Bethell
                                        <span class="sspd_review float-right">
                                            <ul>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"></li>
                                            </ul>
                                        </span>
                                    </h4>
                                    <a class="sspd_postdate fz14" href="#">6 months ago</a>
                                    <p class="fz15 mt20">This is the second Photoshop course I have completed with Cristian. Worth every penny and recommend it highly. To get the most out of this course, its best to to take the Beginner to Advanced course first.</p>
                                    <p class="fz15 mt25 mb25">The sound and video quality is of a good standard. Thank you Cristian.</p> <div class="ssp_reply float-right"><span class="flaticon-consulting-message"></span><span class="pl10">Reply</span></div>
                                    <div class="sspd_review_liked"><a href="#"><i class="flaticon-like-1"></i> <span class="text-thm6 pl5 pr5 fz15">15</span> Thank Waren</a></div>
                                    <div class="custom_hr style2"></div>
                                    <div class="mbp_sub media">
                                        <a href="#"><img src="img/resource/review1.png" class="mr-3" alt="review1.png"></a>
                                        <div class="media-body">
                                            <h4 class="sub_title mt-0">Anton Hilton
                                                <span class="sspd_review float-right">
                                                    <ul>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"></li>
                                                    </ul>
                                                </span>
                                            </h4>
                                            <a class="sspd_postdate fz14" href="#">6 months ago</a>
                                            <p class="fz15 mt20 mb50">This is the second Photoshop course I have completed with Cristian. Worth every penny and recommend it highly. To get the most out of this course, its best to to take the</p>
                                            <div class="ssp_reply float-right"><span class="flaticon-consulting-message"></span><span class="pl10">Reply</span></div>
                                            <div class="sspd_review_liked">
                                                <a href="#"><i class="flaticon-like-1"></i><span class="text-thm6 pl5 pr5 fz15">15</span> Thank Waren</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="custom_hr"></div>
                            <div class="mbp_second media">
                                <img src="img/resource/review1.png" class="align-self-start mr-3" alt="review1.png">
                                <div class="media-body">
                                    <h4 class="sub_title mt-0">Warren Bethell
                                        <span class="sspd_review float-right">
                                            <ul>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="list-inline-item"></li>
                                            </ul>
                                        </span>
                                    </h4>
                                    <a class="sspd_postdate fz14" href="#">6 months ago</a>
                                    <p class="fz15 mt20">This is the second Photoshop course I have completed with Cristian. Worth every penny and recommend it highly. To get the most out of this course, its best to to take the Beginner to Advanced course first.</p>
                                    <p class="fz15 mt25 mb25">The sound and video quality is of a good standard. Thank you Cristian.</p> <div class="ssp_reply float-right"><span class="flaticon-consulting-message"></span><span class="pl10">Reply</span></div>
                                    <div class="sspd_review_liked"><a href="#"><i class="flaticon-like-1"></i> <span class="text-thm6 pl5 pr5 fz15">15</span> Thank Waren</a></div>
                                </div>
                            </div>
                            <div class="custom_hr style3"></div>
                            <div class="text-center mt50 mb30">
                                <button type="button" class="more-review-btn btn">See more reviews</button>
                            </div>
                        </div>
                    </div>
                    <div class="product_single_content style2">
                        <div class="mbp_comment_form style2">
                            <h4>Add Reviews & Rate</h4>
                            <ul>
                                <li class="list-inline-item pr15"><p>What is it like to Course?</p></li>
                                <li class="list-inline-item">
                                    <span class="sspd_review">
                                        <ul>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star fz18"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star fz18"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star fz18"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star fz18"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star fz18"></i></a></li>
                                            <li class="list-inline-item"></li>
                                        </ul>
                                    </span>
                                </li>
                            </ul>
                            <form class="comments_form">
                                <div class="form-group">
                                    <label for="exampleInputName1">Review Title</label>
                                    <input type="text" class="form-control" id="exampleInputName1" aria-describedby="textHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Review Content</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                                </div>
                                <button type="submit" class="btn btn-thm">Submit Review <span class="flaticon-right-arrow-1"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 pl10 pr10">
                <div class="main_blog_post_widget_list">
                    <div class="blog_search_widget">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search Here" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><span class="flaticon-magnifying-glass"></span></button>
                            </div>
                        </div>
                    </div>
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
                        <h4 class="title">Recent Posts</h4>
                        <div class="media">
                            <img class="align-self-start mr-3" src="{{asset('img/blog/s1.jpg')}}" alt="s1.jpg">
                            <div class="media-body">
                                <h5 class="mt-0 post_title">Half of What We Know About Coffee</h5>
                                <a href="#">October 25, 2019.</a>
                            </div>
                        </div>
                        <div class="media">
                            <img class="align-self-start mr-3" src="{{asset('img/blog/s2.jpg')}}" alt="s2.jpg">
                            <div class="media-body">
                                <h5 class="mt-0 post_title">The Best Places to Start Your Travel</h5>
                                <a href="#">October 25, 2019.</a>
                            </div>
                        </div>
                        <div class="media">
                            <img class="align-self-start mr-3" src="{{asset('img/blog/s3.jpg')}}" alt="s3.jpg">
                            <div class="media-body">
                                <h5 class="mt-0 post_title">The Top 25 London</h5>
                                <a href="#">October 25, 2019.</a>
                            </div>
                        </div>
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