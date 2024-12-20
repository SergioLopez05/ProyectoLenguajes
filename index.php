<?php
require_once 'models/ProductoModel.php';

// Obtener productos desde el modelo para cada categoría
$productoModel = new ProductoModel();
$camisas = $productoModel->obtenerProductoscamisa();
$pantalones = $productoModel->obtenerProductosPantalon();
$vestidos = $productoModel->obtenerProductosVestido();
$zapatos = $productoModel->obtenerProductosZapato();
$accesorios= $productoModel->obtenerProductosAccesorio();
$abrigos = $productoModel->obtenerProductosAbrigo();



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Tienda de Ropa</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />
    <link href="css/templatemo-style.css" rel="stylesheet" />
</head>

<body>

    <div class="container">
        <!-- Top box -->
        <!-- Logo & Site Name -->
        <div class="placeholder">
            <div class="parallax-window" data-parallax="scroll" data-image-src="img/indexBanner.jpg">
                <div class="tm-header">
                    <div class="row tm-header-inner">
                        <div class="col-md-6 col-12">
                            <img src="img/simple-house-logo.png" alt="Logo" class="tm-site-logo" />
                            <div class="tm-site-text-box">
                                <h1 class="tm-site-title">Tienda Wanda Chuleta</h1>
                                <h6 class="tm-site-description">Compra Ropa Online</h6>
                            </div>
                        </div>
                        <nav class="col-md-6 col-12 tm-nav">
                            <ul class="tm-nav-ul">
                                <li class="tm-nav-li"><a href="index.html" class="tm-nav-link active">Home</a></li>
                                <li class="tm-nav-li"><a href="about.html" class="tm-nav-link">About</a></li>
                                <li class="tm-nav-li"><a href="views/productos/productoView.php" class="tm-nav-link">Productos</a></li>
                                <li class="tm-nav-li"><a href="views/pedidos/pedidoView.php" class="tm-nav-link">Pedido</a></li>

                                
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <main>
            <header class="row tm-welcome-section">
                <h2 class="col-12 text-center tm-section-title">Bienvenido</h2>
                <p class="col-12 text-center">Aquí puede ver nuestra oferta de ropa por categoría.</p>
            </header>

            <!-- Categorías de productos -->
            <div class="tm-paging-links">
                <nav>
                    <ul>
                        <li class="tm-paging-item"><a href="#" class="tm-paging-link active" id="camisas-link">Camisas</a></li>
                        <li class="tm-paging-item"><a href="#" class="tm-paging-link" id="pantalones-link">Pantalones</a></li>
                        <li class="tm-paging-item"><a href="#" class="tm-paging-link" id="vestidos-link">Vestidos</a></li>
                        <li class="tm-paging-item"><a href="#" class="tm-paging-link" id="zapatos-link">Zapatos</a></li>
                        <li class="tm-paging-item"><a href="#" class="tm-paging-link" id="accesorios-link">Accesorios</a></li>
                        <li class="tm-paging-item"><a href="#" class="tm-paging-link" id="abrigos-link">Abrigos</a></li>
                    </ul>
                </nav>
            </div>


            <!-- Gallery -->
            <div class="row tm-gallery">
                <!-- gallery page: Camisas -->
                <div id="tm-gallery-page-camisas" class="tm-gallery-page">
                    <?php if (!empty($camisas)): ?>
                        <?php foreach ($camisas as $camisa): ?>
                            <article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                                <figure>
                                    <!-- Imagen de camisa -->
                                    <img src="img/gallery/camisa.png" alt="<?= htmlspecialchars($camisa['NOMBRE'], ENT_QUOTES, 'UTF-8') ?>" class="img-fluid tm-gallery-img" />
                                    <figcaption>
                                        <h4 class="tm-gallery-title"><?= htmlspecialchars($camisa['NOMBRE'], ENT_QUOTES, 'UTF-8') ?></h4>
                                        <p class="tm-gallery-description"><?= htmlspecialchars($camisa['DESCRIPCION'], ENT_QUOTES, 'UTF-8') ?></p>
                                        <p class="tm-gallery-price">$<?= number_format($camisa['PRECIO']) ?></p>
                                    </figcaption>
                                </figure>
                            </article>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No hay productos disponibles en esta categoría.</p>
                    <?php endif; ?>
                </div> <!-- End Camisas gallery page -->

                <!-- gallery page: Pantalones -->
                <div id="tm-gallery-page-pantalones" class="tm-gallery-page">
                    <?php if (!empty($pantalones)): ?>
                        <?php foreach ($pantalones as $pantalon): ?>
                            <article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                                <figure>
                                    <!-- Imagen de pantalón -->
                                    <img src="img/gallery/pantalon.png" alt="<?= htmlspecialchars($pantalon['NOMBRE'], ENT_QUOTES, 'UTF-8') ?>" class="img-fluid tm-gallery-img" />
                                    <figcaption>
                                        <h4 class="tm-gallery-title"><?= htmlspecialchars($pantalon['NOMBRE'], ENT_QUOTES, 'UTF-8') ?></h4>
                                        <p class="tm-gallery-description"><?= htmlspecialchars($pantalon['DESCRIPCION'], ENT_QUOTES, 'UTF-8') ?></p>
                                        <p class="tm-gallery-price">$<?= number_format($pantalon['PRECIO']) ?></p>
                                    </figcaption>
                                </figure>
                            </article>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No hay productos disponibles en esta categoría.</p>
                    <?php endif; ?>
                </div> <!-- End Pantalones gallery page -->

                <!-- gallery page: Vestidos -->
                <div id="tm-gallery-page-vestidos" class="tm-gallery-page">
                    <?php if (!empty($vestidos)): ?>
                        <?php foreach ($vestidos as $vestido): ?>
                            <article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                                <figure>
                                    <!-- Imagen de vestido -->
                                    <img src="img/gallery/vestido.png" alt="<?= htmlspecialchars($vestido['NOMBRE'], ENT_QUOTES, 'UTF-8') ?>" class="img-fluid tm-gallery-img" />
                                    <figcaption>
                                        <h4 class="tm-gallery-title"><?= htmlspecialchars($vestido['NOMBRE'], ENT_QUOTES, 'UTF-8') ?></h4>
                                        <p class="tm-gallery-description"><?= htmlspecialchars($vestido['DESCRIPCION'], ENT_QUOTES, 'UTF-8') ?></p>
                                        <p class="tm-gallery-price">$<?= number_format($vestido['PRECIO']) ?></p>
                                    </figcaption>
                                </figure>
                            </article>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No hay productos disponibles en esta categoría.</p>
                    <?php endif; ?>
                </div> <!-- End Vestidos gallery page -->

 <!-- Galería de Zapatos -->
 <div id="tm-gallery-page-zapatos" class="tm-gallery-page">
        <?php if (!empty($zapatos)): ?>
            <?php foreach ($zapatos as $zapato): ?>
                <article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                    <figure>
                        <img src="img/gallery/zapato.png" alt="<?= htmlspecialchars($zapato['NOMBRE'], ENT_QUOTES, 'UTF-8') ?>" class="img-fluid tm-gallery-img" />
                        <figcaption>
                            <h4 class="tm-gallery-title"><?= htmlspecialchars($zapato['NOMBRE'], ENT_QUOTES, 'UTF-8') ?></h4>
                            <p class="tm-gallery-description"><?= htmlspecialchars($zapato['DESCRIPCION'], ENT_QUOTES, 'UTF-8') ?></p>
                            <p class="tm-gallery-price">$<?= number_format($zapato['PRECIO']) ?></p>
                        </figcaption>
                    </figure>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay productos disponibles en este momento.</p>
        <?php endif; ?>
    </div> <!-- Fin galería Zapatos -->

    <!-- Galería de Accesorios -->
    <div id="tm-gallery-page-accesorios" class="tm-gallery-page">
        <?php if (!empty($accesorios)): ?>
            <?php foreach ($accesorios as $accesorio): ?>
                <article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                    <figure>
                        <img src="img/gallery/accesorio.png" alt="<?= htmlspecialchars($accesorio['NOMBRE'], ENT_QUOTES, 'UTF-8') ?>" class="img-fluid tm-gallery-img" />
                        <figcaption>
                            <h4 class="tm-gallery-title"><?= htmlspecialchars($accesorio['NOMBRE'], ENT_QUOTES, 'UTF-8') ?></h4>
                            <p class="tm-gallery-description"><?= htmlspecialchars($accesorio['DESCRIPCION'], ENT_QUOTES, 'UTF-8') ?></p>
                            <p class="tm-gallery-price">$<?= number_format($accesorio['PRECIO']) ?></p>
                        </figcaption>
                    </figure>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay productos disponibles en este momento.</p>
        <?php endif; ?>
    </div> <!-- Fin galería Accesorios -->

    <!-- Galería de Abrigos -->
    <div id="tm-gallery-page-abrigos" class="tm-gallery-page">
        <?php if (!empty($abrigos)): ?>
            <?php foreach ($abrigos as $abrigo): ?>
                <article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                    <figure>
                        <img src="img/gallery/abrigo.png" alt="<?= htmlspecialchars($abrigo['NOMBRE'], ENT_QUOTES, 'UTF-8') ?>" class="img-fluid tm-gallery-img" />
                        <figcaption>
                            <h4 class="tm-gallery-title"><?= htmlspecialchars($abrigo['NOMBRE'], ENT_QUOTES, 'UTF-8') ?></h4>
                            <p class="tm-gallery-description"><?= htmlspecialchars($abrigo['DESCRIPCION'], ENT_QUOTES, 'UTF-8') ?></p>
                            <p class="tm-gallery-price">$<?= number_format($abrigo['PRECIO']) ?></p>
                        </figcaption>
                    </figure>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay productos disponibles en este momento.</p>
        <?php endif; ?>
    </div> <!-- Fin galería Abrigos -->


            </div> <!-- End gallery -->
        </main>

        <footer class="tm-footer text-center">
            <p>Copyright &copy; 2020 Simple House

                | Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
        </footer>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle click on paging links
            $('.tm-paging-link').click(function(e) {
                e.preventDefault();

                var page = $(this).text().toLowerCase();
                $('.tm-gallery-page').addClass('hidden');
                $('#tm-gallery-page-' + page).removeClass('hidden');
                $('.tm-paging-link').removeClass('active');
                $(this).addClass("active");
            });
        });
    </script>
</body>

</html>