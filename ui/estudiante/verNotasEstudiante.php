<?php
include 'ui/estudiante/validarEstudiante.php';
$idEstudiante = $_SESSION['id'];
?>

<div class="modal-body">
    <div class="container-fluid">
    	<div class="card">
    	<div class="card-header">
			<h4 class="card-title">Listado de Notas</h4>
		</div>
    		
    		<div class="card-body">
    			<div class="table-responsive">
    				
    					<table class="table table-striped table-hover">
    						<thead class="thead-dark">
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