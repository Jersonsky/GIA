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
$idClase = $_GET ['idClase'];
$clase = new Clase($idClase);
$clase -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Clase</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Descripcion</th>
			<td><?php echo $clase -> getDescripcion() ?></td>
		</tr>
		<tr>
			<th>Materia</th>
			<td><?php echo $clase -> getMateria() -> getNombremateria() ?></td>
		</tr>
		<tr>
			<th>Profesor</th>
			<td><?php echo $clase -> getProfesor() -> getDocumento() . " " . $clase -> getProfesor() -> getNombre() . " " . $clase -> getProfesor() -> getApellido() . " " . $clase -> getProfesor() -> getTelefono() . " " . $clase -> getProfesor() -> getEstado() . " " . $clase -> getProfesor() -> getCorreo() . " " . $clase -> getProfesor() -> getClave() . " " . $clase -> getProfesor() -> getFoto() . " " . $clase -> getProfesor() -> getFecha_nacimiento() ?></td>
		</tr>
		<tr>
			<th>Matricula</th>
			<td><?php echo $clase -> getMatricula() -> getFecha() ?></td>
		</tr>
	</table>
</div>
