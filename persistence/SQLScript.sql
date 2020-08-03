CREATE TABLE Administrador (
	idAdministrador int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	apellido varchar(45) NOT NULL,
	correo varchar(45) NOT NULL,
	clave varchar(45) NOT NULL,
	foto varchar(45) DEFAULT NULL,
	telefono varchar(45) DEFAULT NULL,
	celular varchar(45) DEFAULT NULL,
	estado tinyint DEFAULT NULL,
	PRIMARY KEY (idAdministrador)
);

INSERT INTO Administrador(idAdministrador, nombre, apellido, correo, clave, telefono, celular, estado) VALUES 
	('1', 'Admin', 'Admin', 'admin@udistrital.edu.co', md5('123'), '123', '123', '1'); 

CREATE TABLE LogAdministrador (
	idLogAdministrador int(11) NOT NULL AUTO_INCREMENT,
	accion varchar(45) NOT NULL,
	informacion text NOT NULL,
	fecha date NOT NULL,
	hora time NOT NULL,
	ip varchar(45) NOT NULL,
	so varchar(45) NOT NULL,
	explorador varchar(45) NOT NULL,
	administrador_idAdministrador int(11) NOT NULL,
	PRIMARY KEY (idLogAdministrador)
);

CREATE TABLE Materia (
	idMateria int(11) NOT NULL AUTO_INCREMENT,
	nombremateria varchar(45) NOT NULL,
	PRIMARY KEY (idMateria)
);

CREATE TABLE Genero (
	idGenero int(11) NOT NULL AUTO_INCREMENT,
	descripcion varchar(45) NOT NULL,
	PRIMARY KEY (idGenero)
);

CREATE TABLE Horario (
	idHorario int(11) NOT NULL AUTO_INCREMENT,
	dia varchar(45) NOT NULL,
	hora varchar(45) NOT NULL,
	clase_idClase int(11) NOT NULL,
	PRIMARY KEY (idHorario)
);

CREATE TABLE Sede (
	idSede int(11) NOT NULL AUTO_INCREMENT,
	nombresede varchar(45) NOT NULL,
	direccion varchar(45) NOT NULL,
	telefono varchar(45) NOT NULL,
	PRIMARY KEY (idSede)
);

CREATE TABLE Curso (
	idCurso int(11) NOT NULL AUTO_INCREMENT,
	nombrecurso varchar(45) NOT NULL,
	sede_idSede int(11) NOT NULL,
	PRIMARY KEY (idCurso)
);

CREATE TABLE Matricula (
	idMatricula int(11) NOT NULL AUTO_INCREMENT,
	fecha date NOT NULL,
	curso_idCurso int(11) NOT NULL,
	PRIMARY KEY (idMatricula)
);

CREATE TABLE Estado (
	idEstado int(11) NOT NULL AUTO_INCREMENT,
	descripcion varchar(45) NOT NULL,
	PRIMARY KEY (idEstado)
);

CREATE TABLE Acudiente (
	idAcudiente int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	apellido varchar(45) NOT NULL,
	telefono varchar(45) NOT NULL,
	estado tinyint NOT NULL,
	correo varchar(45) NOT NULL,
	clave varchar(45) NOT NULL,
	foto varchar(45) NOT NULL,
	fecha_nacimiento date NOT NULL,
	documento varchar(45) NOT NULL,
	direccion varchar(45) NOT NULL,
	tipoDocumento_idTipoDocumento int(11) NOT NULL,
	genero_idGenero int(11) NOT NULL,
	PRIMARY KEY (idAcudiente)
);

CREATE TABLE Estudiante (
	idEstudiante int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	apellido varchar(45) NOT NULL,
	telefono varchar(45) NOT NULL,
	correo varchar(45) NOT NULL,
	clave varchar(45) NOT NULL,
	foto varchar(45) NOT NULL,
	fecha_nacimiento date NOT NULL,
	documento varchar(45) NOT NULL,
	estado_idEstado int(11) NOT NULL,
	sede_idSede int(11) NOT NULL,
	tipoDocumento_idTipoDocumento int(11) NOT NULL,
	genero_idGenero int(11) NOT NULL,
	PRIMARY KEY (idEstudiante)
);

CREATE TABLE MatriculaEstudiante (
	idMatriculaEstudiante int(11) NOT NULL AUTO_INCREMENT,
	descripcion varchar(45) NOT NULL,
	matricula_idMatricula int(11) NOT NULL,
	estudiante_idEstudiante int(11) NOT NULL,
	PRIMARY KEY (idMatriculaEstudiante)
);

CREATE TABLE TipoDocumento (
	idTipoDocumento int(11) NOT NULL AUTO_INCREMENT,
	descripcion varchar(45) NOT NULL,
	PRIMARY KEY (idTipoDocumento)
);

CREATE TABLE Profesor (
	idProfesor int(11) NOT NULL AUTO_INCREMENT,
	documento varchar(45) NOT NULL,
	nombre varchar(45) NOT NULL,
	apellido varchar(45) NOT NULL,
	telefono varchar(45) NOT NULL,
	estado tinyint NOT NULL,
	correo varchar(45) NOT NULL,
	clave varchar(45) NOT NULL,
	foto varchar(45) NOT NULL,
	fecha_nacimiento date NOT NULL,
	tipoDocumento_idTipoDocumento int(11) NOT NULL,
	genero_idGenero int(11) NOT NULL,
	PRIMARY KEY (idProfesor)
);

CREATE TABLE Coordinador (
	idCoordinador int(11) NOT NULL AUTO_INCREMENT,
	documento varchar(45) NOT NULL,
	nombre varchar(45) NOT NULL,
	apellido varchar(45) NOT NULL,
	telefono varchar(45) NOT NULL,
	estado tinyint NOT NULL,
	correo varchar(45) NOT NULL,
	clave varchar(45) NOT NULL,
	foto varchar(45) NOT NULL,
	fecha_nacimiento date NOT NULL,
	genero_idGenero int(11) NOT NULL,
	PRIMARY KEY (idCoordinador)
);

CREATE TABLE Califica (
	idCalifica int(11) NOT NULL AUTO_INCREMENT,
	periodo_1 int NOT NULL,
	periodo_2 int NOT NULL,
	periodo_3 int NOT NULL,
	periodo_4 int NOT NULL,
	clase_idClase int(11) NOT NULL,
	estudiante_idEstudiante int(11) NOT NULL,
	PRIMARY KEY (idCalifica)
);

CREATE TABLE Cita (
	idCita int(11) NOT NULL AUTO_INCREMENT,
	descripcion varchar(45) NOT NULL,
	fecha date NOT NULL,
	coordinador_idCoordinador int(11) NOT NULL,
	acudienteEstudiante_idAcudienteEstudiante int(11) NOT NULL,
	PRIMARY KEY (idCita)
);

CREATE TABLE Clase (
	idClase int(11) NOT NULL AUTO_INCREMENT,
	descripcion varchar(45) NOT NULL,
	materia_idMateria int(11) NOT NULL,
	profesor_idProfesor int(11) NOT NULL,
	matricula_idMatricula int(11) NOT NULL,
	PRIMARY KEY (idClase)
);

CREATE TABLE Observador (
	idObservador int(11) NOT NULL AUTO_INCREMENT,
	descripcion varchar(45) NOT NULL,
	fecha date NOT NULL,
	profesor_idProfesor int(11) NOT NULL,
	coordinador_idCoordinador int(11) NOT NULL,
	matriculaEstudiante_idMatriculaEstudiante int(11) NOT NULL,
	PRIMARY KEY (idObservador)
);

CREATE TABLE AcudienteEstudiante (
	idAcudienteEstudiante int(11) NOT NULL AUTO_INCREMENT,
	fecha date NOT NULL,
	estudiante_idEstudiante int(11) NOT NULL,
	acudiente_idAcudiente int(11) NOT NULL,
	PRIMARY KEY (idAcudienteEstudiante)
);

ALTER TABLE LogAdministrador
 	ADD FOREIGN KEY (administrador_idAdministrador) REFERENCES Administrador (idAdministrador); 

ALTER TABLE Horario
 	ADD FOREIGN KEY (clase_idClase) REFERENCES Clase (idClase); 

ALTER TABLE Curso
 	ADD FOREIGN KEY (sede_idSede) REFERENCES Sede (idSede); 

ALTER TABLE Matricula
 	ADD FOREIGN KEY (curso_idCurso) REFERENCES Curso (idCurso); 

ALTER TABLE Acudiente
 	ADD FOREIGN KEY (tipodocumento_idTipoDocumento) REFERENCES TipoDocumento (idTipoDocumento); 

ALTER TABLE Acudiente
 	ADD FOREIGN KEY (genero_idGenero) REFERENCES Genero (idGenero); 

ALTER TABLE Estudiante
 	ADD FOREIGN KEY (estado_idEstado) REFERENCES Estado (idEstado); 

ALTER TABLE Estudiante
 	ADD FOREIGN KEY (sede_idSede) REFERENCES Sede (idSede); 

ALTER TABLE Estudiante
 	ADD FOREIGN KEY (tipodocumento_idTipoDocumento) REFERENCES TipoDocumento (idTipoDocumento); 

ALTER TABLE Estudiante
 	ADD FOREIGN KEY (genero_idGenero) REFERENCES Genero (idGenero); 

ALTER TABLE MatriculaEstudiante
 	ADD FOREIGN KEY (matricula_idMatricula) REFERENCES Matricula (idMatricula); 

ALTER TABLE MatriculaEstudiante
 	ADD FOREIGN KEY (estudiante_idEstudiante) REFERENCES Estudiante (idEstudiante); 

ALTER TABLE Profesor
 	ADD FOREIGN KEY (tipodocumento_idTipoDocumento) REFERENCES TipoDocumento (idTipoDocumento); 

ALTER TABLE Profesor
 	ADD FOREIGN KEY (genero_idGenero) REFERENCES Genero (idGenero); 

ALTER TABLE Coordinador
 	ADD FOREIGN KEY (genero_idGenero) REFERENCES Genero (idGenero); 

ALTER TABLE Califica
 	ADD FOREIGN KEY (clase_idClase) REFERENCES Clase (idClase); 

ALTER TABLE Califica
 	ADD FOREIGN KEY (estudiante_idEstudiante) REFERENCES Estudiante (idEstudiante); 

ALTER TABLE Cita
 	ADD FOREIGN KEY (coordinador_idCoordinador) REFERENCES Coordinador (idCoordinador); 

ALTER TABLE Cita
 	ADD FOREIGN KEY (acudienteestudiante_idAcudienteEstudiante) REFERENCES AcudienteEstudiante (idAcudienteEstudiante); 

ALTER TABLE Clase
 	ADD FOREIGN KEY (materia_idMateria) REFERENCES Materia (idMateria); 

ALTER TABLE Clase
 	ADD FOREIGN KEY (profesor_idProfesor) REFERENCES Profesor (idProfesor); 

ALTER TABLE Clase
 	ADD FOREIGN KEY (matricula_idMatricula) REFERENCES Matricula (idMatricula); 

ALTER TABLE Observador
 	ADD FOREIGN KEY (profesor_idProfesor) REFERENCES Profesor (idProfesor); 

ALTER TABLE Observador
 	ADD FOREIGN KEY (coordinador_idCoordinador) REFERENCES Coordinador (idCoordinador); 

ALTER TABLE Observador
 	ADD FOREIGN KEY (matriculaestudiante_idMatriculaEstudiante) REFERENCES MatriculaEstudiante (idMatriculaEstudiante); 

ALTER TABLE AcudienteEstudiante
 	ADD FOREIGN KEY (estudiante_idEstudiante) REFERENCES Estudiante (idEstudiante); 

ALTER TABLE AcudienteEstudiante
 	ADD FOREIGN KEY (acudiente_idAcudiente) REFERENCES Acudiente (idAcudiente); 

