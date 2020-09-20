var token = $('meta[name="csrf-token"]').attr('content');
    
$.validator.setDefaults({
    submitHandler: function () {
        $.ajax({
        type: "POST",
        url: "registro",
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
                    window.location = '/';
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

$('#registro').validate({
rules: {
    name: {
        required: true,
        minlength: 5,
        maxlength: 50
        },
    email: {
        required: true,
        email:true
    },
    password: {
        required: true,
        minlength: 8
    },
    // password_confirmation: { 
    //     equalTo: "#password",
    //     minlength: 8,
    // }
},
messages: {
    name: {
        required: "Por favor ingrese un nombre de usuario valido",
        minlength: "La longitud minima del campo son 8 caracteres"
    },
    email: {
        required: "Por favor ingrese un correo valido",
        email: "El correo de contener '@'"
    },
    password: {
        required: "Por favor ingrese su contreseña",
        minlength: "La longitud minima del campo son 8 caracteres"
    },
    // password_confirmation: {
    //     equalTo: "El password debe ser igual al anterior",
    //     minlength: "Minimo 8 caracteres",
    // }
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
