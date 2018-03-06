<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clibros extends CI_Controller {

	function __construct(){

	parent::__construct();
	$this->load->model('Mlibros');
	}

public function index(){

$this->load->view('layout/header');
$this->load->view('layout/menu');
$this->load->view('Panel/libros/Vlibros');
$this->load->view('layout/footer');

}

public function listarLibrosPanel(){
	$resultado = $this->Mlibros->listarLibros();
	echo json_encode($resultado);
}

public function listarGeneros(){

	$activo    = $this->input->post('activo');
	$resultado = $this->Mlibros->listarGeneros($activo);
	echo json_encode($resultado);
}

public function listarUsuariosLibros(){

	$activo    = $this->input->post('activo');
	$resultado = $this->Mlibros->listarUsuariosLibros($activo);
	echo json_encode($resultado);
}

public function cListarAutoresLibros(){

	$activo    = $this->input->post('activo');
	$resultado = $this->Mlibros->mListarAutoresLibros($activo);
	echo json_encode($resultado);
}

public function agregarLibros(){

$today=date("Y-m-d H:i:s");	

$descripcion=$this->input->post('descripcionLibro');

$data['nombreLibro']      = $this->input->post('nombreLibro');
$data['autorLibro']       = $this->input->post('cboautorLibro');
$data['resumenLibro']     = $this->input->post('resumenLibro');
$data['descripcionLibro'] = $this->limpiarTexto($descripcion);
$data['imagenLibro']	  = $this->input->post('imagenLibro');
$data['cboUsuariosLibro'] = $this->input->post('cboUsuariosLibro');
$data['cboGenero'] 		  = $this->input->post('cboGenero');
$data['myRange']          = $this->input->post('myRange');
$data['paginas']          = $this->input->post('nPaginas');
$data['estadoLibro']      = $this->input->post('estadoLibro');
$data['imgExterna']       = $this->input->post('imgExterna');
$data['fechaCreacion']    = $today;



$lastId=$this->Mlibros->agregarLibros($data);

//actualizarLLave($idLibro)

if($lastId>0){

$this->Mlibros->actualizarLLave($lastId);

//echo json_encode($resultado);
	//echo json_encode($resultado);
}else{
//	echo json_encode($resultado);
}

}


public function cUsuariosCreadorResena(){
	$idLibro   = $this->input->post('idLibro');
	$resultado = $this->Mlibros->mListarTodosUsuariosLibros();
	echo json_encode($resultado);
}

public function cListarTodosGeneros(){
	$idLibro   = $this->input->post('idLibro');
	$resultado = $this->Mlibros->mListarTodosGeneros();
	echo json_encode($resultado);
}

public function cListarTodosAutores(){
	$idLibro   = $this->input->post('idLibro');
	$resultado = $this->Mlibros->mListarTodosAutores();
	echo json_encode($resultado);
}


public function cActualizarLibros(){

$descripcion=$this->input->post('uDescripcionLibro');

$data['idLibros']         = $this->input->post('idLibros');
$data['llave']            = $this->input->post('key');
$data['nombreLibro']      = $this->input->post('uNombreLibro');
$data['autorLibro']       = $this->input->post('uAutorLibro');
$data['resumenLibro']     = $this->input->post('uResumenLibro');
$data['descripcionLibro'] = $this->limpiarTexto($descripcion);
$data['imagenLibro']	  = $this->input->post('uImagenLibro');
$data['cboUsuariosLibro'] = $this->input->post('aUsuariosLibro');
$data['cboGenero'] 		  = $this->input->post('uCboGenero');
$data['myRange']          = $this->input->post('uMyRange');
$data['estadoLibro']      = $this->input->post('uEstadoLibro');
$data['paginas']  	      = $this->input->post('uNPaginas');
$data['imgExterna']       = $this->input->post('uImgExterna');

$prueba=$this->revisaIntegridad($data['idLibros'],$data['llave']);

if($prueba==true){
//echo "Cadena Correcta";
//print_r($data);
//exit;
	$resultado = $this->Mlibros->mActualizarLibros($data);
	echo json_encode($resultado);

}else{
//echo "Cadena Incorrecta";
	echo 2;
//exit;
}
}

public function revisaIntegridad($idLibro,$llave){
	if(base64_encode($idLibro."-"."cinthia")==$llave){
	return true;
	}else{
		return false;
	}
}


public function limpiarTexto($texto){
$texto  = str_replace("'","",$texto);
$texto  = str_replace('"','',$texto);
$texto=trim($texto);
$texto = eregi_replace("[\n|\r|\n\r]", '', $texto);
//$texto  = strip_tags($texto);
//$texto = htmlspecialchars($texto, ENT_QUOTES);
return $texto;
}

}