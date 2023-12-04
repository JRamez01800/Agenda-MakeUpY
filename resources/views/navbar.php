<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MakeUp-Yicel - Inicio</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./img/slide/logoy.png"rel="icon" type="image/png">
  <link href="./img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="./vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="./vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="./vendor/venobox/venobox.css" rel="stylesheet">
  <link href="./vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="./vendor/aos/aos.css" rel="stylesheet">
  <link href="./vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="./css/style.css" rel="stylesheet">

</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo mr-auto"><img src="./img/slide/logoy.png" alt="" class="img-fluid"></a>
      
      <h1 class="logo mr-auto"><a href="index.php"></a></h1>
      

      <?php 
        $rol = Session::get('rol');
        $user = Session::get('nameuser');

        if($user != null){
          echo '    <div class="container d-flex align-items-center">

   
          <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li><a href="./index">Inicio</a></li>
    
              <li><a href="./compras" >Servicios</a></li>
              <li><a href="./about">Acerca de</a></li>
              <li><a href="./contacto">Contacto</a></li>
              <li><a href="./calculadora">Calculadora</a></li>'
              .($rol == 1 ? '<li><a href="./usuarios">Usuarios</a></li>':'').'
              <li class="active"><a><span class="glyphicon glyphicon-user"></span> Bienvenido: '.$user.'</a></li>
              <li class="active"><a href="/logout"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesión</a></li>
            </ul>
    
          </nav>
    
          <div class="header-social-links">
            
            <span id="carrito-count"> .</span>
          </div>
        </div>';
        }
      ?>
    </div>
      <!-- Vendor JS Files -->
  <script src="./vendor/jquery/jquery.min.js"></script>
  <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="./vendor/php-email-form/validate.js"></script>
  <script src="./vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="./vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="./vendor/venobox/venobox.min.js"></script>
  <script src="./vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="./vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="./vendor/aos/aos.js"></script>

    <script>
      $(document).ready(function(){
        loadItems();
      })
      function loadItems(){
        $.ajax({
          url: 'api/verificarCarrito',
          method: 'POST',
          data:{
            IdUsuario: <?php echo Session::get("IdUsuario") ?>
          },
          success: function (response){
            $("#carrito-count").text(response)
          }
        });
      }
      
    </script>
  </header><!-- End Header -->


  <!-- Template Main JS File -->
  <script src="./js/main.js"></script>

</body>

</html>