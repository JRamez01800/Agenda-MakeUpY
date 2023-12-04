<!DOCTYPE html>
<html>

<head>
    @include('navbar');


</head>

<body>
    <main id="main">


        <section id="about-us" class="about-us">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Editar usuario</strong></h2>
                </div>

                <div class="row content">

                    <form id="editUserForm" class="col-12">

                        <div class="form-group">
                            <label for="user">Usuario:</label>
                            <input type="text" class="form-control" id="user" name="user" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" class="form-control" id="pwd" name="pwd">
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                       
                        <div class="form-group">
                            <label for="rol">Rol de Usuario:</label>
                            <select class="form-control" id="rol" name="rol">
                                <option value="0">Usuario</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>

            </div>
        </section><!-- End About Us Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>MakeUp-Yicel</h3>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Enlaces útiles</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="./index">Inicio</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="./about">Acerca de</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="./contacto">Contacto</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="./calculadora">Calculadora</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Información del sitio</h4>
                        <ul>
                            <a>Número de teléfono</a>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">449 513 58 30</a></li>
                            <a>Correo Electrónico</a>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">pacofjrm17@gmail.com</a></li>
                        </ul>
                    </div>



                    <div class="container d-md-flex py-4">

                        <div class="mr-md-auto text-center text-md-left">
                            <div class="copyright">
                                &copy; 2023 Copyright <strong><span>MakeUp-Yicel</span></strong>. All Rights Reserved
                            </div>
                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/company-free-html-bootstrap-template/ -->
                            </div>
                        </div>
                        <div class="social-links text-center text-md-right pt-3 pt-md-0">
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        </div>
                    </div>
    </footer><!-- End Footer -->
    <script>
    $(document).ready(function() {
        var userId = <?php echo $_GET['id']; ?>;

        $.ajax({
            url: 'api/user',
            data: {
                id: userId
            },
            method: 'POST',
            success: function(data) {
                if (data) {
                    $('#user').val(data.user);
                    $('#email').val(data.email);
                } else {
                    $('#user-profile').html('<p>No se encontraron datos de usuario.</p>');
                }
            },
            error: function() {
                $('#user-profile').html('<p>Error al cargar los datos del usuario.</p>');
            }
        });

        $('#rol').change(function() {
            if ($(this).val() === '1') { // Si se selecciona 'Admin'
                // Cambiar el valor del campo de selección de rol antes de la actualización
                $(this).val('1');
            } else {
                $(this).val('0');
            }
        });

        $("#editUserForm").submit(function(e) {
            e.preventDefault();

            var id = userId;
            var user = $("#user").val();
            var pass = $("#pwd").val();
            var email = $("#email").val();
            var rol = $("#rol").val();

            $.ajax({
                type: "POST",
                url: "api/update",
                data: {
                    id: id,
                    user: user,
                    pass: pass,
                    email: email,
                    rol: rol
                },
                success: function(response) {
                    console.log(response)
                    if (response.error)
                        alert(response.error)
                    else {
                        alert("Usuario actualizado correctamente");
                        window.location.href = "/usuarios";
                    }


                },
                error: function(error) {
                    console.error(error);
                    //alert("Hubo un error al actualizar el usuario");
                }
            });
        })
    });
    </script>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
</body>

</html>