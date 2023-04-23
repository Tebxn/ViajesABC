<?php
include_once '../Models/ReservaModel.php';

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}
if(isset($_POST["btnReservar"])){
    $tourId = $_POST['idTour'];
    $usuarioId = $_SESSION['usuario_id'];
    CrearReservaModel($usuarioId, $tourId);
    header("Location: ../Views/MisReservas.php");
}

if(isset($_POST["btnEliminarReserva"])){

    $tourId = $_POST['idTour'];
    $usuarioId = $_SESSION['usuario_id'];

    EliminarReservaModel($usuarioId, $tourId);
    header("Location: ../Views/MisReservas.php?q=$usuarioId");
}

function ConsultarReservas($usuario_id){

    $reservas = ConsultarReservasModel($usuario_id);
    
    foreach ($reservas as $reserva){
        echo '<tr>';
            echo '<td>' . $reserva['NOMBRE_TOUR'] . '</td>';
            echo '<td>' . $reserva['FECHA'] . '</td>';
            echo '<td><a href="../Views/single.php?q=' . $reserva['TOURS'] . '">Ver Informacion</a></td>';
            echo  ' <td><form action="" method="post">
                    <input type="hidden" name="idTour"/>
                    <input type="submit" id="btnEliminarReserva" name="btnEliminarReserva" class="btn btn-transparent" value="Cancelar Reserva"/>
                    </form></td>
                 </td>';
        echo '</tr>';
    }
}
?>