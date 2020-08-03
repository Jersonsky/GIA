<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$coordinador = new Coordinador($_GET['idCoordinador']); 
$coordinador -> select();
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Consultar Observador de Coordinador: <em><?php echo $coordinador -> getDocumento() . " " . $coordinador -> getNombre() . " " . $coordinador -> getApellido() . " " . $coordinador -> getTelefono() . " " . $coordinador -> getEstado() . " " . $coordinador -> getCorreo() . " " . $coordinador -> getClave() . " " . $coordinador -> getFoto() . " " . $coordinador -> getFecha_nacimiento() ?></em></h4>
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
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/observador/selectAllObservadorByCoordinador.php") ?>&idCoordinador=<?php echo $_GET['idCoordinador'] ?>&order=descripcion&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="descripcion" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/observador/selectAllObservadorByCoordinador.php") ?>&idCoordinador=<?php echo $_GET['idCoordinador'] ?>&order=descripcion&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Fecha 
						<?php if($order=="fecha" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/observador/selectAllObservadorByCoordinador.php") ?>&idCoordinador=<?php echo $_GET['idCoordinador'] ?>&order=fecha&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="fecha" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/observador/selectAllObservadorByCoordinador.php") ?>&idCoordinador=<?php echo $_GET['idCoordinador'] ?>&order=fecha&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th>Profesor</th>
						<th>Coordinador</th>
						<th>Matricula Estudiante</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$observador = new Observador("", "", "", "", $_GET['idCoordinador'], "");
					if($order!="" && $dir!="") {
						$observadors = $observador -> selectAllByCoordinadorOrder($order, $dir);
					} else {
						$observadors = $observador -> selectAllByCoordinador();
					}
					$counter = 1;
					foreach ($observadors as $currentObservador) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentObservador -> getDescripcion() . "</td>";
						echo "<td>" . $currentObservador -> getFecha() . "</td>";
						echo "<td><a href='modalProfesor.php?idProfesor=" . $currentObservador -> getProfesor() -> getIdProfesor() . "' data-toggle='modal' data-target='#modalObservador' >" . $currentObservador -> getProfesor() -> getDocumento() . " " . $currentObservador -> getProfesor() -> getNombre() . " " . $currentObservador -> getProfesor() -> getApellido() . " " . $currentObservador -> getProfesor() -> getTelefono() . " " . $currentObservador -> getProfesor() -> getEstado() . " " . $currentObservador -> getProfesor() -> getCorreo() . " " . $currentObservador -> getProfesor() -> getClave() . " " . $currentObservador -> getProfesor() -> getFoto() . " " . $currentObservador -> getProfesor() -> getFecha_nacimiento() . "</a></td>";
						echo "<td><a href='modalCoordinador.php?idCoordinador=" . $currentObservador -> getCoordinador() -> getIdCoordinador() . "' data-toggle='modal' data-target='#modalObservador' >" . $currentObservador -> getCoordinador() -> getDocumento() . " " . $currentObservador -> getCoordinador() -> getNombre() . " " . $currentObservador -> getCoordinador() -> getApellido() . " " . $currentObservador -> getCoordinador() -> getTelefono() . " " . $currentObservador -> getCoordinador() -> getEstado() . " " . $currentObservador -> getCoordinador() -> getCorreo() . " " . $currentObservador -> getCoordinador() -> getClave() . " " . $currentObservador -> getCoordinador() -> getFoto() . " " . $currentObservador -> getCoordinador() -> getFecha_nacimiento() . "</a></td>";
						echo "<td><a href='modalMatriculaEstudiante.php?idMatriculaEstudiante=" . $currentObservador -> getMatriculaEstudiante() -> getIdMatriculaEstudiante() . "' data-toggle='modal' data-target='#modalObservador' >" . $currentObservador -> getMatriculaEstudiante() -> getDescripcion() . "</a></td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/observador/updateObservador.php") . "&idObservador=" . $currentObservador -> getIdObservador() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Observador' ></span></a> ";
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
<div class="modal fade" id="modalObservador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
