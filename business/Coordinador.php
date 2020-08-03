<?php
require_once ("persistence/CoordinadorDAO.php");
require_once ("persistence/Connection.php");

class Coordinador {
	private $idCoordinador;
	private $documento;
	private $nombre;
	private $apellido;
	private $telefono;
	private $estado;
	private $correo;
	private $clave;
	private $foto;
	private $fecha_nacimiento;
	private $genero;
	private $coordinadorDAO;
	private $connection;

	function getIdCoordinador() {
		return $this -> idCoordinador;
	}

	function setIdCoordinador($pIdCoordinador) {
		$this -> idCoordinador = $pIdCoordinador;
	}

	function getDocumento() {
		return $this -> documento;
	}

	function setDocumento($pDocumento) {
		$this -> documento = $pDocumento;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function getApellido() {
		return $this -> apellido;
	}

	function setApellido($pApellido) {
		$this -> apellido = $pApellido;
	}

	function getTelefono() {
		return $this -> telefono;
	}

	function setTelefono($pTelefono) {
		$this -> telefono = $pTelefono;
	}

	function getEstado() {
		return $this -> estado;
	}

	function setEstado($pEstado) {
		$this -> estado = $pEstado;
	}

	function getCorreo() {
		return $this -> correo;
	}

	function setCorreo($pCorreo) {
		$this -> correo = $pCorreo;
	}

	function getClave() {
		return $this -> clave;
	}

	function setClave($pClave) {
		$this -> clave = $pClave;
	}

	function getFoto() {
		return $this -> foto;
	}

	function setFoto($pFoto) {
		$this -> foto = $pFoto;
	}

	function getFecha_nacimiento() {
		return $this -> fecha_nacimiento;
	}

	function setFecha_nacimiento($pFecha_nacimiento) {
		$this -> fecha_nacimiento = $pFecha_nacimiento;
	}

	function getGenero() {
		return $this -> genero;
	}

	function setGenero($pGenero) {
		$this -> genero = $pGenero;
	}

	function Coordinador($pIdCoordinador = "", $pDocumento = "", $pNombre = "", $pApellido = "", $pTelefono = "", $pEstado = "", $pCorreo = "", $pClave = "", $pFoto = "", $pFecha_nacimiento = "", $pGenero = ""){
		$this -> idCoordinador = $pIdCoordinador;
		$this -> documento = $pDocumento;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> telefono = $pTelefono;
		$this -> estado = $pEstado;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
		$this -> foto = $pFoto;
		$this -> fecha_nacimiento = $pFecha_nacimiento;
		$this -> genero = $pGenero;
		$this -> coordinadorDAO = new CoordinadorDAO($this -> idCoordinador, $this -> documento, $this -> nombre, $this -> apellido, $this -> telefono, $this -> estado, $this -> correo, $this -> clave, $this -> foto, $this -> fecha_nacimiento, $this -> genero);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> coordinadorDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> coordinadorDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> coordinadorDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idCoordinador = $result[0];
		$this -> documento = $result[1];
		$this -> nombre = $result[2];
		$this -> apellido = $result[3];
		$this -> telefono = $result[4];
		$this -> estado = $result[5];
		$this -> correo = $result[6];
		$this -> clave = $result[7];
		$this -> foto = $result[8];
		$this -> fecha_nacimiento = $result[9];
		$genero = new Genero($result[10]);
		$genero -> select();
		$this -> genero = $genero;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> coordinadorDAO -> selectAll());
		$coordinadors = array();
		while ($result = $this -> connection -> fetchRow()){
			$genero = new Genero($result[10]);
			$genero -> select();
			array_push($coordinadors, new Coordinador($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $genero));
		}
		$this -> connection -> close();
		return $coordinadors;
	}

	function selectAllByGenero(){
		$this -> connection -> open();
		$this -> connection -> run($this -> coordinadorDAO -> selectAllByGenero());
		$coordinadors = array();
		while ($result = $this -> connection -> fetchRow()){
			$genero = new Genero($result[10]);
			$genero -> select();
			array_push($coordinadors, new Coordinador($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $genero));
		}
		$this -> connection -> close();
		return $coordinadors;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> coordinadorDAO -> selectAllOrder($order, $dir));
		$coordinadors = array();
		while ($result = $this -> connection -> fetchRow()){
			$genero = new Genero($result[10]);
			$genero -> select();
			array_push($coordinadors, new Coordinador($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $genero));
		}
		$this -> connection -> close();
		return $coordinadors;
	}

	function selectAllByGeneroOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> coordinadorDAO -> selectAllByGeneroOrder($order, $dir));
		$coordinadors = array();
		while ($result = $this -> connection -> fetchRow()){
			$genero = new Genero($result[10]);
			$genero -> select();
			array_push($coordinadors, new Coordinador($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $genero));
		}
		$this -> connection -> close();
		return $coordinadors;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> coordinadorDAO -> search($search));
		$coordinadors = array();
		while ($result = $this -> connection -> fetchRow()){
			$genero = new Genero($result[10]);
			$genero -> select();
			array_push($coordinadors, new Coordinador($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $genero));
		}
		$this -> connection -> close();
		return $coordinadors;
	}
	
	function autenticar($correo, $clave){
	    $this -> connection -> open();
	    $this -> connection -> run($this -> coordinadorDAO -> autenticar($correo, $clave));
	    if($this -> connection -> numRows()==1){
	        $result = $this -> connection -> fetchRow();
	        $this -> idCoordinador = $result[0];
	        $this -> documento = $result[1];
	        $this -> nombre = $result[2];
	        $this -> apellido = $result[3];
	        $this -> telefono = $result[4];
	        $this -> estado = $result[5];
	        $this -> correo = $result[6];
	        $this -> clave = $result[7];
	        $this -> genero = $result[8];
	        $this -> fecha_nacimiento = $result[9];
	        $this -> connection -> close();
	        return true;
	    }else{
	        $this -> connection -> close();
	        return false;
	    }
	}
}
?>
