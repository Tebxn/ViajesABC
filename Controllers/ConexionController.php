<?php
include 'Models/ConexionModel.php';

$usuario = 'System';
$pass = 'root';
$cadenaConexion = 'localhost/ViajesABC';

if(isset($_POST["btnTest"]))
{
   insertar_persona('Esteban', '22');
}
?>