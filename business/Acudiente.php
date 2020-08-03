<?php
require_once ("persistence/AcudienteDAO.php");
require_once ("persistence/Connection.php");

class Acudiente {
	private $idAcudiente;
	private $nombre;
	private $apellido;
	private $telefono;
	private $estado;
	private $correo;
	private $clave;
	private $foto;
	private $fecha_nacimiento;
	private $documento;
	private $direccion;
	private $tipoDocumento;
	private $genero;
	private $acudienteDAO;
	private $connection;

	function getIdAcudiente() {
		return $this -> idAcudiente;
	}

	function setIdAcudiente($pIdAcudiente) {
		$this -> idAcudiente = $pIdAcudiente;
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

	function getDocumento() {
		return $this -> documento;
	}

	function setDocumento($pDocumento) {
		$this -> documento = $pDocumento;
	}

	function getDireccion() {
		return $this -> direccion;
	}

	function setDireccion($pDireccion) {
		$this -> direccion = $pDireccion;
	}

	function getTipoDocumento() {
		return $this -> tipoDocumento;
	}

	function setTipoDocumento($pTipoDocumento) {
		$this -> tipoDocumento = $pTipoDocumento;
	}

	function getGenero() {
		return $this -> genero;
	}

	function setGenero($pGenero) {
		$this -> genero = $pGenero;
	}

	function Acudiente($pIdAcudiente = "", $pNombre = "", $pApellido = "", $pTelefono = "", $pEstado = "", $pCorreo = "", $pClave = "", $pFoto = "", $pFecha_nacimiento = "", $pDocumento = "", $pDireccion = "", $pTipoDocumento = "", $pGenero = ""){
		$this -> idAcudiente = $pIdAcudiente;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> telefono = $pTelefono;
		$this -> estado = $pEstado;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
		$this -> foto = $pFoto;
		$this -> fecha_nacimiento = $pFecha_nacimiento;
		$this -> documento = $pDocumento;
		$this -> direccion = $pDireccion;
		$this -> tipoDocumento = $pTipoDocumento;
		$this -> genero = $pGenero;
		$this -> acudienteDAO = new AcudienteDAO($this -> idAcudiente, $this -> nombre, $this -> apellido, $this -> telefono, $this -> estado, $this -> correo, $this -> clave, $this -> foto, $this -> fecha_nacimiento, $this -> documento, $this -> direccion, $this -> tipoDocumento, $this -> genero);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> acudienteDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> acudienteDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> acudienteDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idAcudiente = $result[0];
		$this -> nombre = $result[1];
		$this -> apellido = $result[2];
		$this -> telefono = $result[3];
		$this -> estado = $result[4];
		$this -> correo = $result[5];
		$this -> clave = $result[6];
		$this -> foto = $result[7];
		$this -> fecha_nacimiento = $result[8];
		$this -> documento = $result[9];
		$this -> direccion = $result[10];
		$tipoDocumento = new TipoDocumento($result[11]);
		$tipoDocumento -> select();
		$this -> tipoDocumento = $tipoDocumento;
		$genero = new Genero($result[12]);
		$genero -> select();
		$this -> genero = $genero;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> acudienteDAO -> selectAll());
		$acudientes = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoDocumento = new TipoDocumento($result[11]);
			$tipoDocumento -> select();
			$genero = new Genero($result[12]);
			$genero -> select();
			array_push($acudientes, new Acudiente($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $acudientes;
	}

	function selectAllByTipoDocumento(){
		$this -> connection -> open();
		$this -> connection -> run($this -> acudienteDAO -> selectAllByTipoDocumento());
		$acudientes = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoDocumento = new TipoDocumento($result[11]);
			$tipoDocumento -> select();
			$genero = new Genero($result[12]);
			$genero -> select();
			array_push($acudientes, new Acudiente($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $acudientes;
	}

	function selectAllByGenero(){
		$this -> connection -> open();
		$this -> connection -> run($this -> acudienteDAO -> selectAllByGenero());
		$acudientes = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoDocumento = new TipoDocumento($result[11]);
			$tipoDocumento -> select();
			$genero = new Genero($result[12]);
			$genero -> select();
			array_push($acudientes, new Acudiente($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $acudientes;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> acudienteDAO -> selectAllOrder($order, $dir));
		$acudientes = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoDocumento = new TipoDocumento($result[11]);
			$tipoDocumento -> select();
			$genero = new Genero($result[12]);
			$genero -> select();
			array_push($acudientes, new Acudiente($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $acudientes;
	}

	function selectAllByTipoDocumentoOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> acudienteDAO -> selectAllByTipoDocumentoOrder($order, $dir));
		$acudientes = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoDocumento = new TipoDocumento($result[11]);
			$tipoDocumento -> select();
			$genero = new Genero($result[12]);
			$genero -> select();
			array_push($acudientes, new Acudiente($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $acudientes;
	}

	function selectAllByGeneroOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> acudienteDAO -> selectAllByGeneroOrder($order, $dir));
		$acudientes = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoDocumento = new TipoDocumento($result[11]);
			$tipoDocumento -> select();
			$genero = new Genero($result[12]);
			$genero -> select();
			array_push($acudientes, new Acudiente($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $acudientes;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> acudienteDAO -> search($search));
		$acudientes = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoDocumento = new TipoDocumento($result[11]);
			$tipoDocumento -> select();
			$genero = new Genero($result[12]);
			$genero -> select();
			array_push($acudientes, new Acudiente($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $acudientes;
	}
	
	function autenticar($correo,$clave){
	    $this -> connection -> open();
	    $this -> connection -> run($this -> acudienteDAO -> autenticar($correo,$clave));
	    if($this -> connection -> numRows()==1){
	        $result = $this -> connection -> fetchRow();
	        $this -> idAcudiente = $result[0];
	        $this -> nombre = $result[1];
	        $this -> apellido = $result[2];
	        $this -> telefono = $result[3];
	        $this -> estado = $result[4];
	        $this -> correo = $result[5];
	        $this -> clave = $result[6];
	        return true;
	    }else{
	        $this -> connection -> close();
	        return false;
	    }
	}
	
	function estudiantesAcudiente($id){
	    $this -> connection -> open();
	    $this -> connection -> run($this -> acudienteDAO -> estudiantesAcudiente($id));
	    $acudientes = array();
	    while ($result = $this -> connection -> fetchRow()){
	        $tipoDocumento = new TipoDocumento($result[11]);
	        $tipoDocumento -> select();
	        array_push($acudientes, new Acudiente($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $tipoDocumento));
	    }
	    $this -> connection -> close();
	    return $acudientes;
	}
	
	function traerId(){
	    $this -> connection -> open();
	    $this -> connection -> run($this -> acudienteDAO -> traerId());
	    $result = $this -> connection -> fetchRow();
	    $this -> connection -> close();
	    $this -> idAcudiente = $result[0];
	}
	
}
?>
