<?php
$processed=false;
$idHorario = $_GET['idHorario'];
$updateHorario = new Horario($idHorario);
$updateHorario -> select();
$dia="";
if(isset($_POST['dia'])){
	$dia=$_POST['dia'];
}
$hora="";
if(isset($_POST['hora'])){
	$hora=$_POST['hora'];
}
$clase="";
if(isset($_POST['clase'])){
	$clase=$_POST['clase'];
}
if(isset($_POST['update'])){
	$updateHorario = new Horario($idHorario, $dia, $hora, $clase);
	$updateHorario -> update();
	$updateHorario -> select();
	$objClase = new Clase($clase);
	$objClase -> select();
	$nameClase = $objClase -> getDescripcion() ;
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
		$logAdministrador = new LogAdministrador("","Editar Horario", "Dia: " . $dia . "; Hora: " . $hora . "; Clase: " . $nameClase , date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Editar Horario</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Datos Editados
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/horario/updateHorario.php") . "&idHorario=" . $idHorario ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Dia*</label>
							<input type="text" class="form-control" name="dia" value="<?php echo $updateHorario -> getDia() ?>" required />
						</div>
						<div class="form-group">
							<label>Hora*</label>
							<input type="text" class="form-control" name="hora" value="<?php echo $updateHorario -> getHora() ?>" required />
						</div>
					<div class="form-group">
						<label>Clase*</label>
						<select class="form-control" name="clase">
							<?php
							$objClase = new Clase();
							$clases = $objClase -> selectAllOrder("descripcion", "asc");
							foreach($clases as $currentClase){
								echo "<option value='" . $currentClase -> getIdClase() . "'";
								if($currentClase -> getIdClase() == $updateHorario -> getClase() -> getIdClase()){
									echo " selected";
								}
								echo ">" . $currentClase -> getDescripcion() . "</option>";
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
