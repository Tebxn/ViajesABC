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

?>