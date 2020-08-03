<?php
include 'ui/profesor/validarProfesor.php';
$profesor= new Profesor();
$profesores = $profesor -> mostrarCursos($_SESSION['id']);
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Listado de Cursos</h4>
		</div>
        <div class="card-body">
        		<div class="table-responsive">
        			<table class="table table-striped table-hover">
        				<thead>
            				<tr>
            				  <th scope="col">#</th>
                              <th scope="col">Curso</th>
                              <th scope="col">Sede</th>
                              <th scope="col">Opciones</th>
                            </tr>
        				</thead>
        				</tbody>
        					<?php
        					
        					
        					$counter = 1;
        					foreach ($profesores as $currentProfesor) {
        						echo "<tr><td>" . $counter . "</td>";
        						echo "<td>" . $currentProfesor -> getDocumento() . "</td>";//curso
        						echo "<td>" . $currentProfesor -> getNombre() -> getNombresede() . "</td>";//sede
        						echo "<td class='text-left' nowrap>";
        						if($_SESSION['entity'] == 'profesor') {
        						    echo "<a href='index.php?pid=" . base64_encode("ui/califica/listadoNotas.php") . "&idClase=" . $currentProfesor -> getApellido() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Agregar Notas' ></span></a> ";
        						}
        						echo "</td>";
        						echo "</tr>";
        						$counter++;
        					}
        					?>
        				</tbody>
        			</table>
        		</div>
		</div>
	</div>
</div>
