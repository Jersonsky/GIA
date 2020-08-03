<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Periodo_1</th>
			<th nowrap>Periodo_2</th>
			<th nowrap>Periodo_3</th>
			<th nowrap>Periodo_4</th>
			<th>Clase</th>
			<th>Estudiante</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$califica = new Califica();
		$calificas = $califica -> search($_GET['search']);
		$counter = 1;
		foreach ($calificas as $currentCalifica) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentCalifica -> getPeriodo_1()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentCalifica -> getPeriodo_2()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentCalifica -> getPeriodo_3()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentCalifica -> getPeriodo_4()) . "</td>";
			echo "<td>" . $currentCalifica -> getClase() -> getDescripcion() . "</td>";
			echo "<td>" . $currentCalifica -> getEstudiante() -> getNombre() . " " . $currentCalifica -> getEstudiante() -> getApellido() . " " . $currentCalifica -> getEstudiante() -> getTelefono() . " " . $currentCalifica -> getEstudiante() -> getCorreo() . " " . $currentCalifica -> getEstudiante() -> getClave() . " " . $currentCalifica -> getEstudiante() -> getFoto() . " " . $currentCalifica -> getEstudiante() -> getFecha_nacimiento() . " " . $currentCalifica -> getEstudiante() -> getDocumento() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/califica/updateCalifica.php") . "&idCalifica=" . $currentCalifica -> getIdCalifica() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Califica' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
