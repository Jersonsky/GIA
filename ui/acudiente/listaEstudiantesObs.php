<?php
include 'ui/acudiente/validarAcudiente.php';
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Listado de Estudiantes</h4>
		</div>
        <div class="card-body">
        		<div class="table-responsive">
        			<table class="table table-striped table-hover">
        				<thead>
            				<tr>
            				  <th scope="col">#</th>
                              <th scope="col">Nombre(s)</th>
                              <th scope="col">Apellido(s)</th>
                              <th scope="col">Telefono</th>
                              <th scope="col">Corrreo</th>
                              <th scope="col">Documento</th>
                              <th scope="col">Fecha Nacimiento</th>
                            </tr>
        				</thead>
        				</tbody>
        					<?php
        					$acudiente = new Acudiente();
        					$acudientes = $acudiente -> estudiantesAcudiente($_SESSION['id']);
        					
        					$counter = 1;
        					foreach ($acudientes as $currentAcudientes) {
        						echo "<tr><td>" . $counter . "</td>";
        						echo "<td>" . $currentAcudientes -> getNombre() . "</td>";
        						echo "<td>" . $currentAcudientes -> getApellido() . "</td>";
        						echo "<td>" . $currentAcudientes -> getTelefono() . "</td>";
        						echo "<td>" . $currentAcudientes -> getEstado() . "</td>";//correo
        						echo "<td>" . $currentAcudientes -> getFecha_nacimiento() . "</td>";//documento
        						echo "<td>" . $currentAcudientes -> getFoto() . "</td>";//fecha naci
        						echo "<td class='text-right' nowrap>
                        				<a href='modalObservadorAcu.php?idEstudiante=" . $currentAcudientes -> getIdAcudiente() . "'  data-toggle='modal' data-target='#modalObs' >
                        					<span class='fas fa-eye' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Ver calidicaciones' ></span>
                        				</a>
                        				</td>";
        						echo "</tr>";
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
<div class="modal fade" id="modalObs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>
<script>
	$('body').on('show.bs.modal', '.modal', function (e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>