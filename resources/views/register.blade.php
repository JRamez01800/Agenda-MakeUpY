<!DOCTYPE html>
<html>

<head>
    @include('welcomeNavbar')
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <script>
       $(document).ready(function() {
    $('#registroForm').submit(function(e) {
        e.preventDefault();

        var pwd = $('#pwd').val();
        var confirmPwd = $('#confirm_pwd').val();

        if (pwd !== confirmPwd) {
            alert("Las contraseñas no coinciden.");
            return;
        }



        // Si las contraseñas coinciden, puedes enviar el formulario 
        var user = $('#user').val();
        var email = $('#email').val();

        // Verifica si se aceptaron los términos
        var aceptoTerminos = $('#acepto_terminos').is(':checked'); 

        if (!aceptoTerminos) {
            alert("Por favor, acepta los términos y condiciones.");
            return;
        }

        var data = {
            user: user,
            pwd: pwd,
            email: email
        };

        $.ajax({
            type: 'POST',
            url: '/api/registrar',
            data: data,
            success: function(response) {
                if(response.errors){
                    if(response.errors.pwd){
                        alert("¡Recuerda la contraseña tiene que tener más de 8 caracteres, contener al menos un valor numérico, una mayúsculas y no usar numeros o letras consecutivas!");
                    }
                    if(response.errors.user){
                        alert("¡El usuario ya existe!");
                    }
                    if(response.errors.email){
                        alert("¡El correo electrónico ya existe en la base de datos!");
                    }
                } else {
                    alert("¡Registrado correctamente!");
                    window.location.replace("/");
                }
            },
            error: function(error) {
                console.error(error);
            }
        });
    });
});
    </script>

</head>

<body>
    <section id="hero">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

            <div class="carousel-inner" role="listbox">

                <!-- Form Login -->
                <div class="carousel-item active" style="background-image: url(./img/y1.jpg);">
                    <div class="container" style="height: 500px;">
                        <div class="carousel-content animated fadeInUp">
                            <div class="section-title">
                                <h2>Bienvenido!</strong></h2>
                                <p>Ingresa tus datos</p>
                            </div>
                            <form id="registroForm">
                                <div class="form-group">
                                    <label for="user">Usuario:</label>
                                    <input type="text" class="form-control" id="user" placeholder="Ingresa usuario" required="required" autofocus="autofocus" name="user">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Contraseña:</label>
                                    <input type="password" class="form-control" id="pwd" placeholder="Ingresa contraseña" required="required" name="pwd" 
title="* Longitud mínima de 8 caracteres.
* Utilizar mínimo una mayúscula. Utilizar mínimo una minúscula. 
* Utilizar mínimo un carácter especial. 
* No utilices números consecutivos. 
* No utilices letras consecutivas.">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_pwd">Confirmar Contraseña:</label>
                                    <input type="password" class="form-control" id="confirm_pwd" placeholder="Confirma contraseña" required="required">
                                </div>
                                
                            <div class="form-group">
                                    <label for="user">Email:</label>
                                    <input type="email" class="form-control" id="email" placeholder="Ingresa email" required="required" name="email">
                                </div>
                            
<div class="form-check">
    <input type="checkbox" class="form-check-input" id="acepto_terminos" required>
    <label class="form-check-label" for="acepto_terminos"><a href="/terminos" target="_blank">Acepto los  términos y condiciones</a>
    </label>
</div>
         

                                <div class="form-group" style="padding-left: 55px;">
                                    <button type="submit" class="btn btn-success">Aceptar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        </div>
    </section>

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
</body>

</html>