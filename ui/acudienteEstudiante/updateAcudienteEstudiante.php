<?php
$processed=false;
$idAcudienteEstudiante = $_GET['idAcudienteEstudiante'];
$updateAcudienteEstudiante = new AcudienteEstudiante($idAcudienteEstudiante);
$updateAcudienteEstudiante -> select();
$fecha=date("d/m/Y");
if(isset($_POST['fecha'])){
	$fecha=$_POST['fecha'];
}
$estudiante="";
if(isset($_POST['estudiante'])){
	$estudiante=$_POST['estudiante'];
}
$acudiente="";
if(isset($_POST['acudiente'])){
	$acudiente=$_POST['acudiente'];
}
if(isset($_POST['update'])){
	$updateAcudienteEstudiante = new AcudienteEstudiante($idAcudienteEstudiante, $fecha, $estudiante, $acudiente);
	$updateAcudienteEstudiante -> update();
	$updateAcudienteEstudiante -> select();
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
		$logAdministrador = new LogAdministrador("","Editar Acudiente Estudiante", "Fecha: " . $fecha . "; Estudiante: " . $nameEstudiante . ";; Acudiente: " . $nameAcudiente , date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Editar AcudienteEstudiante</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Datos Editados
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/acudienteEstudiante/updateAcudienteEstudiante.php") . "&idAcudienteEstudiante=" . $idAcudienteEstudiante ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Fecha*</label>
							<input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo $updateAcudienteEstudiante -> getFecha() ?>" autocomplete="off" />
						</div>
					<div class="form-group">
						<label>Estudiante*</label>
						<select class="form-control" name="estudiante">
							<?php
							$objEstudiante = new Estudiante();
							$estudiantes = $objEstudiante -> selectAllOrder("nombre", "asc");
							foreach($estudiantes as $currentEstudiante){
								echo "<option value='" . $currentEstudiante -> getIdEstudiante() . "'";
								if($currentEstudiante -> getIdEstudiante() == $updateAcudienteEstudiante -> getEstudiante() -> getIdEstudiante()){
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
								if($currentAcudiente -> getIdAcudiente() == $updateAcudienteEstudiante -> getAcudiente() -> getIdAcudiente()){
									echo " selected";
								}
								echo ">" . $currentAcudiente -> getNombre() . " " . $currentAcudiente -> getApellido() . " " . $currentAcudiente -> getTelefono() . " " . $currentAcudiente -> getEstado() . " " . $currentAcudiente -> getCorreo() . " " . $currentAcudiente -> getClave() . " " . $currentAcudiente -> getFoto() . " " . $currentAcudiente -> getFecha_nacimiento() . " " . $currentAcudiente -> getDocumento() . " " . $currentAcudiente -> getDireccion() . "</option>";
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
