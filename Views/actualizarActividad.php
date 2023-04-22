<?php
    include_once 'Layout.php';
    include_once '../Controllers/ActividadesController.php';

    $datos = ConsultarActividad($_GET["q"]);
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Viajes ABC</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Viajes ABC" name="keywords">
    <meta content="Viajes ABC" name="description">

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

<div class="container">
    <section class="content-header">
      <div class="container-fluid">
      <section class="py-5 my-5">
      
      <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <h3 class="mb-4">Actualizar Actividad</h3>
                        <form action="" method="post">
                    <div class="container">    
                        <input type="hidden" id="actividad_id" name="actividad_id"
                                value="<?php echo $datos["ACTIVIDAD_ID"] ?>" >

                            <div class="row">

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" id="nombre"
                                            name="nombre" value="<?php echo $datos["NOMBRE_ACTIVIDAD"] ?>">
                                           
                                    </div>
                                </div>
                                
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Descripcion</label>
                                            <input type="text" class="form-control" id="descripcion"
                                            name="descripcion" value="<?php echo $datos["DESCRIPCION"] ?>" >
                                    </div>
                                </div>
                         </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Precio</label>
                                        <input type="text" class="form-control" id="precio"
                                            name="precio"  value="<?php echo $datos["PRECIO"] ?>">
                                    </div>
                                </div>
                        


                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" id="btnActualizarActividad"
                                    name="btnActualizarActividad" value="Actualizar" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <a class="btn btn-light" href="Actividades.php" role="button">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        
      </div>
    </section>
  </div>

  

   


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