<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cciudad extends CI_Controller {

	function __construct(){

	parent::__construct();

	$this->load->model('mCiudad');
	}

public function getCiudadC(){

	$s=$this->input->post('sitReg');
	$resultado = $this->mCiudad->getCiudades($s);
	echo json_encode($resultado);
}

public function getCiudadConLike(){

	$s=$this->input->post('parametro');
	$resultado = $this->mCiudad->getCiudadesConLikeModel($s);
	echo json_encode($resultado);
}


}