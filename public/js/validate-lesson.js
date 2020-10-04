var token = $('meta[name="csrf-token"]').attr('content');
    
	$.validator.setDefaults({
		submitHandler: function () {
			$.ajax({
			type: "POST",
			url: "lessonStore",
			dataType: "json",
			processData: false,
			contentType: false,
			headers: {
				'X-CSRF-TOKEN': token
			},
			data: datos,
			dataType: "json",
			success: function(respuesta) {
				console.log(respuesta);
				
				setTimeout(function(){
						window.location = '/curso';
					},2000);
			},
			error: function(respuesta) {
				if (respuesta.status == 422) {
				
				}
			}
		});
		//   alert( "¡Formulario enviado correctamente!" );
		}
    });
    
    $('#formLesson').validate({
        rules: {
            curso_id:{
                required: true,
            },
            title_leccion: {
                required: true,
                minlength: 5,
                maxlength:100,
            },
            leccion_type: {
                required: true,
            },
            // description_leccion: {
            //     required: true,
            //     minlength: 5,
            // },
            duration_leccion:{
                required: true,
            },
            url_video: {
                required: true,
                url: true,
            },
        },
        messages: {
            title_leccion: {
                required: "Por favor ingrese el titulo de la lección",
                minlength: "La longitud minima del campo son 5 caracteres",
                maxlength: "La longitud maxima del campo son 100 caracteres",
            },
            // description_leccion: {
            //     required: "Por favor ingrese la descripción de la lección",
            //     minlength: "La longitud minima del campo son 5 caracteres"
            // },
            duration_leccion: {
                required: "Ingrese una duracion válida, entre las 00:00 y las 23:59"
            },
            url_video: {
                required: "Ingrasa la url del video",
                url: "Ingresa una url correcta"  
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        }
    });
    
















	