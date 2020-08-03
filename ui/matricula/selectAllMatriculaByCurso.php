<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$curso = new Curso($_GET['idCurso']); 
$curso -> select();
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Consultar Matricula de Curso: <em><?php echo $curso -> getNombrecurso() ?></em></h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Fecha 
						<?php if($order=="fecha" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/matricula/selectAllMatriculaByCurso.php") ?>&idCurso=<?php echo $_GET['idCurso'] ?>&order=fecha&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="fecha" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/matricula/selectAllMatriculaByCurso.php") ?>&idCurso=<?php echo $_GET['idCurso'] ?>&order=fecha&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th>Curso</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$matricula = new Matricula("", "", $_GET['idCurso']);
					if($order!="" && $dir!="") {
						$matriculas = $matricula -> selectAllByCursoOrder($order, $dir);
					} else {
						$matriculas = $matricula -> selectAllByCurso();
					}
					$counter = 1;
					foreach ($matriculas as $currentMatricula) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentMatricula -> getFecha() . "</td>";
						echo "<td><a href='modalCurso.php?idCurso=" . $currentMatricula -> getCurso() -> getIdCurso() . "' data-toggle='modal' data-target='#modalMatricula' >" . $currentMatricula -> getCurso() -> getNombrecurso() . "</a></td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/matricula/updateMatricula.php") . "&idMatricula=" . $currentMatricula -> getIdMatricula() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Matricula' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/clase/selectAllClaseByMatricula.php") . "&idMatricula=" . $currentMatricula -> getIdMatricula() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Clase' ></span></a> ";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/clase/insertClase.php") . "&idMatricula=" . $currentMatricula -> getIdMatricula() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Clase' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/matriculaEstudiante/selectAllMatriculaEstudianteByMatricula.php") . "&idMatricula=" . $currentMatricula -> getIdMatricula() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Matricula Estudiante' ></span></a> ";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/matriculaEstudiante/insertMatriculaEstudiante.php") . "&idMatricula=" . $currentMatricula -> getIdMatricula() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Matricula Estudiante' ></span></a> ";
						}
						echo "</td>";
						echo "</tr>";
						$counter++;
					};
					?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalMatricula" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>
<script>
	$('body').on('show.bs.modal', '.modal', function (e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>
