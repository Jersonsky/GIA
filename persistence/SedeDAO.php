<?php
class SedeDAO{
	private $idSede;
	private $nombresede;
	private $direccion;
	private $telefono;

	function SedeDAO($pIdSede = "", $pNombresede = "", $pDireccion = "", $pTelefono = ""){
		$this -> idSede = $pIdSede;
		$this -> nombresede = $pNombresede;
		$this -> direccion = $pDireccion;
		$this -> telefono = $pTelefono;
	}

	function insert(){
		return "insert into Sede(nombresede, direccion, telefono)
				values('" . $this -> nombresede . "', '" . $this -> direccion . "', '" . $this -> telefono . "')";
	}

	function update(){
		return "update Sede set 
				nombresede = '" . $this -> nombresede . "',
				direccion = '" . $this -> direccion . "',
				telefono = '" . $this -> telefono . "'	
				where idSede = '" . $this -> idSede . "'";
	}

	function select() {
		return "select idSede, nombresede, direccion, telefono
				from Sede
				where idSede = '" . $this -> idSede . "'";
	}

	function selectAll() {
		return "select idSede, nombresede, direccion, telefono
				from Sede";
	}

	function selectAllOrder($orden, $dir){
		return "select idSede, nombresede, direccion, telefono
				from Sede
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idSede, nombresede, direccion, telefono
				from Sede
				where nombresede like '%" . $search . "%' or direccion like '%" . $search . "%' or telefono like '%" . $search . "%'";
	}
}
?>
