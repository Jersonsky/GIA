<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Consultar Califica</h4>
		</div>
		<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Periodo_1 
						<?php if($order=="periodo_1" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/califica/selectAllCalifica.php") ?>&order=periodo_1&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' ></span></a>
						<?php } ?>
						<?php if($order=="periodo_1" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/califica/selectAllCalifica.php") ?>&order=periodo_1&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' ></span></a>
						<?php } ?>
						</th>
						<th nowrap>Periodo_2 
						<?php if($order=="periodo_2" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/califica/selectAllCalifica.php") ?>&order=periodo_2&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' ></span></a>
						<?php } ?>
						<?php if($order=="periodo_2" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/califica/selectAllCalifica.php") ?>&order=periodo_2&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' ></span></a>
						<?php } ?>
						</th>
						<th nowrap>Periodo_3 
						<?php if($order=="periodo_3" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/califica/selectAllCalifica.php") ?>&order=periodo_3&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' ></span></a>
						<?php } ?>
						<?php if($order=="periodo_3" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/califica/selectAllCalifica.php") ?>&order=periodo_3&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' ></span></a>
						<?php } ?>
						</th>
						<th nowrap>Periodo_4 
						<?php if($order=="periodo_4" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/califica/selectAllCalifica.php") ?>&order=periodo_4&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' ></span></a>
						<?php } ?>
						<?php if($order=="periodo_4" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/califica/selectAllCalifica.php") ?>&order=periodo_4&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' ></span></a>
						<?php } ?>
						</th>
						<th>Clase</th>
						<th>Estudiante</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$califica = new Califica();
					if($order != "" && $dir != "") {
						$calificas = $califica -> selectAllOrder($order, $dir);
					} else {
						$calificas = $califica -> selectAll();
					}
					$counter = 1;
					foreach ($calificas as $currentCalifica) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentCalifica -> getPeriodo_1() . "</td>";
						echo "<td>" . $currentCalifica -> getPeriodo_2() . "</td>";
						echo "<td>" . $currentCalifica -> getPeriodo_3() . "</td>";
						echo "<td>" . $currentCalifica -> getPeriodo_4() . "</td>";
						echo "<td><a href='modalClase.php?idClase=" . $currentCalifica -> getClase() -> getIdClase() . "' data-toggle='modal' data-target='#modalCalifica' >" . $currentCalifica -> getClase() -> getDescripcion() . "</a></td>";
						echo "<td><a href='modalEstudiante.php?idEstudiante=" . $currentCalifica -> getEstudiante() -> getIdEstudiante() . "' data-toggle='modal' data-target='#modalCalifica' >" . $currentCalifica -> getEstudiante() -> getNombre() . " " . $currentCalifica -> getEstudiante() -> getApellido() . " " . $currentCalifica -> getEstudiante() -> getTelefono() . " " . $currentCalifica -> getEstudiante() -> getCorreo() . " " . $currentCalifica -> getEstudiante() -> getClave() . " " . $currentCalifica -> getEstudiante() -> getFoto() . " " . $currentCalifica -> getEstudiante() -> getFecha_nacimiento() . " " . $currentCalifica -> getEstudiante() -> getDocumento() . "</a></td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrador') {
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
		</div>
	</div>
</div>
<div class="modal fade" id="modalCalifica" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
