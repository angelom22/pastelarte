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
                <h5 class="modal-title">Añadir Lección</h5>
                <div class="row my_setting_content_details">
                    <input type="hidden" name="curso_id" id="curso_id" > 
                    <div class="col-xl-12">
                        <div class="my_profile_setting_input form-group">
                            <label for="title_leccion">Nombre Lección</label>
                            <input type="text" class="form-control" id="title_leccion" name="title_leccion" placeholder="preparación y utensilios" value="{{old('title_leccion')}}" maxlength="100" >
                            {!! $errors->first('title_leccion', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="my_profile_select_box form-group">
                            <label for="leccion_type">Tipo de Lección</label><br>
                            <select class="selectpicker" name="leccion_type" id="leccion_type">
                                <option value="\App\Models\Leccion::VIDEO">Video</option>
                                <option value="\App\Models\Leccion::ZIP">Archivo</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="col-xl-12">
                        <div class="my_profile_setting_input form-group">
                            <label for="description_leccion">Descripción</label>
                            <input type="text" class="form-control" id="description_leccion" name="description_leccion" placeholder="Ej: Lección 1.1 Preparación de mezcla">
                            {!! $errors->first('description_leccion', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div> -->
                    <div class="col-xl-12">
                        <!-- <div class="my_profile_setting_input  form-group">
                            <input type="text" class="form-control time" id="duration_leccion" name="duration_leccion" value="{{old('duration_leccion')}}"  placeholder="Ej: hh:mm" onkeypress="return soloNumero(event)">
                            {!! $errors->first('duration_leccion', '<span class="help-block">:message</span>') !!}
                        </div> -->
                        <label for="duracion_leccion">Duración</label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                </div>
                            </div>
                            <input id="duracion_leccion" name="duracion_leccion" value="{{old('duracion_leccion')}}" class="form-control" placeholder="Duración de la unidad si es vídeo" name="unit_time" type="number" onkeypress="return soloNumero(event)">
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