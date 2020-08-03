<?php
class MatriculaEstudianteDAO{
	private $idMatriculaEstudiante;
	private $descripcion;
	private $matricula;
	private $estudiante;

	function MatriculaEstudianteDAO($pIdMatriculaEstudiante = "", $pDescripcion = "", $pMatricula = "", $pEstudiante = ""){
		$this -> idMatriculaEstudiante = $pIdMatriculaEstudiante;
		$this -> descripcion = $pDescripcion;
		$this -> matricula = $pMatricula;
		$this -> estudiante = $pEstudiante;
	}

	function insert(){
		return "insert into MatriculaEstudiante(descripcion, matricula_idMatricula, estudiante_idEstudiante)
				values('" . $this -> descripcion . "', '" . $this -> matricula . "', '" . $this -> estudiante . "')";
	}

	function update(){
		return "update MatriculaEstudiante set 
				descripcion = '" . $this -> descripcion . "',
				matricula_idMatricula = '" . $this -> matricula . "',
				estudiante_idEstudiante = '" . $this -> estudiante . "'	
				where idMatriculaEstudiante = '" . $this -> idMatriculaEstudiante . "'";
	}

	function select() {
		return "select idMatriculaEstudiante, descripcion, matricula_idMatricula, estudiante_idEstudiante
				from MatriculaEstudiante
				where idMatriculaEstudiante = '" . $this -> idMatriculaEstudiante . "'";
	}

	function selectAll() {
		return "select idMatriculaEstudiante, descripcion, matricula_idMatricula, estudiante_idEstudiante
				from MatriculaEstudiante";
	}

	function selectAllByMatricula() {
		return "select idMatriculaEstudiante, descripcion, matricula_idMatricula, estudiante_idEstudiante
				from MatriculaEstudiante
				where matricula_idMatricula = '" . $this -> matricula . "'";
	}
	
	function selectAllByEstudiante1() {
	    return "select idMatriculaEstudiante, descripcion, matricula_idMatricula, estudiante_idEstudiante
				from MatriculaEstudiante
				where estudiante_idEstudiante = '" . $this -> estudiante . "'";
	}

	function selectAllByEstudiante() {
		return "select idMatriculaEstudiante, descripcion, matricula_idMatricula, estudiante_idEstudiante
				from MatriculaEstudiante
				where estudiante_idEstudiante = '" . $this -> estudiante . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idMatriculaEstudiante, descripcion, matricula_idMatricula, estudiante_idEstudiante
				from MatriculaEstudiante
				order by " . $orden . " " . $dir;
	}

	function selectAllByMatriculaOrder($orden, $dir) {
		return "select idMatriculaEstudiante, descripcion, matricula_idMatricula, estudiante_idEstudiante
				from MatriculaEstudiante
				where matricula_idMatricula = '" . $this -> matricula . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByEstudianteOrder($orden, $dir) {
		return "select idMatriculaEstudiante, descripcion, matricula_idMatricula, estudiante_idEstudiante
				from MatriculaEstudiante
				where estudiante_idEstudiante = '" . $this -> estudiante . "'
				order by " . $orden . " " . $dir;
	}

	function delete(){
		return "delete from MatriculaEstudiante
				where idMatriculaEstudiante = '" . $this -> idMatriculaEstudiante . "'";
	}
}
?>
