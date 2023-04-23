<?php
include_once 'ConexionModel.php';

function CrearReservaModel($usuario_id, $tour_id) {

    $conn = conectar();

    $stmt = oci_parse($conn, 'BEGIN INSERTAR_RESERVA(:pe_usuario_id,:pe_tour_id); END;');

    oci_bind_by_name($stmt, ':pe_usuario_id', $usuario_id);
    oci_bind_by_name($stmt, ':pe_tour_id', $tour_id);

    oci_execute($stmt);

    oci_free_statement($stmt);
    oci_close($conn);
}

function ConsultarReservasModel($usuario_id) {

    $conn = conectar();

    $query = "SELECT TOURS,
        TOUR.NOMBRE_TOUR,
        TOUR.FECHA
FROM RESERVA
INNER JOIN TOUR ON RESERVA.TOURS = TOUR.TOUR_ID
WHERE RESERVA.USUARIO = :p_usuario_id";

    $result = oci_parse($conn, $query);
    oci_bind_by_name($result, ":p_usuario_id", $usuario_id);
    oci_execute($result);

    $tours = array();
    while ($row = oci_fetch_assoc($result)) {
        $tours[] = $row;
    }

    oci_free_statement($result);
    oci_close($conn);

    return $tours;
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