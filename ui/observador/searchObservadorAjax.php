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
			<th nowrap>Fecha</th>
			<th>Profesor</th>
			<th>Coordinador</th>
			<th>Matricula Estudiante</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$observador = new Observador();
		$observadors = $observador -> search($_GET['search']);
		$counter = 1;
		foreach ($observadors as $currentObservador) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentObservador -> getDescripcion()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentObservador -> getFecha()) . "</td>";
			echo "<td>" . $currentObservador -> getProfesor() -> getDocumento() . " " . $currentObservador -> getProfesor() -> getNombre() . " " . $currentObservador -> getProfesor() -> getApellido() . " " . $currentObservador -> getProfesor() -> getTelefono() . " " . $currentObservador -> getProfesor() -> getEstado() . " " . $currentObservador -> getProfesor() -> getCorreo() . " " . $currentObservador -> getProfesor() -> getClave() . " " . $currentObservador -> getProfesor() -> getFoto() . " " . $currentObservador -> getProfesor() -> getFecha_nacimiento() . "</td>";
			echo "<td>" . $currentObservador -> getCoordinador() -> getDocumento() . " " . $currentObservador -> getCoordinador() -> getNombre() . " " . $currentObservador -> getCoordinador() -> getApellido() . " " . $currentObservador -> getCoordinador() -> getTelefono() . " " . $currentObservador -> getCoordinador() -> getEstado() . " " . $currentObservador -> getCoordinador() -> getCorreo() . " " . $currentObservador -> getCoordinador() -> getClave() . " " . $currentObservador -> getCoordinador() -> getFoto() . " " . $currentObservador -> getCoordinador() -> getFecha_nacimiento() . "</td>";
			echo "<td>" . $currentObservador -> getMatriculaEstudiante() -> getDescripcion() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/observador/updateObservador.php") . "&idObservador=" . $currentObservador -> getIdObservador() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Observador' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
