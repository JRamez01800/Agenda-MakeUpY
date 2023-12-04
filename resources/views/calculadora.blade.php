<!DOCTYPE html>
<html>

<head>
    @include('navbar');
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs">
        </section><!-- End Breadcrumbs -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">
<h1>"Operaciones Aritmetica"</h1>
                <div class="row justify-content-center" data-aos="fade-up">
                    <div class="col-lg-10">
                        <div class="info-wrap">
                            <div class="row">
                               <br>
                            
                            <br>
    
    <form id="formCalculadora">
        <label for="num1">Número 1:</label>
        <input type="number" step="0.01" id="num1" name="num1" required>
        <br>
        <label for="num2">Número 2:</label>
        <input type="number" step="0.01" id="num2" name="num2" required>
        <br>
        <label for="operacion">Operación:</label>
        <select id="operacion" name="operacion">
            <option value="suma">Sumar</option>
            <option value="resta">Restar</option>
            <option value="multiplicacion">Multiplicar</option>
            <option value="division">Dividir</option>
        </select>
        <br>
        <button type="submit">Resultado</button>
        <button type="button" id="btnBorrar">Borrar</button>
    </form>
    
    
    
    <div id="resultadoContainer">
    <h3>Resultado:</h3>
    <label id="resultado"> </label>
   </div>

    <script>
        document.getElementById('formCalculadora').addEventListener('submit', function(e) {
            e.preventDefault();

            let num1 = document.getElementById('num1').value;
            let num2 = document.getElementById('num2').value;
            let operacion = document.getElementById('operacion').value;

            fetch(`http://localhost/agendaY/public/api/${operacion}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    num1: num1,
                    num2: num2,
                }),
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('resultado').innerHTML = `<p>${data.operacion} = ${data.resultado}</p>`;
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });
        document.getElementById('btnBorrar').addEventListener('click', function() {
        document.getElementById('num1').value = '';
        document.getElementById('num2').value = '';
        document.getElementById('resultado').innerHTML = '';
        });
    </script>

                            <div>
                                
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Contact Section -->

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
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
</body>

</html>

