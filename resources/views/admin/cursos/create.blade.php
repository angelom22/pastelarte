@extends('admin.layouts.app')

@push('css')
 <!-- PNotify -->
 <link href="{{asset('plugins/pnotify/dist/PNotifyBrightTheme.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')

	<!-- Main Header Nav -->
	@include('admin.layouts.header-nav')

	<!-- Main Header Nav For Mobile -->
	@include('admin.layouts.header-nav-mobile')

	<!-- Our Dashbord -->
	<section class="our-dashbord dashbord pb50">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-lg-4 col-xl-2 dn-smd pl0">
                @include('admin.layouts.menu-lateral')
				</div>
				<div class="col-sm-12 col-lg-8 col-xl-10">
					<div class="row">
						<div class="col-lg-12">
                        @include('admin.layouts.menu-lateralMobil')
						</div>
						<div class="col-lg-12">
                            @include('admin.layouts.nav-admin', ['title' => 'Cursos', 'page' => 'curso'] )
						</div>
						<div class="col-lg-12">
							<div class="my_course_content_container">
								<div class="my_setting_content mb30">
									<div class="my_setting_content_header">
										<div class="my_sch_title">
											<h4 class="m0">Información Basica</h4>
										</div>
									</div>
									<form action="{{ route('CourseStore') }}" method="POST" enctype="multipart/form-data" files="true" id="formCourse">
									@method('POST')
									@csrf
									<div class="row my_setting_content_details pb0">
										<div class="col-xl-12">
											<div class="row">
												<div class="col-xl-6">
													<div class="my_profile_setting_input form-group">
												    	<label for="title">Titulo del Curso:</label>
												    	<input type="text" class="form-control" id="title" name="title" placeholder="Ej: Curso de Galletas" value="{{old('title')}}" maxlength="50" onkeypress="return soloLetras(event)">
													</div>
													<div class="my_profile_setting_input form-group" >
												    	<label for="duracion">Duración:</label>
														<input type="text" class="form-control time" id="duracion" name="duracion" value="{{old('duracion')}}"  placeholder="Ej: 30:00" onkeypress="return soloNumero(event)">

													</div>
												</div>
												<div class="col-xl-6">
													<div class="my_profile_setting_input form-group">
												    	<label for="precio">Precio:</label>
												    	<input type="text" class="form-control" id="precio" name="precio" placeholder="Ej: $89" pattern="[0-9]{0,100}" value="{{old('precio')}}"  onkeypress="return soloNumero(event)">
													</div>
													<div class="my_profile_setting_input form-group">
												    	<label for="nivel_habilidad">Nivel de Habilidad:</label>
												    	<input type="text" class="form-control" id="nivel_habilidad" name="nivel_habilidad" aria-describedby="phoneNumber" placeholder="Ej: Básico, Avanzado"   value="{{old('nivel_habilidad')}}"  maxlength="25" onkeypress="return soloLetras(event)">
													</div>
												</div>
												<div class="col-xl-6">
													<div class="my_profile_setting_input form-group">
												    	<label for="instructor">Intructor:</label>
												    	<input type="text" class="form-control" id="instructor" name="instructor" placeholder="Ej: Chef Beatriz Román"  value="{{old('instructor')}}"  maxlength="50" onkeypress="return soloLetras(event)">
													</div>
												</div>
												<div class="col-xl-6">
													<div class="my_profile_setting_input form-group">
												    	<label for="lengueaje">Lenguaje:</label>
												    	<input type="text" class="form-control" id="lengueaje" name="lengueaje" placeholder="Ej: Español" value="{{old('lengueaje')}}"  maxlength="50" onkeypress="return soloLetras(event)">
													</div>
												</div>
												<div class="col-lg-12">
													<div class="my_profile_setting_input2 form-group">
														<label for="lengueaje">thumbnail:</label>
														  	<div class="fallback">
														    	<input name="thumbnail" type="file" value="{{old('thumbnail')}}">
														  	</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="my_setting_content_header style2">
										<div class="my_sch_title">
											<h4 class="m0">Descripción:</h4>
										</div>
									</div>
									<div class="row my_setting_content_details">
										<div class="col-lg-12">
											<div class="my_profile_select_box form-group">
												<label for="carrera">Carrera:</label><br>
										    	<select class="selectpicker" name="carrera" id="carrera" >
													@foreach($carreras as $carrera)
													<option value="{{$carrera->id}}"  {{ old('carrera') == $carrera->id ? 'selected' : ''}}>{{$carrera->title}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="my_resume_textarea">
												<div class="form-group">
												    <label for="description">Descripción del Curso:</label>
												    <textarea class="form-control" id="description" name="description" rows="10"  required>{{old('description')}}</textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="my_setting_content_header style2">
										<div class="my_sch_title">
											<h4 class="m0">Lecciones</h4>
										</div>
									</div>



<div class="row container table-responsive">
<table class="table display compact table table-bordered table-condensed" cellspacing="0" width="100%"  id="tabla">

          <thead>
            <tr>
              <th class="">Titulo</th>
              <th class="">Descripción de la lección</th>
              <th class="">Duración</th>
              <th class="">Video url</th>
              <th>
                <button id="adicional" name="adicional" type="button" class="btn btn-warning"  style="width: 50px;"><i class='glyphicon glyphicon-plus'></i> + </button>
              </th>
            </tr>
          </thead>

          <tr class="fila-fija">
             <td>
             							<div class="col-xl-3">
											<div class="my_profile_setting_input form-group">
										    	<input style="width: 150px;" type="text" class="form-control" id="title_leccion" name="title_leccion[]" placeholder="Ej: Preparación y Utensilio" value="{{old('title_leccion')}}"  maxlength="50" onkeypress="return soloLetras(event)">
											</div>
										</div>
             </td>

             <td>
             							<div class="col-xl-3">
											<div class="my_profile_setting_input tt_video form-group">
										    	<input name="desciption_leccion[]" style="width: 150px;" type="text" class="form-control" id="desciption_leccion" name="desciption_leccion" placeholder="Ej: Leccion 1.1: Preparación de la mezcla para la torta" value="{{old('desciption_leccion')}}">
											</div>
										</div>

             </td>

              <td>
             							<div class="col-xl-3">
											<div class="my_profile_setting_input tt_video form-group">
										    	<input style="width: 150px;" type="text" class="form-control time" id="duracion_leccion" name="duracion_leccion[]" placeholder="Ej: 05:30" value="{{old('duracion_leccion')}}" onkeypress="return soloNumero(event)">
											</div>
										</div>
             </td>

             <td>
             							<div class="col-xl-3">
											<div class="my_profile_setting_input tt_video form-group">
										    	<input style="width: 150px;" type="text" class="form-control" id="url_video" name="url_video[]" value="{{old('url_video')}}">
											</div>
										</div>
{{--
										<input type="" name="fk_lecciones" id="fk_lecciones" class="form-control" value="<?php echo $row1['fk_lecciones']+1;?>"  readonly> --}}

             </td>
fk_lecciones
                <td class="eliminar">
                  <button type="button" class="btn btn-danger" style="width: 50px;"><i class='glyphicon glyphicon-minus' ></i> - </button>
                </td>
          </tr>
 </table>
 </div>

 										<div class="col-lg-12">
											<button type="submit" class="my_setting_savechange_btn btn btn-thm">Guardar
												 <span class="flaticon-right-arrow-1 ml15"></span></button>
									    </div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt10">
                    @include('admin.layouts.footer')
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection


@push('js')

    <script>
        $(function(){
        // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
        $("#adicional").on('click', function(){
          $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
        });

        // Evento que selecciona la fila y la elimina
        $(document).on("click",".eliminar",function(){
          var parent = $(this).parents().get(0);
          $(parent).remove();
        });
      });
    </script>
<script src="{{asset('js/CrearCursos.js')}}"></script>
<script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('plugins/ckeditor/styles.js')}}"></script>
<script src="{{asset('plugins/datepicker/jquery.maskedinput.min.js')}}"></script>
<!-- PNotify -->
<script type="text/javascript" src="{{asset('plugins/pnotify/dist/iife/PNotify.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/pnotify/dist/iife/PNotifyButtons.js')}}"></script>


<script>
	CKEDITOR.replace( 'description' );

	$('.time').mask('99:99');
</script>

@endpush








{{--
<?php

        //////////////////////// PRESIONAR EL BOTÓN //////////////////////////
        if(isset($_POST['insertar']))

        {


        $convocada_por = $_POST['convocada_por'];
        $minuta_n = $_POST['minuta_n'];
        $dependencia = $_POST['dependencia'];
        $tema = $_POST['tema'];
        $lugar = $_POST['lugar'];
        $pto_tratar = $_POST['pto_tratar'];
        $acuerdos = $_POST['acuerdos'];
        $f_actual = $_POST['f_actual'];
        $hora = $_POST['hora'];
        $f_proxima = $_POST['f_proxima'];

        $items1 = ($_POST['titulo']);
        $items2 = ($_POST['fk_minuta']);



          @mysql_connect ('localhost', 'root', '') or die ('Error: ' . mysql_error());
          mysql_select_db ('bd_systemdoc');
          $query="INSERT INTO minuta (convocada_por, minuta_n, dependencia, tema, lugar, pto_tratar, acuerdos, f_actual, hora, f_proxima) VALUES ('$convocada_por','$minuta_n','$dependencia','$tema','$lugar','$pto_tratar','$acuerdos','$f_actual','$hora','$f_proxima')";
          mysql_query($query);


/////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (fecha, descripcion, cliente////)
        while(true) {

            //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
            $item1 = current($items1);
            $item2 = current($items2);

            ////// ASIGNARLOS A VARIABLES ///////////////////
            // $id=(( $item1 !== false) ? $item1 : ", &nbsp;");
            $valor1=(( $item1 !== false) ? $item1 : ", &nbsp;");
            $valor2=(( $item2 !== false) ? $item2 : ", &nbsp;");


            //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
            $valores='("'.$valor1.'","'.$valor2.'"),';

            //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
            $valoresQ= substr($valores, 0, -1);

            ///////// QUERY DE INSERCIÓN ////////////////////////////
            $sql = "INSERT INTO participante (fk_participante, fk_minuta)
          VALUES $valoresQ";

          mysql_query($sql);

          echo ('<script type="text/javascript">swal({
          title: "Bien Hecho",
          text: "Datos guardado correctamente!!",
          type: "success",
          confirmButtonColor: "#009933",
          confirmButtonText: "Aceptar!",
          closeOnConfirm: false
        },
        function(){
          window.location.href="forminuta.php";
        });</script>');


            // Up! Next Value
            // $item1 = next( $items1 );
            $item1 = next( $items1 );

            // Check terminator
            if($item1 === false) break;

        }

        }

      ?> --}}