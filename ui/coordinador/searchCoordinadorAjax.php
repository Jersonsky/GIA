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
			<th>Genero</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$coordinador = new Coordinador();
		$coordinadors = $coordinador -> search($_GET['search']);
		$counter = 1;
		foreach ($coordinadors as $currentCoordinador) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentCoordinador -> getDocumento()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentCoordinador -> getNombre()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentCoordinador -> getApellido()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentCoordinador -> getTelefono()) . "</td>";
						echo "<td>" . ($currentCoordinador -> getEstado()==1?"Verdadero":"Falso") . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentCoordinador -> getCorreo()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentCoordinador -> getFoto()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentCoordinador -> getFecha_nacimiento()) . "</td>";
			echo "<td>" . $currentCoordinador -> getGenero() -> getDescripcion() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/coordinador/updateCoordinador.php") . "&idCoordinador=" . $currentCoordinador -> getIdCoordinador() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Coordinador' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/cita/selectAllCitaByCoordinador.php") . "&idCoordinador=" . $currentCoordinador -> getIdCoordinador() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Cita' ></span></a> ";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/cita/insertCita.php") . "&idCoordinador=" . $currentCoordinador -> getIdCoordinador() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Cita' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/observador/selectAllObservadorByCoordinador.php") . "&idCoordinador=" . $currentCoordinador -> getIdCoordinador() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Observador' ></span></a> ";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/observador/insertObservador.php") . "&idCoordinador=" . $currentCoordinador -> getIdCoordinador() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Observador' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
