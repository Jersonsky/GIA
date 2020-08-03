<?php
include 'ui/acudiente/validarAcudiente.php';

$acudiente = new Acudiente($_SESSION['id']);
$acudiente -> select();
?>
<div class="container">
	<div>
		<div class="card-header bg-dark">
			<h3 style="color: white">Perfil</h3>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-3" > 
					<img src="<?php echo ($acudiente -> getFoto()!="")?$acudiente -> getFoto():"http://icons.iconarchive.com/icons/custom-icon-design/silky-line-user/512/user2-2-icon.png"; ?>" width="100%" class="rounded">
 				</div> 
				<div class="col-md-9">
					<div class="table-responsive-sm">
						<table class="table table-striped table-hover">
							<tr>
								<th>Nombre</th>
								<td><?php echo $acudiente -> getNombre() ?></td>
							</tr>
							<tr>
								<th>Apellido</th>
								<td><?php echo $acudiente -> getApellido() ?></td>
							</tr>
							<tr>
								<th>Correo</th>
								<td><?php echo $acudiente -> getCorreo() ?></td>
							</tr>
							<tr>
								<th>Telefono</th>
								<td><?php echo $acudiente -> getTelefono() ?></td>
							</tr>
							<tr>
								<th>Direcci&oacute;n</th>
								<td><?php echo $acudiente -> getDireccion() ?></td>
							</tr>
							<tr>
								<th>Genero</th>
								<td><?php echo $acudiente -> getGenero() -> getDescripcion() ?></td>
							</tr>
							<tr>
								<th><?php echo $acudiente -> getTipoDocumento() -> getDescripcion()?></th>
								<td><?php echo $acudiente -> getDocumento() ?></td>
							</tr>
							<tr>
								<th>Estado</th>
								<td><?php echo ($acudiente -> getEstado()==1)?"Habilitado":"Deshabilitado"; ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
		<p><?php echo "Su rol es: Acudiente"; ?></p>
		</div>
	</div>
</div>

