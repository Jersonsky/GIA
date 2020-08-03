<?php
$processed=false;
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
$genero="";
if(isset($_POST['genero'])){
	$genero=$_POST['genero'];
}
if(isset($_GET['idGenero'])){
	$genero=$_GET['idGenero'];
}
if(isset($_POST['insert'])){
	$newCoordinador = new Coordinador("", $documento, $nombre, $apellido, $telefono, $estado, $correo, $clave, $foto, $fecha_nacimiento, $genero);
	$newCoordinador -> insert();
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
		$logAdministrador = new LogAdministrador("","Crear Coordinador", "Documento: " . $documento . "; Nombre: " . $nombre . "; Apellido: " . $apellido . "; Telefono: " . $telefono . "; Estado: " . $estado . "; Correo: " . $correo . "; Clave: " . $clave . "; Foto: " . $foto . "; Fecha_nacimiento: " . $fecha_nacimiento . "; Genero: " . $nameGenero , date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Crear Coordinador</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Datos Ingresados
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/coordinador/insertCoordinador.php") ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Documento*</label>
							<input type="text" class="form-control" name="documento" value="<?php echo $documento ?>" required />
						</div>
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
							<label>Foto*</label>
							<input type="text" class="form-control" name="foto" value="<?php echo $foto ?>" required />
						</div>
						<div class="form-group">
							<label>Fecha_nacimiento*</label>
							<input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $fecha_nacimiento ?>" autocomplete="off" />
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
						<button type="submit" class="btn btn-info" name="insert">Crear</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
