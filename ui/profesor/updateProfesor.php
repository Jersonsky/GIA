<?php
$processed=false;
$idProfesor = $_GET['idProfesor'];
$updateProfesor = new Profesor($idProfesor);
$updateProfesor -> select();
$documento="";
if(isset($_POST['documento'])){
	$documento=$_POST['documento'];
}
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
$foto="";
if(isset($_POST['foto'])){
	$foto=$_POST['foto'];
}
$fecha_nacimiento=date("d/m/Y");
if(isset($_POST['fecha_nacimiento'])){
	$fecha_nacimiento=$_POST['fecha_nacimiento'];
}
$tipoDocumento="";
if(isset($_POST['tipoDocumento'])){
	$tipoDocumento=$_POST['tipoDocumento'];
}
$genero="";
if(isset($_POST['genero'])){
	$genero=$_POST['genero'];
}
if(isset($_POST['update'])){
	$updateProfesor = new Profesor($idProfesor, $documento, $nombre, $apellido, $telefono, $estado, $correo, "", $foto, $fecha_nacimiento, $tipoDocumento, $genero);
	$updateProfesor -> update();
	$updateProfesor -> select();
	$objTipoDocumento = new TipoDocumento($tipoDocumento);
	$objTipoDocumento -> select();
	$nameTipoDocumento = $objTipoDocumento -> getDescripcion() ;
	$objGenero = new Genero($genero);
	$objGenero -> select();
	$nameGenero = $objGenero -> getDescripcion() ;
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
		$logAdministrador = new LogAdministrador("","Editar Profesor", "Documento: " . $documento . "; Nombre: " . $nombre . "; Apellido: " . $apellido . "; Telefono: " . $telefono . "; Estado: " . $estado . "; Correo: " . $correo . "; Foto: " . $foto . "; Fecha_nacimiento: " . $fecha_nacimiento . "; Tipo Documento: " . $nameTipoDocumento . ";; Genero: " . $nameGenero , date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Editar Profesor</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Datos Editados
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/profesor/updateProfesor.php") . "&idProfesor=" . $idProfesor ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Documento*</label>
							<input type="text" class="form-control" name="documento" value="<?php echo $updateProfesor -> getDocumento() ?>" required />
						</div>
						<div class="form-group">
							<label>Nombre*</label>
							<input type="text" class="form-control" name="nombre" value="<?php echo $updateProfesor -> getNombre() ?>" required />
						</div>
						<div class="form-group">
							<label>Apellido*</label>
							<input type="text" class="form-control" name="apellido" value="<?php echo $updateProfesor -> getApellido() ?>" required />
						</div>
						<div class="form-group">
							<label>Telefono*</label>
							<input type="text" class="form-control" name="telefono" value="<?php echo $updateProfesor -> getTelefono() ?>" required />
						</div>
						<div class="form-group">
							<label>Estado*</label>
						<div class="form-check">
							<input type="radio" class="form-check-input" name="estado" value="1" <?php echo ($updateProfesor -> getEstado()==1)?"checked":"" ?>/>
							<label class="form-check-label">Verdadero</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" class="form-check-input" name="estado" value="0" <?php echo ($updateProfesor -> getEstado()==0)?"checked":"" ?>/>
							<label class="form-check-label" >Falso</label>
						</div>
						</div>
						<div class="form-group">
							<label>Correo*</label>
							<input type="text" class="form-control" name="correo" value="<?php echo $updateProfesor -> getCorreo() ?>" required />
						</div>
						<div class="form-group">
							<label>Foto*</label>
							<input type="text" class="form-control" name="foto" value="<?php echo $updateProfesor -> getFoto() ?>" required />
						</div>
						<div class="form-group">
							<label>Fecha_nacimiento*</label>
							<input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $updateProfesor -> getFecha_nacimiento() ?>" autocomplete="off" />
						</div>
					<div class="form-group">
						<label>Tipo Documento*</label>
						<select class="form-control" name="tipoDocumento">
							<?php
							$objTipoDocumento = new TipoDocumento();
							$tipoDocumentos = $objTipoDocumento -> selectAllOrder("descripcion", "asc");
							foreach($tipoDocumentos as $currentTipoDocumento){
								echo "<option value='" . $currentTipoDocumento -> getIdTipoDocumento() . "'";
								if($currentTipoDocumento -> getIdTipoDocumento() == $updateProfesor -> getTipoDocumento() -> getIdTipoDocumento()){
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
								if($currentGenero -> getIdGenero() == $updateProfesor -> getGenero() -> getIdGenero()){
									echo " selected";
								}
								echo ">" . $currentGenero -> getDescripcion() . "</option>";
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
