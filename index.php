<?php 
session_start();
require("business/Administrador.php");
require("business/LogAdministrador.php");
require("business/Materia.php");
require("business/Genero.php");
require("business/Horario.php");
require("business/Sede.php");
require("business/Curso.php");
require("business/Matricula.php");
require("business/Estado.php");
require("business/Acudiente.php");
require("business/Estudiante.php");
require("business/MatriculaEstudiante.php");
require("business/TipoDocumento.php");
require("business/Profesor.php");
require("business/Coordinador.php");
require("business/Califica.php");
require("business/Cita.php");
require("business/Clase.php");
require("business/Observador.php");
require("business/AcudienteEstudiante.php");
ini_set("display_errors","1");
date_default_timezone_set("America/Bogota");
$webPagesNoAuthentication = array(
	'ui/recoverPassword.php',
);
$webPages = array(
    'ui/sessionAdministrador.php',
    'ui/acudiente/sesionAcudiente.php',
    'ui/estudiante/sesionEstudiante.php',
    'ui/profesor/sesionProfesor.php',
    'ui/coordinador/sesionCoordinador.php',
	'ui/sessionAdministrador.php',
	'ui/administrador/insertAdministrador.php',
	'ui/administrador/updateAdministrador.php',
	'ui/administrador/selectAllAdministrador.php',
	'ui/administrador/searchAdministrador.php',
	'ui/administrador/updateProfileAdministrador.php',
	'ui/administrador/updatePasswordAdministrador.php',
	'ui/administrador/updateProfilePictureAdministrador.php',
	'ui/administrador/updateFotoAdministrador.php',
	'ui/logAdministrador/searchLogAdministrador.php',
	'ui/materia/insertMateria.php',
	'ui/materia/updateMateria.php',
	'ui/materia/selectAllMateria.php',
	'ui/materia/searchMateria.php',
	'ui/clase/selectAllClaseByMateria.php',
	'ui/genero/insertGenero.php',
	'ui/genero/updateGenero.php',
	'ui/genero/selectAllGenero.php',
	'ui/genero/searchGenero.php',
	'ui/estudiante/selectAllEstudianteByGenero.php',
	'ui/profesor/selectAllProfesorByGenero.php',
	'ui/coordinador/selectAllCoordinadorByGenero.php',
	'ui/acudiente/selectAllAcudienteByGenero.php',
	'ui/horario/insertHorario.php',
	'ui/horario/updateHorario.php',
	'ui/horario/selectAllHorario.php',
	'ui/horario/searchHorario.php',
	'ui/sede/insertSede.php',
	'ui/sede/updateSede.php',
	'ui/sede/selectAllSede.php',
	'ui/sede/searchSede.php',
	'ui/curso/selectAllCursoBySede.php',
	'ui/estudiante/selectAllEstudianteBySede.php',
	'ui/curso/insertCurso.php',
	'ui/curso/updateCurso.php',
	'ui/curso/selectAllCurso.php',
	'ui/curso/searchCurso.php',
	'ui/matricula/selectAllMatriculaByCurso.php',
	'ui/matricula/insertMatricula.php',
	'ui/matricula/updateMatricula.php',
	'ui/matricula/selectAllMatricula.php',
	'ui/matricula/searchMatricula.php',
	'ui/clase/selectAllClaseByMatricula.php',
	'ui/matriculaEstudiante/selectAllMatriculaEstudianteByMatricula.php',
	'ui/estado/insertEstado.php',
	'ui/estado/updateEstado.php',
	'ui/estado/selectAllEstado.php',
	'ui/estado/searchEstado.php',
	'ui/estudiante/selectAllEstudianteByEstado.php',
	'ui/acudiente/insertAcudiente.php',
	'ui/acudiente/updateAcudiente.php',
	'ui/acudiente/selectAllAcudiente.php',
	'ui/acudiente/searchAcudiente.php',
	'ui/acudienteEstudiante/selectAllAcudienteEstudianteByAcudiente.php',
	'ui/estudiante/insertEstudiante.php',
	'ui/estudiante/updateEstudiante.php',
	'ui/estudiante/selectAllEstudiante.php',
	'ui/estudiante/searchEstudiante.php',
	'ui/califica/selectAllCalificaByEstudiante.php',
	'ui/matriculaEstudiante/selectAllMatriculaEstudianteByEstudiante.php',
	'ui/acudienteEstudiante/selectAllAcudienteEstudianteByEstudiante.php',
	'ui/matriculaEstudiante/insertMatriculaEstudiante.php',
	'ui/matriculaEstudiante/updateMatriculaEstudiante.php',
	'ui/matriculaEstudiante/selectAllMatriculaEstudiante.php',
	'ui/matriculaEstudiante/searchMatriculaEstudiante.php',
	'ui/observador/selectAllObservadorByMatriculaEstudiante.php',
	'ui/tipoDocumento/insertTipoDocumento.php',
	'ui/tipoDocumento/updateTipoDocumento.php',
	'ui/tipoDocumento/selectAllTipoDocumento.php',
	'ui/tipoDocumento/searchTipoDocumento.php',
	'ui/acudiente/selectAllAcudienteByTipoDocumento.php',
	'ui/estudiante/selectAllEstudianteByTipoDocumento.php',
	'ui/profesor/selectAllProfesorByTipoDocumento.php',
	'ui/profesor/insertProfesor.php',
	'ui/profesor/updateProfesor.php',
	'ui/profesor/selectAllProfesor.php',
	'ui/profesor/searchProfesor.php',
	'ui/clase/selectAllClaseByProfesor.php',
	'ui/observador/selectAllObservadorByProfesor.php',
	'ui/coordinador/insertCoordinador.php',
	'ui/coordinador/updateCoordinador.php',
	'ui/coordinador/selectAllCoordinador.php',
	'ui/coordinador/searchCoordinador.php',
	'ui/cita/selectAllCitaByCoordinador.php',
	'ui/observador/selectAllObservadorByCoordinador.php',
	'ui/califica/insertCalifica.php',
	'ui/califica/updateCalifica.php',
	'ui/califica/selectAllCalifica.php',
	'ui/califica/searchCalifica.php',
	'ui/cita/insertCita.php',
	'ui/cita/updateCita.php',
	'ui/cita/selectAllCita.php',
	'ui/cita/searchCita.php',
	'ui/clase/insertClase.php',
	'ui/clase/updateClase.php',
	'ui/clase/selectAllClase.php',
	'ui/clase/searchClase.php',
	'ui/horario/selectAllHorarioByClase.php',
	'ui/califica/selectAllCalificaByClase.php',
	'ui/observador/insertObservador.php',
	'ui/observador/updateObservador.php',
	'ui/observador/selectAllObservador.php',
	'ui/observador/searchObservador.php',
	'ui/acudienteEstudiante/insertAcudienteEstudiante.php',
	'ui/acudienteEstudiante/updateAcudienteEstudiante.php',
	'ui/acudienteEstudiante/selectAllAcudienteEstudiante.php',
	'ui/acudienteEstudiante/searchAcudienteEstudiante.php',
    'ui/acudiente/listaEstudiantes.php',
    'ui/acudiente/listaEstudiantesObs.php',
    'ui/profesor/cursosProfesor.php',
    'ui/califica/listadoNotas.php',
    'ui/observador/hacerObservacionProfesor.php',
    'ui/acudiente/listadoProfesorPorEstudiante.php',
    'ui/estudiante/verNotasEstudiante.php',
    'ui/estudiante/listadoProfesor.php',
    'ui/cita/verCitas.php',
);
if(isset($_GET['logOut'])){
	$_SESSION['id']="";
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>GIA</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" type="image/png" href="img/logo.png" />
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" />
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
		<script charset="utf-8">
			$(function () { 
				$("[data-toggle='tooltip']").tooltip(); 
			});
		</script>
		
		<link rel="stylesheet" href="assets/css/styles.css"> 

		<!--JQUERY-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
        <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        
        <!-- Los iconos tipo Solid de Fontawesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css"> 
    
        <!-- Nuestro css-->
<!--         <link rel="stylesheet" type="text/css" href="static/css/index.css" th:href="@{/css/index.css}">  -->
        
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        
	</head>
	<body>
		<?php
		if(empty($_GET['pid'])){
			include('ui/home.php' );
		}else{
			$pid=base64_decode($_GET['pid']);
			if(in_array($pid, $webPagesNoAuthentication)){
				include($pid);
			}else{
				if($_SESSION['id']==""){
					header("Location: index.php");
					die();
				}
				if($_SESSION['entity']=="Administrador"){
				    include('ui/menuAdministrador.php');
				}else if($_SESSION['entity']=="coordinador"){
				    include('ui/coordinador/menuCoordinador.php');
				}else if($_SESSION['entity']=="profesor"){
				    include('ui/profesor/menuProfesor.php');
				}else if($_SESSION['entity']=="estudiante"){
				    include('ui/estudiante/menuEstudiante.php');
				}else if($_SESSION['entity']=="acudiente"){
				    include('ui/acudiente/menuAcudiente.php');
				}
				if (in_array($pid, $webPages)){
				    include($pid);
				}else{
				    include('ui/error.php');
				}
			}
		}
		?>
		<div class="text-center text-muted">ITI &copy; <?php echo date("Y")?></div>
	</body>
</html>
