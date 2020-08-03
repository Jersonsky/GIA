<?php
include 'ui/profesor/validarProfesor.php';
$profesor = new Profesor($_SESSION['id']);
$profesor -> select();

$cursi="";
if(isset($_POST['curso'])){
    $cursi=$_POST['curso'];
}

$fecha=date("Y-m-d");
if(isset($_POST['fecha'])){
    $fecha=$_POST['fecha'];
}

$estudiante="";
if(isset($_POST['estudiante'])){
    $estudiante=$_POST['estudiante'];
}

$profesorr=$profesor->getIdProfesor();


$observacion="";
if(isset($_POST['observacion'])){
    $observacion=$_POST['observacion'];
}

if(isset($_POST['insert'])){
    $matEst = new MatriculaEstudiante("","","",$estudiante);
    $matEst -> selectAllByEstudiante1();
    
    $newObservador = new Observador("", $observacion, $fecha, $profesorr, "null",$matEst->getIdMatriculaEstudiante() );
    $newObservador -> insertProfesor();
}

?>
<div class="container">
    <div class="card-header bg-dark">
			<h3 style="color: white">Agregar Observaci&oacute;n</h3>
	</div>
    <form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/observador/hacerObservacionProfesor.php") ?>" class="bootstrap-form needs-validation">
    	<div class="form-group">
            <div class="table-responsive ">
             <table class="table table-bordered table-hover">
              <thead class="table-info ">
                    <tr>
                      
                      <th colspan="1" >Curso:</th>
                      <td >
                        <select class="form-control " name="curso" id="filtro">
    						<?php
							$curso = new Curso();
							$cursos = $curso -> selectAll();
							foreach($cursos as $currentCurso){
							    echo "<option value='" . $currentCurso -> getIdCurso() . "'";
							    if($currentCurso -> getIdCurso() == $cursi){
									echo " selected";
								}
							    echo ">" . $currentCurso -> getNombrecurso() . "</option>";
							    
							}
							?>
						</select>
                      </td>
                      <th colspan="1" >Estudiante: </th>
                      <td colspan="1" >
                      	<select class="form-control" name="estudiante" id="resultados1">
							
						</select>
					  </td>
                    </tr>
              </thead>
              <tbody>
                <tr>
                  <th>Profesor: </th>
                  <td><input  id="profesor" type="text" class="form-control" value="<?php echo $profesor -> getNombre(). " " . $profesor -> getApellido()  ?>"> </td>
                  <th >Fecha:</th>
                  <td><input disabled id="fecha" type="text" class="form-control" value="<?php echo date("d-m-Y");?>"></td>
                </tr>
                <tr>
                  <th colspan="4"  class='table-danger'>Observacion:</th>
                </tr>
                <tr>
                  <td colspan="4" >
                  	<textarea id="objetivo" name="observacion" placeholder="Digite la observaci&oacute;n aqu&iacute;"  style="height: 150px; width: 100%"><?php  ?></textarea>
                  	
                  </td>
                </tr>
                
                <tr>
                	<td colspan="4">
                	<div class="text-center">
                		<button type="submit" name="insert" class="btn btn-dark">Hacer observaci&oacute;n</button>
                	</div>
                	</td>
                </tr>
              </tbody>
            </table>
           </div>
        </div>
    </form>
</div>

<script>
$(document).ready(function() {
    
    $("#filtro").on('click',function(){
		if($("#filtro").val()!=""){
			var valor = "indexAjax.php?pid=<?php echo base64_encode("ui/observador/hacerObservacionProfesorAjax.php" ); ?>&filtro="+$("#filtro").val();
			$("#resultados1").load(valor);
		}
		
	});
    $("#resultados1").select2();
});

$( function () {
	$("#profesor").keydown(function () {
		$("#profesor").prop("disabled", true);		
	});
	$("#fecha").keydown(function () {
		$("#fecha").prop("disabled", true);		
	});
});

</script>