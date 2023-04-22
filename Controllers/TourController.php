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
?>