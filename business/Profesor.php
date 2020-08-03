<?php
require_once ("persistence/ProfesorDAO.php");
require_once ("persistence/Connection.php");

class Profesor {
	private $idProfesor;
	private $documento;
	private $nombre;
	private $apellido;
	private $telefono;
	private $estado;
	private $correo;
	private $clave;
	private $foto;
	private $fecha_nacimiento;
	private $tipoDocumento;
	private $genero;
	private $profesorDAO;
	private $connection;

	function getProfesorDAO() {
	    return $this -> profesorDAO;
	}
	
	function getIdProfesor() {
		return $this -> idProfesor;
	}

	function setIdProfesor($pIdProfesor) {
		$this -> idProfesor = $pIdProfesor;
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

	function Profesor($pIdProfesor = "", $pDocumento = "", $pNombre = "", $pApellido = "", $pTelefono = "", $pEstado = "", $pCorreo = "", $pClave = "", $pFoto = "", $pFecha_nacimiento = "", $pTipoDocumento = "", $pGenero = ""){
		$this -> idProfesor = $pIdProfesor;
		$this -> documento = $pDocumento;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> telefono = $pTelefono;
		$this -> estado = $pEstado;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
		$this -> foto = $pFoto;
		$this -> fecha_nacimiento = $pFecha_nacimiento;
		$this -> tipoDocumento = $pTipoDocumento;
		$this -> genero = $pGenero;
		$this -> profesorDAO = new ProfesorDAO($this -> idProfesor, $this -> documento, $this -> nombre, $this -> apellido, $this -> telefono, $this -> estado, $this -> correo, $this -> clave, $this -> foto, $this -> fecha_nacimiento, $this -> tipoDocumento, $this -> genero);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idProfesor = $result[0];
		$this -> documento = $result[1];
		$this -> nombre = $result[2];
		$this -> apellido = $result[3];
		$this -> telefono = $result[4];
		$this -> estado = $result[5];
		$this -> correo = $result[6];
		$this -> clave = $result[7];
		$this -> foto = $result[8];
		$this -> fecha_nacimiento = $result[9];
		$tipoDocumento = new TipoDocumento($result[10]);
		$tipoDocumento -> select();
		$this -> tipoDocumento = $tipoDocumento;
		$genero = new Genero($result[11]);
		$genero -> select();
		$this -> genero = $genero;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> selectAll());
		$profesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoDocumento = new TipoDocumento($result[10]);
			$tipoDocumento -> select();
			$genero = new Genero($result[11]);
			$genero -> select();
			array_push($profesors, new Profesor($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $profesors;
	}

	function selectAllByTipoDocumento(){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> selectAllByTipoDocumento());
		$profesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoDocumento = new TipoDocumento($result[10]);
			$tipoDocumento -> select();
			$genero = new Genero($result[11]);
			$genero -> select();
			array_push($profesors, new Profesor($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $profesors;
	}

	function selectAllByGenero(){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> selectAllByGenero());
		$profesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoDocumento = new TipoDocumento($result[10]);
			$tipoDocumento -> select();
			$genero = new Genero($result[11]);
			$genero -> select();
			array_push($profesors, new Profesor($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $profesors;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> selectAllOrder($order, $dir));
		$profesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoDocumento = new TipoDocumento($result[10]);
			$tipoDocumento -> select();
			$genero = new Genero($result[11]);
			$genero -> select();
			array_push($profesors, new Profesor($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $profesors;
	}

	function selectAllByTipoDocumentoOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> selectAllByTipoDocumentoOrder($order, $dir));
		$profesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoDocumento = new TipoDocumento($result[10]);
			$tipoDocumento -> select();
			$genero = new Genero($result[11]);
			$genero -> select();
			array_push($profesors, new Profesor($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $profesors;
	}

	function selectAllByGeneroOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> selectAllByGeneroOrder($order, $dir));
		$profesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoDocumento = new TipoDocumento($result[10]);
			$tipoDocumento -> select();
			$genero = new Genero($result[11]);
			$genero -> select();
			array_push($profesors, new Profesor($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $profesors;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> search($search));
		$profesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoDocumento = new TipoDocumento($result[10]);
			$tipoDocumento -> select();
			$genero = new Genero($result[11]);
			$genero -> select();
			array_push($profesors, new Profesor($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $profesors;
	}
	
	function autenticar($correo,$clave){
	    $this -> connection -> open();
	    $this -> connection -> run($this -> profesorDAO -> autenticar($correo,$clave));
	    if($this -> connection -> numRows()==1){
	        $result = $this -> connection -> fetchRow();
	        $this -> idProfesor = $result[0];
	        $this -> documento = $result[1];
	        $this -> nombre = $result[2];
	        $this -> apellido = $result[3];
	        $this -> telefono = $result[4];
	        $this -> estado = $result[5];
	        $this -> correo = $result[6];
	        $this -> clave = $result[7];
	        $this -> genero = $result[8];
	        $this -> fecha_nacimiento = $result[9];
	        $tipoDoc = new TipoDocumento($result[10]);
	        $tipoDoc -> select();
	        $this -> connection -> close();
	        return true;
	    }else{
	        $this -> connection -> close();
	        return false;
	    }
	}
	
	function mostrarCursos($prof){
	    $this -> connection -> open();
	    $this -> connection -> run($this -> profesorDAO -> mostrarCursos($prof));
	    $profesors = array();
	    while ($result = $this -> connection -> fetchRow()){
	        $sede = new Sede($result[2]);
	        $sede -> select();
	        
	        array_push($profesors, new Profesor($result[0], $result[1], $sede,$result[3]));
	    }
	    $this -> connection -> close();
	    return $profesors;
	}
	
	function profesorEstudiante($acudiente){
	    $this -> connection -> open();
	    $this -> connection -> run($this -> profesorDAO -> profesorEstudiante($acudiente));
	    $profesors = array();
	    while ($result = $this -> connection -> fetchRow()){
	        array_push($profesors, new Profesor($result[0], $result[1], $result[2],$result[3],$result[4],$result[5]));
	    }
	    $this -> connection -> close();
	    return $profesors;
	}
	
	function profesorDelEstudiante($estudiante){
	    $this -> connection -> open();
	    $this -> connection -> run($this -> profesorDAO -> profesorDelEstudiante($estudiante));
	    $profesors = array();
	    while ($result = $this -> connection -> fetchRow()){
	        array_push($profesors, new Profesor($result[0], $result[1], $result[2],$result[3],$result[4],$result[5]));
	    }
	    $this -> connection -> close();
	    return $profesors;
	}
}
?>
