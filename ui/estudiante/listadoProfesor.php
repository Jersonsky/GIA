<?php
include 'ui/estudiante/validarEstudiante.php';

$profesor = new Profesor();
$profesores = $profesor -> profesorDelEstudiante($_SESSION['id']);
?>
<div class="container-fluid">
	<div class="card">
        <div class="card-header">
        <h4 class="card-title">Listado de Estudiantes</h4>
        </div>
        <div class="card-body">
<?php 
echo "<div class='row'>";
foreach($profesores as $prof){
    echo "<div class='card' style='width: 15rem;'>";
    if($prof -> getEstado()!=""){
        echo "<img src='".$prof -> getEstado()."' class='card-img-top' alt='...'>";
    }else{
        echo "<img src='http://icons.iconarchive.com/icons/custom-icon-design/silky-line-user/512/user2-2-icon.png' class='card-img-top' alt='...'>";
    }
    
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>".$prof -> getIdProfesor() . $prof -> getDocumento() ."</h5>";
    echo "<p class='card-text'>Materia: ".$prof -> getTelefono()."</p>";
    echo "</div>";
    echo "<ul class='list-group list-group-flush'>";
    echo "<li class='list-group-item'>Telefono: ".$prof -> getNombre()."</li>";
    echo "<li class='list-group-item'>Correo: ".$prof -> getApellido()."</li>";
    echo "</ul>";
//     echo "<div class='card-body'>";
//     echo "</div>";
    echo "</div>";
}
echo "</div>";
?>
		</div>
	</div>
</div>

