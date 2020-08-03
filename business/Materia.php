<?php
require_once ("persistence/MateriaDAO.php");
require_once ("persistence/Connection.php");

class Materia {
	private $idMateria;
	private $nombremateria;
	private $materiaDAO;
	private $connection;

	function getIdMateria() {
		return $this -> idMateria;
	}

	function setIdMateria($pIdMateria) {
		$this -> idMateria = $pIdMateria;
	}

	function getNombremateria() {
		return $this -> nombremateria;
	}

	function setNombremateria($pNombremateria) {
		$this -> nombremateria = $pNombremateria;
	}

	function Materia($pIdMateria = "", $pNombremateria = ""){
		$this -> idMateria = $pIdMateria;
		$this -> nombremateria = $pNombremateria;
		$this -> materiaDAO = new MateriaDAO($this -> idMateria, $this -> nombremateria);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> materiaDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> materiaDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> materiaDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idMateria = $result[0];
		$this -> nombremateria = $result[1];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> materiaDAO -> selectAll());
		$materias = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($materias, new Materia($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $materias;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> materiaDAO -> selectAllOrder($order, $dir));
		$materias = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($materias, new Materia($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $materias;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> materiaDAO -> search($search));
		$materias = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($materias, new Materia($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $materias;
	}
}
?>
