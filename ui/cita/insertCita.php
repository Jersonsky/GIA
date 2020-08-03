<?php
$processed=false;
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
if(isset($_GET['idCoordinador'])){
	$coordinador=$_GET['idCoordinador'];
}
$acudienteEstudiante="";
if(isset($_POST['acudienteEstudiante'])){
	$acudienteEstudiante=$_POST['acudienteEstudiante'];
}
if(isset($_GET['idAcudienteEstudiante'])){
	$acudienteEstudiante=$_GET['idAcudienteEstudiante'];
}
if(isset($_POST['insert'])){
	$newCita = new Cita("", $descripcion, $fecha, $coordinador, $acudienteEstudiante);
	$newCita -> insert();
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
		$logAdministrador = new LogAdministrador("","Crear Cita", "Descripcion: " . $descripcion . "; Fecha: " . $fecha . "; Coordinador: " . $nameCoordinador . ";; Acudiente Estudiante: " . $nameAcudienteEstudiante , date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Crear Cita</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Datos Ingresados
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/cita/insertCita.php") ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Descripcion*</label>
							<input type="text" class="form-control" name="descripcion" value="<?php echo $descripcion ?>" required />
						</div>
						<div class="form-group">
							<label>Fecha*</label>
							<input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo $fecha ?>" autocomplete="off" />
						</div>
					<div class="form-group">
						<label>Coordinador*</label>
						<select class="form-control" name="coordinador">
							<?php
							$objCoordinador = new Coordinador();
							$coordinadors = $objCoordinador -> selectAll();
							foreach($coordinadors as $currentCoordinador){
								echo "<option value='" . $currentCoordinador -> getIdCoordinador() . "'";
								if($currentCoordinador -> getIdCoordinador() == $coordinador){
									echo " selected";
								}
								echo ">" .  $currentCoordinador -> getNombre() . " " . $currentCoordinador -> getApellido() .  "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Estudiante*</label>
						<select class="form-control" name="acudienteEstudiante">
							<?php
							$objAcudienteEstudiante = new AcudienteEstudiante();
							$acudienteEstudiantes = $objAcudienteEstudiante -> citaAcudiente($_SESSION['id']);
							foreach($acudienteEstudiantes as $currentAcudienteEstudiante){
								echo "<option value='" . $currentAcudienteEstudiante -> getIdAcudienteEstudiante() . "'";
								if($currentAcudienteEstudiante -> getIdAcudienteEstudiante() == $acudienteEstudiante){
									echo " selected";
								}
								echo ">" . $currentAcudienteEstudiante -> getFecha() . " " . $currentAcudienteEstudiante -> getEstudiante() . "</option>";
							}
							?>
						</select>
					</div>
						<button type="submit" class="btn btn-info" name="insert">Crear</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
