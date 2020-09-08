function Login(form) {
    // alert('hola')
    var usuario = $("#email").val();
    var password = $("#password").val();
    
    if (usuario === '') {
            PNotify.error({
                title: 'Complete el campo!',
                text: 'Debe colocar su correo',
            });
        return;
    } else if (password === '') {
        PNotify.error({
            title: 'Complete el campo!',
            text: 'Debe colocar su contraseña',
        });
        return;
    }

    var myForm = document.getElementById('login');
    var datos = new FormData(myForm);
    
    var token = $('meta[name="csrf-token"]').attr('content');
    
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
        success: function(respuesta) {
            // console.log(respuesta);
            PNotify.success({
                title: 'Bienvenido usuario!',
                
              });
            setTimeout(function(){
                    window.location = respuesta;
                },2000);
        },
        error: function(respuesta) {
            if (respuesta.status == 422) {
                PNotify.error({
                    title: 'Error al ingresar!',
                    text: respuesta.responseJSON,
                });
            }
        }
    });
};