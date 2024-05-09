--INSERCIÓN DE EJEMPLOS PARA LAS PRUEBAS EN LA BD

INSERT INTO alumno (nombre, correo, contrasenia, webReconocimiento) VALUES
('Juan Pérez', 'juan@gmail.com', 'juan123', 'www.juanperez.com'),
('María García', 'maria@gmail.com', 'maria123', 'miau'),
('Carlos López', 'carlos@gmail.com', 'carlos123', 'www.carloslopez.com'),
('Leandro Pan', 'leandro@gmail.com', 'leandro123', 'webleandrín'),
('Pedro Rodríguez', 'pedro@gmail.com', 'pedro123', 'www.pedrorodriguez.com'),
('Ana Sánchez', 'ana@gmail.com', 'ana123', 'www.anasanchez.com'),
('Antonio Figueroa', 'antonio@gmail.com', 'antonio123', 'webaaah');

INSERT INTO reconocimiento (momento, descripcion, idAlumEnvia, idAlumRecibe) VALUES
('2024-05-03', 'Excelente colaboración en el proyecto', 1, 2),
('2024-05-02', 'Gran idea para mejorar el producto', 2, 1),
('2024-05-01', 'Excelente capacidad para motivar al equipo', 3, 1),
('2024-04-30', 'Propuesta innovadora para resolver un problema', 4, 1),
('2024-04-29', 'Siempre cumple con sus tareas a tiempo', 5, 1),
('2024-04-28', 'Ayuda a sus compañeros sin dudarlo', 6, 1),
('2024-04-27', 'Clara y efectiva comunicación durante la reunión', 2, 3),
('2024-04-26', 'Siempre busca soluciones antes de que surjan problemas', 3, 2),
('2024-04-25', 'Se preocupa por el bienestar de sus compañeros', 4, 2),
('2024-04-24', 'Rápida resolución de un problema técnico complicado', 5, 2),
('2024-04-23', 'Adaptabilidad ante cambios inesperados en el proyecto', 6, 2);