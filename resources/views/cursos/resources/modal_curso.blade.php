<div class="modal fade" id="CursoResumen_{{ $curso->id }}" tabindex="-1" aria-labelledby="CursoResumen_{{ $curso->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #441c42;">
      	<h4 class="modal-title" style="color: #ffffff;">{{$curso->title}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color: #ffffff;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="container-fluid">
				    <div class="row">
				      <div class="col-md-6">
                    <iframe src="{{$curso->url_video_preview_curso}}"  height="400" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
				      </div>
				       <div class="col-md-6">
				       	<h2 id="titulo">{{$curso->title}}</h2>
				       	<h5>{{$curso->instructor}}</h5>
				       	<h3><span class="badge badge-info">Nuevo</span></h3>
				       	<p class="text-justify">{{$curso->extracto}}</p>
                <img src="{{asset('/img/usuarios.png')}}"> {{$curso->estudiantes_count}} Alumnos ya inscritos</br>
                <img src="{{asset('/img/cursos.png')}}"> {{$curso->lecciones->count()}} Lecciones, tiempo Aproximado( {{$curso->totalTime()}} )</br>
                <img src="{{asset('/img/star.png')}}"> Nivel que debe tener: {{$curso->nivel_habilidad}}</br>
                <img src="{{asset('/img/like.png')}}"> 95% Valoración positiva</br>
                <img src="{{asset('/img/audio.png')}}"> Audio: {{$curso->lenguaje}}</br>
                <img src="{{asset('/img/online.png')}}"> Online</br>
				       </div>
				    </div>
  		</div>
      </div>
      <div class="modal-footer">
        <a href="{{ route("add_curso_to_cart",  $curso) }}" type="button" class="btn btn-warning">Comprar {{$curso->formatted_price}}</a>
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>