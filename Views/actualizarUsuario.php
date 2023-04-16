<?php
    include_once 'Layout.php';
    include_once '../Controllers/UsuariosController.php';

    $datos = ConsultarUsuario($_GET["q"]);
   
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
                        <h3 class="mb-4">Actualizar Usuario</h3>
                        <form action="" method="post">
                    <div class="container">    
                        <input type="hidden" id="usuario_id" name="usuario_id"
                                value="<?php echo $datos["USUARIO_ID"] ?>" >

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" id="nombre"
                                            name="nombre" value="<?php echo $datos["NOMBRE"] ?>">
                                           
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Correo Electronico</label>
                                            <input type="email" class="form-control" id="email"
                                            name="email" readOnly="true" value="<?php echo $datos["EMAIL"] ?>" >
                                    </div>
                                </div>
                         </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tipo Usuario</label>
                                        <input type="text" class="form-control" id="perfil"
                                            name="perfil" readOnly="true" value="<?php echo $datos["ROL"] ?>">
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="usuario_id"
                                            name="usuario_id" value="<?php echo $datos["USUARIO_ID"] ?>">
                                           
                                    </div>
                                </div>
                               
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="password" class="form-control" value="" id="contrasena"
                                            name="contrasena" >
                                    </div>
                                </div>
                            

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirmar Contraseña</label>
                                        <input type="password" class="form-control" value="" id="contrasena_confirma"
                                            name="contrasena_confirma" >
                                    </div>
                                </div>
                            </div>


                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" id="btnActualizarUsuario"
                                    name="btnActualizarUsuario" value="Actualizar" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <a class="btn btn-light" href="Usuarios.php" role="button">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        
      </div>
    </section>
  </div>

  

    <?php
        mostrarFooter();
    ?>


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

    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#contrasena");

        togglePassword.addEventListener("click", function () {
            
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            this.classList.toggle("bi-eye");
        });

        const form = document.querySelector("form");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });
    </script>
</body>

</html>