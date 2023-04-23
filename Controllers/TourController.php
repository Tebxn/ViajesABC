<?php
    include_once '../Models/TourModel.php';
    if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

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


function ConsultarToursCards() //TODOS
{

$tours = ConsultarToursCardsModel();

foreach ($tours as $tour){

    echo "<div class='col-lg-4 col-md-6 mb-4'>
            <div class='package-item bg-white mb-2'>
                <img class='img-fluid' src='" . $tour['IMAGENURL'] . "' alt=''>
                <div class='p-4'>
                    <div class='d-flex justify-content-between mb-3'>
                        <small class='m-0'><i
                                class='fa fa-map-marker-alt text-primary mr-2'></i>". $tour['NOMBRE_PROVINCIA'] ."</small>
                        <small class='m-0'><i class='fa fa-calendar-alt text-primary mr-2'></i>". $tour['FECHA'] ."</small>
                    </div>
                    <a class='h5 text-decoration-none' href=''>". $tour['NOMBRE_TOUR'] ."</a>
                    <div class='border-top mt-4 pt-4'>
                        <div class='d-flex justify-content-between'>
                            <h6 class='m-0'><i class='fa fa-star text-primary mr-2'></i>". $tour['NOMBRE_ACTIVIDAD'] ."</h6>
                            <form action='' method='post'>
                            <input type='hidden' value='" .$tour['TOUR_ID']. "'>
                            <input type='submit' class='btn btn-primary mt-1' 
                            id='btnIniciarSesion' name='btnReservar' value='Reservar'/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
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
    $nombre = $_POST["nombre"];
    $proveedor = $_POST["proveedor"];
    $actividad = $_POST["actividad"];
    $direccion = $_POST["direccion"];
    $provincia = $_POST["provincia"];
    $transporte = $_POST["transporte"];
    $fecha = $_POST["fecha"];

    $respuesta = CrearTourModel($nombre, $proveedor,$actividad,$direccion,$provincia, $transporte, $fecha);

    header("Location: ../Views/Tours.php");

}


?>