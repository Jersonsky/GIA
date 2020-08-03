<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$clase = new Clase($_GET['idClase']); 
$clase -> select();
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Consultar Horario de Clase: <em><?php echo $clase -> getDescripcion() ?></em></h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Dia 
						<?php if($order=="dia" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/horario/selectAllHorarioByClase.php") ?>&idClase=<?php echo $_GET['idClase'] ?>&order=dia&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="dia" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/horario/selectAllHorarioByClase.php") ?>&idClase=<?php echo $_GET['idClase'] ?>&order=dia&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Hora 
						<?php if($order=="hora" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/horario/selectAllHorarioByClase.php") ?>&idClase=<?php echo $_GET['idClase'] ?>&order=hora&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="hora" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/horario/selectAllHorarioByClase.php") ?>&idClase=<?php echo $_GET['idClase'] ?>&order=hora&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th>Clase</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$horario = new Horario("", "", "", $_GET['idClase']);
					if($order!="" && $dir!="") {
						$horarios = $horario -> selectAllByClaseOrder($order, $dir);
					} else {
						$horarios = $horario -> selectAllByClase();
					}
					$counter = 1;
					foreach ($horarios as $currentHorario) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentHorario -> getDia() . "</td>";
						echo "<td>" . $currentHorario -> getHora() . "</td>";
						echo "<td><a href='modalClase.php?idClase=" . $currentHorario -> getClase() -> getIdClase() . "' data-toggle='modal' data-target='#modalHorario' >" . $currentHorario -> getClase() -> getDescripcion() . "</a></td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/horario/updateHorario.php") . "&idHorario=" . $currentHorario -> getIdHorario() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Horario' ></span></a> ";
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
<div class="modal fade" id="modalHorario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
