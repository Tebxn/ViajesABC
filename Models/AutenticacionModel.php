<?php
    include_once 'ConexionModel.php';

    function iniciarSesionModel($email, $contrasena) {
        // Se establece la conexión a la base de datos
        $conn = conectar();
    
        // Se prepara la llamada al procedimiento almacenado
        $stmt = oci_parse($conn, 'BEGIN INICIAR_SESION(:pe_email, :pe_contrasena, :usuario_id, :p_nombre, :p_estado, :p_tipo_usuario, :p_resultado, :s_email); END;');
    
        // Se definen los parámetros de entrada y salida
        oci_bind_by_name($stmt, ':pe_email', $email);
        oci_bind_by_name($stmt, ':pe_contrasena', $contrasena);
        oci_bind_by_name($stmt, ':usuario_id', $usuario_id, 10);
        oci_bind_by_name($stmt, ':p_nombre', $nombre, 50);
        oci_bind_by_name($stmt, ':p_estado', $estado, 10);
        oci_bind_by_name($stmt, ':p_tipo_usuario', $tipoUsuario, 1);
        oci_bind_by_name($stmt, ':p_resultado', $resultado, 10);
        oci_bind_by_name($stmt, ':s_email', $s_email, 70);
    
        // Se ejecuta el procedimiento almacenado
        oci_execute($stmt);
    
        // Se liberan los recursos
        oci_free_statement($stmt);
        oci_close($conn);
    
        // Se devuelve el resultado del procedimiento almacenado
        if ($resultado == 1) {
            return array('usuario_id' => $usuario_id, 'nombre' => $nombre, 'estado' => $estado, 'tipoUsuario' => $tipoUsuario);
        } else {
            return null;
        }
    }
    
?>