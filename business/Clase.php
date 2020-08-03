<?php
require_once ("persistence/ClaseDAO.php");
require_once ("persistence/Connection.php");

class Clase {
	private $idClase;
	private $descripcion;
	private $materia;
	private $profesor;
	private $matricula;
	private $claseDAO;
	private $connection;

	function getIdClase() {
		return $this -> idClase;
	}

	function setIdClase($pIdClase) {
		$this -> idClase = $pIdClase;
	}

	function getDescripcion() {
		return $this -> descripcion;
	}

	function setDescripcion($pDescripcion) {
		$this -> descripcion = $pDescripcion;
	}

	function getMateria() {
		return $this -> materia;
	}

	function setMateria($pMateria) {
		$this -> materia = $pMateria;
	}

	function getProfesor() {
		return $this -> profesor;
	}

	function setProfesor($pProfesor) {
		$this -> profesor = $pProfesor;
	}

	function getMatricula() {
		return $this -> matricula;
	}

	function setMatricula($pMatricula) {
		$this -> matricula = $pMatricula;
	}

	function Clase($pIdClase = "", $pDescripcion = "", $pMateria = "", $pProfesor = "", $pMatricula = ""){
		$this -> idClase = $pIdClase;
		$this -> descripcion = $pDescripcion;
		$this -> materia = $pMateria;
		$this -> profesor = $pProfesor;
		$this -> matricula = $pMatricula;
		$this -> claseDAO = new ClaseDAO($this -> idClase, $this -> descripcion, $this -> materia, $this -> profesor, $this -> matricula);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> claseDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> claseDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> claseDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idClase = $result[0];
		$this -> descripcion = $result[1];
		$materia = new Materia($result[2]);
		$materia -> select();
		$this -> materia = $materia;
		$profesor = new Profesor($result[3]);
		$profesor -> select();
		$this -> profesor = $profesor;
		$matricula = new Matricula($result[4]);
		$matricula -> select();
		$this -> matricula = $matricula;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> claseDAO -> selectAll());
		$clases = array();
		while ($result = $this -> connection -> fetchRow()){
			$materia = new Materia($result[2]);
			$materia -> select();
			$profesor = new Profesor($result[3]);
			$profesor -> select();
			$matricula = new Matricula($result[4]);
			$matricula -> select();
			array_push($clases, new Clase($result[0], $result[1], $materia, $profesor, $matricula));
		}
		$this -> connection -> close();
		return $clases;
	}

	function selectAllByMateria(){
		$this -> connection -> open();
		$this -> connection -> run($this -> claseDAO -> selectAllByMateria());
		$clases = array();
		while ($result = $this -> connection -> fetchRow()){
			$materia = new Materia($result[2]);
			$materia -> select();
			$profesor = new Profesor($result[3]);
			$profesor -> select();
			$matricula = new Matricula($result[4]);
			$matricula -> select();
			array_push($clases, new Clase($result[0], $result[1], $materia, $profesor, $matricula));
		}
		$this -> connection -> close();
		return $clases;
	}

	function selectAllByProfesor(){
		$this -> connection -> open();
		$this -> connection -> run($this -> claseDAO -> selectAllByProfesor());
		$clases = array();
		while ($result = $this -> connection -> fetchRow()){
			$materia = new Materia($result[2]);
			$materia -> select();
			$profesor = new Profesor($result[3]);
			$profesor -> select();
			$matricula = new Matricula($result[4]);
			$matricula -> select();
			array_push($clases, new Clase($result[0], $result[1], $materia, $profesor, $matricula));
		}
		$this -> connection -> close();
		return $clases;
	}

	function selectAllByMatricula(){
		$this -> connection -> open();
		$this -> connection -> run($this -> claseDAO -> selectAllByMatricula());
		$clases = array();
		while ($result = $this -> connection -> fetchRow()){
			$materia = new Materia($result[2]);
			$materia -> select();
			$profesor = new Profesor($result[3]);
			$profesor -> select();
			$matricula = new Matricula($result[4]);
			$matricula -> select();
			array_push($clases, new Clase($result[0], $result[1], $materia, $profesor, $matricula));
		}
		$this -> connection -> close();
		return $clases;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> claseDAO -> selectAllOrder($order, $dir));
		$clases = array();
		while ($result = $this -> connection -> fetchRow()){
			$materia = new Materia($result[2]);
			$materia -> select();
			$profesor = new Profesor($result[3]);
			$profesor -> select();
			$matricula = new Matricula($result[4]);
			$matricula -> select();
			array_push($clases, new Clase($result[0], $result[1], $materia, $profesor, $matricula));
		}
		$this -> connection -> close();
		return $clases;
	}

	function selectAllByMateriaOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> claseDAO -> selectAllByMateriaOrder($order, $dir));
		$clases = array();
		while ($result = $this -> connection -> fetchRow()){
			$materia = new Materia($result[2]);
			$materia -> select();
			$profesor = new Profesor($result[3]);
			$profesor -> select();
			$matricula = new Matricula($result[4]);
			$matricula -> select();
			array_push($clases, new Clase($result[0], $result[1], $materia, $profesor, $matricula));
		}
		$this -> connection -> close();
		return $clases;
	}

	function selectAllByProfesorOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> claseDAO -> selectAllByProfesorOrder($order, $dir));
		$clases = array();
		while ($result = $this -> connection -> fetchRow()){
			$materia = new Materia($result[2]);
			$materia -> select();
			$profesor = new Profesor($result[3]);
			$profesor -> select();
			$matricula = new Matricula($result[4]);
			$matricula -> select();
			array_push($clases, new Clase($result[0], $result[1], $materia, $profesor, $matricula));
		}
		$this -> connection -> close();
		return $clases;
	}

	function selectAllByMatriculaOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> claseDAO -> selectAllByMatriculaOrder($order, $dir));
		$clases = array();
		while ($result = $this -> connection -> fetchRow()){
			$materia = new Materia($result[2]);
			$materia -> select();
			$profesor = new Profesor($result[3]);
			$profesor -> select();
			$matricula = new Matricula($result[4]);
			$matricula -> select();
			array_push($clases, new Clase($result[0], $result[1], $materia, $profesor, $matricula));
		}
		$this -> connection -> close();
		return $clases;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> claseDAO -> search($search));
		$clases = array();
		while ($result = $this -> connection -> fetchRow()){
			$materia = new Materia($result[2]);
			$materia -> select();
			$profesor = new Profesor($result[3]);
			$profesor -> select();
			$matricula = new Matricula($result[4]);
			$matricula -> select();
			array_push($clases, new Clase($result[0], $result[1], $materia, $profesor, $matricula));
		}
		$this -> connection -> close();
		return $clases;
	}
}
?>
