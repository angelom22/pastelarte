// Validacion del formulario para los comentarios en los cursos

    $.validator.setDefaults({
        submitHandler: function () {
            // var datos = $("#comentarios").serialize();
            var curso_id = $("#curso_id").val();    
            var myForm = document.getElementById('comentarios');
            var datos = new FormData(myForm);
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: `../cursos/${curso_id}/comentarios`,
                cache: false,
                processData: false,
                contentType: false,
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': token
                },
                data:datos,
                success: function(respuesta) {
                    console.log(respuesta);
                    // .then(res => {
                    //     this.NewComment = '',
                    //     this.datos.push(res.data.data)
                    // });
                    ;
                    respuesta.forEach(element => {
                        $("#comentario").append('<p> ' + element.comentario + ' </p>');
                    });
                    
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

    $('#comentarios').validate({
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
  
        
   

    
   