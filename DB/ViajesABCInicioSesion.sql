CREATE OR REPLACE PROCEDURE INICIAR_SESION(
    pe_email IN VARCHAR2,
    pe_contrasena IN VARCHAR2,
    p_consecutivo OUT NUMBER,
    p_nombre OUT VARCHAR2,
    p_estado OUT NUMBER,
    p_tipo_usuario OUT NUMBER,
    p_resultado OUT NUMBER
) AS
BEGIN
    SELECT CONSECUTIVO, NOMBRE, ESTADO, TIPO_USUARIO INTO p_consecutivo, p_nombre, p_estado, p_tipo_usuario
    FROM Usuario
    WHERE email = pe_email AND contrasena = pe_contrasena;
    
    IF SQL%FOUND AND p_estado = 1 THEN
        p_resultado := 1; -- Inicio de sesión exitoso
    ELSE
        p_resultado := 0; -- Inicio de sesión fallido
    END IF;
END;

insert into usuario(email, contrasena, estado, tipo_usuario, nombre) values ('easanrui@gmail.com', 'root', 1, 1, 'ESTEBAN ANDRES SANCHEZ RUIZ');

EXECUTE INICIAR_SESION('easanrui@gmail.com', 'root');