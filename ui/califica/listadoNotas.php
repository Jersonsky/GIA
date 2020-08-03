<?php
//include 'ui/profesor/validarProfesor.php';
$idClase = $_GET['idClase'];
$notas = new Califica();
$calif = $notas->mostarNotasEstudiantes($idClase);



if(isset($_POST['guardar'])){
    $counter = 1;
    foreach ($calif as $currentNotas){
        $nota1="";
        if(isset($_POST['nota1'.$counter.''])){
            $nota1=$_POST['nota1'.$counter.''];
        }
        $nota2="";
        if(isset($_POST['nota2'.$counter.''])){
            $nota2=$_POST['nota2'.$counter.''];
        }
        $nota3="";
        if(isset($_POST['nota3'.$counter.''])){
            $nota3=$_POST['nota3'.$counter.''];
        }
        $nota4="";
        if(isset($_POST['nota4'.$counter.''])){
            $nota4=$_POST['nota4'.$counter.''];
        }
        $subirs = new Califica();
        $subirs -> subirNotas($nota1,$nota2,$nota3,$nota4,$currentNotas->getClase());
        //echo $subirs -> getCalificaDAO() -> subirNotas($nota1,$nota2,$nota3,$nota4,$currentNotas->getClase());
        $counter ++;
    }
    
    //echo $subir -> getCalificaDAO() -> subirNotas($nota1,$nota2,$nota3,$nota4,$idClase);
}


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
								<th scope="col">Nombre</th>
								<th scope="col">Periodo 1</th>
								<th scope="col">Periodo 2</th>
								<th scope="col">Periodo 3</th>
								<th scope="col">Periodo 4</th>
							</tr>
						</thead>

						<tbody>
                            <?php
                            echo "<form id='form' method='post' action='index.php?pid=" . base64_encode('ui/califica/listadoNotas.php') ."&idClase=".$idClase."'>";
                            $counter = 1;
                            $notass = new Califica();
                            $califi = $notass -> mostarNotasEstudiantes($idClase);
                            foreach ($califi as $currentNotas) {
                                
                                echo "<tr><td>" . $counter . "</td>";
                                echo "<td>" . $currentNotas->getIdCalifica() . "</td>";
                                echo "<td><input type='text' name='nota1".$counter."' class='form-control' id='exampleInputEmail1' value='" . $currentNotas->getPeriodo_1() . "'></td>";
                                echo "<td><input type='text' name='nota2".$counter."' class='form-control' id='exampleInputEmail1' value='" . $currentNotas->getPeriodo_2() . "'></td>";
                                echo "<td><input type='text' name='nota3".$counter."' class='form-control' id='exampleInputEmail1' value='" . $currentNotas->getPeriodo_3() . "'></td>";
                                echo "<td><input type='text' name='nota4".$counter."' class='form-control' id='exampleInputEmail1' value='" . $currentNotas->getPeriodo_4() . "'></td>";
                                
                                echo "</tr>";
                                $counter ++;
                                
                            }
                            echo "<div class='container text-center'>";
                            echo "<button type='submit' name='guardar' class='btn btn-primary ' >Enviar</button>";
                            echo "</div>";
                            echo "</form>";
                            ?>
        				</tbody>


					</table>
					
			</div>
		</div>
	</div>
</div>