

CREATE TABLE carreras 
(id INT NOT NULL AUTO_INCREMENT,
ncarrera VARCHAR(45) NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE tsolicitudes 
(id INT NOT NULL AUTO_INCREMENT,
nsolicitud VARCHAR(45) NOT NULL,
PRIMARY KEY (id)
);

INSERT INTO carreras (id, ncarrera) VALUES
(1, 'Arquitectura'),
(2, 'Contador Publico'),
(3, 'Ingenieria Ambiental'),
(5, 'Ingenieria Bioquimica'),
(6, 'Ingenieria en Gestion Empresarial'),
(7, 'Ingenieria Industrial'),
(8, 'Ingenieria Informatica'),
(9, 'Ingenieria Mecatronica'),
(10, 'Ingenieria en Sistemas Computacionales'),
(11, 'Licenciatura en Administracion'),
(12, 'Maestria en Arquitectura Sostenible y Gestion Urbana'),
(13, 'Maestria en Sistemas Computacionales');

INSERT INTO tsolicitudes (id, nsolicitud) VALUES
(1, 'Alta de Materia'),
(2, 'Anulacion de Residencia'),
(3, 'Baja de Materia'),
(5, 'Baja Temporal'),
(6, 'Cambio de Carrera'),
(7, 'Prorroga de Semestre');