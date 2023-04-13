<?php
    include_once '../Models/UsuariosModel.php';

function ConsultarUsuarios() //TODOS
{

$usuarios = ConsultarUsuariosModel();

foreach ($usuarios as $usuario){
    echo '<tr>';
        echo '<td>' . $usuario['EMAIL'] . '</td>';
        echo '<td>' . $usuario['ESTADO'] . '</td>';
        echo '<td>' . $usuario['TIPO_USUARIO'] . '</td>';
        echo '<td>' . $usuario['NOMBRE'] . '</td>';
        echo "<td><a href='../Views/actualizarProducto.php?q=" . $usuario['CONSECUTIVO'] . "'>Actualizar</a> | 
             <a href='' data-toggle='modal' data-target='#miModal' data-id=" . $usuario['CONSECUTIVO'] . ">Inhabilitar</a>
             </td>";
    echo '</tr>';
    }
}

?>