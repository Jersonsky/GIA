<?php
include 'ui/coordinador/validarCoordinador.php';
$coordinador = new Coordinador($_SESSION['id']);
$coordinador -> select();
?>
<div class="container">
	<div>
		<div class="card-header bg-dark">
			<h3 style="color: white">Perfil</h3>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-3" > 
					<img src="<?php echo ($coordinador -> getFoto()!="")?$coordinador -> getFoto():"http://icons.iconarchive.com/icons/custom-icon-design/silky-line-user/512/user2-2-icon.png"; ?>" width="100%" class="rounded">
 				</div> 
				<div class="col-md-9">
					<div class="table-responsive-sm">
						<table class="table table-striped table-hover">
							<tr>
								<th>Nombre</th>
								<td><?php echo $coordinador -> getNombre() ?></td>
							</tr>
							<tr>
								<th>Apellido</th>
								<td><?php echo $coordinador -> getApellido() ?></td>
							</tr>
							<tr>
								<th>Fecha Nacimiento</th>
								<td><?php echo $coordinador -> getFecha_nacimiento() ?></td>
							</tr>
							<tr>
								<th>Correo</th>
								<td><?php echo $coordinador -> getCorreo() ?></td>
							</tr>
							<tr>
								<th>Telefono</th>
								<td><?php echo $coordinador -> getTelefono() ?></td>
							</tr>
							<tr>
								<th>Genero</th>
								<td><?php echo $coordinador -> getGenero() -> getDescripcion() ?></td>
							</tr>
							<tr>
								<th>Documento</th>
								<td><?php echo $coordinador -> getDocumento() ?></td>
							</tr>
							<tr>
								<th>Estado</th>
								<td><?php echo ($coordinador -> getEstado()==1)?"Habilitado":"Deshabilitado"; ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
		<p><?php echo "Su rol es: Coordinador"; ?></p>
		</div>
	</div>
</div>

