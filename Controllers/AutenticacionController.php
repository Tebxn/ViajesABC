<?php
include_once '../Models/AutenticacionModel.php';

if(isset($_POST["btnIniciarSesion"]))
{
    // Se obtienen los datos del formulario
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    
    // Se valida que se hayan enviado ambos campos
    if (!empty($email) && !empty($contrasena)) {
        // Se llama al modelo para iniciar sesión
        $resultado = iniciarSesionModel($email, $contrasena);
    
        if ($resultado !== null) {
            // Se guarda la información de la sesión en variables de sesión
            $_SESSION['usuario_id'] = $resultado['usuario_id'];
            $_SESSION['nombre'] = $resultado['nombre'];
            $_SESSION['estado'] = $resultado['estado'];
            $_SESSION['tipoUsuario'] = $resultado['tipo_usuario'];
            $_SESSION['email'] = $email;
    
            // Se redirige a la página principal
            header('Location: ../Views/Home.php');
            exit();
        } else {
            // Se muestra un mensaje de error
            header('Location: ../Views/Login.php');
            echo 'Email o contraseña incorrectos';
            }
        }
}

if(isset($_POST["btnCerrarSesion"]))
{
    session_destroy();
    header("Location: ../Views/Login.php");
}
?>