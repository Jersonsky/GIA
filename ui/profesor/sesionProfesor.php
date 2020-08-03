<?php
include 'ui/profesor/validarProfesor.php';
$profesor = new Profesor($_SESSION['id']);
$profesor -> select();
?>
<div class="container">
	<div>
		<div class="card-header bg-dark">
			<h3 style="color: white">Perfil</h3>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-3" > 
					<img src="<?php echo ($profesor -> getFoto()!="")?$profesor -> getFoto():"http://icons.iconarchive.com/icons/custom-icon-design/silky-line-user/512/user2-2-icon.png"; ?>" width="100%" class="rounded">
 				</div> 
				<div class="col-md-9">
					<div class="table-responsive-sm">
						<table class="table table-striped table-hover">
							<tr>
								<th>Nombre</th>
								<td><?php echo $profesor -> getNombre() ?></td>
							</tr>
							<tr>
								<th>Apellido</th>
								<td><?php echo $profesor -> getApellido() ?></td>
							</tr>
							<tr>
								<th>Fecha Nacimiento</th>
								<td><?php echo $profesor -> getFecha_nacimiento() ?></td>
							</tr>
							<tr>
								<th>Correo</th>
								<td><?php echo $profesor -> getCorreo() ?></td>
							</tr>
							<tr>
								<th>Telefono</th>
								<td><?php echo $profesor -> getTelefono() ?></td>
							</tr>
							<tr>
								<th>Genero</th>
								<td><?php echo $profesor -> getGenero() -> getDescripcion() ?></td>
							</tr>
							<tr>
								<th>Documento</th>
								<td><?php echo $profesor -> getDocumento() ?></td>
							</tr>
							<tr>
								<th>Estado</th>
								<td><?php echo ($profesor -> getEstado()==1)?"Habilitado":"Deshabilitado"; ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
		<p><?php echo "Su rol es: Profesor"; ?></p>
		</div>
	</div>
</div>

