<!-- Modal -->
<div class="sign_up_modal modal fade" id="EditarCarrera" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  role="dialog">
    <form action="{{route('careerUpdate','test')}}" method="POST" id="formCareer">
    @method('PATCH')
    @csrf
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            
            <div class="modal-body">  
                <h5 class="modal-title">Editar Carrera</h5>
                <div class="row my_setting_content_details">
                    <div class="col-xl-12">

                        <input type="hidden" name="carrera_id" id="carrera_id" >
                        
                        <div class="my_profile_setting_input form-group">
                            <label for="title">Titulo</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Nombre Carrera" value="{{old('title', $carrera->title)}}" maxlength="100" onkeypress="return soloLetras(event)">
                            {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="my_profile_setting_input  form-group">
                            <label for="precio">Precio</label>   	
                            <input type="text" class="form-control" id="precio" name="precio" value="{{old('precio',$carrera->precio)}}"  placeholder="$120" onkeypress="return soloNumero(event)">
                            {!! $errors->first('precio', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <!-- <div class="col-xl-12">
                        <div class="my_profile_setting_input form-group">
                            
                            <textarea name="description" id="description" cols="30" rows="20">{{old('title', $carrera->description)}}</textarea>
                            {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div> -->
                    <div class="col-xl-12">
                        <div class="my_profile_setting_input tt_video form-group">
                            <label for="url_video_preview_carrera">Video Preview</label>
                            <input type="text" class="form-control" id="url_video_preview_carrera" name="url_video_preview_carrera" value="{{old('precio', $carrera->url_video_preview_carrera)}}">
                            {!! $errors->first('url_video_preview_carrera', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary">Actualizar</button>
            </div>  
        </div>
    </div>
    </form>
</div>