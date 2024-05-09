-- USE user2daw_BD1-05;

--Tabla alumno
CREATE TABLE alumno (
    idAlumno tinyint unsigned NOT NULL AUTO_INCREMENT, 
    nombre varchar(80) NOT NULL,
    correo varchar(255) NOT NULL,
    contrasenia varchar(100) NOT NULL,
    webReconocimiento varchar(50),
    CONSTRAINT pk_usuario PRIMARY KEY (idAlumno),
    CONSTRAINT correo_unico UNIQUE (correo),
    CONSTRAINT WEB_unica UNIQUE (webReconocimiento)
); ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Tabla reconocimiento
CREATE TABLE reconocimiento (
    idReconocimiento smallint unsigned AUTO_INCREMENT,
    momento varchar(100) NOT NULL,
    descripcion varchar(255) NOT NULL,
    idAlumEnvia tinyint unsigned NOT NULL,
    idAlumRecibe tinyint unsigned NOT NULL,
	constraint pk_recon PRIMARY KEY (idReconocimiento),
    constraint fk_alumno_env FOREIGN KEY (idAlumEnvia) REFERENCES alumno(idAlumno),
    constraint fk_alumno_rec FOREIGN KEY (idAlumRecibe) REFERENCES alumno(idAlumno)
); ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;