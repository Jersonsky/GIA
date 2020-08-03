<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Nombremateria</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$materia = new Materia();
		$materias = $materia -> search($_GET['search']);
		$counter = 1;
		foreach ($materias as $currentMateria) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentMateria -> getNombremateria()) . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/materia/updateMateria.php") . "&idMateria=" . $currentMateria -> getIdMateria() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Materia' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/clase/selectAllClaseByMateria.php") . "&idMateria=" . $currentMateria -> getIdMateria() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Clase' ></span></a> ";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/clase/insertClase.php") . "&idMateria=" . $currentMateria -> getIdMateria() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Clase' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
