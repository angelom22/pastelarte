var token = $('meta[name="csrf-token"]').attr('content');

$.validator.setDefaults({
    submitHandler: function () {
    $.ajax({
    type: "POST",
    url: "register",
    headers: {
        'X-CSRF-TOKEN': token
    }
    });
}
});

$('#register').validate({
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
//     required: true,
//     minlength: 8,
//     equalTo: "#password"
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
//     required: "Por favor ingrese la confirmación de su contreseña",
//     minlength: "La longitud minima del campo son 8 caracteres",
//     equalTo: "Los campos no coinciden"
// },
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
