<?php
class ClaseDAO{
	private $idClase;
	private $descripcion;
	private $materia;
	private $profesor;
	private $matricula;

	function ClaseDAO($pIdClase = "", $pDescripcion = "", $pMateria = "", $pProfesor = "", $pMatricula = ""){
		$this -> idClase = $pIdClase;
		$this -> descripcion = $pDescripcion;
		$this -> materia = $pMateria;
		$this -> profesor = $pProfesor;
		$this -> matricula = $pMatricula;
	}

	function insert(){
		return "insert into Clase(descripcion, materia_idMateria, profesor_idProfesor, matricula_idMatricula)
				values('" . $this -> descripcion . "', '" . $this -> materia . "', '" . $this -> profesor . "', '" . $this -> matricula . "')";
	}

	function update(){
		return "update Clase set 
				descripcion = '" . $this -> descripcion . "',
				materia_idMateria = '" . $this -> materia . "',
				profesor_idProfesor = '" . $this -> profesor . "',
				matricula_idMatricula = '" . $this -> matricula . "'	
				where idClase = '" . $this -> idClase . "'";
	}

	function select() {
		return "select idClase, descripcion, materia_idMateria, profesor_idProfesor, matricula_idMatricula
				from Clase
				where idClase = '" . $this -> idClase . "'";
	}

	function selectAll() {
		return "select idClase, descripcion, materia_idMateria, profesor_idProfesor, matricula_idMatricula
				from Clase";
	}

	function selectAllByMateria() {
		return "select idClase, descripcion, materia_idMateria, profesor_idProfesor, matricula_idMatricula
				from Clase
				where materia_idMateria = '" . $this -> materia . "'";
	}

	function selectAllByProfesor() {
		return "select idClase, descripcion, materia_idMateria, profesor_idProfesor, matricula_idMatricula
				from Clase
				where profesor_idProfesor = '" . $this -> profesor . "'";
	}

	function selectAllByMatricula() {
		return "select idClase, descripcion, materia_idMateria, profesor_idProfesor, matricula_idMatricula
				from Clase
				where matricula_idMatricula = '" . $this -> matricula . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idClase, descripcion, materia_idMateria, profesor_idProfesor, matricula_idMatricula
				from Clase
				order by " . $orden . " " . $dir;
	}

	function selectAllByMateriaOrder($orden, $dir) {
		return "select idClase, descripcion, materia_idMateria, profesor_idProfesor, matricula_idMatricula
				from Clase
				where materia_idMateria = '" . $this -> materia . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByProfesorOrder($orden, $dir) {
		return "select idClase, descripcion, materia_idMateria, profesor_idProfesor, matricula_idMatricula
				from Clase
				where profesor_idProfesor = '" . $this -> profesor . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByMatriculaOrder($orden, $dir) {
		return "select idClase, descripcion, materia_idMateria, profesor_idProfesor, matricula_idMatricula
				from Clase
				where matricula_idMatricula = '" . $this -> matricula . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idClase, descripcion, materia_idMateria, profesor_idProfesor, matricula_idMatricula
				from Clase
				where descripcion like '%" . $search . "%'";
	}
}
?>
