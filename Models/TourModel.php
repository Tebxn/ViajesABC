<?php
include_once 'ConexionModel.php';

function ConsultarToursModel() {

    $conn = conectar();

    $query = "SELECT TOUR_ID, NOMBRE_TOUR, PROVEEDOR, PROVINCIA ,TRANSPORTE, FECHA,
    DIRECCION, IMAGENURL FROM TOUR";

    $result = oci_parse($conn, $query);
    oci_execute($result);


    $tours = array();
    while ($row = oci_fetch_assoc($result)) {
        $tours[] = $row;
    }

    oci_free_statement($result);
    oci_close($conn);

    return $tours;
}

function ConsultarTourModel($TOUR_ID) {

    $conn = conectar();

    $cursor = oci_new_cursor($conn);

    $stmt = oci_parse($conn, "BEGIN ConsultarTour(:pTOUR_ID, :pCursor); END;");
    oci_bind_by_name($stmt, ":pTOUR_ID", $TOUR_ID);
    oci_bind_by_name($stmt, ":pCursor", $cursor, -1, OCI_B_CURSOR);
    oci_execute($stmt);
    oci_execute($cursor);


    $tour = oci_fetch_array($cursor, OCI_ASSOC);


    oci_free_statement($stmt);
    oci_free_statement($cursor);
    oci_close($conn);

    return $tour;
}

function ActualizarTourModel($TOUR_ID, $NOMBRE_TOUR,$PROVEEDOR,$PROVINCIA,$TRANSPORTE, $FECHA,$ACTIVIDAD, $DIRECCION )

{
    $conn = conectar();
    $stmt = oci_parse($conn, "BEGIN actualizar_transporte(:pTOUR_ID, :pNOMBRE_TOUR,:pPROVEEDOR, :pPROVINCIA,:pTRANSPORTE :pFECHA, :pACTIVIDAD, 
    :pDIRECCION); END;");

    oci_bind_by_name($stmt, ':pTOUR_ID', $TOUR_ID);
    oci_bind_by_name($stmt, ':pNOMBRE_TOUR', $NOMBRE_TOUR, 255);
    oci_bind_by_name($stmt, ':pPROVEEDOR', $PROVEEDOR, 255);
    oci_bind_by_name($stmt, ':pPROVINCIA', $PROVINCIA, 255);
    oci_bind_by_name($stmt, ':pTRANSPORTE', $TRANSPORTE, 255);
    oci_bind_by_name($stmt, ':pFECHA', $FECHA, 255);
    oci_bind_by_name($stmt, ':pACTIVIDAD', $ACTIVIDAD, 255);
    oci_bind_by_name($stmt, ':pDIRECCION', $DIRECCION, 255);

    oci_execute($stmt);

    oci_free_statement($stmt);
    oci_close($conn);

}

function EliminarTourModel($TOUR_ID) {

    $conn = conectar();

    $stmt = oci_parse($conn, "BEGIN eliminar_tour(:pTOUR_ID); END;");
    oci_bind_by_name($stmt, ":pTOUR_ID", $TOUR_ID);
    oci_execute($stmt);
    oci_free_statement($stmt);
    oci_close($conn);
}

function CrearTourModel($nombre,$proveedor,$actividad,$direccion,$provincia, $transporte, $fecha) {
  
    $conn = conectar();

    $sql = "INSERT INTO TOUR (NOMBRE_TOUR, PROVEEDOR, ACTIVIDAD, DIRECCION, PROVINCIA, TRANSPORTE, FECHA)
        VALUES (:nombre, :proveedor, :actividad, :direccion, :provincia, :transporte, :fecha)";

    // Preparar la consulta SQL
    $stmt = oci_parse($conn, $sql);

    // Asignar los valores a los parámetros de la consulta
    oci_bind_by_name($stmt, ':nombre', $nombre);
    oci_bind_by_name($stmt, ':proveedor', $proveedor);
    oci_bind_by_name($stmt, ':actividad', $actividad);
    oci_bind_by_name($stmt, ':direccion', $direccion);
    oci_bind_by_name($stmt, ':provincia', $provincia);
    oci_bind_by_name($stmt, ':transporte', $transporte);
    oci_bind_by_name($stmt, ':fecha', $fecha);

    // Ejecutar la consulta
    if (oci_execute($stmt)) {
    echo "El tour ha sido agregado correctamente";
    } else {
    echo "Ha ocurrido un error al agregar el tour";
    }
    oci_close($conn);
}


function ConsultarToursCardsModel() {

    $conn = conectar();

    $query = "SELECT      
                TOUR_ID,
                TOUR.NOMBRE_TOUR,
                PROVINCIA.NOMBRE_PROVINCIA,
                TOUR.FECHA,
                ACTIVIDAD.NOMBRE_ACTIVIDAD,
                TOUR.IMAGENURL
              FROM TOUR
              INNER JOIN PROVINCIA ON TOUR.PROVINCIA = PROVINCIA.PROVINCIA_ID
              INNER JOIN ACTIVIDAD ON TOUR.ACTIVIDAD = ACTIVIDAD.ACTIVIDAD_ID";

    $result = oci_parse($conn, $query);
    oci_execute($result);

    $tours = array();
    while ($row = oci_fetch_assoc($result)) {
        $tours[] = $row;
    }

    oci_free_statement($result);
    oci_close($conn);

    return $tours;
    return $tours;

}
?>