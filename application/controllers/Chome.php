<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chome extends CI_Controller {

	function __construct(){

	parent::__construct();
	}


public function index(){
$this->load->view('Home/layout/head');
$this->load->view('Home/home_view');
$this->load->view('Home/layout/footer');

}

public function vista2(){

$this->load->view('Home/home_view2');

}

}