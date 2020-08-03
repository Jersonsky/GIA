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
$idHorario = $_GET ['idHorario'];
$horario = new Horario($idHorario);
$horario -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Horario</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Dia</th>
			<td><?php echo $horario -> getDia() ?></td>
		</tr>
		<tr>
			<th>Hora</th>
			<td><?php echo $horario -> getHora() ?></td>
		</tr>
		<tr>
			<th>Clase</th>
			<td><?php echo $horario -> getClase() -> getDescripcion() ?></td>
		</tr>
	</table>
</div>
