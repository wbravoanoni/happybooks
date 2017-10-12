<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cchartjs extends CI_Controller {

	function __construct(){

	parent::__construct();
	}



public function index(){

$this->load->view('layout/header');
$this->load->view('layout/menu');
$this->load->view('Vcharjs');
$this->load->view('layout/footer');

}

public function VcharEdad(){

$this->load->view('layout/header');
$this->load->view('layout/menu');
$this->load->view('VcharEdad');
$this->load->view('layout/footer');

}

public function VcharEdadInline(){

$this->load->view('layout/header');
$this->load->view('layout/menu');
$this->load->view('VcharEdadInline');
$this->load->view('layout/footer');

}


}


