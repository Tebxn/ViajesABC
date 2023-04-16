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
        echo "<td><a href='../Views/actualizarUsuario.php?q=" . $transporte['TRANSPORTE_ID'] . "'>Actualizar</a> | 
             <a href='' data-toggle='modal' data-target='#miModal' data-id=" . $transporte['TRANSPORTE_ID'] . ">Inhabilitar</a>
             </td>";
    echo '</tr>';
    }
}


?>