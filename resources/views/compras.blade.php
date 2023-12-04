<!DOCTYPE html>
<html>

<head>
    @include('navbar');
</head>

<body>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs">
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio mb-4">

            <div class="row" data-aos="fade-up">
                
            <div class="col-lg-12 d-flex justify-content-center" id="categorias">
                    <ul id="portfolio-flters">
                        <li data-filter=".filter-ad" onclick="generarContenidoFiltrado('Bodas')">Bodas</li>
                        <li data-filter=".filter-nik" onclick="generarContenidoFiltrado('XV Años')">XV Años</li>
                        <li data-filter=".filter-con" onclick="generarContenidoFiltrado('Graduaciones')">Graduaciones</li>
                        <li data-filter=".filter-con" onclick="generarContenidoFiltrado('Graduaciones')">Eventos Especiales</li>
                    </ul>
                </div>
            </div>

            <div class="container justify-content-center mx-auto row" id="container">

                <!-- ===================== Bodas ======================= -->s

                <div class="row portfolio-container" data-aos="fade-up" id="catalog">




                    <!-- ============================================== XV Años ====================================================== -->



                    <!-- =================================================== RAY - BAN =========================================================== -->


                </div>
            </div>
        </section><!-- End Portfolio Section -->


    </main><!-- End #main -->
    <script>
    function loadItems() {
        $.ajax({
            url: 'api/verificarCarrito',
            method: 'POST',
            data: {
                IdUsuario: <?php echo Session::get('IdUsuario');?>
            },
            success: function(response) {
                $("#carrito-count").text(response)
            }
        });
    }

    var catalog = [];

    function generarContenidoFiltrado(filtro) {
        var html = '';
        $('#container').empty();

        if (filtro === 'Bodas')
            filtro = 'Adidas';
        if (filtro === 'XV Años')
            filtro = 'Nike';
        if (filtro === 'Graduaciones')
            filtro = 'Converse';

        // Filtrar los datos según el filtro seleccionado
        var productosFiltrados = (filtro === 'all') ? catalog : catalog.filter(item => item.Marca === filtro);

        // Generar el contenido HTML para cada producto filtrado
        $.each(productosFiltrados, function(index, item) {
            html += '<div class="col-lg-4 col-md-6 portfolio-item filter-' + item.Marca + '">';
            html += '<img src="./img/shoes/' + item.Imagen + '" class="img-fluid" alt="">';
            html += '<div class="portfolio-info">';
            html += '<h4>' + item.Nombre + '</h4>';
            html += '<p>$' + item.Precio + '.00</p>';
            html += '<div class="preview-link" onclick="updateCart(\'' + item.IdProducto + '\', ' +
                <?php echo Session::get('IdUsuario'); ?> + ')">';
            html += '<i class="bx bx-cart"></i>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
        });

        // Agregar el contenido generado al elemento con la clase "row"
        $('#container').append(html);
    }

    function showCatalog(modo) {
        modo = parseInt(modo)
        var url;
        if (modo === 0) {
            url = "api/getCatalog";
            document.getElementById("categorias").style.display = "flex";

        } //Categoria
        if (modo === 1) {
            url = "api/topSell";
            document.getElementById("categorias").style.display = "none";

        } //Mas vendidos

        if (modo === 2) {
            url = "api/lowSell";
            document.getElementById("categorias").style.display = "none";

        } //Por Temporada


        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Generar dinámicamente el contenido HTML para cada producto
                var html = '';
                catalog = data;
                $('#container').empty()
                $.each(data, function(index, item) {
                    html += '<div class="col-lg-4 col-md-6 portfolio-item filter-con">';
                    html += '<img src="./img/shoes/' + item.Imagen + '" class="img-fluid" alt="">';
                    html += '<div class="portfolio-info">';
                    html += '<h4>' + item.Nombre + '</h4>';
                    html += '<p>$' + item.Precio + '.00</p>';
                    html += '<div class="preview-link" onclick="updateCart(\'' + item.IdProducto +
                        '\', ' + <?php echo Session::get('IdUsuario'); ?> + ')">';
                    html += '<i class="bx bx-cart"></i>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                });

                // Agregar el contenido generado al elemento con la clase "row"
                $('#container').append(html);
            },
            error: function(xhr, status, error) {
                // Manejar errores en la llamada AJAX, si es necesario
                console.log(error);
            }
        });
    }

    $(document).ready(function() {
        console.log("ready!");
        loadItems();
        showCatalog(0);
    });

    function updateCart(IdProducto, IdUsuario) {
        console.log(IdProducto, " console ", IdUsuario);

        $.ajax({
            url: 'api/addToCart',
            method: 'POST',

            data: {
                IdProducto: IdProducto,
                IdUsuario: IdUsuario
            },
            success: function(response) {
                console.log(response)
                loadItems();
            },
            error: function(xhr, status, error) {
                // Manejar los errores de la solicitud AJAX
                console.log("maloo")
                console.log(error);
            }
        });
    }
    </script>

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

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
</body>

</html>