<?php


    function conectar_Oracle()
    {
        $conn = oci_connect('System', 'root', '//localhost/ViajesABC');
        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }else{
            echo 'Conexion exitosa';
        }

    }

    function conectar_Oracle2( $usuario, $pass, $cadenaConexion )
    {
        $conexion = null;
        try
        {
             $conexion = oci_connect($usuario,
                                                     $pass,
                                                     $cadenaConexion
                                                    ) or die ( "Error al conectar: ".oci_error() );
            if( $conexion == false )
                 throw new Exception( "Error Oracle ".oci_error() );
        }
        catch( Exception $e )
        {
             throw $e;
        }
        return $conexion;
    }


    function borrarPersona( $conexion, $id )
    {
        $sql = "DELETE FROM tbl_personas";
        // Si 'id' es diferente de 'null' sólo se borra la persona con el 'id' especificado:
        if( $id != null )
            $sql .= " WHERE id=".$id;
         $stmt = oci_parse($conexion, $sql); // Preparar la sentencia
         $ok = oci_execute( $stmt );         // Ejecutar la sentencia
         oci_free_statement($stmt);          // Liberar los recursos asociados a una sentencia o cursor
        return $ok;
    }

    function insertarPersona( $conexion, $id, $nombre )
    {
        $sql = "INSERT INTO tbl_personas VALUES (".$id.", '".$nombre."')";
         $stmt = oci_parse($conexion, $sql);      // Preparar la sentencia
         $ok   = oci_execute( $stmt );            // Ejecutar la sentencia
         oci_free_statement($stmt);               // Liberar los recursos asociados a una sentencia o cursor
        return $ok;
    }

    function modificarPersona( $conexion, $id, $nombre )
    {
        $sql = "UPDATE tbl_personas SET nombre='".$nombre."' WHERE id=".$id;
         $stmt = oci_parse($conexion, $sql);      // Preparar la sentencia
         $ok   = oci_execute( $stmt );            // Ejecutar la sentencia
         oci_free_statement($stmt);               // Liberar los recursos asociados a una sentencia o cursor
        return $ok;
    }



// function Open()
// {
//     $username= "system";
//     $password = "root";
//     $connection_string = "localhost/ViajesABC";


//     return oci_connect($username, $password, $connection_string)
// }

// function Close($conn)
// {
//     oci_close($conn);
// }


?>

