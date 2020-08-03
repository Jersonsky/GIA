<?php
$processed=false;
$idMatriculaEstudiante = $_GET['idMatriculaEstudiante'];
$updateMatriculaEstudiante = new MatriculaEstudiante($idMatriculaEstudiante);
$updateMatriculaEstudiante -> select();
$descripcion="";
if(isset($_POST['descripcion'])){
	$descripcion=$_POST['descripcion'];
}
$matricula="";
if(isset($_POST['matricula'])){
	$matricula=$_POST['matricula'];
}
$estudiante="";
if(isset($_POST['estudiante'])){
	$estudiante=$_POST['estudiante'];
}
if(isset($_POST['update'])){
	$updateMatriculaEstudiante = new MatriculaEstudiante($idMatriculaEstudiante, $descripcion, $matricula, $estudiante);
	$updateMatriculaEstudiante -> update();
	$updateMatriculaEstudiante -> select();
	$objMatricula = new Matricula($matricula);
	$objMatricula -> select();
	$nameMatricula = $objMatricula -> getFecha() ;
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
		$logAdministrador = new LogAdministrador("","Editar Matricula Estudiante", "Descripcion: " . $descripcion . "; Matricula: " . $nameMatricula . ";; Estudiante: " . $nameEstudiante , date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Editar MatriculaEstudiante</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Datos Editados
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/matriculaEstudiante/updateMatriculaEstudiante.php") . "&idMatriculaEstudiante=" . $idMatriculaEstudiante ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Descripcion*</label>
							<input type="text" class="form-control" name="descripcion" value="<?php echo $updateMatriculaEstudiante -> getDescripcion() ?>" required />
						</div>
					<div class="form-group">
						<label>Matricula*</label>
						<select class="form-control" name="matricula">
							<?php
							$objMatricula = new Matricula();
							$matriculas = $objMatricula -> selectAllOrder("fecha", "asc");
							foreach($matriculas as $currentMatricula){
								echo "<option value='" . $currentMatricula -> getIdMatricula() . "'";
								if($currentMatricula -> getIdMatricula() == $updateMatriculaEstudiante -> getMatricula() -> getIdMatricula()){
									echo " selected";
								}
								echo ">" . $currentMatricula -> getFecha() . "</option>";
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
								if($currentEstudiante -> getIdEstudiante() == $updateMatriculaEstudiante -> getEstudiante() -> getIdEstudiante()){
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
