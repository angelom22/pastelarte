var token = $('meta[name="csrf-token"]').attr('content');
    
$.validator.setDefaults({
    submitHandler: function () {
        $.ajax({
        type: "POST",
        url: "contactoStore",
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
                text: 'mensaje!',
                type: 'success',
                styling: 'bootstrap3',
            });
            setTimeout(function(){
                    window.location = '/contacto';
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

$('#contact').validate({
rules: {
name: {
    required: true,
    minlength:5,
    maxlength:50
},
email: {
    required: true,
    email:true
},
message: {
    required: true,
    minlength: 5
},
},
messages: {
name: {
    required: "Por favor ingrese un nombre valido",
    minlength: "La longitud minima del nombre son 5 caracteres",
    maxlength: "La longitud maxima del nombre son 50 caracteres"
},
email: {
    required: "Por favor ingrese un correo valido",
    email:"Por favor, introduce una dirección de correo electrónico válida."
},
message: {
    required: "Por favor ingrese el contenido de su mensaje",
    minlength: "La longitud minima del campo son 5 caracteres"
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
