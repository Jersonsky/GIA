<?php
require_once ("persistence/CitaDAO.php");
require_once ("persistence/Connection.php");

class Cita {
	private $idCita;
	private $descripcion;
	private $fecha;
	private $coordinador;
	private $acudienteEstudiante;
	private $citaDAO;
	private $connection;

	function getIdCita() {
		return $this -> idCita;
	}

	function setIdCita($pIdCita) {
		$this -> idCita = $pIdCita;
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

	function getCoordinador() {
		return $this -> coordinador;
	}

	function setCoordinador($pCoordinador) {
		$this -> coordinador = $pCoordinador;
	}

	function getAcudienteEstudiante() {
		return $this -> acudienteEstudiante;
	}

	function setAcudienteEstudiante($pAcudienteEstudiante) {
		$this -> acudienteEstudiante = $pAcudienteEstudiante;
	}

	function Cita($pIdCita = "", $pDescripcion = "", $pFecha = "", $pCoordinador = "", $pAcudienteEstudiante = ""){
		$this -> idCita = $pIdCita;
		$this -> descripcion = $pDescripcion;
		$this -> fecha = $pFecha;
		$this -> coordinador = $pCoordinador;
		$this -> acudienteEstudiante = $pAcudienteEstudiante;
		$this -> citaDAO = new CitaDAO($this -> idCita, $this -> descripcion, $this -> fecha, $this -> coordinador, $this -> acudienteEstudiante);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> citaDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> citaDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> citaDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idCita = $result[0];
		$this -> descripcion = $result[1];
		$this -> fecha = $result[2];
		$coordinador = new Coordinador($result[3]);
		$coordinador -> select();
		$this -> coordinador = $coordinador;
		$acudienteEstudiante = new AcudienteEstudiante($result[4]);
		$acudienteEstudiante -> select();
		$this -> acudienteEstudiante = $acudienteEstudiante;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> citaDAO -> selectAll());
		$citas = array();
		while ($result = $this -> connection -> fetchRow()){
			$coordinador = new Coordinador($result[3]);
			$coordinador -> select();
			$acudienteEstudiante = new AcudienteEstudiante($result[4]);
			$acudienteEstudiante -> select();
			array_push($citas, new Cita($result[0], $result[1], $result[2], $coordinador, $acudienteEstudiante));
		}
		$this -> connection -> close();
		return $citas;
	}

	function selectAllByCoordinador(){
		$this -> connection -> open();
		$this -> connection -> run($this -> citaDAO -> selectAllByCoordinador());
		$citas = array();
		while ($result = $this -> connection -> fetchRow()){
			$coordinador = new Coordinador($result[3]);
			$coordinador -> select();
			$acudienteEstudiante = new AcudienteEstudiante($result[4]);
			$acudienteEstudiante -> select();
			array_push($citas, new Cita($result[0], $result[1], $result[2], $coordinador, $acudienteEstudiante));
		}
		$this -> connection -> close();
		return $citas;
	}

	function selectAllByAcudienteEstudiante(){
		$this -> connection -> open();
		$this -> connection -> run($this -> citaDAO -> selectAllByAcudienteEstudiante());
		$citas = array();
		while ($result = $this -> connection -> fetchRow()){
			$coordinador = new Coordinador($result[3]);
			$coordinador -> select();
			$acudienteEstudiante = new AcudienteEstudiante($result[4]);
			$acudienteEstudiante -> select();
			array_push($citas, new Cita($result[0], $result[1], $result[2], $coordinador, $acudienteEstudiante));
		}
		$this -> connection -> close();
		return $citas;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> citaDAO -> selectAllOrder($order, $dir));
		$citas = array();
		while ($result = $this -> connection -> fetchRow()){
			$coordinador = new Coordinador($result[3]);
			$coordinador -> select();
			$acudienteEstudiante = new AcudienteEstudiante($result[4]);
			$acudienteEstudiante -> select();
			array_push($citas, new Cita($result[0], $result[1], $result[2], $coordinador, $acudienteEstudiante));
		}
		$this -> connection -> close();
		return $citas;
	}

	function selectAllByCoordinadorOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> citaDAO -> selectAllByCoordinadorOrder($order, $dir));
		$citas = array();
		while ($result = $this -> connection -> fetchRow()){
			$coordinador = new Coordinador($result[3]);
			$coordinador -> select();
			$acudienteEstudiante = new AcudienteEstudiante($result[4]);
			$acudienteEstudiante -> select();
			array_push($citas, new Cita($result[0], $result[1], $result[2], $coordinador, $acudienteEstudiante));
		}
		$this -> connection -> close();
		return $citas;
	}

	function selectAllByAcudienteEstudianteOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> citaDAO -> selectAllByAcudienteEstudianteOrder($order, $dir));
		$citas = array();
		while ($result = $this -> connection -> fetchRow()){
			$coordinador = new Coordinador($result[3]);
			$coordinador -> select();
			$acudienteEstudiante = new AcudienteEstudiante($result[4]);
			$acudienteEstudiante -> select();
			array_push($citas, new Cita($result[0], $result[1], $result[2], $coordinador, $acudienteEstudiante));
		}
		$this -> connection -> close();
		return $citas;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> citaDAO -> search($search));
		$citas = array();
		while ($result = $this -> connection -> fetchRow()){
			$coordinador = new Coordinador($result[3]);
			$coordinador -> select();
			$acudienteEstudiante = new AcudienteEstudiante($result[4]);
			$acudienteEstudiante -> select();
			array_push($citas, new Cita($result[0], $result[1], $result[2], $coordinador, $acudienteEstudiante));
		}
		$this -> connection -> close();
		return $citas;
	}
	
	function citasEstudiante($estudiante){
	    $this -> connection -> open();
	    $this -> connection -> run($this -> citaDAO -> citasEstudiante($estudiante));
	    $citas = array();
	    while ($result = $this -> connection -> fetchRow()){
	        $coordinador = new Coordinador($result[2]);
	        $coordinador -> select();
	        array_push($citas, new Cita($result[0], $result[1], $coordinador,$result[3]));
	    }
	    $this -> connection -> close();
	    return $citas;
	}
}
?>
