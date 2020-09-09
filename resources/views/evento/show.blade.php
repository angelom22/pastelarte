@extends('layouts.app')

@section('meta_title', $event->title)
@section('meta_description', $event->extracto)

@section('content')

<!-- Inner Page Breadcrumb -->
<section class="inner_page_breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 text-center">
                <div class="breadcrumb_content">
                    <h4 class="breadcrumb_title">Event</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$event->title}}</li>
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
                            <div class="details pt0">
                                <h3 class="mb25">{{$event->title}}</h3>
                            </div>
                            <div class="thumb">
                                <img class="img-fluid" src="{{asset('img/blog/12.jpg')}}" alt="12.jpg">
                                <div class="post_date"><h2>28</h2> <span>DECEMBER</span></div>
                            </div>
                            <div class="details">
                                <h4>Descripción</h4>
                                <p>{{$event->extracto}} </p>
                            </div>
                            <ul class="blog_post_share mb0">
                                <li><p>Share</p></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                            </ul>
                        </div>

                        <div class="product_single_content style2 mb30">
                            <div class="mbp_pagination_comments">
                                <div class="mbp_first media">
                                    <img src="{{asset('img/resource/review1.png')}}" class="mr-3" alt="review1.png">
                                    <div class="media-body">
                                        <h4 class="sub_title mt-0">Angelo meneses
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
                                        <p class="fz15 mt20">Excelente voy a ir.</p>
                                        <div class="custom_hr style2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="product_single_content style2">
                            <div class="mbp_comment_form style2">
                                <h4>Agregar comentarios</h4>
                                <ul>
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
                                        <label for="exampleInputName1">Título</label>
                                        <input type="text" class="form-control" id="exampleInputName1" aria-describedby="textHelp">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">mensaje</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-thm"> Enviar <span class="flaticon-right-arrow-1"></span></button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-xl-3 pl10 pr10">
                    <div class="main_blog_post_widget_list">
                        <div class="event_details_widget">
                            <h4 class="title">Detalles del evento</h4>
                            <ul>
                                <li><span class="flaticon-appointment"></span> Fecha: 01-11-2020</li>
                                <li><span class="flaticon-clock"></span> Hora: 8:00 am - 5:00 pm</li>
                                <li><span class="flaticon-placeholder"></span> Dirección: Ecuador</li>
                            </ul>
                        </div>
                        <div class="event_details_widget">
                            <h4 class="title">Event Details</h4>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.037103533422!2d-79.90849798554905!3d-2.139457798440452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902d6d6fb93fd127%3A0x781974caaad09b64!2sEleodoro%20Aviles%20Minuche%20%26%20Sozoranga%2C%20Guayaquil%20090508%2C%20Ecuador!5e0!3m2!1ses!2sve!4v1599595277215!5m2!1ses!2sve"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            <ul>
                                <li><span class="flaticon-phone-call"></span> +593 980877300</li>
                                <li><span class="flaticon-email"></span> info@pastelarte.com.ec</li>
                                <li><span class="flaticon-www"></span> http://www.pastelarte.com.ec</li>
                            </ul>
                        </div>
                        <div class="blog_tag_widget">
                            <h4 class="title">Tags</h4>
                            <ul class="tag_list">
                                <li class="list-inline-item"><a href="#">Photoshop</a></li>
                                <li class="list-inline-item"><a href="#">Sketch</a></li>
                                <li class="list-inline-item"><a href="#">Beginner</a></li>
                                <li class="list-inline-item"><a href="#">UX/UI</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>






    

@endsection