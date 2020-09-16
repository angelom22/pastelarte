    var token = $('meta[name="csrf-token"]').attr('content');
    
    $.validator.setDefaults({
        submitHandler: function () {
            $.ajax({
            type: "POST",
            url: "cursos.store",
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
                new PNotify({
                    text: 'Bienvenido al sistema!',
                    type: 'success',
                    styling: 'bootstrap3',
                });
                setTimeout(function(){
                        window.location = '/cursos';
                    },2000);
            },
            error: function(respuesta) {
                if (respuesta.status == 422) {
                    PNotify.error({
                        title: 'Error al crear!',
                        text: respuesta.responseJSON,
                    });
                }
            }
        });
        //   alert( "¡Formulario enviado correctamente!" );
        }
    });

    $('#formCourse').validate({
        rules: {
        title: {
            required: true,
            minlength: 5,
        },
        duracion: {
            required: true,
        },
        precio: {
            required: true,
        },
        nivel_habilidad: {
            required: true,
            minlength: 5,
        },
        instructor: {
            required: true,
            minlength: 5,
        },
        lengueaje: {
            required: true,
            minlength: 5,
        },
        thumbnail: {
            required: true,
        },
        carrera: {
            required: true,
        },
        description: {
            required: true,
            minlength: 5,
        },
        title_leccion: {
            required: true,
            minlength: 5,
        },
        desciption_leccion: {
            required: true,
            minlength: 5,
        },
        duracion_leccion: {
            required: true,
        },
        url_video: {
            required: true,
            url: true
        },
        },
        messages: {
        title: {
            required: "Por favor introduzca el titulo del curso",
            minlength: "La longitud minima del campo son 5 caracteres"
        },
        duracion: {
            required: "Ingrese una duracion válida, entre las 00:00 y las 23:59",
        },
        precio: {
            required: "Ingrese una cantidad valida Ej: 20$",
        },
        nivel_habilidad: {
            required: "Ingrese el nivel de habilidad que se necesita para el curso",
        },
        instructor: {
            required: "Ingrese el nombre del instructor",
        },
        lengueaje: {
            required: "Ingrese el lenguaje del curso",
            minlength: "La longitud minima del campo son 5 caracteres"
        },
        thumbnail: {
            required: "Ingrese el la imagen del curso",
        },
        carrera: {
            required: "Seleccione la carrera a la cual pertenece el curso",
        },
        description: {
            required: "Ingrese el contenido descriptivo del curso",
            minlength: "La longitud minima del campo son 5 caracteres"
        },
        title_leccion: {
            required: "Por favor introduzca el titulo de la lección",
            minlength: "La longitud minima del campo son 5 caracteres"
        },
        desciption_leccion: {
            required: "Ingrese el contenido descriptivo de la leccion",
            minlength: "La longitud minima del campo son 5 caracteres"
        },
        duracion_leccion: {
            required: "Ingrese una duracion válida, entre las 00:00 y las 23:59",
            minlength: "La longitud minima del campo son 5 caracteres"
        },
        url_video:{
            required: "Ingrasa la url del video",
            url: "Ingresa una url correcta"  
        } 
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
