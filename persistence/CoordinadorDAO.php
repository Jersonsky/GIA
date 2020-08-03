<?php
class CoordinadorDAO{
	private $idCoordinador;
	private $documento;
	private $nombre;
	private $apellido;
	private $telefono;
	private $estado;
	private $correo;
	private $clave;
	private $foto;
	private $fecha_nacimiento;
	private $genero;

	function CoordinadorDAO($pIdCoordinador = "", $pDocumento = "", $pNombre = "", $pApellido = "", $pTelefono = "", $pEstado = "", $pCorreo = "", $pClave = "", $pFoto = "", $pFecha_nacimiento = "", $pGenero = ""){
		$this -> idCoordinador = $pIdCoordinador;
		$this -> documento = $pDocumento;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> telefono = $pTelefono;
		$this -> estado = $pEstado;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
		$this -> foto = $pFoto;
		$this -> fecha_nacimiento = $pFecha_nacimiento;
		$this -> genero = $pGenero;
	}

	function insert(){
		return "insert into Coordinador(documento, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, genero_idGenero)
				values('" . $this -> documento . "', '" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> telefono . "', '" . $this -> estado . "', '" . $this -> correo . "', md5('" . $this -> clave . "'), '" . $this -> foto . "', '" . $this -> fecha_nacimiento . "', '" . $this -> genero . "')";
	}

	function update(){
		return "update Coordinador set 
				documento = '" . $this -> documento . "',
				nombre = '" . $this -> nombre . "',
				apellido = '" . $this -> apellido . "',
				telefono = '" . $this -> telefono . "',
				estado = '" . $this -> estado . "',
				correo = '" . $this -> correo . "',
				foto = '" . $this -> foto . "',
				fecha_nacimiento = '" . $this -> fecha_nacimiento . "',
				genero_idGenero = '" . $this -> genero . "'	
				where idCoordinador = '" . $this -> idCoordinador . "'";
	}

	function select() {
		return "select idCoordinador, documento, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, genero_idGenero
				from Coordinador
				where idCoordinador = '" . $this -> idCoordinador . "'";
	}

	function selectAll() {
		return "select idCoordinador, documento, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, genero_idGenero
				from Coordinador";
	}

	function selectAllByGenero() {
		return "select idCoordinador, documento, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, genero_idGenero
				from Coordinador
				where genero_idGenero = '" . $this -> genero . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idCoordinador, documento, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, genero_idGenero
				from Coordinador
				order by " . $orden . " " . $dir;
	}

	function selectAllByGeneroOrder($orden, $dir) {
		return "select idCoordinador, documento, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, genero_idGenero
				from Coordinador
				where genero_idGenero = '" . $this -> genero . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idCoordinador, documento, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, genero_idGenero
				from Coordinador
				where documento like '%" . $search . "%' or nombre like '%" . $search . "%' or apellido like '%" . $search . "%' or telefono like '%" . $search . "%' or estado like '%" . $search . "%' or correo like '%" . $search . "%' or foto like '%" . $search . "%' or fecha_nacimiento like '%" . $search . "%'";
	}
	
	function autenticar($correo, $clave){
	    return "select *
                from coordinador e
                where e.correo = '" . $correo . "' and e.clave = '" . md5($clave) . "'";
	}
}
?>
