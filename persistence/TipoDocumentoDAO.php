<?php
class TipoDocumentoDAO{
	private $idTipoDocumento;
	private $descripcion;

	function TipoDocumentoDAO($pIdTipoDocumento = "", $pDescripcion = ""){
		$this -> idTipoDocumento = $pIdTipoDocumento;
		$this -> descripcion = $pDescripcion;
	}

	function insert(){
		return "insert into TipoDocumento(descripcion)
				values('" . $this -> descripcion . "')";
	}

	function update(){
		return "update TipoDocumento set 
				descripcion = '" . $this -> descripcion . "'	
				where idTipoDocumento = '" . $this -> idTipoDocumento . "'";
	}

	function select() {
		return "select idTipoDocumento, descripcion
				from TipoDocumento
				where idTipoDocumento = '" . $this -> idTipoDocumento . "'";
	}

	function selectAll() {
		return "select idTipoDocumento, descripcion
				from TipoDocumento";
	}

	function selectAllOrder($orden, $dir){
		return "select idTipoDocumento, descripcion
				from TipoDocumento
				order by " . $orden . " " . $dir;
	}

	function delete(){
		return "delete from TipoDocumento
				where idTipoDocumento = '" . $this -> idTipoDocumento . "'";
	}
}
?>
