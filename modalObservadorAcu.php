<?php
error_reporting(0);
require("business/Administrador.php");
require("business/LogAdministrador.php");
require("business/Materia.php");
require("business/Genero.php");
require("business/Horario.php");
require("business/Sede.php");
require("business/Curso.php");
require("business/Matricula.php");
require("business/Estado.php");
require("business/Acudiente.php");
require("business/Estudiante.php");
require("business/MatriculaEstudiante.php");
require("business/TipoDocumento.php");
require("business/Profesor.php");
require("business/Coordinador.php");
require("business/Califica.php");
require("business/Cita.php");
require("business/Clase.php");
require("business/Observador.php");
require("business/AcudienteEstudiante.php");
require_once("persistence/Connection.php");

$estudiante = $_GET['idEstudiante'];
$observador = new Observador();
$observadores = $observador -> observadorAcudiente($estudiante);


?>
<div class="modal-header bg-dark">
	<h4 class="modal-title" style="color:white;">Observaciones</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>

<?php 
foreach($observadores as $obs){
    echo "<div class='container'>";
    echo "   <div class='table-responsive '>";
    echo "	   <table class='table table-bordered table-hover'>";
    echo "    	   <thead class='table-info '>";
    echo "        	   <tr>";
    echo "	               <th colspan='1' >Estudiante: </th>";
    echo "                   <td colspan='3' >".$obs -> getCoordinador() . " " . $obs -> getMatriculaEstudiante()."</td>";
    echo "               </tr>";
    echo "           </thead>";
    echo "           <tbody>";
    echo "    	       <tr>";
    echo "                  <th>Profesor/Coordinador: </th>";
    echo "                  <td> ". $obs -> getFecha() -> getNombre() . " " . $obs -> getFecha() -> getApellido(). " " . $obs -> getProfesor() -> getNombre() . " " . $obs -> getProfesor() -> getApellido() ." </td>";
    echo "                  <th >Fecha:</th>";
    echo "                  <td>".$obs -> getDescripcion()."</td>";
    echo "               </tr>";
    echo "               <tr>";
    echo "                  <th colspan='4'  class='table-danger'>Observacion:</th>";
    echo "               </tr>";
    echo "               <tr>";
    echo "                 <td colspan='4' >".$obs -> getIdObservador()."</td>";
    echo "               </tr>";
    echo "           </tbody>";
    echo "       </table>";
    echo "	</div>";
    echo "</div>";
}
?>