<?php
require_once ("persistence/AcudienteEstudianteDAO.php");
require_once ("persistence/Connection.php");

class AcudienteEstudiante {
	private $idAcudienteEstudiante;
	private $fecha;
	private $estudiante;
	private $acudiente;
	private $acudienteEstudianteDAO;
	private $connection;

	function getIdAcudienteEstudiante() {
		return $this -> idAcudienteEstudiante;
	}

	function setIdAcudienteEstudiante($pIdAcudienteEstudiante) {
		$this -> idAcudienteEstudiante = $pIdAcudienteEstudiante;
	}

	function getFecha() {
		return $this -> fecha;
	}

	function setFecha($pFecha) {
		$this -> fecha = $pFecha;
	}

	function getEstudiante() {
		return $this -> estudiante;
	}

	function setEstudiante($pEstudiante) {
		$this -> estudiante = $pEstudiante;
	}

	function getAcudiente() {
		return $this -> acudiente;
	}

	function setAcudiente($pAcudiente) {
		$this -> acudiente = $pAcudiente;
	}

	function AcudienteEstudiante($pIdAcudienteEstudiante = "", $pFecha = "", $pEstudiante = "", $pAcudiente = ""){
		$this -> idAcudienteEstudiante = $pIdAcudienteEstudiante;
		$this -> fecha = $pFecha;
		$this -> estudiante = $pEstudiante;
		$this -> acudiente = $pAcudiente;
		$this -> acudienteEstudianteDAO = new AcudienteEstudianteDAO($this -> idAcudienteEstudiante, $this -> fecha, $this -> estudiante, $this -> acudiente);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> acudienteEstudianteDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> acudienteEstudianteDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> acudienteEstudianteDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idAcudienteEstudiante = $result[0];
		$this -> fecha = $result[1];
		$estudiante = new Estudiante($result[2]);
		$estudiante -> select();
		$this -> estudiante = $estudiante;
		$acudiente = new Acudiente($result[3]);
		$acudiente -> select();
		$this -> acudiente = $acudiente;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> acudienteEstudianteDAO -> selectAll());
		$acudienteEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[2]);
			$estudiante -> select();
			$acudiente = new Acudiente($result[3]);
			$acudiente -> select();
			array_push($acudienteEstudiantes, new AcudienteEstudiante($result[0], $result[1], $estudiante, $acudiente));
		}
		$this -> connection -> close();
		return $acudienteEstudiantes;
	}

	function selectAllByEstudiante(){
		$this -> connection -> open();
		$this -> connection -> run($this -> acudienteEstudianteDAO -> selectAllByEstudiante());
		$acudienteEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[2]);
			$estudiante -> select();
			$acudiente = new Acudiente($result[3]);
			$acudiente -> select();
			array_push($acudienteEstudiantes, new AcudienteEstudiante($result[0], $result[1], $estudiante, $acudiente));
		}
		$this -> connection -> close();
		return $acudienteEstudiantes;
	}

	function selectAllByAcudiente(){
		$this -> connection -> open();
		$this -> connection -> run($this -> acudienteEstudianteDAO -> selectAllByAcudiente());
		$acudienteEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[2]);
			$estudiante -> select();
			$acudiente = new Acudiente($result[3]);
			$acudiente -> select();
			array_push($acudienteEstudiantes, new AcudienteEstudiante($result[0], $result[1], $estudiante, $acudiente));
		}
		$this -> connection -> close();
		return $acudienteEstudiantes;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> acudienteEstudianteDAO -> selectAllOrder($order, $dir));
		$acudienteEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[2]);
			$estudiante -> select();
			$acudiente = new Acudiente($result[3]);
			$acudiente -> select();
			array_push($acudienteEstudiantes, new AcudienteEstudiante($result[0], $result[1], $estudiante, $acudiente));
		}
		$this -> connection -> close();
		return $acudienteEstudiantes;
	}

	function selectAllByEstudianteOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> acudienteEstudianteDAO -> selectAllByEstudianteOrder($order, $dir));
		$acudienteEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[2]);
			$estudiante -> select();
			$acudiente = new Acudiente($result[3]);
			$acudiente -> select();
			array_push($acudienteEstudiantes, new AcudienteEstudiante($result[0], $result[1], $estudiante, $acudiente));
		}
		$this -> connection -> close();
		return $acudienteEstudiantes;
	}

	function selectAllByAcudienteOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> acudienteEstudianteDAO -> selectAllByAcudienteOrder($order, $dir));
		$acudienteEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[2]);
			$estudiante -> select();
			$acudiente = new Acudiente($result[3]);
			$acudiente -> select();
			array_push($acudienteEstudiantes, new AcudienteEstudiante($result[0], $result[1], $estudiante, $acudiente));
		}
		$this -> connection -> close();
		return $acudienteEstudiantes;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> acudienteEstudianteDAO -> search($search));
		$acudienteEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estudiante = new Estudiante($result[2]);
			$estudiante -> select();
			$acudiente = new Acudiente($result[3]);
			$acudiente -> select();
			array_push($acudienteEstudiantes, new AcudienteEstudiante($result[0], $result[1], $estudiante, $acudiente));
		}
		$this -> connection -> close();
		return $acudienteEstudiantes;
	}
	
	function citaAcudiente($acudiente){
	    $this -> connection -> open();
	    $this -> connection -> run($this -> acudienteEstudianteDAO -> citaAcudiente($acudiente));
	    $acudienteEstudiantes = array();
	    while ($result = $this -> connection -> fetchRow()){
	        
	        array_push($acudienteEstudiantes, new AcudienteEstudiante($result[0], $result[1], $result[2]));
	    }
	    $this -> connection -> close();
	    return $acudienteEstudiantes;
	}
}
?>
