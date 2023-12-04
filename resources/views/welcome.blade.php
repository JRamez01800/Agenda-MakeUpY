<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('welcomeNavbar');
    @if(session('errors'))
        <script>
            var successMessage = "{{ session('errors') }}";
            alert(successMessage);
    </script>
    @endif
    <script>

    </script>

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
                                <h2>Bienvenido!</strong></h2>
                                <p>Inicia sesión</p>
                            </div>
                            <form id="loginForm" method="POST" action="./login">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="user">Usuario:</label>
                                    <input type="text" class="form-control" id="user" placeholder="Ingresa usuario" autofocus="autofocus" name="user">
                                </div>
                                <div class="form-group">
                                    <label for="pass">Contraseña:</label>
                                    <input type="password" class="form-control" id="pass" placeholder="Ingresa contraseña" name="pass">
                                    <small><a href="./recuperar">¿Olvidaste tu contraseña?</a></small>
                                </div>
                                <div class="form-group" style="padding-left: 45px;">
                                    <button type="submit" class="btn btn-success">Iniciar Sesión</button>
                                </div>
                                <h6>¿Aún no eres cliente?</h6>
                                <div style="padding-left: 60px;">
                                    <a href="./registrar">Registrarse</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        </div>
    </section><!-- End Hero -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
</body>

</html>