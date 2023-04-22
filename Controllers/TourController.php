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
        echo '<td>' . $tour['FECHA'] . '</td>';
        echo '<td>' . $tour['DIRECCION'] . '</td>';
        
       
        echo "<td><a href='../Views/actualizarTour.php?q=" . $tour['TOUR_ID'] . "'>Actualizar</a> | 
             <a href='../Views/eliminarTours.php?q=" . $tour['TOUR_ID'] . "'>Eliminar</a>
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

if(isset($_POST["btnActualizarTour"]))
{
    
    $TOUR_ID = $_POST["tour_id"];
    $NOMBRE_TOUR = $_POST["nombre"];
    $PROVEEDOR = $_POST["proveedor_id"];
    $PROVINCIA = $_POST["provincia_id"];
    $TRANSPORTE = $_POST["transporte_id"];
    $FECHA = $_POST["fecha"];
    $ACTIVIDAD = $_POST["actividad_id"];
    $DIRECCION = $_POST["direccion_id"];

$respuesta = ActualizarTourModel($TOUR_ID, $NOMBRE_TOUR,$PROVEEDOR,$PROVINCIA,$TRANSPORTE, $FECHA, $ACTIVIDAD, $DIRECCION );
    
    header("Location: ../Views/Tours.php");

}

if(isset($_POST["btnEliminarTour"])) {

    $TOUR_ID = $_POST["tour_id"];

    EliminarTourModel($TOUR_ID);

    header("Location: ../Views/Tours.php");
}

if(isset($_POST["btnAgregarTour"]))
{
    $TOUR_ID = $_POST["tour_id"];
    $NOMBRE_TOUR = $_POST["nombre"];
    $PROVEEDOR = $_POST["proveedor_id"];
    $PROVINCIA = $_POST["provincia_id"];
    $TRANSPORTE = $_POST["transporte_id"];
    $FECHA = $_POST["fecha"];
    $ACTIVIDAD = $_POST["actividad_id"];
    $DIRECCION = $_POST["direccion_id"];

    $respuesta = CrearTourModel($TOUR_ID, $NOMBRE_TOUR,$PROVEEDOR,$PROVINCIA,$TRANSPORTE, $FECHA, $ACTIVIDAD, $DIRECCION);

    header("Location: ../Views/Tours.php");

}


?>