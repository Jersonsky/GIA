<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$acudiente = new Acudiente($_GET['idAcudiente']); 
$acudiente -> select();
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Consultar Acudiente Estudiante de Acudiente: <em><?php echo $acudiente -> getNombre() . " " . $acudiente -> getApellido() . " " . $acudiente -> getTelefono() . " " . $acudiente -> getEstado() . " " . $acudiente -> getCorreo() . " " . $acudiente -> getClave() . " " . $acudiente -> getFoto() . " " . $acudiente -> getFecha_nacimiento() . " " . $acudiente -> getDocumento() . " " . $acudiente -> getDireccion() ?></em></h4>
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
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/acudienteEstudiante/selectAllAcudienteEstudianteByAcudiente.php") ?>&idAcudiente=<?php echo $_GET['idAcudiente'] ?>&order=fecha&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="fecha" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/acudienteEstudiante/selectAllAcudienteEstudianteByAcudiente.php") ?>&idAcudiente=<?php echo $_GET['idAcudiente'] ?>&order=fecha&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th>Estudiante</th>
						<th>Acudiente</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$acudienteEstudiante = new AcudienteEstudiante("", "", "", $_GET['idAcudiente']);
					if($order!="" && $dir!="") {
						$acudienteEstudiantes = $acudienteEstudiante -> selectAllByAcudienteOrder($order, $dir);
					} else {
						$acudienteEstudiantes = $acudienteEstudiante -> selectAllByAcudiente();
					}
					$counter = 1;
					foreach ($acudienteEstudiantes as $currentAcudienteEstudiante) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentAcudienteEstudiante -> getFecha() . "</td>";
						echo "<td><a href='modalEstudiante.php?idEstudiante=" . $currentAcudienteEstudiante -> getEstudiante() -> getIdEstudiante() . "' data-toggle='modal' data-target='#modalAcudienteEstudiante' >" . $currentAcudienteEstudiante -> getEstudiante() -> getNombre() . " " . $currentAcudienteEstudiante -> getEstudiante() -> getApellido() . " " . $currentAcudienteEstudiante -> getEstudiante() -> getTelefono() . " " . $currentAcudienteEstudiante -> getEstudiante() -> getCorreo() . " " . $currentAcudienteEstudiante -> getEstudiante() -> getClave() . " " . $currentAcudienteEstudiante -> getEstudiante() -> getFoto() . " " . $currentAcudienteEstudiante -> getEstudiante() -> getFecha_nacimiento() . " " . $currentAcudienteEstudiante -> getEstudiante() -> getDocumento() . "</a></td>";
						echo "<td><a href='modalAcudiente.php?idAcudiente=" . $currentAcudienteEstudiante -> getAcudiente() -> getIdAcudiente() . "' data-toggle='modal' data-target='#modalAcudienteEstudiante' >" . $currentAcudienteEstudiante -> getAcudiente() -> getNombre() . " " . $currentAcudienteEstudiante -> getAcudiente() -> getApellido() . " " . $currentAcudienteEstudiante -> getAcudiente() -> getTelefono() . " " . $currentAcudienteEstudiante -> getAcudiente() -> getEstado() . " " . $currentAcudienteEstudiante -> getAcudiente() -> getCorreo() . " " . $currentAcudienteEstudiante -> getAcudiente() -> getClave() . " " . $currentAcudienteEstudiante -> getAcudiente() -> getFoto() . " " . $currentAcudienteEstudiante -> getAcudiente() -> getFecha_nacimiento() . " " . $currentAcudienteEstudiante -> getAcudiente() -> getDocumento() . " " . $currentAcudienteEstudiante -> getAcudiente() -> getDireccion() . "</a></td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/acudienteEstudiante/updateAcudienteEstudiante.php") . "&idAcudienteEstudiante=" . $currentAcudienteEstudiante -> getIdAcudienteEstudiante() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Acudiente Estudiante' ></span></a> ";
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
<div class="modal fade" id="modalAcudienteEstudiante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
