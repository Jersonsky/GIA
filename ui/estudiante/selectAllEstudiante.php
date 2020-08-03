<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Consultar Estudiante</h4>
		</div>
		<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Nombre 
						<?php if($order=="nombre" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudiante.php") ?>&order=nombre&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' ></span></a>
						<?php } ?>
						<?php if($order=="nombre" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudiante.php") ?>&order=nombre&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' ></span></a>
						<?php } ?>
						</th>
						<th nowrap>Apellido 
						<?php if($order=="apellido" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudiante.php") ?>&order=apellido&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' ></span></a>
						<?php } ?>
						<?php if($order=="apellido" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudiante.php") ?>&order=apellido&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' ></span></a>
						<?php } ?>
						</th>
						<th nowrap>Telefono 
						<?php if($order=="telefono" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudiante.php") ?>&order=telefono&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' ></span></a>
						<?php } ?>
						<?php if($order=="telefono" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudiante.php") ?>&order=telefono&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' ></span></a>
						<?php } ?>
						</th>
						<th nowrap>Correo 
						<?php if($order=="correo" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudiante.php") ?>&order=correo&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' ></span></a>
						<?php } ?>
						<?php if($order=="correo" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudiante.php") ?>&order=correo&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' ></span></a>
						<?php } ?>
						</th>
						<th nowrap>Foto 
						<?php if($order=="foto" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudiante.php") ?>&order=foto&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' ></span></a>
						<?php } ?>
						<?php if($order=="foto" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudiante.php") ?>&order=foto&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' ></span></a>
						<?php } ?>
						</th>
						<th nowrap>Fecha_nacimiento 
						<?php if($order=="fecha_nacimiento" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudiante.php") ?>&order=fecha_nacimiento&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' ></span></a>
						<?php } ?>
						<?php if($order=="fecha_nacimiento" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudiante.php") ?>&order=fecha_nacimiento&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' ></span></a>
						<?php } ?>
						</th>
						<th nowrap>Documento 
						<?php if($order=="documento" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudiante.php") ?>&order=documento&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' ></span></a>
						<?php } ?>
						<?php if($order=="documento" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudiante.php") ?>&order=documento&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' ></span></a>
						<?php } ?>
						</th>
						<th>Estado</th>
						<th>Sede</th>
						<th>Tipo Documento</th>
						<th>Genero</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$estudiante = new Estudiante();
					if($order != "" && $dir != "") {
						$estudiantes = $estudiante -> selectAllOrder($order, $dir);
					} else {
						$estudiantes = $estudiante -> selectAll();
					}
					$counter = 1;
					foreach ($estudiantes as $currentEstudiante) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentEstudiante -> getNombre() . "</td>";
						echo "<td>" . $currentEstudiante -> getApellido() . "</td>";
						echo "<td>" . $currentEstudiante -> getTelefono() . "</td>";
						echo "<td>" . $currentEstudiante -> getCorreo() . "</td>";
						echo "<td>" . $currentEstudiante -> getFoto() . "</td>";
						echo "<td>" . $currentEstudiante -> getFecha_nacimiento() . "</td>";
						echo "<td>" . $currentEstudiante -> getDocumento() . "</td>";
						echo "<td><a href='modalEstado.php?idEstado=" . $currentEstudiante -> getEstado() -> getIdEstado() . "' data-toggle='modal' data-target='#modalEstudiante' >" . $currentEstudiante -> getEstado() -> getDescripcion() . "</a></td>";
						echo "<td><a href='modalSede.php?idSede=" . $currentEstudiante -> getSede() -> getIdSede() . "' data-toggle='modal' data-target='#modalEstudiante' >" . $currentEstudiante -> getSede() -> getNombresede() . " " . $currentEstudiante -> getSede() -> getDireccion() . " " . $currentEstudiante -> getSede() -> getTelefono() . "</a></td>";
						echo "<td><a href='modalTipoDocumento.php?idTipoDocumento=" . $currentEstudiante -> getTipoDocumento() -> getIdTipoDocumento() . "' data-toggle='modal' data-target='#modalEstudiante' >" . $currentEstudiante -> getTipoDocumento() -> getDescripcion() . "</a></td>";
						echo "<td><a href='modalGenero.php?idGenero=" . $currentEstudiante -> getGenero() -> getIdGenero() . "' data-toggle='modal' data-target='#modalEstudiante' >" . $currentEstudiante -> getGenero() -> getDescripcion() . "</a></td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/estudiante/updateEstudiante.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Estudiante' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/califica/selectAllCalificaByEstudiante.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Califica' ></span></a> ";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/califica/insertCalifica.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Califica' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/matriculaEstudiante/selectAllMatriculaEstudianteByEstudiante.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Matricula Estudiante' ></span></a> ";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/matriculaEstudiante/insertMatriculaEstudiante.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Matricula Estudiante' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/acudienteEstudiante/selectAllAcudienteEstudianteByEstudiante.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Acudiente Estudiante' ></span></a> ";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/acudienteEstudiante/insertAcudienteEstudiante.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Acudiente Estudiante' ></span></a> ";
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
<div class="modal fade" id="modalEstudiante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
