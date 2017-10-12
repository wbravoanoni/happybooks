<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cnotas extends CI_Controller {

	function __construct(){

	parent::__construct();

	$this->load->model('Mnotas');
	}


public function index(){

	$this->load->view('layout/header');
	$this->load->view('layout/menu');
	$this->load->view('vnotas.php');
	$this->load->view('layout/footer');


}

public function getNotas(){
echo json_encode($this->Mnotas->getNotas());
}


public function saveNotas(){

$param['idPersona']=$this->input->post('idPersona');
$param['n1']=$this->input->post('n1');
$param['n2']=$this->input->post('n2');
$param['n3']=$this->input->post('n3');
$param['n4']=$this->input->post('n4');
$param['nf']=$this->input->post('nf');

$this->Mnotas->saveNotasM($param);

}


}