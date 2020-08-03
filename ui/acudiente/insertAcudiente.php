<?php
$processed=false;
$nombre="";
if(isset($_POST['nombre'])){
	$nombre=$_POST['nombre'];
}
$apellido="";
if(isset($_POST['apellido'])){
	$apellido=$_POST['apellido'];
}
$telefono="";
if(isset($_POST['telefono'])){
	$telefono=$_POST['telefono'];
}
$estado="";
if(isset($_POST['estado'])){
	$estado=$_POST['estado'];
}
$correo="";
if(isset($_POST['correo'])){
	$correo=$_POST['correo'];
}
$clave="";
if(isset($_POST['clave'])){
	$clave=$_POST['clave'];
}
$foto="";
if(isset($_POST['foto'])){
	$foto=$_POST['foto'];
}
$fecha_nacimiento=date("d/m/Y");
if(isset($_POST['fecha_nacimiento'])){
	$fecha_nacimiento=$_POST['fecha_nacimiento'];
}
$documento="";
if(isset($_POST['documento'])){
	$documento=$_POST['documento'];
}
$direccion="";
if(isset($_POST['direccion'])){
	$direccion=$_POST['direccion'];
}
$tipoDocumento="";
if(isset($_POST['tipoDocumento'])){
	$tipoDocumento=$_POST['tipoDocumento'];
}
if(isset($_GET['idTipoDocumento'])){
	$tipoDocumento=$_GET['idTipoDocumento'];
}

$estudiante="";
if(isset($_POST['estudiante'])){
    $estudiante=$_POST['estudiante'];
}

$genero="";
if(isset($_POST['genero'])){
	$genero=$_POST['genero'];
}
if(isset($_GET['idGenero'])){
	$genero=$_GET['idGenero'];
}
if(isset($_POST['insert'])){
    
	$newAcudiente = new Acudiente("", $nombre, $apellido, $telefono, $estado, $correo, $clave, NULL, $fecha_nacimiento, $documento, $direccion, $tipoDocumento, $genero);
	$newAcudiente -> insert();
	$newAcudiente -> traerId();
	$objEstudiante = new Estudiante($estudiante);
	$objEstudiante -> select();
	$objTipoDocumento = new TipoDocumento($tipoDocumento);
	$objTipoDocumento -> select();
	$nameTipoDocumento = $objTipoDocumento -> getDescripcion() ;
	$objGenero = new Genero($genero);
	$objGenero -> select();
	$nameGenero = $objGenero -> getDescripcion() ;
	
	$newAcudienteEstudiante = new AcudienteEstudiante("", date("Y-m-d"), $estudiante, $newAcudiente -> getIdAcudiente());
	$newAcudienteEstudiante -> insert();
	
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
		$logAdministrador = new LogAdministrador("","Crear Acudiente", "Nombre: " . $nombre . "; Apellido: " . $apellido . "; Telefono: " . $telefono . "; Estado: " . $estado . "; Correo: " . $correo . "; Clave: " . $clave . "; Foto: " . $foto . "; Fecha_nacimiento: " . $fecha_nacimiento . "; Documento: " . $documento . "; Direccion: " . $direccion . "; Tipo Documento: " . $nameTipoDocumento . ";; Genero: " . $nameGenero , date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Crear Acudiente</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Datos Ingresados
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/acudiente/insertAcudiente.php") ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Nombre*</label>
							<input type="text" class="form-control" name="nombre" value="<?php echo $nombre ?>" required />
						</div>
						<div class="form-group">
							<label>Apellido*</label>
							<input type="text" class="form-control" name="apellido" value="<?php echo $apellido ?>" required />
						</div>
						<div class="form-group">
							<label>Telefono*</label>
							<input type="text" class="form-control" name="telefono" value="<?php echo $telefono ?>" required />
						</div>
						<div class="form-group">
							<label>Estado*</label>
						<div class="form-check">
							<input type="radio" class="form-check-input" name="estado" value="1" checked />
							<label class="form-check-label">Verdadero</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" class="form-check-input" name="estado" value="0" />
							<label class="form-check-label" >Falso</label>
						</div>
						</div>
						<div class="form-group">
							<label>Correo*</label>
							<input type="text" class="form-control" name="correo" value="<?php echo $correo ?>" required />
						</div>
						<div class="form-group">
							<label>Clave*</label>
							<input type="password" class="form-control" name="clave" value="<?php echo $clave ?>" required />
						</div>
						
						<div class="form-group">
							<label>Fecha_nacimiento*</label>
							<input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $fecha_nacimiento ?>" autocomplete="off" />
						</div>
						<div class="form-group">
							<label>Documento*</label>
							<input type="text" class="form-control" name="documento" value="<?php echo $documento ?>" required />
						</div>
						<div class="form-group">
							<label>Direccion*</label>
							<input type="text" class="form-control" name="direccion" value="<?php echo $direccion ?>" required />
						</div>
					<div class="form-group">
						<label>Tipo Documento*</label>
						<select class="form-control" name="tipoDocumento">
							<?php
							$objTipoDocumento = new TipoDocumento();
							$tipoDocumentos = $objTipoDocumento -> selectAllOrder("descripcion", "asc");
							foreach($tipoDocumentos as $currentTipoDocumento){
								echo "<option value='" . $currentTipoDocumento -> getIdTipoDocumento() . "'";
								if($currentTipoDocumento -> getIdTipoDocumento() == $tipoDocumento){
									echo " selected";
								}
								echo ">" . $currentTipoDocumento -> getDescripcion() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Genero*</label>
						<select class="form-control" name="genero">
							<?php
							$objGenero = new Genero();
							$generos = $objGenero -> selectAllOrder("descripcion", "asc");
							foreach($generos as $currentGenero){
								echo "<option value='" . $currentGenero -> getIdGenero() . "'";
								if($currentGenero -> getIdGenero() == $genero){
									echo " selected";
								}
								echo ">" . $currentGenero -> getDescripcion() . "</option>";
							}
							?>
						</select>
					</div>
					
					<div class="form-group">
						<label>Estudiante*</label>
						<select class="form-control" name="estudiante" id="resultados1">
							<?php
							$objEstudiante = new Estudiante();
							$estudiantes = $objEstudiante -> selectAllOrder("nombre", "asc");
							foreach($estudiantes as $currentEstudiante){
								echo "<option value='" . $currentEstudiante -> getIdEstudiante() . "'";
								if($currentEstudiante -> getIdEstudiante() == $estudiante){
									echo " selected";
								}
								echo ">" . $currentEstudiante -> getNombre() . " " . $currentEstudiante -> getApellido() .  "</option>";
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

<<script type="text/javascript">
$(document).ready(function() {
    $("#resultados1").select2();
});

</script>
