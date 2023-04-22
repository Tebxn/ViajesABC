<?php
    include_once '../Models/ActividadesModel.php';
    if (session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    function ConsultarActividades() //TODOS
    {
    
    $actividades = ConsultarActividadesModel();
    
    foreach ($actividades as $actividad){
        echo '<tr>';
            echo '<td>' . $actividad['NOMBRE_ACTIVIDAD'] . '</td>';
            echo '<td>' . $actividad['DESCRIPCION'] . '</td>';
            echo '<td>' . $actividad['PRECIO'] . '</td>';
            echo "<td><a href='../Views/actualizarActividad.php?q=" . $actividad['ACTIVIDAD_ID'] . "'>Actualizar</a> | 
                 <a href='../Views/eliminarActividad.php?q=" . $actividad['ACTIVIDAD_ID'] . "'>Eliminar</a>
                 </td>";
        echo '</tr>';
        }
    }


    function ConsultarActividad($ACTIVIDAD_ID)
    {
    $datos = ConsultarActividadModel($ACTIVIDAD_ID);
    if ($datos) {
        return $datos;
    } else {
        return null;
    }
    }

    if(isset($_POST["btnActualizarActividad"]))
    {
    
    $ACTIVIDAD_ID = $_POST["actividad_id"];
    $NOMBRE_ACTIVIDAD = $_POST["nombre"];
    $DESCRIPCION = $_POST["descripcion"];
    $PRECIO = $_POST["precio"];

    $respuesta = ActualizarActividadModel($ACTIVIDAD_ID, $NOMBRE_ACTIVIDAD, $DESCRIPCION, $PRECIO);
    
    header("Location: ../Views/Actividades.php");

}

if(isset($_POST["btnAgregarActividad"]))
{
    $NOMBRE_ACTIVIDAD = $_POST['nombre'];
    $DESCRIPCION = $_POST['descripcion'];
    $PRECIO = $_POST['precio'];

    $respuesta = CrearActividadModel($NOMBRE_ACTIVIDAD, $DESCRIPCION, $PRECIO);

    header("Location: ../Views/Actividades.php");

}

if(isset($_POST["btnEliminarActividad"])) {

    $ACTIVIDAD_ID = $_POST["actividad_id"];

    EliminarActividadModel($ACTIVIDAD_ID);

    header("Location: ../Views/Actividades.php");
}


?>