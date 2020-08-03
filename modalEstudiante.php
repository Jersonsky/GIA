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
$idEstudiante = $_GET ['idEstudiante'];
$estudiante = new Estudiante($idEstudiante);
$estudiante -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Estudiante</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Nombre</th>
			<td><?php echo $estudiante -> getNombre() ?></td>
		</tr>
		<tr>
			<th>Apellido</th>
			<td><?php echo $estudiante -> getApellido() ?></td>
		</tr>
		<tr>
			<th>Telefono</th>
			<td><?php echo $estudiante -> getTelefono() ?></td>
		</tr>
		<tr>
			<th>Correo</th>
			<td><?php echo $estudiante -> getCorreo() ?></td>
		</tr>
		<tr>
			<th>Foto</th>
			<td><?php echo $estudiante -> getFoto() ?></td>
		</tr>
		<tr>
			<th>Fecha_nacimiento</th>
			<td><?php echo $estudiante -> getFecha_nacimiento() ?></td>
		</tr>
		<tr>
			<th>Documento</th>
			<td><?php echo $estudiante -> getDocumento() ?></td>
		</tr>
		<tr>
			<th>Estado</th>
			<td><?php echo $estudiante -> getEstado() -> getDescripcion() ?></td>
		</tr>
		<tr>
			<th>Sede</th>
			<td><?php echo $estudiante -> getSede() -> getNombresede() . " " . $estudiante -> getSede() -> getDireccion() . " " . $estudiante -> getSede() -> getTelefono() ?></td>
		</tr>
		<tr>
			<th>Tipo Documento</th>
			<td><?php echo $estudiante -> getTipoDocumento() -> getDescripcion() ?></td>
		</tr>
		<tr>
			<th>Genero</th>
			<td><?php echo $estudiante -> getGenero() -> getDescripcion() ?></td>
		</tr>
	</table>
</div>
