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
$idProfesor = $_GET ['idProfesor'];
$profesor = new Profesor($idProfesor);
$profesor -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Profesor</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Documento</th>
			<td><?php echo $profesor -> getDocumento() ?></td>
		</tr>
		<tr>
			<th>Nombre</th>
			<td><?php echo $profesor -> getNombre() ?></td>
		</tr>
		<tr>
			<th>Apellido</th>
			<td><?php echo $profesor -> getApellido() ?></td>
		</tr>
		<tr>
			<th>Telefono</th>
			<td><?php echo $profesor -> getTelefono() ?></td>
		</tr>
		<tr>
			<th>Estado</th>
			<td><?php echo ($profesor -> getEstado()==1?"Verdadero":"Falso") ?> </td>
		</tr>
		<tr>
			<th>Correo</th>
			<td><?php echo $profesor -> getCorreo() ?></td>
		</tr>
		<tr>
			<th>Foto</th>
			<td><?php echo $profesor -> getFoto() ?></td>
		</tr>
		<tr>
			<th>Fecha_nacimiento</th>
			<td><?php echo $profesor -> getFecha_nacimiento() ?></td>
		</tr>
		<tr>
			<th>Tipo Documento</th>
			<td><?php echo $profesor -> getTipoDocumento() -> getDescripcion() ?></td>
		</tr>
		<tr>
			<th>Genero</th>
			<td><?php echo $profesor -> getGenero() -> getDescripcion() ?></td>
		</tr>
	</table>
</div>
