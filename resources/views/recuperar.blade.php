<!DOCTYPE html>
<html>

<head>
    @include('welcomeNavbar')
</head>

<body>
    <section id="hero">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

            <div class="carousel-inner" role="listbox">

                <!-- Form Login -->
                <div class="carousel-item active" style="background-image: url(./img/y1.jpg);">
                    <div class="container" style="height: 450px;">
                        <div class="carousel-content animated fadeInUp">
                            <div class="section-title">
                                <h2>Recuperación de contraseña</strong></h2>
                            </div>
                            <form id="recuperarForm">
                                <div class="form-group col-12">
                                    <label for="correo">Correo electrónico registrado:</label>
                                    <input type="text" class="form-control" id="correo"
                                        placeholder="Ingresa correo registrado" autofocus="autofocus" name="correo">
                                </div>
                                <div class="form-group col-12">
                                    <button type="submit" class="btn btn-success col-12">Enviar contraseña por
                                        correo</button>
                                </div>
                                <div class="col-12 center">
                                    <h6>Aún no eres cliente? Regístrate!</h6>
                                    <div style="padding-left: 60px;">
                                        <a href="./registrar">Registrarse</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            </div>
    </section>

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
</body>
<script>
    $(document).ready(function () {
        $('#recuperarForm').submit(function (e) {
            e.preventDefault();

            var correo = $('#correo').val();

            $.ajax({
                type: 'POST',
                url: 'api/recuperarContrasena',
                data: { correo: correo },
                success: function (response) {
                    
                    if (response.success) {
                        alert(response.success)
                        window.location.href="/";
                    } else {
                        alert(response.error)
                    }
                },
                error: function () {
                    $('#mensaje').html('<div class="alert alert-danger">Error en la solicitud AJAX</div>');
                }
            });
        });
    });
</script>
</html>