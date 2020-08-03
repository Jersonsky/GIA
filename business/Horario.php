<?php
require_once ("persistence/HorarioDAO.php");
require_once ("persistence/Connection.php");

class Horario {
	private $idHorario;
	private $dia;
	private $hora;
	private $clase;
	private $horarioDAO;
	private $connection;

	function getIdHorario() {
		return $this -> idHorario;
	}

	function setIdHorario($pIdHorario) {
		$this -> idHorario = $pIdHorario;
	}

	function getDia() {
		return $this -> dia;
	}

	function setDia($pDia) {
		$this -> dia = $pDia;
	}

	function getHora() {
		return $this -> hora;
	}

	function setHora($pHora) {
		$this -> hora = $pHora;
	}

	function getClase() {
		return $this -> clase;
	}

	function setClase($pClase) {
		$this -> clase = $pClase;
	}

	function Horario($pIdHorario = "", $pDia = "", $pHora = "", $pClase = ""){
		$this -> idHorario = $pIdHorario;
		$this -> dia = $pDia;
		$this -> hora = $pHora;
		$this -> clase = $pClase;
		$this -> horarioDAO = new HorarioDAO($this -> idHorario, $this -> dia, $this -> hora, $this -> clase);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> horarioDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> horarioDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> horarioDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idHorario = $result[0];
		$this -> dia = $result[1];
		$this -> hora = $result[2];
		$clase = new Clase($result[3]);
		$clase -> select();
		$this -> clase = $clase;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> horarioDAO -> selectAll());
		$horarios = array();
		while ($result = $this -> connection -> fetchRow()){
			$clase = new Clase($result[3]);
			$clase -> select();
			array_push($horarios, new Horario($result[0], $result[1], $result[2], $clase));
		}
		$this -> connection -> close();
		return $horarios;
	}

	function selectAllByClase(){
		$this -> connection -> open();
		$this -> connection -> run($this -> horarioDAO -> selectAllByClase());
		$horarios = array();
		while ($result = $this -> connection -> fetchRow()){
			$clase = new Clase($result[3]);
			$clase -> select();
			array_push($horarios, new Horario($result[0], $result[1], $result[2], $clase));
		}
		$this -> connection -> close();
		return $horarios;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> horarioDAO -> selectAllOrder($order, $dir));
		$horarios = array();
		while ($result = $this -> connection -> fetchRow()){
			$clase = new Clase($result[3]);
			$clase -> select();
			array_push($horarios, new Horario($result[0], $result[1], $result[2], $clase));
		}
		$this -> connection -> close();
		return $horarios;
	}

	function selectAllByClaseOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> horarioDAO -> selectAllByClaseOrder($order, $dir));
		$horarios = array();
		while ($result = $this -> connection -> fetchRow()){
			$clase = new Clase($result[3]);
			$clase -> select();
			array_push($horarios, new Horario($result[0], $result[1], $result[2], $clase));
		}
		$this -> connection -> close();
		return $horarios;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> horarioDAO -> search($search));
		$horarios = array();
		while ($result = $this -> connection -> fetchRow()){
			$clase = new Clase($result[3]);
			$clase -> select();
			array_push($horarios, new Horario($result[0], $result[1], $result[2], $clase));
		}
		$this -> connection -> close();
		return $horarios;
	}
}
?>
