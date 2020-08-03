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
			<th>Curso</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$matricula = new Matricula();
		$matriculas = $matricula -> search($_GET['search']);
		$counter = 1;
		foreach ($matriculas as $currentMatricula) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentMatricula -> getFecha()) . "</td>";
			echo "<td>" . $currentMatricula -> getCurso() -> getNombrecurso() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/matricula/updateMatricula.php") . "&idMatricula=" . $currentMatricula -> getIdMatricula() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Matricula' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/clase/selectAllClaseByMatricula.php") . "&idMatricula=" . $currentMatricula -> getIdMatricula() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Clase' ></span></a> ";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/clase/insertClase.php") . "&idMatricula=" . $currentMatricula -> getIdMatricula() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Clase' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/matriculaEstudiante/selectAllMatriculaEstudianteByMatricula.php") . "&idMatricula=" . $currentMatricula -> getIdMatricula() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Matricula Estudiante' ></span></a> ";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/matriculaEstudiante/insertMatriculaEstudiante.php") . "&idMatricula=" . $currentMatricula -> getIdMatricula() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Matricula Estudiante' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
