<?php
    include_once 'Layout.php';
    include_once '../Controllers/TourController.php';
    include_once '../Controllers/ReservasController.php';
    $datos = ConsultarTour($_GET["q"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ViajesABC</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php
        mostrarNavbar();
    ?>

    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Blog Detail Start -->
                    <div class="pb-3">
                        <div class="blog-item">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="<?php echo $datos["IMAGENURL"] ?>" alt="<?php echo $datos["NOMBRE_TOUR"] ?>">
                                <div class="blog-date">
                                    <small class="text-white text-uppercase"><?php echo $datos["FECHA"] ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white mb-3" style="padding: 30px;">
                            <div class="d-flex mb-3">
                                <a class="text-primary text-uppercase text-decoration-none" href="">Viajes</a>
                                <span class="text-primary px-2">|</span>
                                <a class="text-primary text-uppercase text-decoration-none" href=""><?php echo $datos["NOMBRE_TOUR"] ?></a>
  
                            </div>
                            <h2 class="mb-3"><?php echo $datos["NOMBRE_TOUR"] ?></h2>
                            <p><strong>Provincia: </strong><?php echo $datos["NOMBRE_PROVINCIA"] ?></p>
                            <p><strong>Direccion Exacta: </strong><?php echo $datos["DIRECCION"] ?></p>
                            <p><strong>Actividad Principal: </strong><?php echo $datos["NOMBRE_ACTIVIDAD"] ?></p>
                            <p><strong>Transporte por: </strong> <?php echo $datos["NOMBRE_TRANSPORTE"] ?></p>

                            <form action="" method="post">
                                <input type="hidden" name="idTour" id="idTour">
                                <input type='submit' class='btn btn-primary mt-1' 
                                id='btnReservar' name='btnReservar' value='Reservar'/>
                            </form>
                        </div>
                    </div>
                    <!-- Blog Detail End -->
    
                    
                    
                </div>
    
        
            </div>
        </div>
    </div>
    <!-- Blog End -->


    <!-- Footer Start -->
    <?php
            mostrarFooter();
        ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>