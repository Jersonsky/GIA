<?php
$curso = $_GET['filtro'];

$estu = new Estudiante();
$estudiantes = $estu -> estudianteCurso($curso);
foreach($estudiantes as $currentEstudiantes){
    echo "<option value='" . $currentEstudiantes -> getIdEstudiante() . "'";
    if($currentEstudiantes -> getIdEstudiante()==2){
       echo " selected";
    }
    echo ">" . $currentEstudiantes -> getNombre() ." ". $currentEstudiantes -> getApellido() . "</option>";
    
}



?>