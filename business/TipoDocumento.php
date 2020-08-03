<?php
require_once ("persistence/TipoDocumentoDAO.php");
require_once ("persistence/Connection.php");

class TipoDocumento {
	private $idTipoDocumento;
	private $descripcion;
	private $tipoDocumentoDAO;
	private $connection;

	function getIdTipoDocumento() {
		return $this -> idTipoDocumento;
	}

	function setIdTipoDocumento($pIdTipoDocumento) {
		$this -> idTipoDocumento = $pIdTipoDocumento;
	}

	function getDescripcion() {
		return $this -> descripcion;
	}

	function setDescripcion($pDescripcion) {
		$this -> descripcion = $pDescripcion;
	}

	function TipoDocumento($pIdTipoDocumento = "", $pDescripcion = ""){
		$this -> idTipoDocumento = $pIdTipoDocumento;
		$this -> descripcion = $pDescripcion;
		$this -> tipoDocumentoDAO = new TipoDocumentoDAO($this -> idTipoDocumento, $this -> descripcion);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoDocumentoDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoDocumentoDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoDocumentoDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idTipoDocumento = $result[0];
		$this -> descripcion = $result[1];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoDocumentoDAO -> selectAll());
		$tipoDocumentos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($tipoDocumentos, new TipoDocumento($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $tipoDocumentos;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoDocumentoDAO -> selectAllOrder($order, $dir));
		$tipoDocumentos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($tipoDocumentos, new TipoDocumento($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $tipoDocumentos;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoDocumentoDAO -> search($search));
		$tipoDocumentos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($tipoDocumentos, new TipoDocumento($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $tipoDocumentos;
	}

	function delete(){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoDocumentoDAO -> delete());
		$success = $this -> connection -> querySuccess();
		$this -> connection -> close();
		return $success;
	}
}
?>
