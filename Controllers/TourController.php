<?php
    include_once '../Models/TourModel.php';


function ConsultarTours() //TODOS
{

$tours = ConsultarToursModel();

foreach ($tours as $tour){
    echo '<tr>';
        echo '<td>' . $tour['TOUR_ID'] . '</td>';
        echo '<td>' . $tour['NOMBRE_TOUR'] . '</td>';
        echo '<td>' . $tour['PROVEEDOR'] . '</td>';
        echo '<td>' . $tour['PROVINCIA'] . '</td>';
        echo '<td>' . $tour['TRANSPORTE'] . '</td>';
        echo '<td>' . $tour['FECHA_SALIDA'] . '</td>';
        echo '<td>' . $tour['DIRECCION'] . '</td>';
        
       
        echo "<td><a href='../Views/actualizarTour.php?q=" . $tour['TOUR_ID'] . "'>Actualizar</a> | 
             <a href='../Views/eliminarTour.php?q=" . $tour['TOUR_ID'] . "'>Eliminar</a>
             </td>";
    echo '</tr>';
    }
}

function ConsultarTour($TOUR_ID)
 {
    $datos = ConsultarTourModel($TOUR_ID);
    if ($datos) {
        return $datos;
    } else {
        return null;
    }
}

?>