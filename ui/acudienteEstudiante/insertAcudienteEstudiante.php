<?php
$processed=false;
$fecha=date("d/m/Y");
if(isset($_POST['fecha'])){
	$fecha=$_POST['fecha'];
}
$estudiante="";
if(isset($_POST['estudiante'])){
	$estudiante=$_POST['estudiante'];
}
if(isset($_GET['idEstudiante'])){
	$estudiante=$_GET['idEstudiante'];
}
$acudiente="";
if(isset($_POST['acudiente'])){
	$acudiente=$_POST['acudiente'];
}
if(isset($_GET['idAcudiente'])){
	$acudiente=$_GET['idAcudiente'];
}
if(isset($_POST['insert'])){
	$newAcudienteEstudiante = new AcudienteEstudiante("", $fecha, $estudiante, $acudiente);
	$newAcudienteEstudiante -> insert();
	$objEstudiante = new Estudiante($estudiante);
	$objEstudiante -> select();
	$nameEstudiante = $objEstudiante -> getNombre() . " " . $objEstudiante -> getApellido() . " " . $objEstudiante -> getTelefono() . " " . $objEstudiante -> getCorreo() . " " . $objEstudiante -> getClave() . " " . $objEstudiante -> getFoto() . " " . $objEstudiante -> getFecha_nacimiento() . " " . $objEstudiante -> getDocumento() ;
	$objAcudiente = new Acudiente($acudiente);
	$objAcudiente -> select();
	$nameAcudiente = $objAcudiente -> getNombre() . " " . $objAcudiente -> getApellido() . " " . $objAcudiente -> getTelefono() . " " . $objAcudiente -> getEstado() . " " . $objAcudiente -> getCorreo() . " " . $objAcudiente -> getClave() . " " . $objAcudiente -> getFoto() . " " . $objAcudiente -> getFecha_nacimiento() . " " . $objAcudiente -> getDocumento() . " " . $objAcudiente -> getDireccion() ;
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
		$logAdministrador = new LogAdministrador("","Crear Acudiente Estudiante", "Fecha: " . $fecha . "; Estudiante: " . $nameEstudiante . ";; Acudiente: " . $nameAcudiente , date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Crear Acudiente Estudiante</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Datos Ingresados
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/acudienteEstudiante/insertAcudienteEstudiante.php") ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Fecha*</label>
							<input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo $fecha ?>" autocomplete="off" />
						</div>
					<div class="form-group">
						<label>Estudiante*</label>
						<select class="form-control" name="estudiante">
							<?php
							$objEstudiante = new Estudiante();
							$estudiantes = $objEstudiante -> selectAllOrder("nombre", "asc");
							foreach($estudiantes as $currentEstudiante){
								echo "<option value='" . $currentEstudiante -> getIdEstudiante() . "'";
								if($currentEstudiante -> getIdEstudiante() == $estudiante){
									echo " selected";
								}
								echo ">" . $currentEstudiante -> getNombre() . " " . $currentEstudiante -> getApellido() . " " . $currentEstudiante -> getTelefono() . " " . $currentEstudiante -> getCorreo() . " " . $currentEstudiante -> getClave() . " " . $currentEstudiante -> getFoto() . " " . $currentEstudiante -> getFecha_nacimiento() . " " . $currentEstudiante -> getDocumento() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Acudiente*</label>
						<select class="form-control" name="acudiente">
							<?php
							$objAcudiente = new Acudiente();
							$acudientes = $objAcudiente -> selectAllOrder("nombre", "asc");
							foreach($acudientes as $currentAcudiente){
								echo "<option value='" . $currentAcudiente -> getIdAcudiente() . "'";
								if($currentAcudiente -> getIdAcudiente() == $acudiente){
									echo " selected";
								}
								echo ">" . $currentAcudiente -> getNombre() . " " . $currentAcudiente -> getApellido() . " " . $currentAcudiente -> getTelefono() . " " . $currentAcudiente -> getEstado() . " " . $currentAcudiente -> getCorreo() . " " . $currentAcudiente -> getClave() . " " . $currentAcudiente -> getFoto() . " " . $currentAcudiente -> getFecha_nacimiento() . " " . $currentAcudiente -> getDocumento() . " " . $currentAcudiente -> getDireccion() . "</option>";
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
