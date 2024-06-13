-- UPDATE usuarios SET imagen_perfil = '../img/administrador.png' WHERE id = 1;
-- UPDATE usuarios SET imagen_perfil = 'img/empleado_1.png' WHERE id IN (2, 3);


select * from usuarios u

CREATE TABLE empleados (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR (255),
    cargo VARCHAR(100),
    telefono VARCHAR(20),
    direccion TEXT,
    email VARCHAR(100),
    edad INT,
    sexo VARCHAR(10),
    estado_civil VARCHAR(20)
);

/*
INSERT INTO empleados (nombre, cargo, telefono, direccion, email, edad, sexo, estado_civil)
VALUES ('José Antonio Patiño Galicia', 'Veterinario', '4811018619', 'Av. Manuel C. Larraga #69 Col. Antonio J. Bermudez',
'antonio7@gmail.com', 21, 'Masculino', 'Soltero');
*/

ALTER TABLE empleados DROP COLUMN usuario_id;
ALTER TABLE usuarios DROP COLUMN empleado_id;

select * from empleados u 

DROP TABLE empleados;
/*
ALTER TABLE usuarios
DROP COLUMN nombre,
DROP COLUMN email;
*/

/*
ALTER TABLE usuarios
ADD COLUMN empleado_id INT,
ADD CONSTRAINT fk_empleado_id FOREIGN KEY (empleado_id) REFERENCES empleados(id);
*/

UPDATE usuarios
SET empleado_id = 1  -- Aquí colocas el ID del empleado al que deseas asociar el usuario
WHERE id = 1;  -- Aquí colocas el ID del usuario al que deseas asociar el empleado

select * from pacientes p 

select * from citas c 

INSERT INTO citas (id_paciente, fecha, hora, servicio, observaciones) 
VALUES 
(29, '2024-04-05', '10:00', 'Vacunación', 'Vacuna anual para perro'),
(30, '2024-04-07', '11:30', 'Control', 'Revisión de estado de salud de gato'),
(31, '2024-04-09', '15:45', 'Cirugía', 'Esterilización de perro'),
(20, '2024-04-12', '14:00', 'Desparasitación', 'Desparasitar gato'),
(15, '2024-04-15', '09:15', 'Consulta', 'Consulta general para perro'),
(28, '2024-04-18', '12:30', 'Vacunación', 'Vacuna de refuerzo para gato'),
(17, '2024-04-20', '16:00', 'Consulta', 'Consulta para perro con problemas de respiracion');

SELECT id FROM servicios WHERE nombre = "Desparasitación";