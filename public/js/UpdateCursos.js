var token = $('meta[name="csrf-token"]').attr('content');
    
$.validator.setDefaults({
    submitHandler: function () {
        $.ajax({
        type: "POST",
        url: "CourseUpdate",
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

$('#UpdateCourse').validate({
    rules: {
    status:{
        required: true,
    },
    title: {
        required: true,
        minlength: 5,
    },
    // duracion_curso: {
    //     required: true,
    // },
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
    lenguaje: {
        required: true,
        minlength: 5,
    },
    carrera: {
        required: true,
    },
    description: {
        required: true,
        minlength: 5,
    },
    extracto: {
        required: true,
        minlength: 5,
    },
    url_video_preview_curso: {
        required: true,
        url: true,
    },
    },
    messages: {
    status:{
        required: "Seleccione el Status",
    },
    title: {
        required: "Por favor introduzca el titulo del curso",
        minlength: "La longitud minima del campo son 5 caracteres"
    },
    // duracion_curso: {
    //     required: "Ingrese una duracion válida, entre las 00:00 y las 23:59",
    // },
    precio: {
        required: "Ingrese una cantidad valida Ej: 20$",
    },
    nivel_habilidad: {
        required: "Ingrese el nivel de habilidad que se necesita para el curso",
    },
    instructor: {
        required: "Ingrese el nombre del instructor",
    },
    lenguaje: {
        required: "Ingrese el lenguaje del curso",
        minlength: "La longitud minima del campo son 5 caracteres"
    },
    carrera: {
        required: "Seleccione la carrera a la cual pertenece el curso",
    },
    description: {
        required: "Ingrese el contenido descriptivo del curso",
        minlength: "La longitud minima del campo son 5 caracteres"
    }, 
    extracto: {
        required: "Ingrese el extracto descriptivo del curso",
        minlength: "La longitud minima del campo son 5 caracteres"
    },
    url_video_preview_curso: {
        required: "Ingrasa la url del preview",
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
