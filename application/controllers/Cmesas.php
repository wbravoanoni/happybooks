<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cmesas extends CI_Controller {

	function __construct(){

	parent::__construct();

	}

public function index(){



$this->load->view('layout/header');
$this->load->view('layout/menu');
$this->load->view('Vmesas');
$this->load->view('layout/footer');

}


}