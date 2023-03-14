<?php
include '../Models/ConexionModel.php';

$usuario = 'System';
$pass = 'root';
$cadenaConexion = 'localhost/ViajesABC';

if(isset($_POST["btnTest"]))
{
   conectar_Oracle();
}
?>