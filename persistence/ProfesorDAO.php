<?php
class ProfesorDAO{
	private $idProfesor;
	private $documento;
	private $nombre;
	private $apellido;
	private $telefono;
	private $estado;
	private $correo;
	private $clave;
	private $foto;
	private $fecha_nacimiento;
	private $tipoDocumento;
	private $genero;

	function ProfesorDAO($pIdProfesor = "", $pDocumento = "", $pNombre = "", $pApellido = "", $pTelefono = "", $pEstado = "", $pCorreo = "", $pClave = "", $pFoto = "", $pFecha_nacimiento = "", $pTipoDocumento = "", $pGenero = ""){
		$this -> idProfesor = $pIdProfesor;
		$this -> documento = $pDocumento;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> telefono = $pTelefono;
		$this -> estado = $pEstado;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
		$this -> foto = $pFoto;
		$this -> fecha_nacimiento = $pFecha_nacimiento;
		$this -> tipoDocumento = $pTipoDocumento;
		$this -> genero = $pGenero;
	}

	function insert(){
		return "insert into Profesor(documento, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, tipoDocumento_idTipoDocumento, genero_idGenero)
				values('" . $this -> documento . "', '" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> telefono . "', '" . $this -> estado . "', '" . $this -> correo . "', md5('" . $this -> clave . "'), '" . $this -> foto . "', '" . $this -> fecha_nacimiento . "', '" . $this -> tipoDocumento . "', '" . $this -> genero . "')";
	}

	function update(){
		return "update Profesor set 
				documento = '" . $this -> documento . "',
				nombre = '" . $this -> nombre . "',
				apellido = '" . $this -> apellido . "',
				telefono = '" . $this -> telefono . "',
				estado = '" . $this -> estado . "',
				correo = '" . $this -> correo . "',
				foto = '" . $this -> foto . "',
				fecha_nacimiento = '" . $this -> fecha_nacimiento . "',
				tipoDocumento_idTipoDocumento = '" . $this -> tipoDocumento . "',
				genero_idGenero = '" . $this -> genero . "'	
				where idProfesor = '" . $this -> idProfesor . "'";
	}

	function select() {
		return "select idProfesor, documento, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, tipoDocumento_idTipoDocumento, genero_idGenero
				from Profesor
				where idProfesor = '" . $this -> idProfesor . "'";
	}

	function selectAll() {
		return "select idProfesor, documento, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, tipoDocumento_idTipoDocumento, genero_idGenero
				from Profesor";
	}

	function selectAllByTipoDocumento() {
		return "select idProfesor, documento, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, tipoDocumento_idTipoDocumento, genero_idGenero
				from Profesor
				where tipoDocumento_idTipoDocumento = '" . $this -> tipoDocumento . "'";
	}

	function selectAllByGenero() {
		return "select idProfesor, documento, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, tipoDocumento_idTipoDocumento, genero_idGenero
				from Profesor
				where genero_idGenero = '" . $this -> genero . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idProfesor, documento, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, tipoDocumento_idTipoDocumento, genero_idGenero
				from Profesor
				order by " . $orden . " " . $dir;
	}

	function selectAllByTipoDocumentoOrder($orden, $dir) {
		return "select idProfesor, documento, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, tipoDocumento_idTipoDocumento, genero_idGenero
				from Profesor
				where tipoDocumento_idTipoDocumento = '" . $this -> tipoDocumento . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByGeneroOrder($orden, $dir) {
		return "select idProfesor, documento, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, tipoDocumento_idTipoDocumento, genero_idGenero
				from Profesor
				where genero_idGenero = '" . $this -> genero . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idProfesor, documento, nombre, apellido, telefono, estado, correo, clave, foto, fecha_nacimiento, tipoDocumento_idTipoDocumento, genero_idGenero
				from Profesor
				where documento like '%" . $search . "%' or nombre like '%" . $search . "%' or apellido like '%" . $search . "%' or telefono like '%" . $search . "%' or estado like '%" . $search . "%' or correo like '%" . $search . "%' or foto like '%" . $search . "%' or fecha_nacimiento like '%" . $search . "%'";
	}
	
	function autenticar($correo,$clave){
	    return "select *
                from profesor e
                where e.correo = '" . $correo . "' and e.clave = '" . md5($clave) . "'";
	}
	
	function mostrarCursos($prof){
	    return "select c.*, cl.idClase from curso c 
                inner join matricula m on c.idCurso = m.curso_idCurso
                inner join clase cl on m.idMatricula = cl.matricula_idMatricula 
                inner JOIN profesor p on cl.profesor_idProfesor = p.idProfesor 
                where p.idProfesor ='".$prof."'";
	}
	
	function profesorEstudiante($acudiente){
	    return "SELECT p.nombre,p.apellido,p.telefono,p.correo,m.nombremateria,p.foto
                from profesor p 
                INNER JOIN clase cl on p.idProfesor = cl.profesor_idProfesor
                INNER JOIN califica c on c.clase_idClase = cl.idClase
                INNER JOIN materia m on cl.materia_idMateria = m.idMateria
                inner JOIN estudiante e on c.estudiante_idEstudiante = e.idEstudiante 
                INNER JOIN acudienteestudiante ae on e.idEstudiante = ae.estudiante_idEstudiante
                where ae.acudiente_idAcudiente='".$acudiente."'";
	}
	
	function profesorDelEstudiante($estudiante){
	    return "SELECT p.nombre,p.apellido,p.telefono,p.correo,m.nombremateria,p.foto
                from profesor p
                INNER JOIN clase cl on p.idProfesor = cl.profesor_idProfesor
                INNER JOIN califica c on c.clase_idClase = cl.idClase
                INNER JOIN materia m on cl.materia_idMateria = m.idMateria
                inner JOIN estudiante e on c.estudiante_idEstudiante = e.idEstudiante
                INNER JOIN acudienteestudiante ae on e.idEstudiante = ae.estudiante_idEstudiante
                where ae.estudiante_idEstudiante='".$estudiante."'";
	}
	
	
}
?>
