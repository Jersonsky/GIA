<?php
class CitaDAO{
	private $idCita;
	private $descripcion;
	private $fecha;
	private $coordinador;
	private $acudienteEstudiante;

	function CitaDAO($pIdCita = "", $pDescripcion = "", $pFecha = "", $pCoordinador = "", $pAcudienteEstudiante = ""){
		$this -> idCita = $pIdCita;
		$this -> descripcion = $pDescripcion;
		$this -> fecha = $pFecha;
		$this -> coordinador = $pCoordinador;
		$this -> acudienteEstudiante = $pAcudienteEstudiante;
	}

	function insert(){
		return "insert into Cita(descripcion, fecha, coordinador_idCoordinador, acudienteEstudiante_idAcudienteEstudiante)
				values('" . $this -> descripcion . "', '" . $this -> fecha . "', '" . $this -> coordinador . "', '" . $this -> acudienteEstudiante . "')";
	}

	function update(){
		return "update Cita set 
				descripcion = '" . $this -> descripcion . "',
				fecha = '" . $this -> fecha . "',
				coordinador_idCoordinador = '" . $this -> coordinador . "',
				acudienteEstudiante_idAcudienteEstudiante = '" . $this -> acudienteEstudiante . "'	
				where idCita = '" . $this -> idCita . "'";
	}

	function select() {
		return "select idCita, descripcion, fecha, coordinador_idCoordinador, acudienteEstudiante_idAcudienteEstudiante
				from Cita
				where idCita = '" . $this -> idCita . "'";
	}

	function selectAll() {
		return "select idCita, descripcion, fecha, coordinador_idCoordinador, acudienteEstudiante_idAcudienteEstudiante
				from Cita";
	}

	function selectAllByCoordinador() {
		return "select idCita, descripcion, fecha, coordinador_idCoordinador, acudienteEstudiante_idAcudienteEstudiante
				from Cita
				where coordinador_idCoordinador = '" . $this -> coordinador . "'";
	}

	function selectAllByAcudienteEstudiante() {
		return "select idCita, descripcion, fecha, coordinador_idCoordinador, acudienteEstudiante_idAcudienteEstudiante
				from Cita
				where acudienteEstudiante_idAcudienteEstudiante = '" . $this -> acudienteEstudiante . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idCita, descripcion, fecha, coordinador_idCoordinador, acudienteEstudiante_idAcudienteEstudiante
				from Cita
				order by " . $orden . " " . $dir;
	}

	function selectAllByCoordinadorOrder($orden, $dir) {
		return "select idCita, descripcion, fecha, coordinador_idCoordinador, acudienteEstudiante_idAcudienteEstudiante
				from Cita
				where coordinador_idCoordinador = '" . $this -> coordinador . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByAcudienteEstudianteOrder($orden, $dir) {
		return "select idCita, descripcion, fecha, coordinador_idCoordinador, acudienteEstudiante_idAcudienteEstudiante
				from Cita
				where acudienteEstudiante_idAcudienteEstudiante = '" . $this -> acudienteEstudiante . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idCita, descripcion, fecha, coordinador_idCoordinador, acudienteEstudiante_idAcudienteEstudiante
				from Cita
				where descripcion like '%" . $search . "%' or fecha like '%" . $search . "%'";
	}
	
	function citasEstudiante($estudiante) {
	    return "SELECT c.descripcion,c.fecha,c.coordinador_idCoordinador,concat(e.nombre,' ',e.apellido) as nombre
                FROM cita c
                INNER JOIN acudienteestudiante ae on c.acudienteEstudiante_idAcudienteEstudiante = ae.idAcudienteEstudiante
                INNER JOIN estudiante e on e.idEstudiante = ae.estudiante_idEstudiante
                WHERE e.idEstudiante = '".$estudiante."'";
    }
}
?>
