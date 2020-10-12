// Validacion del formulario para los comentarios en los cursos
    $('#rating_form').validate({
        rules: {
            review: {
                required: true,
                minlength: 5,
                maxlength: 255
            },
        },
        messages: {
            review: {
                required: "Por favor introduzca su comentario",
                minlength: "La longitud minima del campo son 10 caracteres",
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
  
        
   

    
   