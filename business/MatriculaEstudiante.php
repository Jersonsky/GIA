<?php
require_once ("persistence/MatriculaEstudianteDAO.php");
require_once ("persistence/Connection.php");

class MatriculaEstudiante {
	private $idMatriculaEstudiante;
	private $descripcion;
	private $matricula;
	private $estudiante;
	private $matriculaEstudianteDAO;
	private $connection;

	function getMatriculaEstudianteDAO() {
	    return $this -> matriculaEstudianteDAO;
	}
	
	function getIdMatriculaEstudiante() {
		return $this -> idMatriculaEstudiante;
	}

	function setIdMatriculaEstudiante($pIdMatriculaEstudiante) {
		$this -> idMatriculaEstudiante = $pIdMatriculaEstudiante;
	}

	function getDescripcion() {
		return $this -> descripcion;
	}

	function setDescripcion($pDescripcion) {
		$this -> descripcion = $pDescripcion;
	}

	function getMatricula() {
		return $this -> matricula;
	}

	function setMatricula($pMatricula) {
		$this -> matricula = $pMatricula;
	}

	function getEstudiante() {
		return $this -> estudiante;
	}

	function setEstudiante($pEstudiante) {
		$this -> estudiante = $pEstudiante;
	}

	function MatriculaEstudiante($pIdMatriculaEstudiante = "", $pDescripcion = "", $pMatricula = "", $pEstudiante = ""){
		$this -> idMatriculaEstudiante = $pIdMatriculaEstudiante;
		$this -> descripcion = $pDescripcion;
		$this -> matricula = $pMatricula;
		$this -> estudiante = $pEstudiante;
		$this -> matriculaEstudianteDAO = new MatriculaEstudianteDAO($this -> idMatriculaEstudiante, $this -> descripcion, $this -> matricula, $this -> estudiante);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> matriculaEstudianteDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> matriculaEstudianteDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> matriculaEstudianteDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idMatriculaEstudiante = $result[0];
		$this -> descripcion = $result[1];
		$matricula = new Matricula($result[2]);
		$matricula -> select();
		$this -> matricula = $matricula;
		$estudiante = new Estudiante($result[3]);
		$estudiante -> select();
		$this -> estudiante = $estudiante;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> matriculaEstudianteDAO -> selectAll());
		$matriculaEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$matricula = new Matricula($result[2]);
			$matricula -> select();
			$estudiante = new Estudiante($result[3]);
			$estudiante -> select();
			array_push($matriculaEstudiantes, new MatriculaEstudiante($result[0], $result[1], $matricula, $estudiante));
		}
		$this -> connection -> close();
		return $matriculaEstudiantes;
	}

	function selectAllByMatricula(){
		$this -> connection -> open();
		$this -> connection -> run($this -> matriculaEstudianteDAO -> selectAllByMatricula());
		$matriculaEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$matricula = new Matricula($result[2]);
			$matricula -> select();
			$estudiante = new Estudiante($result[3]);
			$estudiante -> select();
			array_push($matriculaEstudiantes, new MatriculaEstudiante($result[0], $result[1], $matricula, $estudiante));
		}
		$this -> connection -> close();
		return $matriculaEstudiantes;
	}
	
	function selectAllByEstudiante1(){
	    $this -> connection -> open();
	    $this -> connection -> run($this -> matriculaEstudianteDAO -> selectAllByEstudiante1());
	    $result = $this -> connection -> fetchRow();
	    $this -> connection -> close();
	    $this -> idMatriculaEstudiante = $result[0];
	    $this -> descripcion = $result[1];
	    $matricula = new Matricula($result[2]);
	    $matricula -> select();
	    $this -> matricula = $matricula;
	    $estudiante = new Estudiante($result[3]);
	    $estudiante -> select();
	    $this -> estudiante = $estudiante;
	}

	function selectAllByEstudiante(){
		$this -> connection -> open();
		$this -> connection -> run($this -> matriculaEstudianteDAO -> selectAllByEstudiante());
		$matriculaEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$matricula = new Matricula($result[2]);
			$matricula -> select();
			$estudiante = new Estudiante($result[3]);
			$estudiante -> select();
			array_push($matriculaEstudiantes, new MatriculaEstudiante($result[0], $result[1], $matricula, $estudiante));
		}
		$this -> connection -> close();
		return $matriculaEstudiantes;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> matriculaEstudianteDAO -> selectAllOrder($order, $dir));
		$matriculaEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$matricula = new Matricula($result[2]);
			$matricula -> select();
			$estudiante = new Estudiante($result[3]);
			$estudiante -> select();
			array_push($matriculaEstudiantes, new MatriculaEstudiante($result[0], $result[1], $matricula, $estudiante));
		}
		$this -> connection -> close();
		return $matriculaEstudiantes;
	}

	function selectAllByMatriculaOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> matriculaEstudianteDAO -> selectAllByMatriculaOrder($order, $dir));
		$matriculaEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$matricula = new Matricula($result[2]);
			$matricula -> select();
			$estudiante = new Estudiante($result[3]);
			$estudiante -> select();
			array_push($matriculaEstudiantes, new MatriculaEstudiante($result[0], $result[1], $matricula, $estudiante));
		}
		$this -> connection -> close();
		return $matriculaEstudiantes;
	}

	function selectAllByEstudianteOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> matriculaEstudianteDAO -> selectAllByEstudianteOrder($order, $dir));
		$matriculaEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$matricula = new Matricula($result[2]);
			$matricula -> select();
			$estudiante = new Estudiante($result[3]);
			$estudiante -> select();
			array_push($matriculaEstudiantes, new MatriculaEstudiante($result[0], $result[1], $matricula, $estudiante));
		}
		$this -> connection -> close();
		return $matriculaEstudiantes;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> matriculaEstudianteDAO -> search($search));
		$matriculaEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$matricula = new Matricula($result[2]);
			$matricula -> select();
			$estudiante = new Estudiante($result[3]);
			$estudiante -> select();
			array_push($matriculaEstudiantes, new MatriculaEstudiante($result[0], $result[1], $matricula, $estudiante));
		}
		$this -> connection -> close();
		return $matriculaEstudiantes;
	}

	function delete(){
		$this -> connection -> open();
		$this -> connection -> run($this -> matriculaEstudianteDAO -> delete());
		$success = $this -> connection -> querySuccess();
		$this -> connection -> close();
		return $success;
	}
}
?>
