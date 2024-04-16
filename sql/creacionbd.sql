USE user2daw_BD1-05;

--Tabla alumno
CREATE TABLE alumno (
    idAlumno tinyint unsigned NOT NULL, 
    nombre varchar(80) NOT NULL,
    correo varchar(255) NOT NULL,
    contrasenia varchar(100) NOT NULL,
    webReconocimiento varchar(50),
    CONSTRAINT pk_usuario PRIMARY KEY (idAlumno),
    CONSTRAINT correo_unico UNIQUE (correo),
    CONSTRAINT WEB_unica UNIQUE (webReconocimiento)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;