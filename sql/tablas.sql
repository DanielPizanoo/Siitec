CREATE TABLE alumno
(id int NOT NULL,
num_control varchar(8) NOT NULL,
nombre varchar(30) NOT NULL,
ap_paterno varchar(30) NOT NULL,
ap_materno varchar(30) NOT NULL,
domicilio varchar(40) NOT NULL,
email varchar(30) NOT NULL,
fecha_nac DATE NOT NULL, 
semestre int(11) NOT NULL,
sexo char(1) NOT NULL,
telefono varchar(10) NOT NULL,
pass varchar(16) NOT NULL);

INSERT INTO alumno (num_control, nombre, ap_paterno, ap_materno, domicilio, email, fecha_nac, semestre, sexo, telefono, pass)
VALUES 
(14460667, 'Daniel', 'Hernandez', 'Pizano', 'Loma Bonita', '14460667@itcolima.edu.mx', 1996-06-17, 10, 'M', '3121031746', '1234'),
(14460683, 'Manuel', 'Vazquez Lara', 'Castellanos', 'Corregidora', '14460683@itcolima.edu.mx', 1996-01-23, 10, 'M', '3121031746', '1234');

CREATE TABLE director
(id int NULL,
nombre varchar(30) NOT NULL,
ap_paterno varchar(30) NOT NULL,
ap_materno varchar(30) NOT NULL,
email varchar(30) NOT NULL,
telefono varchar(10) NOT NULL,
pass varchar(16) NOT NULL);

INSERT INTO director (nombre, ap_paterno, ap_materno, email, telefono, pass)
VALUES 
('Ana Rosa', 'Braña', 'Castillo', 'direccion@itcolima.edu.mx', '3128492819', '1234');

CREATE TABLE jefatura
(id int NULL,
nombre varchar(30) NOT NULL,
ap_paterno varchar(30) NOT NULL,
ap_materno varchar(30) NOT NULL,
email varchar(30) NOT NULL,
telefono varchar(10) NOT NULL,
pass varchar(16) NOT NULL);

INSERT INTO jefatura (nombre, ap_paterno, ap_materno, email, telefono, pass)
VALUES 
('Jose Francisco', 'Brizuela', 'Ventura', 'division@itcolima.edu.mx', '3124859210', '1234');

CREATE TABLE maestros
(id int NULL,
nombre varchar(30) NOT NULL,
ap_paterno varchar(30) NOT NULL,
ap_materno varchar(30) NOT NULL,
email varchar(30) NOT NULL,
telefono varchar(10) NOT NULL,
pass varchar(16) NOT NULL);

INSERT INTO maestros (nombre, ap_paterno, ap_materno, email, telefono, pass)
VALUES 
('Ramona Evelia', 'Chavez', 'Valdez', 'echavez@itcolima.edu.mx', '3129502492', '1234');

CREATE TABLE solicitud
(idsolicitud int NULL,
suscribe varchar(50) not null,
semestre varchar(20) not null,
carrera varchar(35) not null,
num_control varchar(9) not null,
objetivo varchar(50) not null,
razon_acade varchar(80) not null,
razon_personal varchar(80) not null,
otro varchar(80) not null,
status varchar(11) not null,
firma bigint(20) not NULL);

CREATE TABLE carreras 
(id INT NOT NULL,
ncarrera VARCHAR(45) NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE tsolicitudes 
(id INT NOT NULL,
nsolicitud VARCHAR(45) NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE rdirector
(id INT NOT NULL,
autoriza VARCHAR(15) NOT NULL,
nombre VARCHAR(50) NOT NULL,
objetivo VARCHAR(45) NOT NULL);

CREATE TABLE rcomite 
(id INT NOT NULL,
fecha DATE NOT NULL,
suscribe VARCHAR(45) NOT NULL,
ncontrol VARCHAR(8) NOT NULL,
carrera VARCHAR(35) NOT NULL,
solicito VARCHAR(35) NOT NULL,
recomienda VARCHAR(80) NOT NULL,
motivos VARCHAR(80) NOT NULL);