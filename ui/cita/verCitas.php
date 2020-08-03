<?php
include 'ui/estudiante/validarEstudiante.php';
$estudiante = new Cita();
$estudiantes = $estudiante -> citasEstudiante($_SESSION['id']);
?>
<div class="container">
	<div>
		<div class="card-header bg-dark">
			<h3 style="color: white">Citaciones</h3>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive-sm">
					<?php 
					foreach($estudiantes as $es){
						echo "<table class='table table-striped table-hover'>";
						echo "	<tr>";
						echo "		<th colspan='1'>Descripcion de la Citacion</th>";
						echo "		<td colspan='3'>".$es -> getIdCita()."</td>";
						echo "	</tr>";
						echo "	<tr>";
						echo "		<th>Fecha Citacion</th>";
						echo "		<td>".$es -> getDescripcion()."</td>";
						echo "	</tr>";
						echo "	<tr>";
						echo "		<th>Coordinador de la Citaci&oacute;n</th>";
						echo "		<td>". $es -> getFecha() -> getNombre() . " " . $es -> getFecha() -> getApellido() ."</td>";
						echo "	</tr>";
						echo "	<tr>";
						echo "		<th>Estudiante</th>";
						echo "		<td>". $es -> getCoordinador() ."</td>";
						echo "	</tr>";
						
						echo "</table>";
					}
						?>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>

