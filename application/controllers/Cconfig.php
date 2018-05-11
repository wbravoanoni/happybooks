<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cconfig extends CI_Controller {

	function __construct(){

	parent::__construct();
	$this->load->model('Mconfig');
	}


public function pais(){

$this->load->view('layout/header');
$this->load->view('layout/menu');
$this->load->view("Panel/config/Vpais");
$this->load->view('layout/footer');

}

public function ciudades(){

$this->load->view('layout/header');
$this->load->view('layout/menu');
$this->load->view("Panel/config/Vciudades");
$this->load->view('layout/footer');

}

public function autores(){

$this->load->view('layout/header');
$this->load->view('layout/menu');
$this->load->view("Panel/config/Vautores");
$this->load->view('layout/footer');

}

public function genero(){

$this->load->view('layout/header');
$this->load->view('layout/menu');
$this->load->view("Panel/config/Vgeneros");
$this->load->view('layout/footer');

}

public function getPaisesConfigControler(){
	$resultado = $this->Mconfig->getPaisesConfigModel();
	echo json_encode($resultado);
}

public function getCiudadesConfigControler(){

	$data["idPais"]=$this->input->post("idPais");

	$resultado = $this->Mconfig->getCiudadesConfigModel($data);
	echo json_encode($resultado);
}

public function getAutoresConfigControler(){
	$resultado = $this->Mconfig->getAutoresConfigModel();
	echo json_encode($resultado);
}

public function getGeneroConfigControler(){
	$resultado = $this->Mconfig->getGeneroConfigModel();
	echo json_encode($resultado);
}

}
