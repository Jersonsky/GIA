<?php
class AcudienteDAO{
	private $idAcudiente;
	private $nombre;
	private $apellido;
	private $telefono;
	private $estado;
	private $correo;
	private $clave;
	private $foto;
	private $fecha_nacimiento;
	private $documento;
	private $direccion;
	private $tipoDocumento;
	private $genero;

	function AcudienteDAO($pIdAcudiente = "", $pNombre = "", $pApellido = "", $pTelefono = "", $pEstado = "", $pCorreo = "", $pClave = "", $pFoto = "", $pFecha_nacimiento = "", $pDocumento = "", $pDireccion = "", $pTipoDocumento = "", $pGenero = ""){
		$this -> idAcudiente = $pIdAcudiente;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> telefono = $pTelefono;
		$this -> estado = $pEstado;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
		$this -> foto = $pFoto;
		$this -> fecha_nacimiento = $pFecha_nacimiento;
		$this -> documento = $pDocumento;
		$this -> direccion = $pDireccion;
		$this -> tipoDocumento = $pTipoDocumento;
		$this -> genero = $pGenero;
	}

	function insert(){
		return "insert into Acudiente(nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, documento, direccion, tipoDocumento_idTipoDocumento, genero_idGenero)
				values('" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> telefono . "', '" . $this -> estado . "', '" . $this -> correo . "', md5('" . $this -> clave . "'), '" . $this -> foto . "', '" . $this -> fecha_nacimiento . "', '" . $this -> documento . "', '" . $this -> direccion . "', '" . $this -> tipoDocumento . "', '" . $this -> genero . "')";
	}

	function update(){
		return "update Acudiente set 
				nombre = '" . $this -> nombre . "',
				apellido = '" . $this -> apellido . "',
				telefono = '" . $this -> telefono . "',
				estado = '" . $this -> estado . "',
				correo = '" . $this -> correo . "',
				foto = '" . $this -> foto . "',
				fecha_nacimiento = '" . $this -> fecha_nacimiento . "',
				documento = '" . $this -> documento . "',
				direccion = '" . $this -> direccion . "',
				tipoDocumento_idTipoDocumento = '" . $this -> tipoDocumento . "',
				genero_idGenero = '" . $this -> genero . "'	
				where idAcudiente = '" . $this -> idAcudiente . "'";
	}

	function select() {
		return "select idAcudiente, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, documento, direccion, tipoDocumento_idTipoDocumento, genero_idGenero
				from Acudiente
				where idAcudiente = '" . $this -> idAcudiente . "'";
	}

	function selectAll() {
		return "select idAcudiente, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, documento, direccion, tipoDocumento_idTipoDocumento, genero_idGenero
				from Acudiente";
	}

	function selectAllByTipoDocumento() {
		return "select idAcudiente, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, documento, direccion, tipoDocumento_idTipoDocumento, genero_idGenero
				from Acudiente
				where tipoDocumento_idTipoDocumento = '" . $this -> tipoDocumento . "'";
	}

	function selectAllByGenero() {
		return "select idAcudiente, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, documento, direccion, tipoDocumento_idTipoDocumento, genero_idGenero
				from Acudiente
				where genero_idGenero = '" . $this -> genero . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idAcudiente, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, documento, direccion, tipoDocumento_idTipoDocumento, genero_idGenero
				from Acudiente
				order by " . $orden . " " . $dir;
	}

	function selectAllByTipoDocumentoOrder($orden, $dir) {
		return "select idAcudiente, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, documento, direccion, tipoDocumento_idTipoDocumento, genero_idGenero
				from Acudiente
				where tipoDocumento_idTipoDocumento = '" . $this -> tipoDocumento . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByGeneroOrder($orden, $dir) {
		return "select idAcudiente, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, documento, direccion, tipoDocumento_idTipoDocumento, genero_idGenero
				from Acudiente
				where genero_idGenero = '" . $this -> genero . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idAcudiente, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, documento, direccion, tipoDocumento_idTipoDocumento, genero_idGenero
				from Acudiente
				where nombre like '%" . $search . "%' or apellido like '%" . $search . "%' or telefono like '%" . $search . "%' or estado like '%" . $search . "%' or correo like '%" . $search . "%' or foto like '%" . $search . "%' or fecha_nacimiento like '%" . $search . "%' or documento like '%" . $search . "%' or direccion like '%" . $search . "%'";
	}
	
	function autenticar($correo,$clave){
	    return "select *
                from acudiente e
                where e.correo = '" . $correo . "' and e.clave = '" . md5($clave) . "'";
	}
	
	function estudiantesAcudiente($id){
	    return "select e.* from estudiante e
                INNER JOIN acudienteestudiante ae on e.idEstudiante=ae.estudiante_idEstudiante
                inner JOIN acudiente a on ae.acudiente_idAcudiente = a.idAcudiente 
                where a.idAcudiente='".$id."' and e.estado_idEstado=1";
	}
	
	function traerId(){
	    return "SELECT a.idAcudiente
                from acudiente a
                order by a.idAcudiente DESC
                limit 1";
	}
}
?>
