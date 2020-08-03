<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$sede = new Sede($_GET['idSede']); 
$sede -> select();
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Consultar Curso de Sede: <em><?php echo $sede -> getNombresede() . " " . $sede -> getDireccion() . " " . $sede -> getTelefono() ?></em></h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Nombrecurso 
						<?php if($order=="nombrecurso" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/curso/selectAllCursoBySede.php") ?>&idSede=<?php echo $_GET['idSede'] ?>&order=nombrecurso&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="nombrecurso" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/curso/selectAllCursoBySede.php") ?>&idSede=<?php echo $_GET['idSede'] ?>&order=nombrecurso&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th>Sede</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$curso = new Curso("", "", $_GET['idSede']);
					if($order!="" && $dir!="") {
						$cursos = $curso -> selectAllBySedeOrder($order, $dir);
					} else {
						$cursos = $curso -> selectAllBySede();
					}
					$counter = 1;
					foreach ($cursos as $currentCurso) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentCurso -> getNombrecurso() . "</td>";
						echo "<td><a href='modalSede.php?idSede=" . $currentCurso -> getSede() -> getIdSede() . "' data-toggle='modal' data-target='#modalCurso' >" . $currentCurso -> getSede() -> getNombresede() . " " . $currentCurso -> getSede() -> getDireccion() . " " . $currentCurso -> getSede() -> getTelefono() . "</a></td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/curso/updateCurso.php") . "&idCurso=" . $currentCurso -> getIdCurso() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Curso' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/matricula/selectAllMatriculaByCurso.php") . "&idCurso=" . $currentCurso -> getIdCurso() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Matricula' ></span></a> ";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/matricula/insertMatricula.php") . "&idCurso=" . $currentCurso -> getIdCurso() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Matricula' ></span></a> ";
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
<div class="modal fade" id="modalCurso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
