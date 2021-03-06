<?php
$processed=false;
$descripcion="";
if(isset($_POST['descripcion'])){
	$descripcion=$_POST['descripcion'];
}
$materia="";
if(isset($_POST['materia'])){
	$materia=$_POST['materia'];
}
if(isset($_GET['idMateria'])){
	$materia=$_GET['idMateria'];
}
$profesor="";
if(isset($_POST['profesor'])){
	$profesor=$_POST['profesor'];
}
if(isset($_GET['idProfesor'])){
	$profesor=$_GET['idProfesor'];
}
$matricula="";
if(isset($_POST['matricula'])){
	$matricula=$_POST['matricula'];
}
if(isset($_GET['idMatricula'])){
	$matricula=$_GET['idMatricula'];
}
if(isset($_POST['insert'])){
	$newClase = new Clase("", $descripcion, $materia, $profesor, $matricula);
	$newClase -> insert();
	$objMateria = new Materia($materia);
	$objMateria -> select();
	$nameMateria = $objMateria -> getNombremateria() ;
	$objProfesor = new Profesor($profesor);
	$objProfesor -> select();
	$nameProfesor = $objProfesor -> getDocumento() . " " . $objProfesor -> getNombre() . " " . $objProfesor -> getApellido() . " " . $objProfesor -> getTelefono() . " " . $objProfesor -> getEstado() . " " . $objProfesor -> getCorreo() . " " . $objProfesor -> getClave() . " " . $objProfesor -> getFoto() . " " . $objProfesor -> getFecha_nacimiento() ;
	$objMatricula = new Matricula($matricula);
	$objMatricula -> select();
	$nameMatricula = $objMatricula -> getFecha() ;
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
		$logAdministrador = new LogAdministrador("","Crear Clase", "Descripcion: " . $descripcion . "; Materia: " . $nameMateria . ";; Profesor: " . $nameProfesor . ";; Matricula: " . $nameMatricula , date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Crear Clase</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Datos Ingresados
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/clase/insertClase.php") ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Descripcion*</label>
							<input type="text" class="form-control" name="descripcion" value="<?php echo $descripcion ?>" required />
						</div>
					<div class="form-group">
						<label>Materia*</label>
						<select class="form-control" name="materia">
							<?php
							$objMateria = new Materia();
							$materias = $objMateria -> selectAllOrder("nombremateria", "asc");
							foreach($materias as $currentMateria){
								echo "<option value='" . $currentMateria -> getIdMateria() . "'";
								if($currentMateria -> getIdMateria() == $materia){
									echo " selected";
								}
								echo ">" . $currentMateria -> getNombremateria() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Profesor*</label>
						<select class="form-control" name="profesor">
							<?php
							$objProfesor = new Profesor();
							$profesors = $objProfesor -> selectAllOrder("documento", "asc");
							foreach($profesors as $currentProfesor){
								echo "<option value='" . $currentProfesor -> getIdProfesor() . "'";
								if($currentProfesor -> getIdProfesor() == $profesor){
									echo " selected";
								}
								echo ">" . $currentProfesor -> getDocumento() . " " . $currentProfesor -> getNombre() . " " . $currentProfesor -> getApellido() . " " . $currentProfesor -> getTelefono() . " " . $currentProfesor -> getEstado() . " " . $currentProfesor -> getCorreo() . " " . $currentProfesor -> getClave() . " " . $currentProfesor -> getFoto() . " " . $currentProfesor -> getFecha_nacimiento() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Matricula*</label>
						<select class="form-control" name="matricula">
							<?php
							$objMatricula = new Matricula();
							$matriculas = $objMatricula -> selectAllOrder("fecha", "asc");
							foreach($matriculas as $currentMatricula){
								echo "<option value='" . $currentMatricula -> getIdMatricula() . "'";
								if($currentMatricula -> getIdMatricula() == $matricula){
									echo " selected";
								}
								echo ">" . $currentMatricula -> getFecha() . "</option>";
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
