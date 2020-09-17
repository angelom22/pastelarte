var token = $('meta[name="csrf-token"]').attr('content');

$.validator.setDefaults({
    submitHandler: function () {
    $.ajax({
    type: "POST",
    url: "login",
    headers: {
        'X-CSRF-TOKEN': token
    }
    });
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
