<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Nombrecurso</th>
			<th>Sede</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$curso = new Curso();
		$cursos = $curso -> search($_GET['search']);
		$counter = 1;
		foreach ($cursos as $currentCurso) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentCurso -> getNombrecurso()) . "</td>";
			echo "<td>" . $currentCurso -> getSede() -> getNombresede() . " " . $currentCurso -> getSede() -> getDireccion() . " " . $currentCurso -> getSede() -> getTelefono() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/curso/updateCurso.php") . "&idCurso=" . $currentCurso -> getIdCurso() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Curso' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/matricula/selectAllMatriculaByCurso.php") . "&idCurso=" . $currentCurso -> getIdCurso() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Matricula' ></span></a> ";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/matricula/insertMatricula.php") . "&idCurso=" . $currentCurso -> getIdCurso() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Matricula' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
