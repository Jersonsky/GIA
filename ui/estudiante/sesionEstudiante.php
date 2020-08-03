<?php
include 'ui/estudiante/validarEstudiante.php';
$estudiante = new Estudiante($_SESSION['id']);
$estudiante -> select();
?>
<div class="container">
	<div>
		<div class="card-header bg-dark">
			<h3 style="color: white">Perfil</h3>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-3" > 
					<img src="<?php echo ($estudiante -> getFoto()!="")?$estudiante -> getFoto():"http://icons.iconarchive.com/icons/custom-icon-design/silky-line-user/512/user2-2-icon.png"; ?>" width="100%" class="rounded">
 				</div> 
				<div class="col-md-9">
					<div class="table-responsive-sm">
						<table class="table table-striped table-hover">
							<tr>
								<th>Nombre</th>
								<td><?php echo $estudiante -> getNombre() ?></td>
							</tr>
							<tr>
								<th>Apellido</th>
								<td><?php echo $estudiante -> getApellido() ?></td>
							</tr>
							<tr>
								<th>Fecha Nacimiento</th>
								<td><?php echo $estudiante -> getFecha_nacimiento() ?></td>
							</tr>
							<tr>
								<th>Correo</th>
								<td><?php echo $estudiante -> getCorreo() ?></td>
							</tr>
							<tr>
								<th>Telefono</th>
								<td><?php echo $estudiante -> getTelefono() ?></td>
							</tr>
							<tr>
								<th>Genero</th>
								<td><?php echo $estudiante -> getGenero() -> getDescripcion() ?></td>
							</tr>
							<tr>
								<th><?php echo $estudiante -> getTipoDocumento() -> getDescripcion();?></th>
								<td><?php echo   $estudiante -> getDocumento() ?></td>
							</tr>
							<tr>
								<th>Sede</th>
								<td><?php echo $estudiante -> getSede() -> getNombresede() ?></td>
							</tr>
							<tr>
								<th>Estado</th>
								<td><?php echo ($estudiante -> getEstado() -> getIdEstado() ==1)?"Habilitado":"Deshabilitado"; ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
		<p><?php echo "Su rol es: Estudiante"; ?></p>
		</div>
	</div>
</div>

