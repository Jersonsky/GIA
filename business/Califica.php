<?php
require_once ("persistence/CalificaDAO.php");
require_once ("persistence/Connection.php");

class Califica {
	private $idCalifica;
	private $periodo_1;
	private $periodo_2;
	private $periodo_3;
	private $periodo_4;
	private $clase;
	private $estudiante;
	private $calificaDAO;
	private $connection;

	function getCalificaDAO() {
	    return $this -> calificaDAO;
	}
	
	function getIdCalifica() {
		return $this -> idCalifica;
	}

	function setIdCalifica($pIdCalifica) {
		$this -> idCalifica = $pIdCalifica;
	}

	function getPeriodo_1() {
		return $this -> periodo_1;
	}

	function setPeriodo_1($pPeriodo_1) {
		$this -> periodo_1 = $pPeriodo_1;
	}

	function getPeriodo_2() {
		return $this -> periodo_2;
	}

	function setPeriodo_2($pPeriodo_2) {
		$this -> periodo_2 = $pPeriodo_2;
	}

	function getPeriodo_3() {
		return $this -> periodo_3;
	}

	function setPeriodo_3($pPeriodo_3) {
		$this -> periodo_3 = $pPeriodo_3;
	}

	function getPeriodo_4() {
		return $this -> periodo_4;
	}

	function setPeriodo_4($pPeriodo_4) {
		$this -> periodo_4 = $pPeriodo_4;
	}

	function getClase() {
		return $this -> clase;
	}

	function setClase($pClase) {
		$this -> clase = $pClase;
	}

	function getEstudiante() {
		return $this -> estudiante;
	}

	function setEstudiante($pEstudiante) {
		$this -> estudiante = $pEstudiante;
	}

	function Califica($pIdCalifica = "", $pPeriodo_1 = "", $pPeriodo_2 = "", $pPeriodo_3 = "", $pPeriodo_4 = "", $pClase = "", $pEstudiante = ""){
		$this -> idCalifica = $pIdCalifica;
		$this -> periodo_1 = $pPeriodo_1;
		$this -> periodo_2 = $pPeriodo_2;
		$this -> periodo_3 = $pPeriodo_3;
		$this -> periodo_4 = $pPeriodo_4;
		$this -> clase = $pClase;
		$this -> estudiante = $pEstudiante;
		$this -> calificaDAO = new CalificaDAO($this -> idCalifica, $this -> periodo_1, $this -> periodo_2, $this -> periodo_3, $this -> periodo_4, $this -> clase, $this -> estudiante);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificaDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificaDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificaDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idCalifica = $result[0];
		$this -> periodo_1 = $result[1];
		$this -> periodo_2 = $result[2];
		$this -> periodo_3 = $result[3];
		$this -> periodo_4 = $result[4];
		$clase = new Clase($result[5]);
		$clase -> select();
		$this -> clase = $clase;
		$estudiante = new Estudiante($result[6]);
		$estudiante -> select();
		$this -> estudiante = $estudiante;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificaDAO -> selectAll());
		$calificas = array();
		while ($result = $this -> connection -> fetchRow()){
			$clase = new Clase($result[5]);
			$clase -> select();
			$estudiante = new Estudiante($result[6]);
			$estudiante -> select();
			array_push($calificas, new Califica($result[0], $result[1], $result[2], $result[3], $result[4], $clase, $estudiante));
		}
		$this -> connection -> close();
		return $calificas;
	}

	function selectAllByClase(){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificaDAO -> selectAllByClase());
		$calificas = array();
		while ($result = $this -> connection -> fetchRow()){
			$clase = new Clase($result[5]);
			$clase -> select();
			$estudiante = new Estudiante($result[6]);
			$estudiante -> select();
			array_push($calificas, new Califica($result[0], $result[1], $result[2], $result[3], $result[4], $clase, $estudiante));
		}
		$this -> connection -> close();
		return $calificas;
	}

	function selectAllByEstudiante(){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificaDAO -> selectAllByEstudiante());
		$calificas = array();
		while ($result = $this -> connection -> fetchRow()){
			$clase = new Clase($result[5]);
			$clase -> select();
			$estudiante = new Estudiante($result[6]);
			$estudiante -> select();
			array_push($calificas, new Califica($result[0], $result[1], $result[2], $result[3], $result[4], $clase, $estudiante));
		}
		$this -> connection -> close();
		return $calificas;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificaDAO -> selectAllOrder($order, $dir));
		$calificas = array();
		while ($result = $this -> connection -> fetchRow()){
			$clase = new Clase($result[5]);
			$clase -> select();
			$estudiante = new Estudiante($result[6]);
			$estudiante -> select();
			array_push($calificas, new Califica($result[0], $result[1], $result[2], $result[3], $result[4], $clase, $estudiante));
		}
		$this -> connection -> close();
		return $calificas;
	}

	function selectAllByClaseOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificaDAO -> selectAllByClaseOrder($order, $dir));
		$calificas = array();
		while ($result = $this -> connection -> fetchRow()){
			$clase = new Clase($result[5]);
			$clase -> select();
			$estudiante = new Estudiante($result[6]);
			$estudiante -> select();
			array_push($calificas, new Califica($result[0], $result[1], $result[2], $result[3], $result[4], $clase, $estudiante));
		}
		$this -> connection -> close();
		return $calificas;
	}

	function selectAllByEstudianteOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificaDAO -> selectAllByEstudianteOrder($order, $dir));
		$calificas = array();
		while ($result = $this -> connection -> fetchRow()){
			$clase = new Clase($result[5]);
			$clase -> select();
			$estudiante = new Estudiante($result[6]);
			$estudiante -> select();
			array_push($calificas, new Califica($result[0], $result[1], $result[2], $result[3], $result[4], $clase, $estudiante));
		}
		$this -> connection -> close();
		return $calificas;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificaDAO -> search($search));
		$calificas = array();
		while ($result = $this -> connection -> fetchRow()){
			$clase = new Clase($result[5]);
			$clase -> select();
			$estudiante = new Estudiante($result[6]);
			$estudiante -> select();
			array_push($calificas, new Califica($result[0], $result[1], $result[2], $result[3], $result[4], $clase, $estudiante));
		}
		$this -> connection -> close();
		return $calificas;
	}
	
	function mostarNotasEstudiantes($clase){
	    $this -> connection -> open();
	    $this -> connection -> run($this -> calificaDAO -> mostarNotasEstudiantes($clase));
	    $calificas = array();
	    while ($result = $this -> connection -> fetchRow()){
	        array_push($calificas, new Califica($result[0], $result[1], $result[2], $result[3],$result[4],$result[5]));
	    }
	    $this -> connection -> close();
	    return $calificas;
	}
	
	function subirNotas($nota1,$nota2,$nota3,$nota4,$estudiante){
	    $this -> connection -> open();
	    $this -> connection -> run($this -> calificaDAO -> subirNotas($nota1,$nota2,$nota3,$nota4,$estudiante));
	    $this -> connection -> close();
	}
	
	function notasEstudianteAcudiente($estudiante){
	    $this -> connection -> open();
	    $this -> connection -> run($this -> calificaDAO -> notasEstudianteAcudiente($estudiante));
	    $calificas = array();
	    while ($result = $this -> connection -> fetchRow()){
	        
	        array_push($calificas, new Califica($result[0], $result[1], $result[2], $result[3],$result[4]));
	    }
	    $this -> connection -> close();
	    return $calificas;
	}
	
}
?>
