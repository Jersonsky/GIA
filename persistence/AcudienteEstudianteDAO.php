<?php
class AcudienteEstudianteDAO{
	private $idAcudienteEstudiante;
	private $fecha;
	private $estudiante;
	private $acudiente;

	function AcudienteEstudianteDAO($pIdAcudienteEstudiante = "", $pFecha = "", $pEstudiante = "", $pAcudiente = ""){
		$this -> idAcudienteEstudiante = $pIdAcudienteEstudiante;
		$this -> fecha = $pFecha;
		$this -> estudiante = $pEstudiante;
		$this -> acudiente = $pAcudiente;
	}

	function insert(){
		return "insert into AcudienteEstudiante(fecha, estudiante_idEstudiante, acudiente_idAcudiente)
				values('" . $this -> fecha . "', '" . $this -> estudiante . "', '" . $this -> acudiente . "')";
	}

	function update(){
		return "update AcudienteEstudiante set 
				fecha = '" . $this -> fecha . "',
				estudiante_idEstudiante = '" . $this -> estudiante . "',
				acudiente_idAcudiente = '" . $this -> acudiente . "'	
				where idAcudienteEstudiante = '" . $this -> idAcudienteEstudiante . "'";
	}

	function select() {
		return "select idAcudienteEstudiante, fecha, estudiante_idEstudiante, acudiente_idAcudiente
				from AcudienteEstudiante
				where idAcudienteEstudiante = '" . $this -> idAcudienteEstudiante . "'";
	}

	function selectAll() {
		return "select idAcudienteEstudiante, fecha, estudiante_idEstudiante, acudiente_idAcudiente
				from AcudienteEstudiante";
	}

	function selectAllByEstudiante() {
		return "select idAcudienteEstudiante, fecha, estudiante_idEstudiante, acudiente_idAcudiente
				from AcudienteEstudiante
				where estudiante_idEstudiante = '" . $this -> estudiante . "'";
	}

	function selectAllByAcudiente() {
		return "select idAcudienteEstudiante, fecha, estudiante_idEstudiante, acudiente_idAcudiente
				from AcudienteEstudiante
				where acudiente_idAcudiente = '" . $this -> acudiente . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idAcudienteEstudiante, fecha, estudiante_idEstudiante, acudiente_idAcudiente
				from AcudienteEstudiante
				order by " . $orden . " " . $dir;
	}

	function selectAllByEstudianteOrder($orden, $dir) {
		return "select idAcudienteEstudiante, fecha, estudiante_idEstudiante, acudiente_idAcudiente
				from AcudienteEstudiante
				where estudiante_idEstudiante = '" . $this -> estudiante . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByAcudienteOrder($orden, $dir) {
		return "select idAcudienteEstudiante, fecha, estudiante_idEstudiante, acudiente_idAcudiente
				from AcudienteEstudiante
				where acudiente_idAcudiente = '" . $this -> acudiente . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idAcudienteEstudiante, fecha, estudiante_idEstudiante, acudiente_idAcudiente
				from AcudienteEstudiante
				where fecha like '%" . $search . "%'";
	}
	
	function citaAcudiente($acudiente) {
	    return "SELECT ae.idAcudienteEstudiante,e.nombre,e.apellido 
                FROM  acudienteestudiante ae 
                inner JOIN acudiente a on ae.acudiente_idAcudiente = a.idAcudiente
                INNER JOIN estudiante e on ae.estudiante_idEstudiante = e.idEstudiante
                where a.idAcudiente='".$acudiente."'";
	}
}
?>
