$(document).ready(function() {
    $('#login').click(function() {
        // Traemos los datos de los inputs
        var user = $('#user').val();
        var clave = $('#clave').val();
        // Envio de datos mediante Ajax
        // if($.trim(user).lenght>0 && $.trim(clave).lenght>0){
        $.ajax({
            method: 'POST',
            cache: false,
            url: 'controller/loginController.php',
            // primer parametro es la variable de php y el segundo es el dato que enviamos
            data: {
                user_php: user,
                clave_php: clave
            },
            // Esta funcion se ejecuta antes de enviar la información al archivo indicado en el parametro url
            beforeSend: function() {

            },
            // res = respuesta que da php mediante impresion de pantalla (echo)
            success: function(res) {
                    //alert(res);
                    if (res == 'error_1') {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Por favor ingrese todos los campos ',
                            footer: '<a href>¿Problemas? Contacta con soporte</a>'
                        })
                    } // ERROR 1
                    else if (res == 'error_3') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Usuario o contraseña invalida, por favor intente nuevamente',
                            footer: '<a href>¿Problemas? Contacta con soporte</a>'
                        })
                    } // ERROR 3
                    else {
                        window.location.href = res
                    }
                } // SUCCESS
        }); //AJAX
    }); //CLICK
}); //DOCUMENT