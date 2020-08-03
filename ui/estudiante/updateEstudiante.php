<?php
$processed=false;
$idEstudiante = $_GET['idEstudiante'];
$updateEstudiante = new Estudiante($idEstudiante);
$updateEstudiante -> select();
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
$documento="";
if(isset($_POST['documento'])){
	$documento=$_POST['documento'];
}
$estado="";
if(isset($_POST['estado'])){
	$estado=$_POST['estado'];
}
$sede="";
if(isset($_POST['sede'])){
	$sede=$_POST['sede'];
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
	$updateEstudiante = new Estudiante($idEstudiante, $nombre, $apellido, $telefono, $correo, "", $foto, $fecha_nacimiento, $documento, $estado, $sede, $tipoDocumento, $genero);
	$updateEstudiante -> update();
	$updateEstudiante -> select();
	$objEstado = new Estado($estado);
	$objEstado -> select();
	$nameEstado = $objEstado -> getDescripcion() ;
	$objSede = new Sede($sede);
	$objSede -> select();
	$nameSede = $objSede -> getNombresede() . " " . $objSede -> getDireccion() . " " . $objSede -> getTelefono() ;
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
		$logAdministrador = new LogAdministrador("","Editar Estudiante", "Nombre: " . $nombre . "; Apellido: " . $apellido . "; Telefono: " . $telefono . "; Correo: " . $correo . "; Foto: " . $foto . "; Fecha_nacimiento: " . $fecha_nacimiento . "; Documento: " . $documento . "; Estado: " . $nameEstado . ";; Sede: " . $nameSede . ";; Tipo Documento: " . $nameTipoDocumento . ";; Genero: " . $nameGenero , date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Editar Estudiante</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Datos Editados
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/estudiante/updateEstudiante.php") . "&idEstudiante=" . $idEstudiante ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Nombre*</label>
							<input type="text" class="form-control" name="nombre" value="<?php echo $updateEstudiante -> getNombre() ?>" required />
						</div>
						<div class="form-group">
							<label>Apellido*</label>
							<input type="text" class="form-control" name="apellido" value="<?php echo $updateEstudiante -> getApellido() ?>" required />
						</div>
						<div class="form-group">
							<label>Telefono*</label>
							<input type="text" class="form-control" name="telefono" value="<?php echo $updateEstudiante -> getTelefono() ?>" required />
						</div>
						<div class="form-group">
							<label>Correo*</label>
							<input type="text" class="form-control" name="correo" value="<?php echo $updateEstudiante -> getCorreo() ?>" required />
						</div>
						<div class="form-group">
							<label>Foto*</label>
							<input type="text" class="form-control" name="foto" value="<?php echo $updateEstudiante -> getFoto() ?>" required />
						</div>
						<div class="form-group">
							<label>Fecha_nacimiento*</label>
							<input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $updateEstudiante -> getFecha_nacimiento() ?>" autocomplete="off" />
						</div>
						<div class="form-group">
							<label>Documento*</label>
							<input type="text" class="form-control" name="documento" value="<?php echo $updateEstudiante -> getDocumento() ?>" required />
						</div>
					<div class="form-group">
						<label>Estado*</label>
						<select class="form-control" name="estado">
							<?php
							$objEstado = new Estado();
							$estados = $objEstado -> selectAllOrder("descripcion", "asc");
							foreach($estados as $currentEstado){
								echo "<option value='" . $currentEstado -> getIdEstado() . "'";
								if($currentEstado -> getIdEstado() == $updateEstudiante -> getEstado() -> getIdEstado()){
									echo " selected";
								}
								echo ">" . $currentEstado -> getDescripcion() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Sede*</label>
						<select class="form-control" name="sede">
							<?php
							$objSede = new Sede();
							$sedes = $objSede -> selectAllOrder("nombresede", "asc");
							foreach($sedes as $currentSede){
								echo "<option value='" . $currentSede -> getIdSede() . "'";
								if($currentSede -> getIdSede() == $updateEstudiante -> getSede() -> getIdSede()){
									echo " selected";
								}
								echo ">" . $currentSede -> getNombresede() . " " . $currentSede -> getDireccion() . " " . $currentSede -> getTelefono() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Tipo Documento*</label>
						<select class="form-control" name="tipoDocumento">
							<?php
							$objTipoDocumento = new TipoDocumento();
							$tipoDocumentos = $objTipoDocumento -> selectAllOrder("descripcion", "asc");
							foreach($tipoDocumentos as $currentTipoDocumento){
								echo "<option value='" . $currentTipoDocumento -> getIdTipoDocumento() . "'";
								if($currentTipoDocumento -> getIdTipoDocumento() == $updateEstudiante -> getTipoDocumento() -> getIdTipoDocumento()){
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
								if($currentGenero -> getIdGenero() == $updateEstudiante -> getGenero() -> getIdGenero()){
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
