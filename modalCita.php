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
$idCita = $_GET ['idCita'];
$cita = new Cita($idCita);
$cita -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Cita</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Descripcion</th>
			<td><?php echo $cita -> getDescripcion() ?></td>
		</tr>
		<tr>
			<th>Fecha</th>
			<td><?php echo $cita -> getFecha() ?></td>
		</tr>
		<tr>
			<th>Coordinador</th>
			<td><?php echo $cita -> getCoordinador() -> getDocumento() . " " . $cita -> getCoordinador() -> getNombre() . " " . $cita -> getCoordinador() -> getApellido() . " " . $cita -> getCoordinador() -> getTelefono() . " " . $cita -> getCoordinador() -> getEstado() . " " . $cita -> getCoordinador() -> getCorreo() . " " . $cita -> getCoordinador() -> getClave() . " " . $cita -> getCoordinador() -> getFoto() . " " . $cita -> getCoordinador() -> getFecha_nacimiento() ?></td>
		</tr>
		<tr>
			<th>Acudiente Estudiante</th>
			<td><?php echo $cita -> getAcudienteEstudiante() -> getFecha() ?></td>
		</tr>
	</table>
</div>
