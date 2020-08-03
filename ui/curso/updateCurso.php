<?php
$processed=false;
$idCurso = $_GET['idCurso'];
$updateCurso = new Curso($idCurso);
$updateCurso -> select();
$nombrecurso="";
if(isset($_POST['nombrecurso'])){
	$nombrecurso=$_POST['nombrecurso'];
}
$sede="";
if(isset($_POST['sede'])){
	$sede=$_POST['sede'];
}
if(isset($_POST['update'])){
	$updateCurso = new Curso($idCurso, $nombrecurso, $sede);
	$updateCurso -> update();
	$updateCurso -> select();
	$objSede = new Sede($sede);
	$objSede -> select();
	$nameSede = $objSede -> getNombresede() . " " . $objSede -> getDireccion() . " " . $objSede -> getTelefono() ;
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
		$logAdministrador = new LogAdministrador("","Editar Curso", "Nombrecurso: " . $nombrecurso . "; Sede: " . $nameSede , date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Editar Curso</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Datos Editados
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/curso/updateCurso.php") . "&idCurso=" . $idCurso ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Nombrecurso*</label>
							<input type="text" class="form-control" name="nombrecurso" value="<?php echo $updateCurso -> getNombrecurso() ?>" required />
						</div>
					<div class="form-group">
						<label>Sede*</label>
						<select class="form-control" name="sede">
							<?php
							$objSede = new Sede();
							$sedes = $objSede -> selectAllOrder("nombresede", "asc");
							foreach($sedes as $currentSede){
								echo "<option value='" . $currentSede -> getIdSede() . "'";
								if($currentSede -> getIdSede() == $updateCurso -> getSede() -> getIdSede()){
									echo " selected";
								}
								echo ">" . $currentSede -> getNombresede() . " " . $currentSede -> getDireccion() . " " . $currentSede -> getTelefono() . "</option>";
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
