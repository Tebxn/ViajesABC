<?php
include_once '../Models/AutenticacionModel.php';

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if(isset($_POST["btnIniciarSesion"]))
{
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

        $resultado = iniciarSesionModel($email, $contrasena);
    
        if ($resultado != null) {
            $_SESSION['usuario_id'] = $resultado['usuario_id'];
            $_SESSION['nombre'] = $resultado['nombre'];
            $_SESSION['estado'] = $resultado['estado'];
            $_SESSION['tipoUsuario'] = $resultado['tipoUsuario'];
            $_SESSION['email'] = $email;
    
            header('Location: ../Views/Home.php');
            exit();
        } else {
            header('Location: ../Views/Login.php');
            echo 'Email o contraseña incorrectos';
        }
}

if(isset($_POST["btnCerrarSesion"]))
{
    session_destroy();
    header("Location: ../Views/Login.php");
}
?>