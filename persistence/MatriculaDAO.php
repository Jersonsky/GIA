<?php
class MatriculaDAO{
	private $idMatricula;
	private $fecha;
	private $curso;

	function MatriculaDAO($pIdMatricula = "", $pFecha = "", $pCurso = ""){
		$this -> idMatricula = $pIdMatricula;
		$this -> fecha = $pFecha;
		$this -> curso = $pCurso;
	}

	function insert(){
		return "insert into Matricula(fecha, curso_idCurso)
				values('" . $this -> fecha . "', '" . $this -> curso . "')";
	}

	function update(){
		return "update Matricula set 
				fecha = '" . $this -> fecha . "',
				curso_idCurso = '" . $this -> curso . "'	
				where idMatricula = '" . $this -> idMatricula . "'";
	}

	function select() {
		return "select idMatricula, fecha, curso_idCurso
				from Matricula
				where idMatricula = '" . $this -> idMatricula . "'";
	}

	function selectAll() {
		return "select idMatricula, fecha, curso_idCurso
				from Matricula";
	}

	function selectAllByCurso() {
		return "select idMatricula, fecha, curso_idCurso
				from Matricula
				where curso_idCurso = '" . $this -> curso . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idMatricula, fecha, curso_idCurso
				from Matricula
				order by " . $orden . " " . $dir;
	}

	function selectAllByCursoOrder($orden, $dir) {
		return "select idMatricula, fecha, curso_idCurso
				from Matricula
				where curso_idCurso = '" . $this -> curso . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idMatricula, fecha, curso_idCurso
				from Matricula
				where fecha like '%" . $search . "%'";
	}
}
?>
