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
$idAcudienteEstudiante = $_GET ['idAcudienteEstudiante'];
$acudienteEstudiante = new AcudienteEstudiante($idAcudienteEstudiante);
$acudienteEstudiante -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Acudiente Estudiante</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Fecha</th>
			<td><?php echo $acudienteEstudiante -> getFecha() ?></td>
		</tr>
		<tr>
			<th>Estudiante</th>
			<td><?php echo $acudienteEstudiante -> getEstudiante() -> getNombre() . " " . $acudienteEstudiante -> getEstudiante() -> getApellido() . " " . $acudienteEstudiante -> getEstudiante() -> getTelefono() . " " . $acudienteEstudiante -> getEstudiante() -> getCorreo() . " " . $acudienteEstudiante -> getEstudiante() -> getClave() . " " . $acudienteEstudiante -> getEstudiante() -> getFoto() . " " . $acudienteEstudiante -> getEstudiante() -> getFecha_nacimiento() . " " . $acudienteEstudiante -> getEstudiante() -> getDocumento() ?></td>
		</tr>
		<tr>
			<th>Acudiente</th>
			<td><?php echo $acudienteEstudiante -> getAcudiente() -> getNombre() . " " . $acudienteEstudiante -> getAcudiente() -> getApellido() . " " . $acudienteEstudiante -> getAcudiente() -> getTelefono() . " " . $acudienteEstudiante -> getAcudiente() -> getEstado() . " " . $acudienteEstudiante -> getAcudiente() -> getCorreo() . " " . $acudienteEstudiante -> getAcudiente() -> getClave() . " " . $acudienteEstudiante -> getAcudiente() -> getFoto() . " " . $acudienteEstudiante -> getAcudiente() -> getFecha_nacimiento() . " " . $acudienteEstudiante -> getAcudiente() -> getDocumento() . " " . $acudienteEstudiante -> getAcudiente() -> getDireccion() ?></td>
		</tr>
	</table>
</div>
