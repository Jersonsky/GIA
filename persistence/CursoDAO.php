<?php
class CursoDAO{
	private $idCurso;
	private $nombrecurso;
	private $sede;

	function CursoDAO($pIdCurso = "", $pNombrecurso = "", $pSede = ""){
		$this -> idCurso = $pIdCurso;
		$this -> nombrecurso = $pNombrecurso;
		$this -> sede = $pSede;
	}

	function insert(){
		return "insert into Curso(nombrecurso, sede_idSede)
				values('" . $this -> nombrecurso . "', '" . $this -> sede . "')";
	}

	function update(){
		return "update Curso set 
				nombrecurso = '" . $this -> nombrecurso . "',
				sede_idSede = '" . $this -> sede . "'	
				where idCurso = '" . $this -> idCurso . "'";
	}

	function select() {
		return "select idCurso, nombrecurso, sede_idSede
				from Curso
				where idCurso = '" . $this -> idCurso . "'";
	}

	function selectAll() {
		return "select idCurso, nombrecurso, sede_idSede
				from Curso";
	}

	function selectAllBySede() {
		return "select idCurso, nombrecurso, sede_idSede
				from Curso
				where sede_idSede = '" . $this -> sede . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idCurso, nombrecurso, sede_idSede
				from Curso
				order by " . $orden . " " . $dir;
	}

	function selectAllBySedeOrder($orden, $dir) {
		return "select idCurso, nombrecurso, sede_idSede
				from Curso
				where sede_idSede = '" . $this -> sede . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idCurso, nombrecurso, sede_idSede
				from Curso
				where nombrecurso like '%" . $search . "%'";
	}
	
	function cursoEstudiante($filtro){
	    return "SELECT c.nombrecurso 
                FROM curso c
                INNER JOIN matricula m on c.idCurso = m.curso_idCurso
                inner join matriculaestudiante me on m.idMatricula=me.matricula_idMatricula
                where me.estudiante_idEstudiante='".$filtro."'";
	}
}
?>
