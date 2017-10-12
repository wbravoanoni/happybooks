<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CdataTables extends CI_Controller {

	function __construct(){

	parent::__construct();
	}


public function index(){

$this->load->view('layout/header');
$this->load->view('layout/menu');
$this->load->view('VdataTables');
$this->load->view('layout/footer');
}

}