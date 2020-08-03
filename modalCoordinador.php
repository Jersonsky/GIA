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
$idCoordinador = $_GET ['idCoordinador'];
$coordinador = new Coordinador($idCoordinador);
$coordinador -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Coordinador</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Documento</th>
			<td><?php echo $coordinador -> getDocumento() ?></td>
		</tr>
		<tr>
			<th>Nombre</th>
			<td><?php echo $coordinador -> getNombre() ?></td>
		</tr>
		<tr>
			<th>Apellido</th>
			<td><?php echo $coordinador -> getApellido() ?></td>
		</tr>
		<tr>
			<th>Telefono</th>
			<td><?php echo $coordinador -> getTelefono() ?></td>
		</tr>
		<tr>
			<th>Estado</th>
			<td><?php echo ($coordinador -> getEstado()==1?"Verdadero":"Falso") ?> </td>
		</tr>
		<tr>
			<th>Correo</th>
			<td><?php echo $coordinador -> getCorreo() ?></td>
		</tr>
		<tr>
			<th>Foto</th>
			<td><?php echo $coordinador -> getFoto() ?></td>
		</tr>
		<tr>
			<th>Fecha_nacimiento</th>
			<td><?php echo $coordinador -> getFecha_nacimiento() ?></td>
		</tr>
		<tr>
			<th>Genero</th>
			<td><?php echo $coordinador -> getGenero() -> getDescripcion() ?></td>
		</tr>
	</table>
</div>
