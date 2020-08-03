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
			<th nowrap>Estado</th>
			<th nowrap>Correo</th>
			<th nowrap>Foto</th>
			<th nowrap>Fecha_nacimiento</th>
			<th nowrap>Documento</th>
			<th nowrap>Direccion</th>
			<th>Tipo Documento</th>
			<th>Genero</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$acudiente = new Acudiente();
		$acudientes = $acudiente -> search($_GET['search']);
		$counter = 1;
		foreach ($acudientes as $currentAcudiente) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentAcudiente -> getNombre()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentAcudiente -> getApellido()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentAcudiente -> getTelefono()) . "</td>";
						echo "<td>" . ($currentAcudiente -> getEstado()==1?"Verdadero":"Falso") . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentAcudiente -> getCorreo()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentAcudiente -> getFoto()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentAcudiente -> getFecha_nacimiento()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentAcudiente -> getDocumento()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentAcudiente -> getDireccion()) . "</td>";
			echo "<td>" . $currentAcudiente -> getTipoDocumento() -> getDescripcion() . "</td>";
			echo "<td>" . $currentAcudiente -> getGenero() -> getDescripcion() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/acudiente/updateAcudiente.php") . "&idAcudiente=" . $currentAcudiente -> getIdAcudiente() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Acudiente' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/acudienteEstudiante/selectAllAcudienteEstudianteByAcudiente.php") . "&idAcudiente=" . $currentAcudiente -> getIdAcudiente() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Acudiente Estudiante' ></span></a> ";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/acudienteEstudiante/insertAcudienteEstudiante.php") . "&idAcudiente=" . $currentAcudiente -> getIdAcudiente() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Acudiente Estudiante' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
