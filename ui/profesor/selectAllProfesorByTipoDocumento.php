<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$tipoDocumento = new TipoDocumento($_GET['idTipoDocumento']); 
$tipoDocumento -> select();
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Consultar Profesor de Tipo Documento: <em><?php echo $tipoDocumento -> getDescripcion() ?></em></h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Documento 
						<?php if($order=="documento" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/profesor/selectAllProfesorByTipoDocumento.php") ?>&idTipoDocumento=<?php echo $_GET['idTipoDocumento'] ?>&order=documento&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="documento" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/profesor/selectAllProfesorByTipoDocumento.php") ?>&idTipoDocumento=<?php echo $_GET['idTipoDocumento'] ?>&order=documento&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Nombre 
						<?php if($order=="nombre" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/profesor/selectAllProfesorByTipoDocumento.php") ?>&idTipoDocumento=<?php echo $_GET['idTipoDocumento'] ?>&order=nombre&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="nombre" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/profesor/selectAllProfesorByTipoDocumento.php") ?>&idTipoDocumento=<?php echo $_GET['idTipoDocumento'] ?>&order=nombre&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Apellido 
						<?php if($order=="apellido" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/profesor/selectAllProfesorByTipoDocumento.php") ?>&idTipoDocumento=<?php echo $_GET['idTipoDocumento'] ?>&order=apellido&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="apellido" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/profesor/selectAllProfesorByTipoDocumento.php") ?>&idTipoDocumento=<?php echo $_GET['idTipoDocumento'] ?>&order=apellido&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Telefono 
						<?php if($order=="telefono" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/profesor/selectAllProfesorByTipoDocumento.php") ?>&idTipoDocumento=<?php echo $_GET['idTipoDocumento'] ?>&order=telefono&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="telefono" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/profesor/selectAllProfesorByTipoDocumento.php") ?>&idTipoDocumento=<?php echo $_GET['idTipoDocumento'] ?>&order=telefono&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Estado 
						<?php if($order=="estado" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/profesor/selectAllProfesorByTipoDocumento.php") ?>&idTipoDocumento=<?php echo $_GET['idTipoDocumento'] ?>&order=estado&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="estado" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/profesor/selectAllProfesorByTipoDocumento.php") ?>&idTipoDocumento=<?php echo $_GET['idTipoDocumento'] ?>&order=estado&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Correo 
						<?php if($order=="correo" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/profesor/selectAllProfesorByTipoDocumento.php") ?>&idTipoDocumento=<?php echo $_GET['idTipoDocumento'] ?>&order=correo&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="correo" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/profesor/selectAllProfesorByTipoDocumento.php") ?>&idTipoDocumento=<?php echo $_GET['idTipoDocumento'] ?>&order=correo&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Foto 
						<?php if($order=="foto" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/profesor/selectAllProfesorByTipoDocumento.php") ?>&idTipoDocumento=<?php echo $_GET['idTipoDocumento'] ?>&order=foto&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="foto" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/profesor/selectAllProfesorByTipoDocumento.php") ?>&idTipoDocumento=<?php echo $_GET['idTipoDocumento'] ?>&order=foto&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Fecha_nacimiento 
						<?php if($order=="fecha_nacimiento" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/profesor/selectAllProfesorByTipoDocumento.php") ?>&idTipoDocumento=<?php echo $_GET['idTipoDocumento'] ?>&order=fecha_nacimiento&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="fecha_nacimiento" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/profesor/selectAllProfesorByTipoDocumento.php") ?>&idTipoDocumento=<?php echo $_GET['idTipoDocumento'] ?>&order=fecha_nacimiento&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th>Tipo Documento</th>
						<th>Genero</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$profesor = new Profesor("", "", "", "", "", "", "", "", "", "", $_GET['idTipoDocumento'], "");
					if($order!="" && $dir!="") {
						$profesors = $profesor -> selectAllByTipoDocumentoOrder($order, $dir);
					} else {
						$profesors = $profesor -> selectAllByTipoDocumento();
					}
					$counter = 1;
					foreach ($profesors as $currentProfesor) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentProfesor -> getDocumento() . "</td>";
						echo "<td>" . $currentProfesor -> getNombre() . "</td>";
						echo "<td>" . $currentProfesor -> getApellido() . "</td>";
						echo "<td>" . $currentProfesor -> getTelefono() . "</td>";
						echo "<td>" . ($currentProfesor -> getEstado()==1?"Verdadero":"Falso") . "</td>";
						echo "<td>" . $currentProfesor -> getCorreo() . "</td>";
						echo "<td>" . $currentProfesor -> getFoto() . "</td>";
						echo "<td>" . $currentProfesor -> getFecha_nacimiento() . "</td>";
						echo "<td><a href='modalTipoDocumento.php?idTipoDocumento=" . $currentProfesor -> getTipoDocumento() -> getIdTipoDocumento() . "' data-toggle='modal' data-target='#modalProfesor' >" . $currentProfesor -> getTipoDocumento() -> getDescripcion() . "</a></td>";
						echo "<td><a href='modalGenero.php?idGenero=" . $currentProfesor -> getGenero() -> getIdGenero() . "' data-toggle='modal' data-target='#modalProfesor' >" . $currentProfesor -> getGenero() -> getDescripcion() . "</a></td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/profesor/updateProfesor.php") . "&idProfesor=" . $currentProfesor -> getIdProfesor() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Profesor' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/clase/selectAllClaseByProfesor.php") . "&idProfesor=" . $currentProfesor -> getIdProfesor() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Clase' ></span></a> ";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/clase/insertClase.php") . "&idProfesor=" . $currentProfesor -> getIdProfesor() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Clase' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/observador/selectAllObservadorByProfesor.php") . "&idProfesor=" . $currentProfesor -> getIdProfesor() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Observador' ></span></a> ";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/observador/insertObservador.php") . "&idProfesor=" . $currentProfesor -> getIdProfesor() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Observador' ></span></a> ";
						}
						echo "</td>";
						echo "</tr>";
						$counter++;
					};
					?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalProfesor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
