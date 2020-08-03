<?php
$processed=false;
$idCita = $_GET['idCita'];
$updateCita = new Cita($idCita);
$updateCita -> select();
$descripcion="";
if(isset($_POST['descripcion'])){
	$descripcion=$_POST['descripcion'];
}
$fecha=date("d/m/Y");
if(isset($_POST['fecha'])){
	$fecha=$_POST['fecha'];
}
$coordinador="";
if(isset($_POST['coordinador'])){
	$coordinador=$_POST['coordinador'];
}
$acudienteEstudiante="";
if(isset($_POST['acudienteEstudiante'])){
	$acudienteEstudiante=$_POST['acudienteEstudiante'];
}
if(isset($_POST['update'])){
	$updateCita = new Cita($idCita, $descripcion, $fecha, $coordinador, $acudienteEstudiante);
	$updateCita -> update();
	$updateCita -> select();
	$objCoordinador = new Coordinador($coordinador);
	$objCoordinador -> select();
	$nameCoordinador = $objCoordinador -> getDocumento() . " " . $objCoordinador -> getNombre() . " " . $objCoordinador -> getApellido() . " " . $objCoordinador -> getTelefono() . " " . $objCoordinador -> getEstado() . " " . $objCoordinador -> getCorreo() . " " . $objCoordinador -> getClave() . " " . $objCoordinador -> getFoto() . " " . $objCoordinador -> getFecha_nacimiento() ;
	$objAcudienteEstudiante = new AcudienteEstudiante($acudienteEstudiante);
	$objAcudienteEstudiante -> select();
	$nameAcudienteEstudiante = $objAcudienteEstudiante -> getFecha() ;
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
		$logAdministrador = new LogAdministrador("","Editar Cita", "Descripcion: " . $descripcion . "; Fecha: " . $fecha . "; Coordinador: " . $nameCoordinador . ";; Acudiente Estudiante: " . $nameAcudienteEstudiante , date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Editar Cita</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Datos Editados
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/cita/updateCita.php") . "&idCita=" . $idCita ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Descripcion*</label>
							<input type="text" class="form-control" name="descripcion" value="<?php echo $updateCita -> getDescripcion() ?>" required />
						</div>
						<div class="form-group">
							<label>Fecha*</label>
							<input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo $updateCita -> getFecha() ?>" autocomplete="off" />
						</div>
					<div class="form-group">
						<label>Coordinador*</label>
						<select class="form-control" name="coordinador">
							<?php
							$objCoordinador = new Coordinador();
							$coordinadors = $objCoordinador -> selectAllOrder("documento", "asc");
							foreach($coordinadors as $currentCoordinador){
								echo "<option value='" . $currentCoordinador -> getIdCoordinador() . "'";
								if($currentCoordinador -> getIdCoordinador() == $updateCita -> getCoordinador() -> getIdCoordinador()){
									echo " selected";
								}
								echo ">" . $currentCoordinador -> getDocumento() . " " . $currentCoordinador -> getNombre() . " " . $currentCoordinador -> getApellido() . " " . $currentCoordinador -> getTelefono() . " " . $currentCoordinador -> getEstado() . " " . $currentCoordinador -> getCorreo() . " " . $currentCoordinador -> getClave() . " " . $currentCoordinador -> getFoto() . " " . $currentCoordinador -> getFecha_nacimiento() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Acudiente Estudiante*</label>
						<select class="form-control" name="acudienteEstudiante">
							<?php
							$objAcudienteEstudiante = new AcudienteEstudiante();
							$acudienteEstudiantes = $objAcudienteEstudiante -> selectAllOrder("fecha", "asc");
							foreach($acudienteEstudiantes as $currentAcudienteEstudiante){
								echo "<option value='" . $currentAcudienteEstudiante -> getIdAcudienteEstudiante() . "'";
								if($currentAcudienteEstudiante -> getIdAcudienteEstudiante() == $updateCita -> getAcudienteEstudiante() -> getIdAcudienteEstudiante()){
									echo " selected";
								}
								echo ">" . $currentAcudienteEstudiante -> getFecha() . "</option>";
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
