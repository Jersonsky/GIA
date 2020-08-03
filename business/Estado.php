<?php
require_once ("persistence/EstadoDAO.php");
require_once ("persistence/Connection.php");

class Estado {
	private $idEstado;
	private $descripcion;
	private $estadoDAO;
	private $connection;

	function getIdEstado() {
		return $this -> idEstado;
	}

	function setIdEstado($pIdEstado) {
		$this -> idEstado = $pIdEstado;
	}

	function getDescripcion() {
		return $this -> descripcion;
	}

	function setDescripcion($pDescripcion) {
		$this -> descripcion = $pDescripcion;
	}

	function Estado($pIdEstado = "", $pDescripcion = ""){
		$this -> idEstado = $pIdEstado;
		$this -> descripcion = $pDescripcion;
		$this -> estadoDAO = new EstadoDAO($this -> idEstado, $this -> descripcion);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estadoDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estadoDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estadoDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idEstado = $result[0];
		$this -> descripcion = $result[1];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estadoDAO -> selectAll());
		$estados = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($estados, new Estado($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $estados;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> estadoDAO -> selectAllOrder($order, $dir));
		$estados = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($estados, new Estado($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $estados;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> estadoDAO -> search($search));
		$estados = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($estados, new Estado($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $estados;
	}
}
?>
