<?php
    include_once '../Models/TransporteModel.php';


function ConsultarTransportes() //TODOS
{

$transportes = ConsultarTransportesModel();

foreach ($transportes as $transporte){
    echo '<tr>';
        echo '<td>' . $transporte['NOMBRE'] . '</td>';
        echo '<td>' . $transporte['EMAIL'] . '</td>';
        echo '<td>' . $transporte['TELEFONO'] . '</td>';
        echo "<td><a href='../Views/actualizarTransporte.php?q=" . $transporte['TRANSPORTE_ID'] . "'>Actualizar</a> | 
             <a href='' data-toggle='modal' data-target='#miModal' data-id=" . $transporte['TRANSPORTE_ID'] . ">Inhabilitar</a>
             </td>";
    echo '</tr>';
    }
}

function ConsultarTransporte($TRANSPORTE_ID) {
    $datos = ConsultarTransporteModel($TRANSPORTE_ID);
    if ($datos) {
        return $datos;
    } else {
        return null;
    }
}

if(isset($_POST["btnActualizarTransporte"]))
{
    
    $TRANSPORTE_ID = $_POST["transporte_id"];
    $NOMBRE = $_POST["nombre"];
    $EMAIL = $_POST["email"];
    $TELEFONO = $_POST["telefono"];

$respuesta = ActualizarTransporteModel($TRANSPORTE_ID, $NOMBRE, $EMAIL, $TELEFONO);
    
    if($respuesta == true)
    {
        header("Location: ../Views/Transporte.php");
    }
}


?>