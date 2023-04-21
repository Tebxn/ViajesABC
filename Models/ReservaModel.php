<?php
include_once 'ConexionModel.php';

function CrearReservaModel($usuario_id, $tour_id) {
    // Se establece la conexión a la base de datos
    $conn = conectar();

    // Se prepara la llamada al procedimiento almacenado
    $stmt = oci_parse($conn, 'BEGIN INSERTAR_RESERVA(:pe_usuario_id,:pe_tour_id); END;');

    // Se definen los parámetros de entrada y salida
    oci_bind_by_name($stmt, ':pe_usuario_id', $usuario_id);
    oci_bind_by_name($stmt, ':pe_tour_id', $tour_id);


    // Se ejecuta el procedimiento almacenado
    oci_execute($stmt);

    // Se liberan los recursos
    oci_free_statement($stmt);
    oci_close($conn);
}

function ConsultarReservasModel($usuario_id) {

    $conn = conectar();

    $cursor = oci_new_cursor($conn);

    $stmt = oci_parse($conn, "BEGIN CONSULTAR_RESERVAS(:p_usuario_id, :p_Cursor); END;");
    oci_bind_by_name($stmt, ":p_usuario_id", $usuario_id);
    oci_bind_by_name($stmt, ":p_Cursor", $cursor, -1, OCI_B_CURSOR);
    oci_execute($stmt);
    oci_execute($cursor);

    $respuesta = oci_fetch_array($cursor, OCI_ASSOC);

    oci_free_statement($stmt);
    oci_free_statement($cursor);
    oci_close($conn);

    return $respuesta;
}

function EliminarReservaModel($usuario_id, $tour_id) {

    $conn = conectar();

    $stmt = oci_parse($conn, "BEGIN ELIMINAR_RESERVA(:p_usuario_id, :p_tour_id); END;");
    oci_bind_by_name($stmt, ":p_usuario_id", $usuario_id);
    oci_bind_by_name($stmt, ":p_tour_id", $tour_id);
    oci_execute($stmt);

    oci_free_statement($stmt);
    oci_close($conn);
}
?>