<?php
class HorarioDAO{
	private $idHorario;
	private $dia;
	private $hora;
	private $clase;

	function HorarioDAO($pIdHorario = "", $pDia = "", $pHora = "", $pClase = ""){
		$this -> idHorario = $pIdHorario;
		$this -> dia = $pDia;
		$this -> hora = $pHora;
		$this -> clase = $pClase;
	}

	function insert(){
		return "insert into Horario(dia, hora, clase_idClase)
				values('" . $this -> dia . "', '" . $this -> hora . "', '" . $this -> clase . "')";
	}

	function update(){
		return "update Horario set 
				dia = '" . $this -> dia . "',
				hora = '" . $this -> hora . "',
				clase_idClase = '" . $this -> clase . "'	
				where idHorario = '" . $this -> idHorario . "'";
	}

	function select() {
		return "select idHorario, dia, hora, clase_idClase
				from Horario
				where idHorario = '" . $this -> idHorario . "'";
	}

	function selectAll() {
		return "select idHorario, dia, hora, clase_idClase
				from Horario";
	}

	function selectAllByClase() {
		return "select idHorario, dia, hora, clase_idClase
				from Horario
				where clase_idClase = '" . $this -> clase . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idHorario, dia, hora, clase_idClase
				from Horario
				order by " . $orden . " " . $dir;
	}

	function selectAllByClaseOrder($orden, $dir) {
		return "select idHorario, dia, hora, clase_idClase
				from Horario
				where clase_idClase = '" . $this -> clase . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idHorario, dia, hora, clase_idClase
				from Horario
				where dia like '%" . $search . "%' or hora like '%" . $search . "%'";
	}
}
?>
