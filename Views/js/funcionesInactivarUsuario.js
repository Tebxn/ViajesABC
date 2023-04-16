function InactivarUsuario()
{
      $(document).ready(function() {
    
        // Cuando se haga clic en el botón "inactivar"
        $('#inactivarBtn').click(function() {
            
            // Obtener el ID del usuario que se desea inactivar
            var idUsuario = $('#IdModal').val();
            
            // Realiza la petición AJAX para ejecutar la sentencia MySQL
            $.ajax({
                type: 'POST',
                url: '../Controllers/UsuariosController.php',
                data: {
                  'inactivarBtn': 'inactivarBtn',
                  'USUARIO_ID':idUsuario
                },
                success: function(respuesta) {
                    // Si la petición fue exitosa, cierra el modal y actualiza la página
                    $('#exampleModal').modal('hide');
                    window.location.reload();
                },
                error: function() {
                    // Si la petición falló, muestra un mensaje de error
                    alert('Error al inactivar el usuario.');
                }
            });
            
        });
        
    });
    
}