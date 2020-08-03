<?php
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

$idEstudiante = $_GET ['idEstudiante'];

?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Listado de Notas</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
    <div class="container-fluid">
    	<div class="card">
    		
    		<div class="card-body">
    			<div class="table-responsive">
    				
    					<table class="table table-striped table-hover">
    						<thead>
    							<tr>
    								<th scope="col">#</th>
    								<th scope="col">Materia</th>
    								<th scope="col">Periodo 1</th>
    								<th scope="col">Periodo 2</th>
    								<th scope="col">Periodo 3</th>
    								<th scope="col">Periodo 4</th>
    								<th scope="col">Nota Final</th>
    							</tr>
    						</thead>
    
    						<tbody>
                                <?php
                                $counter = 1;
                                $calificacion = new Califica();
                                $califi = $calificacion -> notasEstudianteAcudiente($idEstudiante);
                                foreach ($califi as $currentNotas) {
                                    
                                    echo "<tr><td>" . $counter . "</td>";
                                    echo "<td>" . $currentNotas -> getIdCalifica(). "</td>";
                                    echo "<td>" . $currentNotas -> getPeriodo_1() . "</td>";
                                    echo "<td>" . $currentNotas -> getPeriodo_2() . "</td>";
                                    echo "<td>" . $currentNotas -> getPeriodo_3() . "</td>";
                                    echo "<td>" . $currentNotas -> getPeriodo_4() . "</td>";
                                    echo "<td>" . ((intval($currentNotas -> getPeriodo_1())+intval($currentNotas -> getPeriodo_2())+intval($currentNotas -> getPeriodo_3())+intval($currentNotas -> getPeriodo_4()))/4) . "</td>";
                                    echo "</tr>";
                                    $counter ++;
                                    
                                }
                                
                                ?>
            				</tbody>
    
    
    					</table>
    					
    			</div>
    		</div>
    	</div>
    </div>
</div>