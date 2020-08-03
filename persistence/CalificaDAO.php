<?php
class CalificaDAO{
	private $idCalifica;
	private $periodo_1;
	private $periodo_2;
	private $periodo_3;
	private $periodo_4;
	private $clase;
	private $estudiante;

	function CalificaDAO($pIdCalifica = "", $pPeriodo_1 = "", $pPeriodo_2 = "", $pPeriodo_3 = "", $pPeriodo_4 = "", $pClase = "", $pEstudiante = ""){
		$this -> idCalifica = $pIdCalifica;
		$this -> periodo_1 = $pPeriodo_1;
		$this -> periodo_2 = $pPeriodo_2;
		$this -> periodo_3 = $pPeriodo_3;
		$this -> periodo_4 = $pPeriodo_4;
		$this -> clase = $pClase;
		$this -> estudiante = $pEstudiante;
	}

	function insert(){
		return "insert into Califica(periodo_1, periodo_2, periodo_3, periodo_4, clase_idClase, estudiante_idEstudiante)
				values('" . $this -> periodo_1 . "', '" . $this -> periodo_2 . "', '" . $this -> periodo_3 . "', '" . $this -> periodo_4 . "', '" . $this -> clase . "', '" . $this -> estudiante . "')";
	}

	function update(){
		return "update Califica set 
				periodo_1 = '" . $this -> periodo_1 . "',
				periodo_2 = '" . $this -> periodo_2 . "',
				periodo_3 = '" . $this -> periodo_3 . "',
				periodo_4 = '" . $this -> periodo_4 . "',
				clase_idClase = '" . $this -> clase . "',
				estudiante_idEstudiante = '" . $this -> estudiante . "'	
				where idCalifica = '" . $this -> idCalifica . "'";
	}

	function select() {
		return "select idCalifica, periodo_1, periodo_2, periodo_3, periodo_4, clase_idClase, estudiante_idEstudiante
				from Califica
				where idCalifica = '" . $this -> idCalifica . "'";
	}

	function selectAll() {
		return "select idCalifica, periodo_1, periodo_2, periodo_3, periodo_4, clase_idClase, estudiante_idEstudiante
				from Califica";
	}

	function selectAllByClase() {
		return "select idCalifica, periodo_1, periodo_2, periodo_3, periodo_4, clase_idClase, estudiante_idEstudiante
				from Califica
				where clase_idClase = '" . $this -> clase . "'";
	}

	function selectAllByEstudiante() {
		return "select idCalifica, periodo_1, periodo_2, periodo_3, periodo_4, clase_idClase, estudiante_idEstudiante
				from Califica
				where estudiante_idEstudiante = '" . $this -> estudiante . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idCalifica, periodo_1, periodo_2, periodo_3, periodo_4, clase_idClase, estudiante_idEstudiante
				from Califica
				order by " . $orden . " " . $dir;
	}

	function selectAllByClaseOrder($orden, $dir) {
		return "select idCalifica, periodo_1, periodo_2, periodo_3, periodo_4, clase_idClase, estudiante_idEstudiante
				from Califica
				where clase_idClase = '" . $this -> clase . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByEstudianteOrder($orden, $dir) {
		return "select idCalifica, periodo_1, periodo_2, periodo_3, periodo_4, clase_idClase, estudiante_idEstudiante
				from Califica
				where estudiante_idEstudiante = '" . $this -> estudiante . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idCalifica, periodo_1, periodo_2, periodo_3, periodo_4, clase_idClase, estudiante_idEstudiante
				from Califica
				where periodo_1 like '%" . $search . "%' or periodo_2 like '%" . $search . "%' or periodo_3 like '%" . $search . "%' or periodo_4 like '%" . $search . "%'";
	}
	
	function mostarNotasEstudiantes($clase) {
	    return "SELECT  e.nombre,ca.periodo_1,ca.periodo_2,ca.periodo_3,ca.periodo_4,ca.idCalifica 
                from clase c 
                inner JOIN califica ca on c.idClase = ca.clase_idClase 
                inner join estudiante e on ca.estudiante_idEstudiante = e.idEstudiante 
                inner join matricula m on c.matricula_idMatricula=m.idMatricula 
                where c.idClase='".$clase."' and YEAR(m.fecha)=(SELECT MAX(YEAR(m.fecha)) from matricula m)";
	}
	
	function subirNotas($nota1,$nota2,$nota3,$nota4,$clase){
	    return "update Califica set
				periodo_1 = '" . $nota1 . "',
				periodo_2 = '" . $nota2 . "',
				periodo_3 = '" . $nota3 . "',
				periodo_4 = '" . $nota4 . "'
                where idCalifica='".$clase."'";
	}
	
	function notasEstudianteAcudiente($estudiante) {
	    return "SELECT m.nombremateria,c.periodo_1,c.periodo_2,c.periodo_3,c.periodo_4 
                FROM califica c
                INNER JOIN clase cl on c.clase_idClase = cl.idClase
                inner JOIN materia m on cl.materia_idMateria = m.idMateria
                where c.estudiante_idEstudiante = '".$estudiante."'";
	}
	
	
}
?>
