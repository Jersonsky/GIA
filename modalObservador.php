<?php
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
require_once("persistence/Connection.php");
$idObservador = $_GET ['idObservador'];
$observador = new Observador($idObservador);
$observador -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Observador</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Descripcion</th>
			<td><?php echo $observador -> getDescripcion() ?></td>
		</tr>
		<tr>
			<th>Fecha</th>
			<td><?php echo $observador -> getFecha() ?></td>
		</tr>
		<tr>
			<th>Profesor</th>
			<td><?php echo $observador -> getProfesor() -> getDocumento() . " " . $observador -> getProfesor() -> getNombre() . " " . $observador -> getProfesor() -> getApellido() . " " . $observador -> getProfesor() -> getTelefono() . " " . $observador -> getProfesor() -> getEstado() . " " . $observador -> getProfesor() -> getCorreo() . " " . $observador -> getProfesor() -> getClave() . " " . $observador -> getProfesor() -> getFoto() . " " . $observador -> getProfesor() -> getFecha_nacimiento() ?></td>
		</tr>
		<tr>
			<th>Coordinador</th>
			<td><?php echo $observador -> getCoordinador() -> getDocumento() . " " . $observador -> getCoordinador() -> getNombre() . " " . $observador -> getCoordinador() -> getApellido() . " " . $observador -> getCoordinador() -> getTelefono() . " " . $observador -> getCoordinador() -> getEstado() . " " . $observador -> getCoordinador() -> getCorreo() . " " . $observador -> getCoordinador() -> getClave() . " " . $observador -> getCoordinador() -> getFoto() . " " . $observador -> getCoordinador() -> getFecha_nacimiento() ?></td>
		</tr>
		<tr>
			<th>Matricula Estudiante</th>
			<td><?php echo $observador -> getMatriculaEstudiante() -> getDescripcion() ?></td>
		</tr>
	</table>
</div>
