<?php
$processed=false;
$idMatricula = $_GET['idMatricula'];
$updateMatricula = new Matricula($idMatricula);
$updateMatricula -> select();
$fecha=date("d/m/Y");
if(isset($_POST['fecha'])){
	$fecha=$_POST['fecha'];
}
$curso="";
if(isset($_POST['curso'])){
	$curso=$_POST['curso'];
}
if(isset($_POST['update'])){
	$updateMatricula = new Matricula($idMatricula, $fecha, $curso);
	$updateMatricula -> update();
	$updateMatricula -> select();
	$objCurso = new Curso($curso);
	$objCurso -> select();
	$nameCurso = $objCurso -> getNombrecurso() ;
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
		$logAdministrador = new LogAdministrador("","Editar Matricula", "Fecha: " . $fecha . "; Curso: " . $nameCurso , date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrador -> insert();
	}
	$processed=true;
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Editar Matricula</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Datos Editados
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/matricula/updateMatricula.php") . "&idMatricula=" . $idMatricula ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Fecha*</label>
							<input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo $updateMatricula -> getFecha() ?>" autocomplete="off" />
						</div>
					<div class="form-group">
						<label>Curso*</label>
						<select class="form-control" name="curso">
							<?php
							$objCurso = new Curso();
							$cursos = $objCurso -> selectAllOrder("nombrecurso", "asc");
							foreach($cursos as $currentCurso){
								echo "<option value='" . $currentCurso -> getIdCurso() . "'";
								if($currentCurso -> getIdCurso() == $updateMatricula -> getCurso() -> getIdCurso()){
									echo " selected";
								}
								echo ">" . $currentCurso -> getNombrecurso() . "</option>";
							}
							?>
						</select>
					</div>
						<button type="submit" class="btn btn-info" name="update">Editar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
