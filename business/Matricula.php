<?php
require_once ("persistence/MatriculaDAO.php");
require_once ("persistence/Connection.php");

class Matricula {
	private $idMatricula;
	private $fecha;
	private $curso;
	private $matriculaDAO;
	private $connection;

	function getIdMatricula() {
		return $this -> idMatricula;
	}

	function setIdMatricula($pIdMatricula) {
		$this -> idMatricula = $pIdMatricula;
	}

	function getFecha() {
		return $this -> fecha;
	}

	function setFecha($pFecha) {
		$this -> fecha = $pFecha;
	}

	function getCurso() {
		return $this -> curso;
	}

	function setCurso($pCurso) {
		$this -> curso = $pCurso;
	}

	function Matricula($pIdMatricula = "", $pFecha = "", $pCurso = ""){
		$this -> idMatricula = $pIdMatricula;
		$this -> fecha = $pFecha;
		$this -> curso = $pCurso;
		$this -> matriculaDAO = new MatriculaDAO($this -> idMatricula, $this -> fecha, $this -> curso);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> matriculaDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> matriculaDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> matriculaDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idMatricula = $result[0];
		$this -> fecha = $result[1];
		$curso = new Curso($result[2]);
		$curso -> select();
		$this -> curso = $curso;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> matriculaDAO -> selectAll());
		$matriculas = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[2]);
			$curso -> select();
			array_push($matriculas, new Matricula($result[0], $result[1], $curso));
		}
		$this -> connection -> close();
		return $matriculas;
	}

	function selectAllByCurso(){
		$this -> connection -> open();
		$this -> connection -> run($this -> matriculaDAO -> selectAllByCurso());
		$matriculas = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[2]);
			$curso -> select();
			array_push($matriculas, new Matricula($result[0], $result[1], $curso));
		}
		$this -> connection -> close();
		return $matriculas;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> matriculaDAO -> selectAllOrder($order, $dir));
		$matriculas = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[2]);
			$curso -> select();
			array_push($matriculas, new Matricula($result[0], $result[1], $curso));
		}
		$this -> connection -> close();
		return $matriculas;
	}

	function selectAllByCursoOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> matriculaDAO -> selectAllByCursoOrder($order, $dir));
		$matriculas = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[2]);
			$curso -> select();
			array_push($matriculas, new Matricula($result[0], $result[1], $curso));
		}
		$this -> connection -> close();
		return $matriculas;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> matriculaDAO -> search($search));
		$matriculas = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[2]);
			$curso -> select();
			array_push($matriculas, new Matricula($result[0], $result[1], $curso));
		}
		$this -> connection -> close();
		return $matriculas;
	}
}
?>
