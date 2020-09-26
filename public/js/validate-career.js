var token = $('meta[name="csrf-token"]').attr('content');
    
	$.validator.setDefaults({
		submitHandler: function () {
			$.ajax({
			type: "POST",
			url: "careerStore",
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
						window.location = '/';
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
    
    $('#formCareer').validate({
        rules: {
            title: {
                required: true,
                minlength: 5,
                maxlength:120,
            },
            precio:{
                required: true,
            },
            description: {
                required: true,
                minlength: 5,
            },
            url_video_preview_carrera: {
                required: true,
                url: true,
            },
        },
        messages: {
            title: {
                required: "Por favor ingrese el titulo de la lección",
                minlength: "La longitud minima del campo son 5 caracteres",
                maxlength: "La longitud maxima del campo son 120 caracteres",
            },
            precio: {
                required: "Ingrese un monto valido $"
            },
            description: {
                required: "Por favor ingrese la descripción de la lección",
                minlength: "La longitud minima del campo son 5 caracteres"
            },
            url_video_preview_carrera: {
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
    





