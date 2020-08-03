<?php
$correo = "";
if (isset($_POST['correo'])) {
    $correo = $_POST['correo'];
}
$clave = "";
if (isset($_POST['clave'])) {
    $clave = $_POST['clave'];
}
$error = 0;
if (isset($_POST['autenticar'])) {
    
    if (isset($_POST['correo']) && isset($_POST['clave'])) {
        $user_ip = getenv('REMOTE_ADDR');
        $agent = $_SERVER["HTTP_USER_AGENT"];
        $browser = "-";
        if (preg_match('/MSIE (\d+\.\d+);/', $agent)) {
            $browser = "Internet Explorer";
        } else if (preg_match('/Chrome[\/\s](\d+\.\d+)/', $agent)) {
            $browser = "Chrome";
        } else if (preg_match('/Edge\/\d+/', $agent)) {
            $browser = "Edge";
        } else if (preg_match('/Firefox[\/\s](\d+\.\d+)/', $agent)) {
            $browser = "Firefox";
        } else if (preg_match('/OPR[\/\s](\d+\.\d+)/', $agent)) {
            $browser = "Opera";
        } else if (preg_match('/Safari[\/\s](\d+\.\d+)/', $agent)) {
            $browser = "Safari";
        }
        
        $administrador = new Administrador();
        $coordinador = new Coordinador();
        $estudiante = new Estudiante();
        $acudiente = new Acudiente();
        $profesor = new Profesor();
        
        
        if ($estudiante -> autenticar($correo, $clave)) {
            if ($estudiante -> getEstado() == 1) {
                $_SESSION['id'] = $estudiante -> getIdEstudiante();
                $_SESSION['entity'] = "estudiante";
                echo "<script>location.href = 'index.php?pid=" . base64_encode("ui/estudiante/sesionEstudiante.php") . "'</script>";
            } else {
                $error = 2;
            }
        } else if ($coordinador->autenticar($correo, $clave)) {
            if ($coordinador->getEstado() == 1) {
                $_SESSION['id'] = $coordinador->getIdCoordinador();
                $_SESSION['entity'] = "coordinador";
                echo "<script>location.href = 'index.php?pid=" . base64_encode("ui/coordinador/sesionCoordinador.php") . "'</script>";
            } else {
                $error = 2;
            }
        } else if ($acudiente->autenticar($correo,$clave)) {
            if ($acudiente->getEstado() == 1) {
                $_SESSION['id'] = $acudiente->getIdAcudiente();
                $_SESSION['entity'] = "acudiente";
                echo "<script>location.href = 'index.php?pid=" . base64_encode("ui/acudiente/sesionAcudiente.php") . "'</script>";
            } else {
                $error = 2;
                
            }
        } else if ($profesor->autenticar($correo, $clave)) {
            if ($profesor->getEstado() == 1) {
                $_SESSION['id'] = $profesor->getIdProfesor();
                $_SESSION['entity'] = "profesor";
                echo "<script>location.href = 'index.php?pid=" . base64_encode("ui/profesor/sesionProfesor.php") . "'</script>";
            } else {
                $error = 2;
            }
        } else if ($administrador->logIn($correo, $clave)) {
            if ($administrador->getEstado() == 1) {
                $_SESSION['id'] = $administrador->getIdAdministrador();
                $_SESSION['entity'] = "Administrador";
                $logAdministrador = new LogAdministrador("", "Log In", "", date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $administrador->getIdAdministrador());
                $logAdministrador->insert();
                echo "<script>location.href = 'index.php?pid=" . base64_encode("ui/sessionAdministrador.php") . "'</script>";
            } else {
                $error = 2;
            }
        } else {
            $error = 1;
        }
    }
}

?>

 <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="static/img/user.png" th:src="@{/img/user.png}"/>
                </div>
                <form class="col-12" th:action="@{/login}" method="post">
                    <div class='form-group'>
						<input name="correo" type="email" class='form-control form-control-lg' placeholder='Correo' required="required">
					</div>
                    <div class='form-group'>
						<input name="clave" type='password' class='form-control form-control-lg' placeholder='Clave' required="required">
					</div>
                    <button type="submit" name="autenticar" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>  Ingresar </button>
                    
                </form>
                <div class="col-12 forgot">
                    <a href="#">Recordar contrase&ntilde;a?</a>
                </div>
                <?php if ($error == 1) { ?>
						<div class="alert alert-danger"
							role="alert">
							Error de correo o clave
							<button type="button" class="close" data-dismiss="alert"
								aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?php } else if ($error == 2) { ?>
						<div class="alert alert-danger"
							role="alert">
							Usuario inhabilitado
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?php } ?>
            </div>
        </div>
    </div>


