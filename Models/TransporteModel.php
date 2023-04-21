<?php
include_once 'ConexionModel.php';

function ConsultarTransportesModel() {

    $conn = conectar();

    $query = "SELECT TRANSPORTE_ID, NOMBRE, EMAIL, TELEFONO FROM TRANSPORTE";
    $result = oci_parse($conn, $query);
    oci_execute($result);

    $transportes = array();
    while ($row = oci_fetch_assoc($result)) {
        $transportes[] = $row;
    }

    oci_free_statement($result);
    oci_close($conn);

    return $transportes;

}

function ConsultarTransporteModel($TRANSPORTE_ID) {

    $conn = conectar();

    $cursor = oci_new_cursor($conn);

    $stmt = oci_parse($conn, "BEGIN ConsultarTransporte(:pTRANSPORTE_ID, :pCursor); END;");
    oci_bind_by_name($stmt, ":pTRANSPORTE_ID", $TRANSPORTE_ID);
    oci_bind_by_name($stmt, ":pCursor", $cursor, -1, OCI_B_CURSOR);
    oci_execute($stmt);
    oci_execute($cursor);


    $transporte = oci_fetch_array($cursor, OCI_ASSOC);


    oci_free_statement($stmt);
    oci_free_statement($cursor);
    oci_close($conn);

    return $transporte;

}

function ActualizarTransporteModel($TRANSPORTE_ID, $NOMBRE, $EMAIL, $TELEFONO)

{
    $conn = conectar();
    $stmt = oci_parse($conn, "BEGIN actualizar_transporte(:pTRANSPORTE_ID, :pNOMBRE, :pEMAIL, :pTELEFONO); END;");

    oci_bind_by_name($stmt, ':pTRANSPORTE_ID', $TRANSPORTE_ID);
    oci_bind_by_name($stmt, ':pNOMBRE', $NOMBRE, 255);
    oci_bind_by_name($stmt, ':pEMAIL', $EMAIL, 255);
    oci_bind_by_name($stmt, ':pTELEFONO', $TELEFONO, 255);

    oci_execute($stmt);

    oci_free_statement($stmt);
    oci_close($conn);

}


?>