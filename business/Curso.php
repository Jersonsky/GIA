<?php
require_once ("persistence/CursoDAO.php");
require_once ("persistence/Connection.php");

class Curso {
	private $idCurso;
	private $nombrecurso;
	private $sede;
	private $cursoDAO;
	private $connection;

	function getIdCurso() {
		return $this -> idCurso;
	}

	function setIdCurso($pIdCurso) {
		$this -> idCurso = $pIdCurso;
	}

	function getNombrecurso() {
		return $this -> nombrecurso;
	}

	function setNombrecurso($pNombrecurso) {
		$this -> nombrecurso = $pNombrecurso;
	}

	function getSede() {
		return $this -> sede;
	}

	function setSede($pSede) {
		$this -> sede = $pSede;
	}

	function Curso($pIdCurso = "", $pNombrecurso = "", $pSede = ""){
		$this -> idCurso = $pIdCurso;
		$this -> nombrecurso = $pNombrecurso;
		$this -> sede = $pSede;
		$this -> cursoDAO = new CursoDAO($this -> idCurso, $this -> nombrecurso, $this -> sede);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idCurso = $result[0];
		$this -> nombrecurso = $result[1];
		$sede = new Sede($result[2]);
		$sede -> select();
		$this -> sede = $sede;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoDAO -> selectAll());
		$cursos = array();
		while ($result = $this -> connection -> fetchRow()){
			$sede = new Sede($result[2]);
			$sede -> select();
			array_push($cursos, new Curso($result[0], $result[1], $sede));
		}
		$this -> connection -> close();
		return $cursos;
	}

	function selectAllBySede(){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoDAO -> selectAllBySede());
		$cursos = array();
		while ($result = $this -> connection -> fetchRow()){
			$sede = new Sede($result[2]);
			$sede -> select();
			array_push($cursos, new Curso($result[0], $result[1], $sede));
		}
		$this -> connection -> close();
		return $cursos;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoDAO -> selectAllOrder($order, $dir));
		$cursos = array();
		while ($result = $this -> connection -> fetchRow()){
			$sede = new Sede($result[2]);
			$sede -> select();
			array_push($cursos, new Curso($result[0], $result[1], $sede));
		}
		$this -> connection -> close();
		return $cursos;
	}

	function selectAllBySedeOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoDAO -> selectAllBySedeOrder($order, $dir));
		$cursos = array();
		while ($result = $this -> connection -> fetchRow()){
			$sede = new Sede($result[2]);
			$sede -> select();
			array_push($cursos, new Curso($result[0], $result[1], $sede));
		}
		$this -> connection -> close();
		return $cursos;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoDAO -> search($search));
		$cursos = array();
		while ($result = $this -> connection -> fetchRow()){
			$sede = new Sede($result[2]);
			$sede -> select();
			array_push($cursos, new Curso($result[0], $result[1], $sede));
		}
		$this -> connection -> close();
		return $cursos;
	}
	
	function cursoEstudiante($filtro){
	    $this -> connection -> open();
	    $this -> connection -> run($this -> cursoDAO -> cursoEstudiante($filtro));
	    $cursos = array();
	    while ($result = $this -> connection -> fetchRow()){
	        array_push($cursos, new Curso($result[0]));
	    }
	    $this -> connection -> close();
	    return $cursos;
	}
}
?>
