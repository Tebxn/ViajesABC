<?php
include '../Models/ConexionModel.php';

$usuario = 'System';
$pass = 'root';
$cadenaConexion = 'localhost/ViajesABC';

if(isset($_POST["btnTest"]))
{

    $conn = conectar_Oracle('System', 'root', 'localhost/ViajesABC');

    if($conn)
    {
        echo 'CONECTADO';
    }else
    {
     echo 'ERROR';
    }
}
?>