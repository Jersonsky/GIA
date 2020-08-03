<?php
class EstudianteDAO{
	private $idEstudiante;
	private $nombre;
	private $apellido;
	private $telefono;
	private $correo;
	private $clave;
	private $foto;
	private $fecha_nacimiento;
	private $documento;
	private $estado;
	private $sede;
	private $tipoDocumento;
	private $genero;

	function EstudianteDAO($pIdEstudiante = "", $pNombre = "", $pApellido = "", $pTelefono = "", $pCorreo = "", $pClave = "", $pFoto = "", $pFecha_nacimiento = "", $pDocumento = "", $pEstado = "", $pSede = "", $pTipoDocumento = "", $pGenero = ""){
		$this -> idEstudiante = $pIdEstudiante;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> telefono = $pTelefono;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
		$this -> foto = $pFoto;
		$this -> fecha_nacimiento = $pFecha_nacimiento;
		$this -> documento = $pDocumento;
		$this -> estado = $pEstado;
		$this -> sede = $pSede;
		$this -> tipoDocumento = $pTipoDocumento;
		$this -> genero = $pGenero;
	}

	function insert(){
		return "insert into Estudiante(nombre, apellido, telefono, correo, clave, foto, fecha_nacimiento, documento, estado_idEstado, sede_idSede, tipoDocumento_idTipoDocumento, genero_idGenero)
				values('" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> telefono . "', '" . $this -> correo . "', md5('" . $this -> clave . "'), '" . $this -> foto . "', '" . $this -> fecha_nacimiento . "', '" . $this -> documento . "', '" . $this -> estado . "', '" . $this -> sede . "', '" . $this -> tipoDocumento . "', '" . $this -> genero . "')";
	}

	function update(){
		return "update Estudiante set 
				nombre = '" . $this -> nombre . "',
				apellido = '" . $this -> apellido . "',
				telefono = '" . $this -> telefono . "',
				correo = '" . $this -> correo . "',
				foto = '" . $this -> foto . "',
				fecha_nacimiento = '" . $this -> fecha_nacimiento . "',
				documento = '" . $this -> documento . "',
				estado_idEstado = '" . $this -> estado . "',
				sede_idSede = '" . $this -> sede . "',
				tipoDocumento_idTipoDocumento = '" . $this -> tipoDocumento . "',
				genero_idGenero = '" . $this -> genero . "'	
				where idEstudiante = '" . $this -> idEstudiante . "'";
	}

	function select() {
		return "select idEstudiante, nombre, apellido, telefono, correo, clave, foto, fecha_nacimiento, documento, estado_idEstado, sede_idSede, tipoDocumento_idTipoDocumento, genero_idGenero
				from Estudiante
				where idEstudiante = '" . $this -> idEstudiante . "'";
	}

	function selectAll() {
		return "select idEstudiante, nombre, apellido, telefono, correo, clave, foto, fecha_nacimiento, documento, estado_idEstado, sede_idSede, tipoDocumento_idTipoDocumento, genero_idGenero
				from Estudiante";
	}

	function selectAllByEstado() {
		return "select idEstudiante, nombre, apellido, telefono, correo, clave, foto, fecha_nacimiento, documento, estado_idEstado, sede_idSede, tipoDocumento_idTipoDocumento, genero_idGenero
				from Estudiante
				where estado_idEstado = '" . $this -> estado . "'";
	}

	function selectAllBySede() {
		return "select idEstudiante, nombre, apellido, telefono, correo, clave, foto, fecha_nacimiento, documento, estado_idEstado, sede_idSede, tipoDocumento_idTipoDocumento, genero_idGenero
				from Estudiante
				where sede_idSede = '" . $this -> sede . "'";
	}

	function selectAllByTipoDocumento() {
		return "select idEstudiante, nombre, apellido, telefono, correo, clave, foto, fecha_nacimiento, documento, estado_idEstado, sede_idSede, tipoDocumento_idTipoDocumento, genero_idGenero
				from Estudiante
				where tipoDocumento_idTipoDocumento = '" . $this -> tipoDocumento . "'";
	}

	function selectAllByGenero() {
		return "select idEstudiante, nombre, apellido, telefono, correo, clave, foto, fecha_nacimiento, documento, estado_idEstado, sede_idSede, tipoDocumento_idTipoDocumento, genero_idGenero
				from Estudiante
				where genero_idGenero = '" . $this -> genero . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idEstudiante, nombre, apellido, telefono, correo, clave, foto, fecha_nacimiento, documento, estado_idEstado, sede_idSede, tipoDocumento_idTipoDocumento, genero_idGenero
				from Estudiante
				order by " . $orden . " " . $dir;
	}

	function selectAllByEstadoOrder($orden, $dir) {
		return "select idEstudiante, nombre, apellido, telefono, correo, clave, foto, fecha_nacimiento, documento, estado_idEstado, sede_idSede, tipoDocumento_idTipoDocumento, genero_idGenero
				from Estudiante
				where estado_idEstado = '" . $this -> estado . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllBySedeOrder($orden, $dir) {
		return "select idEstudiante, nombre, apellido, telefono, correo, clave, foto, fecha_nacimiento, documento, estado_idEstado, sede_idSede, tipoDocumento_idTipoDocumento, genero_idGenero
				from Estudiante
				where sede_idSede = '" . $this -> sede . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByTipoDocumentoOrder($orden, $dir) {
		return "select idEstudiante, nombre, apellido, telefono, correo, clave, foto, fecha_nacimiento, documento, estado_idEstado, sede_idSede, tipoDocumento_idTipoDocumento, genero_idGenero
				from Estudiante
				where tipoDocumento_idTipoDocumento = '" . $this -> tipoDocumento . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByGeneroOrder($orden, $dir) {
		return "select idEstudiante, nombre, apellido, telefono, correo, clave, foto, fecha_nacimiento, documento, estado_idEstado, sede_idSede, tipoDocumento_idTipoDocumento, genero_idGenero
				from Estudiante
				where genero_idGenero = '" . $this -> genero . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idEstudiante, nombre, apellido, telefono, correo, clave, foto, fecha_nacimiento, documento, estado_idEstado, sede_idSede, tipoDocumento_idTipoDocumento, genero_idGenero
				from Estudiante
				where nombre like '%" . $search . "%' or apellido like '%" . $search . "%' or telefono like '%" . $search . "%' or correo like '%" . $search . "%' or foto like '%" . $search . "%' or fecha_nacimiento like '%" . $search . "%' or documento like '%" . $search . "%'";
	}
	
	function autenticar($correo, $clave){
	    return "select *
                from estudiante e
                where e.correo = '" . $correo . "' and e.clave = '" . md5($clave) . "'";
	}
	
	function estudianteCurso($search){
	    return "select e.*
                from estudiante e 
                INNER JOIN matriculaestudiante me on e.idEstudiante = me.estudiante_idEstudiante
                INNER JOIN matricula m on me.matricula_idMatricula = m.idMatricula
                where m.curso_idCurso='".$search."'";
	}
}
?>
