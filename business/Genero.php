<?php
require_once ("persistence/GeneroDAO.php");
require_once ("persistence/Connection.php");

class Genero {
	private $idGenero;
	private $descripcion;
	private $generoDAO;
	private $connection;

	function getIdGenero() {
		return $this -> idGenero;
	}

	function setIdGenero($pIdGenero) {
		$this -> idGenero = $pIdGenero;
	}

	function getDescripcion() {
		return $this -> descripcion;
	}

	function setDescripcion($pDescripcion) {
		$this -> descripcion = $pDescripcion;
	}

	function Genero($pIdGenero = "", $pDescripcion = ""){
		$this -> idGenero = $pIdGenero;
		$this -> descripcion = $pDescripcion;
		$this -> generoDAO = new GeneroDAO($this -> idGenero, $this -> descripcion);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> generoDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> generoDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> generoDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idGenero = $result[0];
		$this -> descripcion = $result[1];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> generoDAO -> selectAll());
		$generos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($generos, new Genero($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $generos;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> generoDAO -> selectAllOrder($order, $dir));
		$generos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($generos, new Genero($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $generos;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> generoDAO -> search($search));
		$generos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($generos, new Genero($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $generos;
	}
}
?>
