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
		$genero = new Genero();
		$generos = $genero -> search($_GET['search']);
		$counter = 1;
		foreach ($generos as $currentGenero) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentGenero -> getDescripcion()) . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/genero/updateGenero.php") . "&idGenero=" . $currentGenero -> getIdGenero() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Genero' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/estudiante/selectAllEstudianteByGenero.php") . "&idGenero=" . $currentGenero -> getIdGenero() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Estudiante' ></span></a> ";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/estudiante/insertEstudiante.php") . "&idGenero=" . $currentGenero -> getIdGenero() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Estudiante' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/profesor/selectAllProfesorByGenero.php") . "&idGenero=" . $currentGenero -> getIdGenero() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Profesor' ></span></a> ";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/profesor/insertProfesor.php") . "&idGenero=" . $currentGenero -> getIdGenero() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Profesor' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/coordinador/selectAllCoordinadorByGenero.php") . "&idGenero=" . $currentGenero -> getIdGenero() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Coordinador' ></span></a> ";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/coordinador/insertCoordinador.php") . "&idGenero=" . $currentGenero -> getIdGenero() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Coordinador' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/acudiente/selectAllAcudienteByGenero.php") . "&idGenero=" . $currentGenero -> getIdGenero() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Acudiente' ></span></a> ";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/acudiente/insertAcudiente.php") . "&idGenero=" . $currentGenero -> getIdGenero() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Acudiente' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
