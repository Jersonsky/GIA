<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Nombre</th>
			<th nowrap>Apellido</th>
			<th nowrap>Telefono</th>
			<th nowrap>Correo</th>
			<th nowrap>Foto</th>
			<th nowrap>Fecha_nacimiento</th>
			<th nowrap>Documento</th>
			<th>Estado</th>
			<th>Sede</th>
			<th>Tipo Documento</th>
			<th>Genero</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$estudiante = new Estudiante();
		$estudiantes = $estudiante -> search($_GET['search']);
		$counter = 1;
		foreach ($estudiantes as $currentEstudiante) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentEstudiante -> getNombre()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentEstudiante -> getApellido()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentEstudiante -> getTelefono()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentEstudiante -> getCorreo()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentEstudiante -> getFoto()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentEstudiante -> getFecha_nacimiento()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentEstudiante -> getDocumento()) . "</td>";
			echo "<td>" . $currentEstudiante -> getEstado() -> getDescripcion() . "</td>";
			echo "<td>" . $currentEstudiante -> getSede() -> getNombresede() . " " . $currentEstudiante -> getSede() -> getDireccion() . " " . $currentEstudiante -> getSede() -> getTelefono() . "</td>";
			echo "<td>" . $currentEstudiante -> getTipoDocumento() -> getDescripcion() . "</td>";
			echo "<td>" . $currentEstudiante -> getGenero() -> getDescripcion() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/estudiante/updateEstudiante.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Estudiante' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/califica/selectAllCalificaByEstudiante.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Califica' ></span></a> ";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/califica/insertCalifica.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Califica' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/matriculaEstudiante/selectAllMatriculaEstudianteByEstudiante.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Matricula Estudiante' ></span></a> ";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/matriculaEstudiante/insertMatriculaEstudiante.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Matricula Estudiante' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/acudienteEstudiante/selectAllAcudienteEstudianteByEstudiante.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Acudiente Estudiante' ></span></a> ";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/acudienteEstudiante/insertAcudienteEstudiante.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Acudiente Estudiante' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
