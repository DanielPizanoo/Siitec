SELECT idsolicitud, suscribe, num_control, semestre, carrera, objetivo 
FROM solicitud
WHERE semestre = 10;

SELECT idsolicitud, suscribe, num_control, semestre, carrera, objetivo 
FROM solicitud
WHERE carrera = 'Ingeniería Informática';

SELECT idsolicitud, suscribe, num_control, semestre, carrera, objetivo 
FROM solicitud
WHERE objetivo = 'Anulacion de Residencia';

SELECT idsolicitud, suscribe, num_control, semestre, carrera, objetivo 
FROM solicitud
WHERE semestre = 10 AND carrera = 'Ingeniería Informática';

SELECT idsolicitud, suscribe, num_control, semestre, carrera, objetivo 
FROM solicitud
WHERE semestre = 8 AND objetivo = 'Anulacion de Residencia';

SELECT idsolicitud, suscribe, num_control, semestre, carrera, objetivo 
FROM solicitud
WHERE carrera = 'Ingeniería Informática' AND objetivo = 'Anulacion de Residencia';



INSERT INTO solicitud (suscribe, semestre, carrera, num_control, objetivo, razon_acade, razon_personal, otro, status)
VALUES 
('Daniel Hernandez Pizano', '10', 'Ingenieria Informatica', '14460667', 'Alta de Materia', 'Completar mis materias', 'Acabar mas pronto la carrera', 'Ninguno', 'Aprobada'),
('Manuel Salvador', '10', 'Ingenieria Sistemas Computacionales', '14460683', 'Baja de Materia', 'Muchas materias', 'Demasiado para mi', 'Ninguno', 'Aprobada'),
('Alondra Diaz', '8', 'Ingenieria Informatica', '15460632', 'Baja Temporal', 'Viaje familiar', 'Familiar fallecido', 'Ninguno', 'Rechazada'),
('Laura Gutierrez', '8', 'Ingenieria Informatica', '15460652', 'Anulacion de Residencia', 'Cambio de empresa', 'Encontrar otra oportunidad', 'Ninguno', 'Aprobada'),
('Andrea Tovar', '6', 'Ingenieria Ambiental', '16460670', 'Cambio de Carrera', 'Interes por otra area', 'Conocimientos previos de otra carrera', 'Ninguno', 'Rechazada');