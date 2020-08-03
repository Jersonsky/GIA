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
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$estado = new Estado();
		$estados = $estado -> search($_GET['search']);
		$counter = 1;
		foreach ($estados as $currentEstado) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentEstado -> getDescripcion()) . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/estado/updateEstado.php") . "&idEstado=" . $currentEstado -> getIdEstado() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Estado' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/estudiante/selectAllEstudianteByEstado.php") . "&idEstado=" . $currentEstado -> getIdEstado() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Estudiante' ></span></a> ";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/estudiante/insertEstudiante.php") . "&idEstado=" . $currentEstado -> getIdEstado() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Estudiante' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
