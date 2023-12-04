<!DOCTYPE html>
<html>

<head>
    @include('navbar');
</head>

<body>

    <section id="contact" class="contact">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up">
                <div class="col-lg-10">
                    <div class="info-wrap">
                        <div class="row">
                            <div class="col-lg-12 info mt-4 mt-lg-0">
                                <i class="icofont-user"></i>
                                <h4>Usuarios</h4><br>
                                <h7>
                                *** 1 = Usuario administrador
                                <br>
                                *** 0 =Usuario
                                </h7>
                                
                                <br>
                            </div>
                        </div>

                        <!-- =============== Carrito ================= -->

                        <div class="table-responsive"><br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-dark">
                                            <div class="p-2 px-3 text-uppercase text-light">Usuario</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-dark">
                                            <div class="py-2 text-uppercase text-light">Correo</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-dark">
                                            <div class="py-2 text-uppercase text-light">Acciones</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-dark">
                                            <div class="py-2 text-uppercase text-light">Rol</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">

                                </tbody>
                            </table>
                        </div>

                        <br><br><br>
                        <div class="section-title">
                                <h3>Agregar nuevo usuario</strong></h3>
                                <p>Ingresa los datos</p>
                        </div>

                        <form id="registroForm">
                            <div class="form-group">
                                <label for="user">Usuario:</label>
                                <input type="text" class="form-control" id="user" placeholder="Ingresa usuario"
                                    required="required" autofocus="autofocus" name="user">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Contraseña:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Ingresa contraseña"
                                    required="required" name="pwd">
                            </div>
                            <div class="form-group">
                                <label for="confirm_pwd">Confirmar Contraseña:</label>
                                <input type="password" class="form-control" id="confirm_pwd"
                                    placeholder="Confirma contraseña" required="required">
                            </div>

                            <div class="form-group">
                                <label for="user">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Ingresa email"
                                    required="required" name="email">
                            </div>

                            <div class="form-group" style="padding-left: 55px;">
                                <button type="submit" class="btn btn-success">Agregar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>


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
        getUsuarios();
    })

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
                        alert("¡La contraseña no tiene más de 8 caracteres, no contiene un valor numérico o no contiene mayúsculas!");
                    }
                    if(response.errors.user){
                        alert("¡El usuario ya existe!");
                    }
                    if(response.errors.email){
                        alert("¡El correo electrónico ya existe en la base de datos!");
                    }
                } else {
                    alert("¡Registrado correctamente!");
                    location.reload(); 
                }
            },
            error: function(error) {
                console.error(error);
            }
        });
    });


    function eliminar(id) {
        $.ajax({
            url: 'api/deleteUser/' + id,
            method: 'DELETE',
            data: {
                id: id,
            },
            success: function(response) {
                console.log(response);
                getUsuarios();
            }
        });
    }

    function editar(id) {
        window.location.href = '/editarUsuario?id=' + id;
    }

    function getUsuarios() {
        $.ajax({
            url: 'api/getUsuarios',
            method: 'GET',

            success: function(response) {
                console.log(response)
                var tbody = $('#tbody');
                tbody.empty();
                if (response.length > 0) {
                    var data = response
                    $.each(data, function(index, item) {
                        var row = $('<tr>');
                        row.append('<td>' + item.user + '</td>');
                        row.append('<td>' + item.email + '</td>');
                        
                        var editCell = $('<td>');
                        var editLink = $('<a>').text('Editar')
                            .css('color', 'blue')
                            .css('cursor', 'pointer')
                            .on('click', function() {
                                editar(item.id);
                            });
                        var deleteCell = $('<td>');
                        var deleteLink = $('<a>').text('Eliminar')
                            .css('color', 'blue')
                            .css('cursor', 'pointer')
                            .on('click', function() {
                                eliminar(item.id);
                            });

                        editCell.append(editLink);
                        editCell.append(' ');
                        editCell.append(deleteLink);

                        row.append(editCell);
                        row.appendTo(tbody);
                        row.append('<td>' + item.rol + '</td>');
                    });
                }

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus);
                alert("Error: " + errorThrown);
            }
        });
    }
    </script>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
</body>

</html>