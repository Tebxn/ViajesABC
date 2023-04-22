<?php
include_once 'ConexionModel.php';

function ConsultarToursModel() {

    $conn = conectar();

    $query = "SELECT TOUR_ID, NOMBRE_TOUR, PROVEEDOR, PROVINCIA ,TRANSPORTE, FECHA_SALIDA, FECHA_LLEGADA
    DIRECCION FROM TOUR";

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



?>