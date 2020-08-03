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
$idAcudiente = $_GET ['idAcudiente'];
$acudiente = new Acudiente($idAcudiente);
$acudiente -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Acudiente</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Nombre</th>
			<td><?php echo $acudiente -> getNombre() ?></td>
		</tr>
		<tr>
			<th>Apellido</th>
			<td><?php echo $acudiente -> getApellido() ?></td>
		</tr>
		<tr>
			<th>Telefono</th>
			<td><?php echo $acudiente -> getTelefono() ?></td>
		</tr>
		<tr>
			<th>Estado</th>
			<td><?php echo ($acudiente -> getEstado()==1?"Verdadero":"Falso") ?> </td>
		</tr>
		<tr>
			<th>Correo</th>
			<td><?php echo $acudiente -> getCorreo() ?></td>
		</tr>
		<tr>
			<th>Foto</th>
			<td><?php echo $acudiente -> getFoto() ?></td>
		</tr>
		<tr>
			<th>Fecha_nacimiento</th>
			<td><?php echo $acudiente -> getFecha_nacimiento() ?></td>
		</tr>
		<tr>
			<th>Documento</th>
			<td><?php echo $acudiente -> getDocumento() ?></td>
		</tr>
		<tr>
			<th>Direccion</th>
			<td><?php echo $acudiente -> getDireccion() ?></td>
		</tr>
		<tr>
			<th>Tipo Documento</th>
			<td><?php echo $acudiente -> getTipoDocumento() -> getDescripcion() ?></td>
		</tr>
		<tr>
			<th>Genero</th>
			<td><?php echo $acudiente -> getGenero() -> getDescripcion() ?></td>
		</tr>
	</table>
</div>
