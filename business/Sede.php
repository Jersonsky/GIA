<?php
require_once ("persistence/SedeDAO.php");
require_once ("persistence/Connection.php");

class Sede {
	private $idSede;
	private $nombresede;
	private $direccion;
	private $telefono;
	private $sedeDAO;
	private $connection;

	function getIdSede() {
		return $this -> idSede;
	}

	function setIdSede($pIdSede) {
		$this -> idSede = $pIdSede;
	}

	function getNombresede() {
		return $this -> nombresede;
	}

	function setNombresede($pNombresede) {
		$this -> nombresede = $pNombresede;
	}

	function getDireccion() {
		return $this -> direccion;
	}

	function setDireccion($pDireccion) {
		$this -> direccion = $pDireccion;
	}

	function getTelefono() {
		return $this -> telefono;
	}

	function setTelefono($pTelefono) {
		$this -> telefono = $pTelefono;
	}

	function Sede($pIdSede = "", $pNombresede = "", $pDireccion = "", $pTelefono = ""){
		$this -> idSede = $pIdSede;
		$this -> nombresede = $pNombresede;
		$this -> direccion = $pDireccion;
		$this -> telefono = $pTelefono;
		$this -> sedeDAO = new SedeDAO($this -> idSede, $this -> nombresede, $this -> direccion, $this -> telefono);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> sedeDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> sedeDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> sedeDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idSede = $result[0];
		$this -> nombresede = $result[1];
		$this -> direccion = $result[2];
		$this -> telefono = $result[3];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> sedeDAO -> selectAll());
		$sedes = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($sedes, new Sede($result[0], $result[1], $result[2], $result[3]));
		}
		$this -> connection -> close();
		return $sedes;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> sedeDAO -> selectAllOrder($order, $dir));
		$sedes = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($sedes, new Sede($result[0], $result[1], $result[2], $result[3]));
		}
		$this -> connection -> close();
		return $sedes;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> sedeDAO -> search($search));
		$sedes = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($sedes, new Sede($result[0], $result[1], $result[2], $result[3]));
		}
		$this -> connection -> close();
		return $sedes;
	}
}
?>
