var token = $('meta[name="csrf-token"]').attr('content');
    
$.validator.setDefaults({
    submitHandler: function () {
        $.ajax({
        type: "POST",
        url: "login",
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

$('#login').validate({
rules: {
email: {
    required: true,
    email:true
},
password: {
    required: true,
    minlength: 5
},
},
messages: {
email: {
    required: "Por favor ingrese un correo valido",
    email: "El campo correo de contener '@'"
},
password: {
    required: "Por favor ingrese su contreseña",
    minlength: "La longitud minima del campo son 8 caracteres"
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
