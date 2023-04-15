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
        echo "<td><a href='../Views/actualizarProducto.php?q=" . $usuario['USUARIO_ID'] . "'>Actualizar</a> | 
             <a href='' data-toggle='modal' data-target='#miModal' data-id=" . $usuario['USUARIO_ID'] . ">Inhabilitar</a>
             </td>";
    echo '</tr>';
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
?>