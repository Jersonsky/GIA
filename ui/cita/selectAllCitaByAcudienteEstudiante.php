<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$acudienteEstudiante = new AcudienteEstudiante($_GET['idAcudienteEstudiante']); 
$acudienteEstudiante -> select();
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Consultar Cita de Acudiente Estudiante: <em><?php echo $acudienteEstudiante -> getFecha() ?></em></h4>
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
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/cita/selectAllCitaByAcudienteEstudiante.php") ?>&idAcudienteEstudiante=<?php echo $_GET['idAcudienteEstudiante'] ?>&order=descripcion&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="descripcion" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/cita/selectAllCitaByAcudienteEstudiante.php") ?>&idAcudienteEstudiante=<?php echo $_GET['idAcudienteEstudiante'] ?>&order=descripcion&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Fecha 
						<?php if($order=="fecha" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/cita/selectAllCitaByAcudienteEstudiante.php") ?>&idAcudienteEstudiante=<?php echo $_GET['idAcudienteEstudiante'] ?>&order=fecha&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="fecha" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/cita/selectAllCitaByAcudienteEstudiante.php") ?>&idAcudienteEstudiante=<?php echo $_GET['idAcudienteEstudiante'] ?>&order=fecha&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th>Coordinador</th>
						<th>Acudiente Estudiante</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$cita = new Cita("", "", "", "", $_GET['idAcudienteEstudiante']);
					if($order!="" && $dir!="") {
						$citas = $cita -> selectAllByAcudienteEstudianteOrder($order, $dir);
					} else {
						$citas = $cita -> selectAllByAcudienteEstudiante();
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
					};
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
