<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$genero = new Genero($_GET['idGenero']); 
$genero -> select();
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Consultar Coordinador de Genero: <em><?php echo $genero -> getDescripcion() ?></em></h4>
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
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/coordinador/selectAllCoordinadorByGenero.php") ?>&idGenero=<?php echo $_GET['idGenero'] ?>&order=documento&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="documento" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/coordinador/selectAllCoordinadorByGenero.php") ?>&idGenero=<?php echo $_GET['idGenero'] ?>&order=documento&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Nombre 
						<?php if($order=="nombre" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/coordinador/selectAllCoordinadorByGenero.php") ?>&idGenero=<?php echo $_GET['idGenero'] ?>&order=nombre&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="nombre" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/coordinador/selectAllCoordinadorByGenero.php") ?>&idGenero=<?php echo $_GET['idGenero'] ?>&order=nombre&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Apellido 
						<?php if($order=="apellido" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/coordinador/selectAllCoordinadorByGenero.php") ?>&idGenero=<?php echo $_GET['idGenero'] ?>&order=apellido&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="apellido" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/coordinador/selectAllCoordinadorByGenero.php") ?>&idGenero=<?php echo $_GET['idGenero'] ?>&order=apellido&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Telefono 
						<?php if($order=="telefono" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/coordinador/selectAllCoordinadorByGenero.php") ?>&idGenero=<?php echo $_GET['idGenero'] ?>&order=telefono&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="telefono" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/coordinador/selectAllCoordinadorByGenero.php") ?>&idGenero=<?php echo $_GET['idGenero'] ?>&order=telefono&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Estado 
						<?php if($order=="estado" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/coordinador/selectAllCoordinadorByGenero.php") ?>&idGenero=<?php echo $_GET['idGenero'] ?>&order=estado&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="estado" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/coordinador/selectAllCoordinadorByGenero.php") ?>&idGenero=<?php echo $_GET['idGenero'] ?>&order=estado&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Correo 
						<?php if($order=="correo" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/coordinador/selectAllCoordinadorByGenero.php") ?>&idGenero=<?php echo $_GET['idGenero'] ?>&order=correo&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="correo" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/coordinador/selectAllCoordinadorByGenero.php") ?>&idGenero=<?php echo $_GET['idGenero'] ?>&order=correo&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Foto 
						<?php if($order=="foto" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/coordinador/selectAllCoordinadorByGenero.php") ?>&idGenero=<?php echo $_GET['idGenero'] ?>&order=foto&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="foto" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/coordinador/selectAllCoordinadorByGenero.php") ?>&idGenero=<?php echo $_GET['idGenero'] ?>&order=foto&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Fecha_nacimiento 
						<?php if($order=="fecha_nacimiento" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/coordinador/selectAllCoordinadorByGenero.php") ?>&idGenero=<?php echo $_GET['idGenero'] ?>&order=fecha_nacimiento&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="fecha_nacimiento" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/coordinador/selectAllCoordinadorByGenero.php") ?>&idGenero=<?php echo $_GET['idGenero'] ?>&order=fecha_nacimiento&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th>Genero</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$coordinador = new Coordinador("", "", "", "", "", "", "", "", "", "", $_GET['idGenero']);
					if($order!="" && $dir!="") {
						$coordinadors = $coordinador -> selectAllByGeneroOrder($order, $dir);
					} else {
						$coordinadors = $coordinador -> selectAllByGenero();
					}
					$counter = 1;
					foreach ($coordinadors as $currentCoordinador) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentCoordinador -> getDocumento() . "</td>";
						echo "<td>" . $currentCoordinador -> getNombre() . "</td>";
						echo "<td>" . $currentCoordinador -> getApellido() . "</td>";
						echo "<td>" . $currentCoordinador -> getTelefono() . "</td>";
						echo "<td>" . ($currentCoordinador -> getEstado()==1?"Verdadero":"Falso") . "</td>";
						echo "<td>" . $currentCoordinador -> getCorreo() . "</td>";
						echo "<td>" . $currentCoordinador -> getFoto() . "</td>";
						echo "<td>" . $currentCoordinador -> getFecha_nacimiento() . "</td>";
						echo "<td><a href='modalGenero.php?idGenero=" . $currentCoordinador -> getGenero() -> getIdGenero() . "' data-toggle='modal' data-target='#modalCoordinador' >" . $currentCoordinador -> getGenero() -> getDescripcion() . "</a></td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/coordinador/updateCoordinador.php") . "&idCoordinador=" . $currentCoordinador -> getIdCoordinador() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Coordinador' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/cita/selectAllCitaByCoordinador.php") . "&idCoordinador=" . $currentCoordinador -> getIdCoordinador() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Cita' ></span></a> ";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/cita/insertCita.php") . "&idCoordinador=" . $currentCoordinador -> getIdCoordinador() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Cita' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/observador/selectAllObservadorByCoordinador.php") . "&idCoordinador=" . $currentCoordinador -> getIdCoordinador() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Observador' ></span></a> ";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/observador/insertObservador.php") . "&idCoordinador=" . $currentCoordinador -> getIdCoordinador() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Observador' ></span></a> ";
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
<div class="modal fade" id="modalCoordinador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
