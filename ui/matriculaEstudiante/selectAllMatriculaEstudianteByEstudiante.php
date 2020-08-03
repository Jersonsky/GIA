<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$estudiante = new Estudiante($_GET['idEstudiante']); 
$estudiante -> select();
$error = 0;
if(!empty($_GET['action']) && $_GET['action']=="delete"){
	$deleteMatriculaEstudiante = new MatriculaEstudiante($_GET['idMatriculaEstudiante']);
	$deleteMatriculaEstudiante -> select();
	if($deleteMatriculaEstudiante -> delete()){
		$nameMatricula = $deleteMatriculaEstudiante -> getMatricula() -> getFecha();
		$nameEstudiante = $deleteMatriculaEstudiante -> getEstudiante() -> getNombre() . " " . $deleteMatriculaEstudiante -> getEstudiante() -> getApellido() . " " . $deleteMatriculaEstudiante -> getEstudiante() -> getTelefono() . " " . $deleteMatriculaEstudiante -> getEstudiante() -> getCorreo() . " " . $deleteMatriculaEstudiante -> getEstudiante() -> getClave() . " " . $deleteMatriculaEstudiante -> getEstudiante() -> getFoto() . " " . $deleteMatriculaEstudiante -> getEstudiante() -> getFecha_nacimiento() . " " . $deleteMatriculaEstudiante -> getEstudiante() -> getDocumento();
		$user_ip = getenv('REMOTE_ADDR');
		$agent = $_SERVER["HTTP_USER_AGENT"];
		$browser = "-";
		if( preg_match('/MSIE (\d+\.\d+);/', $agent) ) {
			$browser = "Internet Explorer";
		} else if (preg_match('/Chrome[\/\s](\d+\.\d+)/', $agent) ) {
			$browser = "Chrome";
		} else if (preg_match('/Edge\/\d+/', $agent) ) {
			$browser = "Edge";
		} else if ( preg_match('/Firefox[\/\s](\d+\.\d+)/', $agent) ) {
			$browser = "Firefox";
		} else if ( preg_match('/OPR[\/\s](\d+\.\d+)/', $agent) ) {
			$browser = "Opera";
		} else if (preg_match('/Safari[\/\s](\d+\.\d+)/', $agent) ) {
			$browser = "Safari";
		}
		if($_SESSION['entity'] == 'Administrador'){
			$logAdministrador = new LogAdministrador("","Delete Matricula Estudiante", "Descripcion: " . $deleteMatriculaEstudiante -> getDescripcion() . ";; Matricula: " . $nameMatricula . ";; Estudiante: " . $nameEstudiante, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
			$logAdministrador -> insert();
		}
	}else{
		$error = 1;
	}
}
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Consultar Matricula Estudiante de Estudiante: <em><?php echo $estudiante -> getNombre() . " " . $estudiante -> getApellido() . " " . $estudiante -> getTelefono() . " " . $estudiante -> getCorreo() . " " . $estudiante -> getClave() . " " . $estudiante -> getFoto() . " " . $estudiante -> getFecha_nacimiento() . " " . $estudiante -> getDocumento() ?></em></h4>
		</div>
		<div class="card-body">
		<?php if(isset($_GET['action']) && $_GET['action']=="delete"){ ?>
			<?php if($error == 0){ ?>
				<div class="alert alert-success" >The registry was succesfully deleted.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php } else { ?>
				<div class="alert alert-danger" >The registry was not deleted. Check it does not have related information
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php }
			} ?>
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Descripcion 
						<?php if($order=="descripcion" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/matriculaEstudiante/selectAllMatriculaEstudianteByEstudiante.php") ?>&idEstudiante=<?php echo $_GET['idEstudiante'] ?>&order=descripcion&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="descripcion" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/matriculaEstudiante/selectAllMatriculaEstudianteByEstudiante.php") ?>&idEstudiante=<?php echo $_GET['idEstudiante'] ?>&order=descripcion&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th>Matricula</th>
						<th>Estudiante</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$matriculaEstudiante = new MatriculaEstudiante("", "", "", $_GET['idEstudiante']);
					if($order!="" && $dir!="") {
						$matriculaEstudiantes = $matriculaEstudiante -> selectAllByEstudianteOrder($order, $dir);
					} else {
						$matriculaEstudiantes = $matriculaEstudiante -> selectAllByEstudiante();
					}
					$counter = 1;
					foreach ($matriculaEstudiantes as $currentMatriculaEstudiante) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentMatriculaEstudiante -> getDescripcion() . "</td>";
						echo "<td><a href='modalMatricula.php?idMatricula=" . $currentMatriculaEstudiante -> getMatricula() -> getIdMatricula() . "' data-toggle='modal' data-target='#modalMatriculaEstudiante' >" . $currentMatriculaEstudiante -> getMatricula() -> getFecha() . "</a></td>";
						echo "<td><a href='modalEstudiante.php?idEstudiante=" . $currentMatriculaEstudiante -> getEstudiante() -> getIdEstudiante() . "' data-toggle='modal' data-target='#modalMatriculaEstudiante' >" . $currentMatriculaEstudiante -> getEstudiante() -> getNombre() . " " . $currentMatriculaEstudiante -> getEstudiante() -> getApellido() . " " . $currentMatriculaEstudiante -> getEstudiante() -> getTelefono() . " " . $currentMatriculaEstudiante -> getEstudiante() -> getCorreo() . " " . $currentMatriculaEstudiante -> getEstudiante() -> getClave() . " " . $currentMatriculaEstudiante -> getEstudiante() -> getFoto() . " " . $currentMatriculaEstudiante -> getEstudiante() -> getFecha_nacimiento() . " " . $currentMatriculaEstudiante -> getEstudiante() -> getDocumento() . "</a></td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/matriculaEstudiante/updateMatriculaEstudiante.php") . "&idMatriculaEstudiante=" . $currentMatriculaEstudiante -> getIdMatriculaEstudiante() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Matricula Estudiante' ></span></a> ";
						}
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/matriculaEstudiante/selectAllMatriculaEstudianteByEstudiante.php") . "&idEstudiante=" . $_GET['idEstudiante'] . "&idMatriculaEstudiante=" . $currentMatriculaEstudiante -> getIdMatriculaEstudiante() . "&action=delete' onclick='return confirm(\"Confirm to delete Matricula Estudiante: " . $currentMatriculaEstudiante -> getDescripcion() . "\")'> <span class='fas fa-backspace' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Delete Matricula Estudiante' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/observador/selectAllObservadorByMatriculaEstudiante.php") . "&idMatriculaEstudiante=" . $currentMatriculaEstudiante -> getIdMatriculaEstudiante() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Observador' ></span></a> ";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/observador/insertObservador.php") . "&idMatriculaEstudiante=" . $currentMatriculaEstudiante -> getIdMatriculaEstudiante() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Observador' ></span></a> ";
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
<div class="modal fade" id="modalMatriculaEstudiante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
