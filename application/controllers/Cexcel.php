<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cexcel extends CI_Controller {

	function __construct(){

	parent::__construct();
	$this->load->model('Mpersona');
	$this->load->library('export_excel');

	}

public function dExcel(){

		$result = $this->Mpersona->getPersona();
		$this->export_excel->to_excel($result, 'lista_de_personas');

}

}
