<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Documento</th>
			<th nowrap>Nombre</th>
			<th nowrap>Apellido</th>
			<th nowrap>Telefono</th>
			<th nowrap>Estado</th>
			<th nowrap>Correo</th>
			<th nowrap>Foto</th>
			<th nowrap>Fecha_nacimiento</th>
			<th>Tipo Documento</th>
			<th>Genero</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$profesor = new Profesor();
		$profesors = $profesor -> search($_GET['search']);
		$counter = 1;
		foreach ($profesors as $currentProfesor) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentProfesor -> getDocumento()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentProfesor -> getNombre()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentProfesor -> getApellido()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentProfesor -> getTelefono()) . "</td>";
						echo "<td>" . ($currentProfesor -> getEstado()==1?"Verdadero":"Falso") . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentProfesor -> getCorreo()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentProfesor -> getFoto()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentProfesor -> getFecha_nacimiento()) . "</td>";
			echo "<td>" . $currentProfesor -> getTipoDocumento() -> getDescripcion() . "</td>";
			echo "<td>" . $currentProfesor -> getGenero() -> getDescripcion() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/profesor/updateProfesor.php") . "&idProfesor=" . $currentProfesor -> getIdProfesor() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Profesor' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/clase/selectAllClaseByProfesor.php") . "&idProfesor=" . $currentProfesor -> getIdProfesor() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Clase' ></span></a> ";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/clase/insertClase.php") . "&idProfesor=" . $currentProfesor -> getIdProfesor() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Clase' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/observador/selectAllObservadorByProfesor.php") . "&idProfesor=" . $currentProfesor -> getIdProfesor() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Observador' ></span></a> ";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/observador/insertObservador.php") . "&idProfesor=" . $currentProfesor -> getIdProfesor() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Observador' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
