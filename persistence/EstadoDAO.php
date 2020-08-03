<?php
class EstadoDAO{
	private $idEstado;
	private $descripcion;

	function EstadoDAO($pIdEstado = "", $pDescripcion = ""){
		$this -> idEstado = $pIdEstado;
		$this -> descripcion = $pDescripcion;
	}

	function insert(){
		return "insert into Estado(descripcion)
				values('" . $this -> descripcion . "')";
	}

	function update(){
		return "update Estado set 
				descripcion = '" . $this -> descripcion . "'	
				where idEstado = '" . $this -> idEstado . "'";
	}

	function select() {
		return "select idEstado, descripcion
				from Estado
				where idEstado = '" . $this -> idEstado . "'";
	}

	function selectAll() {
		return "select idEstado, descripcion
				from Estado";
	}

	function selectAllOrder($orden, $dir){
		return "select idEstado, descripcion
				from Estado
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idEstado, descripcion
				from Estado
				where descripcion like '%" . $search . "%'";
	}
}
?>
