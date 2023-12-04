<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MakeUp-Yicel - Pagar</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<?php require 'navbar.php'; ?>

<script type="text/javascript">
  function ocultar(){
document.getElementById('obj1').style.display = 'none';
}
function mostrar(){
document.getElementById('obj2').style.display = 'block';
}
</script>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo mr-auto"><img src="assets/img/slide/images.png" alt="" class="img-fluid"></a>

      <h1 class="logo mr-auto"><a href="index.php">Yicel Make-UP</a></h1>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Inicio</a></li>

          <li><a href="buy.php">Servicios</a></li>
          <li><a href="about.php">Acerca de</a></li>
          <li class="active"><a href="contact.php">Contacto</a></li>
          <li class="active"><a><span class="glyphicon glyphicon-user"></span> Bienvenido: <?php echo "$user"; ?></a></li>
          <li class="active"><a href="logica/salir.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesión</a></li>
        </ul>

      </nav><!-- .nav-menu -->

      

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs">
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row justify-content-center" data-aos="fade-up">
          <div class="col-lg-12">
            <div class="info-wrap">
              <div class="row">
                <div class="info">
                  <i class="icofont-grocery"></i>
                  <h4>Pagar</h4>
                  <p>Ingresa información para el metodo de pago que deseas realizar:</p><br>
                  <ul class="list-group list-group-horizontal">
                    <li class="list-group-item" style="color:#ca146c"><strong>Tarjeta de crédito/débito</strong></li>
                    <li class="list-group-item" style="color:#ca146c"><strong>Cuenta PayPal</strong></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5 justify-content-center" data-aos="fade-up">
        <div class="col-lg-10">
          <form action="#" method="post" role="form" class="php-email-form"><h4><strong>Tarjeta de crédito/débito:</strong></h4>
            <div class="form-row" style="margin-top: 30px;">
              <div class="col-md-6 form-group">
                <label class="control-label"><b>Propietario de la tarjeta</b></label>
                <input type="text" name="name" class="form-control" id="name" placeholder="John Smith"/>
                <div class="validate"></div>
              </div>
              <div class="col-md-6 form-group">
                <label class="control-label"><b>Número de la tarjeta</b></label>
                <input type="" class="form-control" name="email" id="email" placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;"/>
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label class="control-label"><b>CVV</b></label>
                <input class="security-code form-control" Â· inputmode="numeric" type="text" name="security-code" placeholder="&#149;&#149;&#149;">
                <div class="validate"></div>
              </div>
              <div class="col-md-6 form-group">
                <label class="control-label"><b>Fecha de expiración</b></label>
                <input class="expiration-month-and-year form-control" type="text" name="expiration-month-and-year" placeholder="MM / YY">
              <div class="validate"></div>
              </div>
            </div>
            <div class="text-center"><button type="submit">Realizar pago</button></div>
          </form>
        </div>
      </div>

      <div class="row mt-4 justify-content-center" data-aos="fade-up">
        <div class="col-lg-10">
          <form action="#" method="post" role="form" class="php-email-form">
            <div class="form-row">
              <div class="col-md-6 form-group">
                <img class="pp-img" src="assets/img/paypal.png" alt="Image Alternative text" title="Image Title" style="width: 180px;">
                <p>Importante: se le redireccionará al sitio web de PayPal para completar su pago de forma segura.</p><a class="btn btn-primary text-light">Pagar via Paypal</a>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label class="control-label"><b>Propietario de la tarjeta</b></label>
                <input type="text" name="name" class="form-control" id="name" placeholder="John Smith"/>
                <div class="validate"></div>
              </div>
              <div class="col-md-6 form-group">
                <label class="control-label"><b>Número de la tarjeta</b></label>
                <input type="text" class="form-control" name="" id="" placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;"/>
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label class="control-label"><b>CVV</b></label>
                <input class="security-code form-control" Â· inputmode="numeric" type="text" name="security-code" placeholder="&#149;&#149;&#149;">
                <div class="validate"></div>
              </div>
              <div class="col-md-6 form-group">
                <label class="control-label"><b>Fecha de expiración</b></label>
                <input class="expiration-month-and-year form-control" type="text" name="expiration-month-and-year" placeholder="MM / YY">
              <div class="validate"></div>
              </div>
            </div>
            <div class="text-center"><button type="submit">Realizar pago</button></div>
          </form>
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
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Inicio</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about.html">Acerca de</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact.html">Contacto</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Información del sitio</h4>
            <ul>
              <a>Número de teléfono</a>
              <li><i class="bx bx-chevron-right"></i> <a href="#">+52 449 513 58 30 </a></li>
              <a>Correo Electrónico</a>
              <li><i class="bx bx-chevron-right"></i> <a href="#">makeup_yicel@gmail.com</a></li>
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

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>