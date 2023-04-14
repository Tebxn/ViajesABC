<?php
include_once 'ConexionModel.php';

function ConsultarUsuariosModel() {

    $conn = conectar();

    $query = "SELECT USUARIO_ID, EMAIL, ESTADO, TIPO_USUARIO, NOMBRE FROM USUARIO";
    $result = oci_parse($conn, $query);
    oci_execute($result);

    $usuarios = array();
    while ($row = oci_fetch_assoc($result)) {
        $usuarios[] = $row;
    }

    oci_free_statement($result);
    oci_close($conn);

    return $usuarios;

}

?>