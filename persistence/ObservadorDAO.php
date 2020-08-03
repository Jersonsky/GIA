<?php
class ObservadorDAO{
	private $idObservador;
	private $descripcion;
	private $fecha;
	private $profesor;
	private $coordinador;
	private $matriculaEstudiante;

	function ObservadorDAO($pIdObservador = "", $pDescripcion = "", $pFecha = "", $pProfesor = "", $pCoordinador = "", $pMatriculaEstudiante = ""){
		$this -> idObservador = $pIdObservador;
		$this -> descripcion = $pDescripcion;
		$this -> fecha = $pFecha;
		$this -> profesor = $pProfesor;
		$this -> coordinador = $pCoordinador;
		$this -> matriculaEstudiante = $pMatriculaEstudiante;
	}

	function insertProfesor(){
		return "insert into Observador(descripcion, fecha, profesor_idProfesor, coordinador_idCoordinador, matriculaEstudiante_idMatriculaEstudiante)
				values('" . $this -> descripcion . "', '" . $this -> fecha . "', '" . $this -> profesor . "', " . $this -> coordinador . ", '" . $this -> matriculaEstudiante . "')";
	}
	function insertCoordinador(){
	    return "insert into Observador(descripcion, fecha, profesor_idProfesor, coordinador_idCoordinador, matriculaEstudiante_idMatriculaEstudiante)
				values('" . $this -> descripcion . "', '" . $this -> fecha . "', '" . $this -> profesor . "', '" . $this -> coordinador . "', '" . $this -> matriculaEstudiante . "')";
	}
	function insert(){
	    return "insert into Observador(descripcion, fecha, profesor_idProfesor, coordinador_idCoordinador, matriculaEstudiante_idMatriculaEstudiante)
				values('" . $this -> descripcion . "', '" . $this -> fecha . "', '" . $this -> profesor . "', '" . $this -> coordinador . "', '" . $this -> matriculaEstudiante . "')";
	}

	function update(){
		return "update Observador set 
				descripcion = '" . $this -> descripcion . "',
				fecha = '" . $this -> fecha . "',
				profesor_idProfesor = '" . $this -> profesor . "',
				coordinador_idCoordinador = '" . $this -> coordinador . "',
				matriculaEstudiante_idMatriculaEstudiante = '" . $this -> matriculaEstudiante . "'	
				where idObservador = '" . $this -> idObservador . "'";
	}

	function select() {
		return "select idObservador, descripcion, fecha, profesor_idProfesor, coordinador_idCoordinador, matriculaEstudiante_idMatriculaEstudiante
				from Observador
				where idObservador = '" . $this -> idObservador . "'";
	}

	function selectAll() {
		return "select idObservador, descripcion, fecha, profesor_idProfesor, coordinador_idCoordinador, matriculaEstudiante_idMatriculaEstudiante
				from Observador";
	}

	function selectAllByProfesor() {
		return "select idObservador, descripcion, fecha, profesor_idProfesor, coordinador_idCoordinador, matriculaEstudiante_idMatriculaEstudiante
				from Observador
				where profesor_idProfesor = '" . $this -> profesor . "'";
	}

	function selectAllByCoordinador() {
		return "select idObservador, descripcion, fecha, profesor_idProfesor, coordinador_idCoordinador, matriculaEstudiante_idMatriculaEstudiante
				from Observador
				where coordinador_idCoordinador = '" . $this -> coordinador . "'";
	}

	function selectAllByMatriculaEstudiante() {
		return "select idObservador, descripcion, fecha, profesor_idProfesor, coordinador_idCoordinador, matriculaEstudiante_idMatriculaEstudiante
				from Observador
				where matriculaEstudiante_idMatriculaEstudiante = '" . $this -> matriculaEstudiante . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idObservador, descripcion, fecha, profesor_idProfesor, coordinador_idCoordinador, matriculaEstudiante_idMatriculaEstudiante
				from Observador
				order by " . $orden . " " . $dir;
	}

	function selectAllByProfesorOrder($orden, $dir) {
		return "select idObservador, descripcion, fecha, profesor_idProfesor, coordinador_idCoordinador, matriculaEstudiante_idMatriculaEstudiante
				from Observador
				where profesor_idProfesor = '" . $this -> profesor . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByCoordinadorOrder($orden, $dir) {
		return "select idObservador, descripcion, fecha, profesor_idProfesor, coordinador_idCoordinador, matriculaEstudiante_idMatriculaEstudiante
				from Observador
				where coordinador_idCoordinador = '" . $this -> coordinador . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByMatriculaEstudianteOrder($orden, $dir) {
		return "select idObservador, descripcion, fecha, profesor_idProfesor, coordinador_idCoordinador, matriculaEstudiante_idMatriculaEstudiante
				from Observador
				where matriculaEstudiante_idMatriculaEstudiante = '" . $this -> matriculaEstudiante . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idObservador, descripcion, fecha, profesor_idProfesor, coordinador_idCoordinador, matriculaEstudiante_idMatriculaEstudiante
				from Observador
				where descripcion like '%" . $search . "%' or fecha like '%" . $search . "%'";
	}
	
	function observadorAcudiente($estudiante){
	    return "SELECT o.descripcion,o.fecha,o.profesor_idProfesor,o.coordinador_idCoordinador,e.nombre,e.apellido
                FROM observador o
                INNER JOIN matriculaestudiante me on o.matriculaEstudiante_idMatriculaEstudiante = me.idMatriculaEstudiante
                INNER JOIN estudiante e on me.estudiante_idEstudiante = e.idEstudiante
                where me.estudiante_idEstudiante = '".$estudiante."'";
	}
}
?>
