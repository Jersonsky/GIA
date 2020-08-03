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
$idCalifica = $_GET ['idCalifica'];
$califica = new Califica($idCalifica);
$califica -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Califica</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Periodo_1</th>
			<td><?php echo $califica -> getPeriodo_1() ?></td>
		</tr>
		<tr>
			<th>Periodo_2</th>
			<td><?php echo $califica -> getPeriodo_2() ?></td>
		</tr>
		<tr>
			<th>Periodo_3</th>
			<td><?php echo $califica -> getPeriodo_3() ?></td>
		</tr>
		<tr>
			<th>Periodo_4</th>
			<td><?php echo $califica -> getPeriodo_4() ?></td>
		</tr>
		<tr>
			<th>Clase</th>
			<td><?php echo $califica -> getClase() -> getDescripcion() ?></td>
		</tr>
		<tr>
			<th>Estudiante</th>
			<td><?php echo $califica -> getEstudiante() -> getNombre() . " " . $califica -> getEstudiante() -> getApellido() . " " . $califica -> getEstudiante() -> getTelefono() . " " . $califica -> getEstudiante() -> getCorreo() . " " . $califica -> getEstudiante() -> getClave() . " " . $califica -> getEstudiante() -> getFoto() . " " . $califica -> getEstudiante() -> getFecha_nacimiento() . " " . $califica -> getEstudiante() -> getDocumento() ?></td>
		</tr>
	</table>
</div>
