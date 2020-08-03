<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Fecha</th>
			<th>Estudiante</th>
			<th>Acudiente</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$acudienteEstudiante = new AcudienteEstudiante();
		$acudienteEstudiantes = $acudienteEstudiante -> search($_GET['search']);
		$counter = 1;
		foreach ($acudienteEstudiantes as $currentAcudienteEstudiante) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentAcudienteEstudiante -> getFecha()) . "</td>";
			echo "<td>" . $currentAcudienteEstudiante -> getEstudiante() -> getNombre() . " " . $currentAcudienteEstudiante -> getEstudiante() -> getApellido() . " " . $currentAcudienteEstudiante -> getEstudiante() -> getTelefono() . " " . $currentAcudienteEstudiante -> getEstudiante() -> getCorreo() . " " . $currentAcudienteEstudiante -> getEstudiante() -> getClave() . " " . $currentAcudienteEstudiante -> getEstudiante() -> getFoto() . " " . $currentAcudienteEstudiante -> getEstudiante() -> getFecha_nacimiento() . " " . $currentAcudienteEstudiante -> getEstudiante() -> getDocumento() . "</td>";
			echo "<td>" . $currentAcudienteEstudiante -> getAcudiente() -> getNombre() . " " . $currentAcudienteEstudiante -> getAcudiente() -> getApellido() . " " . $currentAcudienteEstudiante -> getAcudiente() -> getTelefono() . " " . $currentAcudienteEstudiante -> getAcudiente() -> getEstado() . " " . $currentAcudienteEstudiante -> getAcudiente() -> getCorreo() . " " . $currentAcudienteEstudiante -> getAcudiente() -> getClave() . " " . $currentAcudienteEstudiante -> getAcudiente() -> getFoto() . " " . $currentAcudienteEstudiante -> getAcudiente() -> getFecha_nacimiento() . " " . $currentAcudienteEstudiante -> getAcudiente() -> getDocumento() . " " . $currentAcudienteEstudiante -> getAcudiente() -> getDireccion() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/acudienteEstudiante/updateAcudienteEstudiante.php") . "&idAcudienteEstudiante=" . $currentAcudienteEstudiante -> getIdAcudienteEstudiante() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Acudiente Estudiante' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
