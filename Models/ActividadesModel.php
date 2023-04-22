<?php
include_once 'ConexionModel.php';

function ConsultarActividadesModel() {

    $conn = conectar();

    $query = "SELECT ACTIVIDAD_ID, NOMBRE_ACTIVIDAD, DESCRIPCION, PRECIO FROM ACTIVIDAD";
    $result = oci_parse($conn, $query);
    oci_execute($result);

    $actividades = array();
    while ($row = oci_fetch_assoc($result)) {
        $actividades[] = $row;
    }

    oci_free_statement($result);
    oci_close($conn);

    return $actividades;

}


function ConsultarActividadModel($ACTIVIDAD_ID) {

    $conn = conectar();

    $cursor = oci_new_cursor($conn);

    $stmt = oci_parse($conn, "BEGIN ConsultarActividad(:pACTIVIDAD_ID, :pCursor); END;");
    oci_bind_by_name($stmt, ":pACTIVIDAD_ID", $ACTIVIDAD_ID);
    oci_bind_by_name($stmt, ":pCursor", $cursor, -1, OCI_B_CURSOR);
    
    oci_execute($stmt);
    oci_execute($cursor);


    $actividad = oci_fetch_array($cursor, OCI_ASSOC);


    oci_free_statement($stmt);
    oci_free_statement($cursor);
    oci_close($conn);

    return $actividad;

}

function ActualizarActividadModel($ACTIVIDAD_ID, $NOMBRE_ACTIVIDAD, $DESCRIPCION, $PRECIO)

{
    $conn = conectar();
    $stmt = oci_parse($conn, "BEGIN ActualizarActividad(:pACTIVIDAD_ID, :pNOMBRE_ACTIVIDAD, :pDESCRIPCION, :pPRECIO); END;");

    oci_bind_by_name($stmt, ':pACTIVIDAD_ID', $ACTIVIDAD_ID);
    oci_bind_by_name($stmt, ':pNOMBRE_ACTIVIDAD', $NOMBRE_ACTIVIDAD, 255);
    oci_bind_by_name($stmt, ':pDESCRIPCION', $DESCRIPCION, 255);
    oci_bind_by_name($stmt, ':pPRECIO', $PRECIO, 255);

    oci_execute($stmt);

    oci_free_statement($stmt);
    oci_close($conn);

}


function CrearActividadModel($NOMBRE_ACTIVIDAD, $DESCRIPCION, $PRECIO) {
  
    $conn = conectar();

    $stmt = oci_parse($conn, 'BEGIN INSERTAR_ACTIVIDAD(:pNOMBRE_ACTIVIDAD, :pDESCRIPCION,:pPRECIO); END;');

    oci_bind_by_name($stmt, ':pNOMBRE_ACTIVIDAD', $NOMBRE_ACTIVIDAD, 70);
    oci_bind_by_name($stmt, ':pDESCRIPCION', $DESCRIPCION, 255);
    oci_bind_by_name($stmt, ':pPRECIO', $PRECIO, 10);


    oci_execute($stmt);
    
    oci_free_statement($stmt);
    oci_close($conn);
}

function EliminarActividadModel($ACTIVIDAD_ID) {

    $conn = conectar();

    $stmt = oci_parse($conn, "BEGIN eliminar_actividad(:pACTIVIDAD_ID); END;");
    oci_bind_by_name($stmt, ":pACTIVIDAD_ID", $ACTIVIDAD_ID);
    oci_execute($stmt);
    oci_free_statement($stmt);
    oci_close($conn);
}

?>