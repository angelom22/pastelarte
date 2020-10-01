// Validacion del formulario para los comentarios en los cursos
 
function comentarios(form) {

    var myForm = document.getElementById('comentario');
    var datos = new FormData(myForm);
    var token = $('meta[name="csrf-token"]').attr('content');

    $.validator.setDefaults({
        submitHandler: function () {
            $.ajax({
                type: "POST",
                url: "cursos.comentarios.store",
                processData: false,
                contentType: false,
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': token
                },
                data: datos,
                success: function(respuesta) {
                    new PNotify({
                        text: 'Comentario Publicado!',
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                },
                error: function(respuesta) {
                    new PNotify({
                        text: 'Ha  ocurrido un error!',
                        type: 'error',
                        styling: 'bootstrap3'
                    });
                }
            });
        }
    });

    $('#comentario').validate({
        rules: {
            contenido: {
                required: true,
                minlength: 5,
                maxlength: 255
            },
        },
        messages: {
            contenido: {
                required: "Por favor introduzca su comentario",
                minlength: "La longitud minima del campo son 8 caracteres",
                maxlength: "La longitud maxima del campo son 255 caracteres"
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
        
    
}
   

    
   