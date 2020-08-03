<?php
require_once ("persistence/ObservadorDAO.php");
require_once ("persistence/Connection.php");

class Observador {
	private $idObservador;
	private $descripcion;
	private $fecha;
	private $profesor;
	private $coordinador;
	private $matriculaEstudiante;
	private $observadorDAO;
	private $connection;

	
	function getObservadorDAO() {
	    return $this -> observadorDAO;
	}
	
	function getIdObservador() {
		return $this -> idObservador;
	}

	function setIdObservador($pIdObservador) {
		$this -> idObservador = $pIdObservador;
	}

	function getDescripcion() {
		return $this -> descripcion;
	}

	function setDescripcion($pDescripcion) {
		$this -> descripcion = $pDescripcion;
	}

	function getFecha() {
		return $this -> fecha;
	}

	function setFecha($pFecha) {
		$this -> fecha = $pFecha;
	}

	function getProfesor() {
		return $this -> profesor;
	}

	function setProfesor($pProfesor) {
		$this -> profesor = $pProfesor;
	}

	function getCoordinador() {
		return $this -> coordinador;
	}

	function setCoordinador($pCoordinador) {
		$this -> coordinador = $pCoordinador;
	}

	function getMatriculaEstudiante() {
		return $this -> matriculaEstudiante;
	}

	function setMatriculaEstudiante($pMatriculaEstudiante) {
		$this -> matriculaEstudiante = $pMatriculaEstudiante;
	}

	function Observador($pIdObservador = "", $pDescripcion = "", $pFecha = "", $pProfesor = "", $pCoordinador = "", $pMatriculaEstudiante = ""){
		$this -> idObservador = $pIdObservador;
		$this -> descripcion = $pDescripcion;
		$this -> fecha = $pFecha;
		$this -> profesor = $pProfesor;
		$this -> coordinador = $pCoordinador;
		$this -> matriculaEstudiante = $pMatriculaEstudiante;
		$this -> observadorDAO = new ObservadorDAO($this -> idObservador, $this -> descripcion, $this -> fecha, $this -> profesor, $this -> coordinador, $this -> matriculaEstudiante);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> observadorDAO -> insert());
		$this -> connection -> close();
	}
	
	function insertProfesor(){
	    $this -> connection -> open();
	    $this -> connection -> run($this -> observadorDAO -> insertProfesor());
	    $this -> connection -> close();
	}
	
	function insertCoordinador(){
	    $this -> connection -> open();
	    $this -> connection -> run($this -> observadorDAO -> insertCoordinador());
	    $this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> observadorDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> observadorDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idObservador = $result[0];
		$this -> descripcion = $result[1];
		$this -> fecha = $result[2];
		$profesor = new Profesor($result[3]);
		$profesor -> select();
		$this -> profesor = $profesor;
		$coordinador = new Coordinador($result[4]);
		$coordinador -> select();
		$this -> coordinador = $coordinador;
		$matriculaEstudiante = new MatriculaEstudiante($result[5]);
		$matriculaEstudiante -> select();
		$this -> matriculaEstudiante = $matriculaEstudiante;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> observadorDAO -> selectAll());
		$observadors = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[3]);
			$profesor -> select();
			$coordinador = new Coordinador($result[4]);
			$coordinador -> select();
			$matriculaEstudiante = new MatriculaEstudiante($result[5]);
			$matriculaEstudiante -> select();
			array_push($observadors, new Observador($result[0], $result[1], $result[2], $profesor, $coordinador, $matriculaEstudiante));
		}
		$this -> connection -> close();
		return $observadors;
	}

	function selectAllByProfesor(){
		$this -> connection -> open();
		$this -> connection -> run($this -> observadorDAO -> selectAllByProfesor());
		$observadors = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[3]);
			$profesor -> select();
			$coordinador = new Coordinador($result[4]);
			$coordinador -> select();
			$matriculaEstudiante = new MatriculaEstudiante($result[5]);
			$matriculaEstudiante -> select();
			array_push($observadors, new Observador($result[0], $result[1], $result[2], $profesor, $coordinador, $matriculaEstudiante));
		}
		$this -> connection -> close();
		return $observadors;
	}

	function selectAllByCoordinador(){
		$this -> connection -> open();
		$this -> connection -> run($this -> observadorDAO -> selectAllByCoordinador());
		$observadors = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[3]);
			$profesor -> select();
			$coordinador = new Coordinador($result[4]);
			$coordinador -> select();
			$matriculaEstudiante = new MatriculaEstudiante($result[5]);
			$matriculaEstudiante -> select();
			array_push($observadors, new Observador($result[0], $result[1], $result[2], $profesor, $coordinador, $matriculaEstudiante));
		}
		$this -> connection -> close();
		return $observadors;
	}

	function selectAllByMatriculaEstudiante(){
		$this -> connection -> open();
		$this -> connection -> run($this -> observadorDAO -> selectAllByMatriculaEstudiante());
		$observadors = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[3]);
			$profesor -> select();
			$coordinador = new Coordinador($result[4]);
			$coordinador -> select();
			$matriculaEstudiante = new MatriculaEstudiante($result[5]);
			$matriculaEstudiante -> select();
			array_push($observadors, new Observador($result[0], $result[1], $result[2], $profesor, $coordinador, $matriculaEstudiante));
		}
		$this -> connection -> close();
		return $observadors;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> observadorDAO -> selectAllOrder($order, $dir));
		$observadors = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[3]);
			$profesor -> select();
			$coordinador = new Coordinador($result[4]);
			$coordinador -> select();
			$matriculaEstudiante = new MatriculaEstudiante($result[5]);
			$matriculaEstudiante -> select();
			array_push($observadors, new Observador($result[0], $result[1], $result[2], $profesor, $coordinador, $matriculaEstudiante));
		}
		$this -> connection -> close();
		return $observadors;
	}

	function selectAllByProfesorOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> observadorDAO -> selectAllByProfesorOrder($order, $dir));
		$observadors = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[3]);
			$profesor -> select();
			$coordinador = new Coordinador($result[4]);
			$coordinador -> select();
			$matriculaEstudiante = new MatriculaEstudiante($result[5]);
			$matriculaEstudiante -> select();
			array_push($observadors, new Observador($result[0], $result[1], $result[2], $profesor, $coordinador, $matriculaEstudiante));
		}
		$this -> connection -> close();
		return $observadors;
	}

	function selectAllByCoordinadorOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> observadorDAO -> selectAllByCoordinadorOrder($order, $dir));
		$observadors = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[3]);
			$profesor -> select();
			$coordinador = new Coordinador($result[4]);
			$coordinador -> select();
			$matriculaEstudiante = new MatriculaEstudiante($result[5]);
			$matriculaEstudiante -> select();
			array_push($observadors, new Observador($result[0], $result[1], $result[2], $profesor, $coordinador, $matriculaEstudiante));
		}
		$this -> connection -> close();
		return $observadors;
	}

	function selectAllByMatriculaEstudianteOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> observadorDAO -> selectAllByMatriculaEstudianteOrder($order, $dir));
		$observadors = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[3]);
			$profesor -> select();
			$coordinador = new Coordinador($result[4]);
			$coordinador -> select();
			$matriculaEstudiante = new MatriculaEstudiante($result[5]);
			$matriculaEstudiante -> select();
			array_push($observadors, new Observador($result[0], $result[1], $result[2], $profesor, $coordinador, $matriculaEstudiante));
		}
		$this -> connection -> close();
		return $observadors;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> observadorDAO -> search($search));
		$observadors = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[3]);
			$profesor -> select();
			$coordinador = new Coordinador($result[4]);
			$coordinador -> select();
			$matriculaEstudiante = new MatriculaEstudiante($result[5]);
			$matriculaEstudiante -> select();
			array_push($observadors, new Observador($result[0], $result[1], $result[2], $profesor, $coordinador, $matriculaEstudiante));
		}
		$this -> connection -> close();
		return $observadors;
	}
	
	function observadorAcudiente($estudiante){
	    $this -> connection -> open();
	    $this -> connection -> run($this -> observadorDAO -> observadorAcudiente($estudiante));
	    $observadors = array();
	    while ($result = $this -> connection -> fetchRow()){
	        $profesor = new Profesor($result[2]);
	        $profesor -> select();
	        $coordinador = new Coordinador($result[3]);
	        $coordinador -> select();
	        array_push($observadors, new Observador($result[0], $result[1], $profesor, $coordinador, $result[4], $result[5]));
	    }
	    $this -> connection -> close();
	    return $observadors;
	}
}
?>
