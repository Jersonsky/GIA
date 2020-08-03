<?php
class MateriaDAO{
	private $idMateria;
	private $nombremateria;

	function MateriaDAO($pIdMateria = "", $pNombremateria = ""){
		$this -> idMateria = $pIdMateria;
		$this -> nombremateria = $pNombremateria;
	}

	function insert(){
		return "insert into Materia(nombremateria)
				values('" . $this -> nombremateria . "')";
	}

	function update(){
		return "update Materia set 
				nombremateria = '" . $this -> nombremateria . "'	
				where idMateria = '" . $this -> idMateria . "'";
	}

	function select() {
		return "select idMateria, nombremateria
				from Materia
				where idMateria = '" . $this -> idMateria . "'";
	}

	function selectAll() {
		return "select idMateria, nombremateria
				from Materia";
	}

	function selectAllOrder($orden, $dir){
		return "select idMateria, nombremateria
				from Materia
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idMateria, nombremateria
				from Materia
				where nombremateria like '%" . $search . "%'";
	}
}
?>
