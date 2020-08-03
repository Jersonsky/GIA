<?php
require_once ("persistence/EstudianteDAO.php");
require_once ("persistence/Connection.php");

class Estudiante {
	private $idEstudiante;
	private $nombre;
	private $apellido;
	private $telefono;
	private $correo;
	private $clave;
	private $foto;
	private $fecha_nacimiento;
	private $documento;
	private $estado;
	private $sede;
	private $tipoDocumento;
	private $genero;
	private $estudianteDAO;
	private $connection;

	function getIdEstudiante() {
		return $this -> idEstudiante;
	}

	function setIdEstudiante($pIdEstudiante) {
		$this -> idEstudiante = $pIdEstudiante;
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

	function getEstado() {
		return $this -> estado;
	}

	function setEstado($pEstado) {
		$this -> estado = $pEstado;
	}

	function getSede() {
		return $this -> sede;
	}

	function setSede($pSede) {
		$this -> sede = $pSede;
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

	function Estudiante($pIdEstudiante = "", $pNombre = "", $pApellido = "", $pTelefono = "", $pCorreo = "", $pClave = "", $pFoto = "", $pFecha_nacimiento = "", $pDocumento = "", $pEstado = "", $pSede = "", $pTipoDocumento = "", $pGenero = ""){
		$this -> idEstudiante = $pIdEstudiante;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> telefono = $pTelefono;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
		$this -> foto = $pFoto;
		$this -> fecha_nacimiento = $pFecha_nacimiento;
		$this -> documento = $pDocumento;
		$this -> estado = $pEstado;
		$this -> sede = $pSede;
		$this -> tipoDocumento = $pTipoDocumento;
		$this -> genero = $pGenero;
		$this -> estudianteDAO = new EstudianteDAO($this -> idEstudiante, $this -> nombre, $this -> apellido, $this -> telefono, $this -> correo, $this -> clave, $this -> foto, $this -> fecha_nacimiento, $this -> documento, $this -> estado, $this -> sede, $this -> tipoDocumento, $this -> genero);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idEstudiante = $result[0];
		$this -> nombre = $result[1];
		$this -> apellido = $result[2];
		$this -> telefono = $result[3];
		$this -> correo = $result[4];
		$this -> clave = $result[5];
		$this -> foto = $result[6];
		$this -> fecha_nacimiento = $result[7];
		$this -> documento = $result[8];
		$estado = new Estado($result[9]);
		$estado -> select();
		$this -> estado = $estado;
		$sede = new Sede($result[10]);
		$sede -> select();
		$this -> sede = $sede;
		$tipoDocumento = new TipoDocumento($result[11]);
		$tipoDocumento -> select();
		$this -> tipoDocumento = $tipoDocumento;
		$genero = new Genero($result[12]);
		$genero -> select();
		$this -> genero = $genero;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAll());
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estado = new Estado($result[9]);
			$estado -> select();
			$sede = new Sede($result[10]);
			$sede -> select();
			$tipoDocumento = new TipoDocumento($result[11]);
			$tipoDocumento -> select();
			$genero = new Genero($result[12]);
			$genero -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $estado, $sede, $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function selectAllByEstado(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAllByEstado());
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estado = new Estado($result[9]);
			$estado -> select();
			$sede = new Sede($result[10]);
			$sede -> select();
			$tipoDocumento = new TipoDocumento($result[11]);
			$tipoDocumento -> select();
			$genero = new Genero($result[12]);
			$genero -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $estado, $sede, $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function selectAllBySede(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAllBySede());
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estado = new Estado($result[9]);
			$estado -> select();
			$sede = new Sede($result[10]);
			$sede -> select();
			$tipoDocumento = new TipoDocumento($result[11]);
			$tipoDocumento -> select();
			$genero = new Genero($result[12]);
			$genero -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $estado, $sede, $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function selectAllByTipoDocumento(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAllByTipoDocumento());
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estado = new Estado($result[9]);
			$estado -> select();
			$sede = new Sede($result[10]);
			$sede -> select();
			$tipoDocumento = new TipoDocumento($result[11]);
			$tipoDocumento -> select();
			$genero = new Genero($result[12]);
			$genero -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $estado, $sede, $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function selectAllByGenero(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAllByGenero());
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estado = new Estado($result[9]);
			$estado -> select();
			$sede = new Sede($result[10]);
			$sede -> select();
			$tipoDocumento = new TipoDocumento($result[11]);
			$tipoDocumento -> select();
			$genero = new Genero($result[12]);
			$genero -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $estado, $sede, $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAllOrder($order, $dir));
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estado = new Estado($result[9]);
			$estado -> select();
			$sede = new Sede($result[10]);
			$sede -> select();
			$tipoDocumento = new TipoDocumento($result[11]);
			$tipoDocumento -> select();
			$genero = new Genero($result[12]);
			$genero -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $estado, $sede, $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function selectAllByEstadoOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAllByEstadoOrder($order, $dir));
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estado = new Estado($result[9]);
			$estado -> select();
			$sede = new Sede($result[10]);
			$sede -> select();
			$tipoDocumento = new TipoDocumento($result[11]);
			$tipoDocumento -> select();
			$genero = new Genero($result[12]);
			$genero -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $estado, $sede, $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function selectAllBySedeOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAllBySedeOrder($order, $dir));
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estado = new Estado($result[9]);
			$estado -> select();
			$sede = new Sede($result[10]);
			$sede -> select();
			$tipoDocumento = new TipoDocumento($result[11]);
			$tipoDocumento -> select();
			$genero = new Genero($result[12]);
			$genero -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $estado, $sede, $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function selectAllByTipoDocumentoOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAllByTipoDocumentoOrder($order, $dir));
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estado = new Estado($result[9]);
			$estado -> select();
			$sede = new Sede($result[10]);
			$sede -> select();
			$tipoDocumento = new TipoDocumento($result[11]);
			$tipoDocumento -> select();
			$genero = new Genero($result[12]);
			$genero -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $estado, $sede, $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function selectAllByGeneroOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAllByGeneroOrder($order, $dir));
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estado = new Estado($result[9]);
			$estado -> select();
			$sede = new Sede($result[10]);
			$sede -> select();
			$tipoDocumento = new TipoDocumento($result[11]);
			$tipoDocumento -> select();
			$genero = new Genero($result[12]);
			$genero -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $estado, $sede, $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> search($search));
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$estado = new Estado($result[9]);
			$estado -> select();
			$sede = new Sede($result[10]);
			$sede -> select();
			$tipoDocumento = new TipoDocumento($result[11]);
			$tipoDocumento -> select();
			$genero = new Genero($result[12]);
			$genero -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $estado, $sede, $tipoDocumento, $genero));
		}
		$this -> connection -> close();
		return $estudiantes;
	}
	
	function autenticar($correo, $clave){
	    $this -> connection -> open();
	    $this -> connection -> run($this -> estudianteDAO -> autenticar($correo, $clave));
	    if($this -> connection -> numRows()==1){
	        $result = $this -> connection -> fetchRow();
	        $this -> idEstudiante = $result[0];
	        $this -> nombre = $result[1];
	        $this -> apellido = $result[2];
	        $this -> telefono = $result[3];
	        $this -> correo = $result[4];
	        $this -> clave = $result[5];
	        $this -> genero = $result[6];
	        $this -> fecha_nacimiento = $result[7];
	        $tipoDoc = new TipoDocumento($result[8]);
	        $tipoDoc -> select();
	        $this -> documento = $result[9];
	        $estado = new Estado($result[10]);
	        $estado -> select();
	        $this -> estado = $estado;
	        $sede = new Sede($result[11]);
	        $sede -> select();
	        $this -> sede = $sede;
	        $this -> connection -> close();
	        return true;
	    }else{
	        $this -> connection -> close();
	        return false;
	    }
	}
	
	function estudianteCurso($search){
	    $this -> connection -> open();
	    $this -> connection -> run($this -> estudianteDAO -> estudianteCurso($search));
	    $estudiantes = array();
	    while ($result = $this -> connection -> fetchRow()){
	        $estado = new Estado($result[9]);
	        $estado -> select();
	        $sede = new Sede($result[10]);
	        $sede -> select();
	        $tipoDocumento = new TipoDocumento($result[11]);
	        $tipoDocumento -> select();
	        $genero = new Genero($result[12]);
	        $genero -> select();
	        array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $estado, $sede, $tipoDocumento, $genero));
	    }
	    $this -> connection -> close();
	    return $estudiantes;
	}
}
?>
