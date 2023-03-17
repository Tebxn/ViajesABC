<?php

function conectar() {
    $usuario = 'System';
    $password = 'root';
    $baseDatos = '//localhost/XE';

    $conn = oci_connect($usuario, $password, $baseDatos);
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
    return $conn;
}

function desconectar($conn) {
    oci_close($conn);
}

function insertar_persona($nombre, $edad) {
    $conn = conectar();
    $sql = "INSERT INTO persona (nombre, edad) VALUES (:nombre, :edad)";
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ":nombre", $nombre);
    oci_bind_by_name($stmt, ":edad", $edad);
    oci_execute($stmt);
    oci_commit($conn);
    oci_free_statement($stmt);
    desconectar($conn);
}

?>

