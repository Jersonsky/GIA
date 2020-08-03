<?php
$processed=false;
$idCalifica = $_GET['idCalifica'];
$updateCalifica = new Califica($idCalifica);
$updateCalifica -> select();
$periodo_1="";
if(isset($_POST['periodo_1'])){
	$periodo_1=$_POST['periodo_1'];
}
$periodo_2="";
if(isset($_POST['periodo_2'])){
	$periodo_2=$_POST['periodo_2'];
}
$periodo_3="";
if(isset($_POST['periodo_3'])){
	$periodo_3=$_POST['periodo_3'];
}
$periodo_4="";
if(isset($_POST['periodo_4'])){
	$periodo_4=$_POST['periodo_4'];
}
$clase="";
if(isset($_POST['clase'])){
	$clase=$_POST['clase'];
}
$estudiante="";
if(isset($_POST['estudiante'])){
	$estudiante=$_POST['estudiante'];
}
if(isset($_POST['update'])){
	$updateCalifica = new Califica($idCalifica, $periodo_1, $periodo_2, $periodo_3, $periodo_4, $clase, $estudiante);
	$updateCalifica -> update();
	$updateCalifica -> select();
	$objClase = new Clase($clase);
	$objClase -> select();
	$nameClase = $objClase -> getDescripcion() ;
	$objEstudiante = new Estudiante($estudiante);
	$objEstudiante -> select();
	$nameEstudiante = $objEstudiante -> getNombre() . " " . $objEstudiante -> getApellido() . " " . $objEstudiante -> getTelefono() . " " . $objEstudiante -> getCorreo() . " " . $objEstudiante -> getClave() . " " . $objEstudiante -> getFoto() . " " . $objEstudiante -> getFecha_nacimiento() . " " . $objEstudiante -> getDocumento() ;
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
		$logAdministrador = new LogAdministrador("","Editar Califica", "Periodo_1: " . $periodo_1 . "; Periodo_2: " . $periodo_2 . "; Periodo_3: " . $periodo_3 . "; Periodo_4: " . $periodo_4 . "; Clase: " . $nameClase . ";; Estudiante: " . $nameEstudiante , date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Editar Califica</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Datos Editados
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/califica/updateCalifica.php") . "&idCalifica=" . $idCalifica ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Periodo_1*</label>
							<input type="text" class="form-control" name="periodo_1" value="<?php echo $updateCalifica -> getPeriodo_1() ?>" required />
						</div>
						<div class="form-group">
							<label>Periodo_2*</label>
							<input type="text" class="form-control" name="periodo_2" value="<?php echo $updateCalifica -> getPeriodo_2() ?>" required />
						</div>
						<div class="form-group">
							<label>Periodo_3*</label>
							<input type="text" class="form-control" name="periodo_3" value="<?php echo $updateCalifica -> getPeriodo_3() ?>" required />
						</div>
						<div class="form-group">
							<label>Periodo_4*</label>
							<input type="text" class="form-control" name="periodo_4" value="<?php echo $updateCalifica -> getPeriodo_4() ?>" required />
						</div>
					<div class="form-group">
						<label>Clase*</label>
						<select class="form-control" name="clase">
							<?php
							$objClase = new Clase();
							$clases = $objClase -> selectAllOrder("descripcion", "asc");
							foreach($clases as $currentClase){
								echo "<option value='" . $currentClase -> getIdClase() . "'";
								if($currentClase -> getIdClase() == $updateCalifica -> getClase() -> getIdClase()){
									echo " selected";
								}
								echo ">" . $currentClase -> getDescripcion() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Estudiante*</label>
						<select class="form-control" name="estudiante">
							<?php
							$objEstudiante = new Estudiante();
							$estudiantes = $objEstudiante -> selectAllOrder("nombre", "asc");
							foreach($estudiantes as $currentEstudiante){
								echo "<option value='" . $currentEstudiante -> getIdEstudiante() . "'";
								if($currentEstudiante -> getIdEstudiante() == $updateCalifica -> getEstudiante() -> getIdEstudiante()){
									echo " selected";
								}
								echo ">" . $currentEstudiante -> getNombre() . " " . $currentEstudiante -> getApellido() . " " . $currentEstudiante -> getTelefono() . " " . $currentEstudiante -> getCorreo() . " " . $currentEstudiante -> getClave() . " " . $currentEstudiante -> getFoto() . " " . $currentEstudiante -> getFecha_nacimiento() . " " . $currentEstudiante -> getDocumento() . "</option>";
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
