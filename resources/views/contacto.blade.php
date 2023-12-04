<!DOCTYPE html>
<html>

<head>
    @include('navbar');
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.icofont-paper-plane').on('click', function() {
                var phoneNumber = '+52' + $('#phone').val();
                var apiUrl = "https://graph.facebook.com/v17.0/155571227640277/messages";
                var accessToken = "EAATorLLYBqQBO3gwsOsuo4fRGSeJe2BTYgVJWHFtaTYjiCHF2AHrNit9HI0egOBfBbJ7jvxTFqxOBwjzJLKqhWjpLlFZBRfgmYovYiLQnkhysj96PJypA6r6xHhPWKWmbWFzIIgAcZA5GBHOU8Eb4M1XZCx5vaLZCZBMN67xZBrJJwJCFg58jOtgOr9rNzq1WhYgDKj6YiFeZCeZCU4nf6gZD";

                var postData = {
                    messaging_product: "whatsapp",
                    to: phoneNumber,
                    type: "template",
                    template: {
                        name: "hola",
                        language: { code: "es_MX" }
                    }
                };

                $.ajax({
                    url: apiUrl,
                    type: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + accessToken,
                        'Content-Type': 'application/json'
                    },
                    data: JSON.stringify(postData),
                    success: function(response) {
                        alert("Mensaje enviado con éxito!");
                    },
                    error: function(error) {
                        alert("Error al enviar el mensaje: " + JSON.stringify(error));
                    }
                });
            });
        });
    </script>
</head>

<body>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs">
        </section><!-- End Breadcrumbs -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="row justify-content-center" data-aos="fade-up">
                    <div class="col-lg-10">
                        <div class="info-wrap">
                            <div class="row">

    <div class="col-lg-6 info mt-4 mt-lg-0">
    <i class="icofont-whatsapp"></i>
    <h4>WhatsApp:</h4>
    <p>+52 449 513 58 30</p>
</div>
<div class="col-lg-6 info mt-4 mt-lg-0">   
    <input type="phone" class="form-control" id="phone" placeholder="Ingresa tu telefono (10 digitos)" required="required" name="phone">
    <br>
    <i class="icofont-paper-plane"></i>
</div>
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
                            <li><i class="bx bx-chevron-right"></i> <a href="./calculadora">CCalculadora</a></li>
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

