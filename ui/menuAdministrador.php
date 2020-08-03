<?php
$administrador = new Administrador($_SESSION['id']);
$administrador -> select();
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark" >
	<a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("ui/sessionAdministrador.php") ?>"><span class="fas fa-home" aria-hidden="true"></span></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"> <span class="navbar-toggler-icon"></span></button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Crear</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrador/insertAdministrador.php") ?>">Administrador</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/materia/insertMateria.php") ?>">Materia</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/genero/insertGenero.php") ?>">Genero</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/horario/insertHorario.php") ?>">Horario</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/sede/insertSede.php") ?>">Sede</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/curso/insertCurso.php") ?>">Curso</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/matricula/insertMatricula.php") ?>">Matricula</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/estado/insertEstado.php") ?>">Estado</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/acudiente/insertAcudiente.php") ?>">Acudiente</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/estudiante/insertEstudiante.php") ?>">Estudiante</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/profesor/insertProfesor.php") ?>">Profesor</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/coordinador/insertCoordinador.php") ?>">Coordinador</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/califica/insertCalifica.php") ?>">Califica</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/cita/insertCita.php") ?>">Cita</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/clase/insertClase.php") ?>">Clase</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/observador/insertObservador.php") ?>">Observador</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/acudienteEstudiante/insertAcudienteEstudiante.php") ?>">Acudiente Estudiante</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Consultar</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrador/selectAllAdministrador.php") ?>">Administrador</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/materia/selectAllMateria.php") ?>">Materia</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/genero/selectAllGenero.php") ?>">Genero</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/horario/selectAllHorario.php") ?>">Horario</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/sede/selectAllSede.php") ?>">Sede</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/curso/selectAllCurso.php") ?>">Curso</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/matricula/selectAllMatricula.php") ?>">Matricula</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/estado/selectAllEstado.php") ?>">Estado</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/acudiente/selectAllAcudiente.php") ?>">Acudiente</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudiante.php") ?>">Estudiante</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/profesor/selectAllProfesor.php") ?>">Profesor</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/coordinador/selectAllCoordinador.php") ?>">Coordinador</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/califica/selectAllCalifica.php") ?>">Califica</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/cita/selectAllCita.php") ?>">Cita</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/clase/selectAllClase.php") ?>">Clase</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/observador/selectAllObservador.php") ?>">Observador</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/acudienteEstudiante/selectAllAcudienteEstudiante.php") ?>">Acudiente Estudiante</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Buscar</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrador/searchAdministrador.php") ?>">Administrador</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/materia/searchMateria.php") ?>">Materia</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/genero/searchGenero.php") ?>">Genero</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/horario/searchHorario.php") ?>">Horario</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/sede/searchSede.php") ?>">Sede</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/curso/searchCurso.php") ?>">Curso</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/matricula/searchMatricula.php") ?>">Matricula</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/estado/searchEstado.php") ?>">Estado</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/acudiente/searchAcudiente.php") ?>">Acudiente</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/estudiante/searchEstudiante.php") ?>">Estudiante</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/profesor/searchProfesor.php") ?>">Profesor</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/coordinador/searchCoordinador.php") ?>">Coordinador</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/califica/searchCalifica.php") ?>">Califica</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/cita/searchCita.php") ?>">Cita</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/clase/searchClase.php") ?>">Clase</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/observador/searchObservador.php") ?>">Observador</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/acudienteEstudiante/searchAcudienteEstudiante.php") ?>">Acudiente Estudiante</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Log</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/logAdministrador/searchLogAdministrador.php") ?>">Log Administrador</a>
				</div>
			</li>
		</ul>
		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown">Administrador: <?php echo $administrador -> getNombre() . " " . $administrador -> getApellido() ?><span class="caret"></span></a>
				<div class="dropdown-menu" >
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrador/updateProfileAdministrador.php") ?>">Editar Perfil</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrador/updatePasswordAdministrador.php") ?>">Editar Clave</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrador/updateProfilePictureAdministrador.php") ?>">Editar Foto</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php?logOut=1">Salir</a>
			</li>
		</ul>
	</div>
</nav>
