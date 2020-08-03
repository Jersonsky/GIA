<?php
class GeneroDAO{
	private $idGenero;
	private $descripcion;

	function GeneroDAO($pIdGenero = "", $pDescripcion = ""){
		$this -> idGenero = $pIdGenero;
		$this -> descripcion = $pDescripcion;
	}

	function insert(){
		return "insert into Genero(descripcion)
				values('" . $this -> descripcion . "')";
	}

	function update(){
		return "update Genero set 
				descripcion = '" . $this -> descripcion . "'	
				where idGenero = '" . $this -> idGenero . "'";
	}

	function select() {
		return "select idGenero, descripcion
				from Genero
				where idGenero = '" . $this -> idGenero . "'";
	}

	function selectAll() {
		return "select idGenero, descripcion
				from Genero";
	}

	function selectAllOrder($orden, $dir){
		return "select idGenero, descripcion
				from Genero
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idGenero, descripcion
				from Genero
				where descripcion like '%" . $search . "%'";
	}
}
?>
