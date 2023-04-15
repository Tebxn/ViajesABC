<?php
    include_once '../Models/UsuariosModel.php';

function ConsultarUsuarios() //TODOS
{

$usuarios = ConsultarUsuariosModel();

foreach ($usuarios as $usuario){
    echo '<tr>';
        echo '<td>' . $usuario['EMAIL'] . '</td>';
        echo '<td>' . $usuario['NOMBRE'] . '</td>';
        echo '<td>' . $usuario['ESTADO'] . '</td>';
        echo '<td>' . $usuario['TIPO_USUARIO'] . '</td>';
        echo "<td><a href='../Views/actualizarUsuario.php?q=" . $usuario['USUARIO_ID'] . "'>Actualizar</a> | 
             <a href='' data-toggle='modal' data-target='#miModal' data-id=" . $usuario['USUARIO_ID'] . ">Inhabilitar</a>
             </td>";
    echo '</tr>';
    }
}

function ConsultarUsuario($USUARIO_ID) {
    $datos = ConsultarUsuarioModel($USUARIO_ID);
    if ($datos) {
        return $datos;
    } else {
        return null;
    }
}



if(isset($_POST["btnAgregarUsuario"]))
{
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $nombre = $_POST['nombre'];
    $tipoUsuario = $_POST['tipo_usuario'];

    $respuesta = CrearUsuarioModel($email, $contrasena, $nombre, $tipoUsuario);

    header("Location: ../Views/Usuarios.php");

}


if(isset($_POST["btnActualizarUsuario"]))
{
    
    $usuario_id = $_POST["usuario_id"];
    $contrasena = $_POST["contrasena"];
    $nombre = $_POST["nombre"];
    $perfil = $_POST["usuario_id"];

$respuesta = ActualizarUsuarioModel($usuario_id, $nombre, $perfil, $contrasena);
    
    if($respuesta == true)
    {
        header("Location: ../Views/usuarios.php");
    }
}


?>