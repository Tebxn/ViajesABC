<?php
    include_once 'Layout.php';
    include_once '../Controllers/UsuariosController.php';
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
<br>
<br>
<div class="">
    <section class="content-header">
      <div class="container-fluid">

        <table class="table">
            <thead>
                <tr>
                    <th>Id Usuario</th>
                    <th>Correo Electronico</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Tipo Usuario</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  ConsultarUsuarios();
                ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-2">
            <a class="btn btn-primary" href="AgregarUsuario.php" role="button">Agregar Usuario</a>
            </div>
        </div>
        
      </div>
    </section>
  </div>

    <?php
        mostrarFooter();
    ?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inactivar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Desea inactivar el usuario?
        <input type="text" id="IdModal" data-id="">
      </div>
      <div class="modal-footer">
        <button type="button" onclick="InactivarUsuario();" class="btn btn-primary" id="inactivarBtn" name="inactivarBtn">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<script>
$('#exampleModal').modal().on('shown.bs.modal', function (e) {

var myDataId = $(e.relatedTarget).attr('data-id'); 
$("#IdModal").val(myDataId);

});

</script>



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="javascripts/funcionesInactivarUsuario.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>