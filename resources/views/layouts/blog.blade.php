<section class="our-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h3 class="mt0">Últimos post publicados y eventos</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-xl-6">
                @forelse($eventos as $evento)
                <div class="item">
                    <div class="blog_post one">
                        <div class="thumb">
                            <div class="post_title">Eventos</div>
                            <img style="width:645px; height:450px;
                object-position: center center;" class="img-fluid w100" src="/storage/{{$evento->file}}" alt="{{$evento->slug}}">
                            <a class="post_date" href="#"><span>{{$evento->fecha->format('d')}} <br> {{$evento->fecha->format('M')}}</span></a>
                        </div>
                        <div class="details">
                            <div class="post_meta">
                                <ul>
                                    <li class="list-inline-item"><a href="#"><i class="flaticon-calendar"></i> {{$evento->hora->format('h:i')}} </a></li>
                                    <li class="list-inline-item"><a href="#"><i class="flaticon-placeholder"></i>{{$evento->direccion}}</a></li>
                                </ul>
                            </div>
                            <h4>{{$evento->title}}</h4>
                        </div>
                    </div>
                </div>
                @empty
                <div class="item">
                    <div class="blog_post one">
                        <div class="thumb">
                            <div class="post_title">Pastelería</div>
                            <img class="img-fluid w100" src="{{asset('img/blog/1.jpg')}}" alt="1.jpg">
                            <a class="post_date" href="#"><span>20 <br> Octubre</span></a>
                            <div class="details">
                                <div class="post_meta">
                                    <ul>
                                        <li class="list-inline-item"><a href="#"><i class="flaticon-calendar"></i> 8:00 am - 5:00 pm</a></li>
                                        <li class="list-inline-item"><a href="#"><i class="flaticon-placeholder"></i> Guayaquil, Ecuador</a></li>
                                    </ul>
                                </div>
                            <h4>Conferencia de pastelería con la chef Beatriz Román</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>



            <div class="col-md-6 col-lg-3 col-xl-3">
                <div class="blog_post">
                    <div class="thumb">
                        <img class="img-fluid w100" src="{{asset('img/blog/2.jpg')}}" alt="2.jpg">
                        <a class="post_date" href="#">Octubre 15, 2020</a>
                    </div>
                    <div class="details">
                        <h5>Postres</h5>
                        <h4>Gran curso de postres en vasos</h4>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-lg-3 col-xl-3">
                <div class="blog_post">
                    <div class="thumb">
                        <img class="img-fluid w100" src="{{asset('img/blog/2.jpg')}}" alt="2.jpg">
                        <a class="post_date" href="#">Octubre 15, 2020</a>
                    </div>
                    <div class="details">
                        <h5>Postres</h5>
                        <h4>Gran curso de postres en vasos</h4>
                    </div>
                </div>
            </div>


        </div>
        <div class="row mt50">
            <div class="col-lg-12">
                <div class="read_more_home text-center">
                    <h4>Quieres ver más información? <a href="{{url('blog')}}"><span class="flaticon-right-arrow pl10"></span>Click Aqui</a></h4>
                </div>
            </div>
        </div>
    </div>
</section>