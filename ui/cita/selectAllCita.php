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
			<h4 class="card-title">Consultar Cita</h4>
		</div>
		<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Descripcion 
						<?php if($order=="descripcion" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/cita/selectAllCita.php") ?>&order=descripcion&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' ></span></a>
						<?php } ?>
						<?php if($order=="descripcion" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/cita/selectAllCita.php") ?>&order=descripcion&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' ></span></a>
						<?php } ?>
						</th>
						<th nowrap>Fecha 
						<?php if($order=="fecha" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/cita/selectAllCita.php") ?>&order=fecha&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' ></span></a>
						<?php } ?>
						<?php if($order=="fecha" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/cita/selectAllCita.php") ?>&order=fecha&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' ></span></a>
						<?php } ?>
						</th>
						<th>Coordinador</th>
						<th>Acudiente Estudiante</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$cita = new Cita();
					if($order != "" && $dir != "") {
						$citas = $cita -> selectAllOrder($order, $dir);
					} else {
						$citas = $cita -> selectAll();
					}
					$counter = 1;
					foreach ($citas as $currentCita) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentCita -> getDescripcion() . "</td>";
						echo "<td>" . $currentCita -> getFecha() . "</td>";
						echo "<td><a href='modalCoordinador.php?idCoordinador=" . $currentCita -> getCoordinador() -> getIdCoordinador() . "' data-toggle='modal' data-target='#modalCita' >" . $currentCita -> getCoordinador() -> getDocumento() . " " . $currentCita -> getCoordinador() -> getNombre() . " " . $currentCita -> getCoordinador() -> getApellido() . " " . $currentCita -> getCoordinador() -> getTelefono() . " " . $currentCita -> getCoordinador() -> getEstado() . " " . $currentCita -> getCoordinador() -> getCorreo() . " " . $currentCita -> getCoordinador() -> getClave() . " " . $currentCita -> getCoordinador() -> getFoto() . " " . $currentCita -> getCoordinador() -> getFecha_nacimiento() . "</a></td>";
						echo "<td><a href='modalAcudienteEstudiante.php?idAcudienteEstudiante=" . $currentCita -> getAcudienteEstudiante() -> getIdAcudienteEstudiante() . "' data-toggle='modal' data-target='#modalCita' >" . $currentCita -> getAcudienteEstudiante() -> getFecha() . "</a></td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/cita/updateCita.php") . "&idCita=" . $currentCita -> getIdCita() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Cita' ></span></a> ";
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
<div class="modal fade" id="modalCita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
