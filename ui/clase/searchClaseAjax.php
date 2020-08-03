<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Descripcion</th>
			<th>Materia</th>
			<th>Profesor</th>
			<th>Matricula</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$clase = new Clase();
		$clases = $clase -> search($_GET['search']);
		$counter = 1;
		foreach ($clases as $currentClase) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentClase -> getDescripcion()) . "</td>";
			echo "<td>" . $currentClase -> getMateria() -> getNombremateria() . "</td>";
			echo "<td>" . $currentClase -> getProfesor() -> getDocumento() . " " . $currentClase -> getProfesor() -> getNombre() . " " . $currentClase -> getProfesor() -> getApellido() . " " . $currentClase -> getProfesor() -> getTelefono() . " " . $currentClase -> getProfesor() -> getEstado() . " " . $currentClase -> getProfesor() -> getCorreo() . " " . $currentClase -> getProfesor() -> getClave() . " " . $currentClase -> getProfesor() -> getFoto() . " " . $currentClase -> getProfesor() -> getFecha_nacimiento() . "</td>";
			echo "<td>" . $currentClase -> getMatricula() -> getFecha() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/clase/updateClase.php") . "&idClase=" . $currentClase -> getIdClase() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Clase' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/horario/selectAllHorarioByClase.php") . "&idClase=" . $currentClase -> getIdClase() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Horario' ></span></a> ";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/horario/insertHorario.php") . "&idClase=" . $currentClase -> getIdClase() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Horario' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/califica/selectAllCalificaByClase.php") . "&idClase=" . $currentClase -> getIdClase() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Califica' ></span></a> ";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/califica/insertCalifica.php") . "&idClase=" . $currentClase -> getIdClase() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Califica' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
