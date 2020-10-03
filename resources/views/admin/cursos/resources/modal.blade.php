<!-- Modal -->
<div class="sign_up_modal modal fade" id="CrearLeccion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  role="dialog">
    <form action="{{route('lessonStore', $curso, '#formLesson')}}" method="POST" id="formLesson">
    @method('POST')
    @csrf
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <h5 class="modal-title">Añadir Lección a: {{$curso->title}}</h5>
                <div class="row my_setting_content_details">
                    <div class="col-xl-12">

                        <input type="hidden" name="curso_id" id="curso_id" >

                        <div class="my_profile_setting_input form-group">
                            <label for="title_leccion">Nombre Leccion</label>
                            <input type="text" class="form-control" id="title_leccion" name="title_leccion" placeholder="preparación y utensilios" value="{{old('title_leccion')}}" maxlength="100" onkeypress="return soloLetras(event)">
                            {!! $errors->first('title_leccion', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="my_profile_setting_input form-group">
                            <label for="description_leccion">Descripción</label>
                            <input type="text" class="form-control" id="description_leccion" name="description_leccion" placeholder="Ej: Lección 1.1 Preparación de mezcla">
                            {!! $errors->first('description_leccion', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="my_profile_setting_input  form-group">
                            <label for="duration_leccion">Duración</label>
                            <input type="text" class="form-control time" id="duration_leccion" name="duration_leccion" value="{{old('duration_leccion')}}"  placeholder="Ej: hh:mm" onkeypress="return soloNumero(event)">
                            {!! $errors->first('duration_leccion', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="my_profile_setting_input tt_video form-group">
                            <label for="url_video">Video URL</label>
                            <input type="text" class="form-control" id="url_video" name="url_video">
                            {!! $errors->first('url_video', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary">Añadir</button>
            </div>
        </div>
    </div>
    </form>
</div>