<?php
include_once 'ConexionModel.php';
include_once '../Controllers/UsuariosController.php';

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

function ConsultarUsuarioModel($USUARIO_ID) {

    $conn = conectar();

    $cursor = oci_new_cursor($conn);

    $stmt = oci_parse($conn, "BEGIN ConsultarUsuario(:pUSUARIO_ID, :pCursor); END;");
    oci_bind_by_name($stmt, ":pUSUARIO_ID", $USUARIO_ID);
    oci_bind_by_name($stmt, ":pCursor", $cursor, -1, OCI_B_CURSOR);
    oci_execute($stmt);
    oci_execute($cursor);


    $usuario = oci_fetch_array($cursor, OCI_ASSOC);


    oci_free_statement($stmt);
    oci_free_statement($cursor);
    oci_close($conn);

    return $usuario;

}


function CrearUsuarioModel($email, $contrasena, $nombre, $tipoUsuario) {
    // Se establece la conexión a la base de datos
    $conn = conectar();

    // Se prepara la llamada al procedimiento almacenado
    $stmt = oci_parse($conn, 'BEGIN INSERTAR_USUARIO(:pe_email, :pe_contrasena, :p_nombre, :p_tipo_usuario); END;');

    // Se definen los parámetros de entrada y salida
    oci_bind_by_name($stmt, ':pe_email', $email, 70);
    oci_bind_by_name($stmt, ':pe_contrasena', $contrasena, 30);
    oci_bind_by_name($stmt, ':p_nombre', $nombre, 255);
    oci_bind_by_name($stmt, ':p_tipo_usuario', $tipoUsuario, 1);

    // Se ejecuta el procedimiento almacenado
    oci_execute($stmt);

    // Se liberan los recursos
    oci_free_statement($stmt);
    oci_close($conn);
}

function ActualizarUsuarioModel($usuario_id, $nombre, $perfil, $contrasena)

{
    $conn = conectar();
    $stmt = oci_parse($conn, "BEGIN actualizar_usuario(:pUSUARIO_ID, :pNombre, :pPerfil, :pContrasena); END;");

    oci_bind_by_name($stmt, ':pUSUARIO_ID', $usuario_id);
    oci_bind_by_name($stmt, ':pNombre', $nombre, 255);
    oci_bind_by_name($stmt, ':pPerfil', $perfil, 1);
    oci_bind_by_name($stmt, ':pContrasena', $contrasena, 255);

    oci_execute($stmt);

    oci_free_statement($stmt);
    oci_close($conn);

}

?>