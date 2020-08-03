<?php
$processed=false;
$idObservador = $_GET['idObservador'];
$updateObservador = new Observador($idObservador);
$updateObservador -> select();
$descripcion="";
if(isset($_POST['descripcion'])){
	$descripcion=$_POST['descripcion'];
}
$fecha=date("d/m/Y");
if(isset($_POST['fecha'])){
	$fecha=$_POST['fecha'];
}
$profesor="";
if(isset($_POST['profesor'])){
	$profesor=$_POST['profesor'];
}
$coordinador="";
if(isset($_POST['coordinador'])){
	$coordinador=$_POST['coordinador'];
}
$matriculaEstudiante="";
if(isset($_POST['matriculaEstudiante'])){
	$matriculaEstudiante=$_POST['matriculaEstudiante'];
}
if(isset($_POST['update'])){
	$updateObservador = new Observador($idObservador, $descripcion, $fecha, $profesor, $coordinador, $matriculaEstudiante);
	$updateObservador -> update();
	$updateObservador -> select();
	$objProfesor = new Profesor($profesor);
	$objProfesor -> select();
	$nameProfesor = $objProfesor -> getDocumento() . " " . $objProfesor -> getNombre() . " " . $objProfesor -> getApellido() . " " . $objProfesor -> getTelefono() . " " . $objProfesor -> getEstado() . " " . $objProfesor -> getCorreo() . " " . $objProfesor -> getClave() . " " . $objProfesor -> getFoto() . " " . $objProfesor -> getFecha_nacimiento() ;
	$objCoordinador = new Coordinador($coordinador);
	$objCoordinador -> select();
	$nameCoordinador = $objCoordinador -> getDocumento() . " " . $objCoordinador -> getNombre() . " " . $objCoordinador -> getApellido() . " " . $objCoordinador -> getTelefono() . " " . $objCoordinador -> getEstado() . " " . $objCoordinador -> getCorreo() . " " . $objCoordinador -> getClave() . " " . $objCoordinador -> getFoto() . " " . $objCoordinador -> getFecha_nacimiento() ;
	$objMatriculaEstudiante = new MatriculaEstudiante($matriculaEstudiante);
	$objMatriculaEstudiante -> select();
	$nameMatriculaEstudiante = $objMatriculaEstudiante -> getDescripcion() ;
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
		$logAdministrador = new LogAdministrador("","Editar Observador", "Descripcion: " . $descripcion . "; Fecha: " . $fecha . "; Profesor: " . $nameProfesor . ";; Coordinador: " . $nameCoordinador . ";; Matricula Estudiante: " . $nameMatriculaEstudiante , date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Editar Observador</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Datos Editados
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/observador/updateObservador.php") . "&idObservador=" . $idObservador ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Descripcion*</label>
							<input type="text" class="form-control" name="descripcion" value="<?php echo $updateObservador -> getDescripcion() ?>" required />
						</div>
						<div class="form-group">
							<label>Fecha*</label>
							<input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo $updateObservador -> getFecha() ?>" autocomplete="off" />
						</div>
					<div class="form-group">
						<label>Profesor*</label>
						<select class="form-control" name="profesor">
							<?php
							$objProfesor = new Profesor();
							$profesors = $objProfesor -> selectAllOrder("documento", "asc");
							foreach($profesors as $currentProfesor){
								echo "<option value='" . $currentProfesor -> getIdProfesor() . "'";
								if($currentProfesor -> getIdProfesor() == $updateObservador -> getProfesor() -> getIdProfesor()){
									echo " selected";
								}
								echo ">" . $currentProfesor -> getDocumento() . " " . $currentProfesor -> getNombre() . " " . $currentProfesor -> getApellido() . " " . $currentProfesor -> getTelefono() . " " . $currentProfesor -> getEstado() . " " . $currentProfesor -> getCorreo() . " " . $currentProfesor -> getClave() . " " . $currentProfesor -> getFoto() . " " . $currentProfesor -> getFecha_nacimiento() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Coordinador*</label>
						<select class="form-control" name="coordinador">
							<?php
							$objCoordinador = new Coordinador();
							$coordinadors = $objCoordinador -> selectAllOrder("documento", "asc");
							foreach($coordinadors as $currentCoordinador){
								echo "<option value='" . $currentCoordinador -> getIdCoordinador() . "'";
								if($currentCoordinador -> getIdCoordinador() == $updateObservador -> getCoordinador() -> getIdCoordinador()){
									echo " selected";
								}
								echo ">" . $currentCoordinador -> getDocumento() . " " . $currentCoordinador -> getNombre() . " " . $currentCoordinador -> getApellido() . " " . $currentCoordinador -> getTelefono() . " " . $currentCoordinador -> getEstado() . " " . $currentCoordinador -> getCorreo() . " " . $currentCoordinador -> getClave() . " " . $currentCoordinador -> getFoto() . " " . $currentCoordinador -> getFecha_nacimiento() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Matricula Estudiante*</label>
						<select class="form-control" name="matriculaEstudiante">
							<?php
							$objMatriculaEstudiante = new MatriculaEstudiante();
							$matriculaEstudiantes = $objMatriculaEstudiante -> selectAllOrder("descripcion", "asc");
							foreach($matriculaEstudiantes as $currentMatriculaEstudiante){
								echo "<option value='" . $currentMatriculaEstudiante -> getIdMatriculaEstudiante() . "'";
								if($currentMatriculaEstudiante -> getIdMatriculaEstudiante() == $updateObservador -> getMatriculaEstudiante() -> getIdMatriculaEstudiante()){
									echo " selected";
								}
								echo ">" . $currentMatriculaEstudiante -> getDescripcion() . "</option>";
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
