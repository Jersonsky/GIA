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
			<th>Coordinador</th>
			<th>Acudiente Estudiante</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$cita = new Cita();
		$citas = $cita -> search($_GET['search']);
		$counter = 1;
		foreach ($citas as $currentCita) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentCita -> getDescripcion()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentCita -> getFecha()) . "</td>";
			echo "<td>" . $currentCita -> getCoordinador() -> getDocumento() . " " . $currentCita -> getCoordinador() -> getNombre() . " " . $currentCita -> getCoordinador() -> getApellido() . " " . $currentCita -> getCoordinador() -> getTelefono() . " " . $currentCita -> getCoordinador() -> getEstado() . " " . $currentCita -> getCoordinador() -> getCorreo() . " " . $currentCita -> getCoordinador() -> getClave() . " " . $currentCita -> getCoordinador() -> getFoto() . " " . $currentCita -> getCoordinador() -> getFecha_nacimiento() . "</td>";
			echo "<td>" . $currentCita -> getAcudienteEstudiante() -> getFecha() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/cita/updateCita.php") . "&idCita=" . $currentCita -> getIdCita() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Cita' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
