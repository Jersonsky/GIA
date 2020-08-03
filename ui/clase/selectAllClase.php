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
			<h4 class="card-title">Consultar Clase</h4>
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
							<a href='index.php?pid=<?php echo base64_encode("ui/clase/selectAllClase.php") ?>&order=descripcion&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' ></span></a>
						<?php } ?>
						<?php if($order=="descripcion" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/clase/selectAllClase.php") ?>&order=descripcion&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' ></span></a>
						<?php } ?>
						</th>
						<th>Materia</th>
						<th>Profesor</th>
						<th>Matricula</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$clase = new Clase();
					if($order != "" && $dir != "") {
						$clases = $clase -> selectAllOrder($order, $dir);
					} else {
						$clases = $clase -> selectAll();
					}
					$counter = 1;
					foreach ($clases as $currentClase) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentClase -> getDescripcion() . "</td>";
						echo "<td><a href='modalMateria.php?idMateria=" . $currentClase -> getMateria() -> getIdMateria() . "' data-toggle='modal' data-target='#modalClase' >" . $currentClase -> getMateria() -> getNombremateria() . "</a></td>";
						echo "<td><a href='modalProfesor.php?idProfesor=" . $currentClase -> getProfesor() -> getIdProfesor() . "' data-toggle='modal' data-target='#modalClase' >" . $currentClase -> getProfesor() -> getDocumento() . " " . $currentClase -> getProfesor() -> getNombre() . " " . $currentClase -> getProfesor() -> getApellido() . " " . $currentClase -> getProfesor() -> getTelefono() . " " . $currentClase -> getProfesor() -> getEstado() . " " . $currentClase -> getProfesor() -> getCorreo() . " " . $currentClase -> getProfesor() -> getClave() . " " . $currentClase -> getProfesor() -> getFoto() . " " . $currentClase -> getProfesor() -> getFecha_nacimiento() . "</a></td>";
						echo "<td><a href='modalMatricula.php?idMatricula=" . $currentClase -> getMatricula() -> getIdMatricula() . "' data-toggle='modal' data-target='#modalClase' >" . $currentClase -> getMatricula() -> getFecha() . "</a></td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/clase/updateClase.php") . "&idClase=" . $currentClase -> getIdClase() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Clase' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/horario/selectAllHorarioByClase.php") . "&idClase=" . $currentClase -> getIdClase() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Horario' ></span></a> ";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/horario/insertHorario.php") . "&idClase=" . $currentClase -> getIdClase() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Horario' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/califica/selectAllCalificaByClase.php") . "&idClase=" . $currentClase -> getIdClase() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Califica' ></span></a> ";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/califica/insertCalifica.php") . "&idClase=" . $currentClase -> getIdClase() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Califica' ></span></a> ";
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
<div class="modal fade" id="modalClase" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
