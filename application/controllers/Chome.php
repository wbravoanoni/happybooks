<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chome extends CI_Controller {

	function __construct(){

	parent::__construct();
	$this->load->helper('libros_helper');
	$this->load->library('pagination');
	$this->load->model("Mlibros");

	}

public function index(){

header("location:".base_url('Chome/articulos/1'));
}
public function articulos(){
	
$this->load->view('Home/layout/head');
$this->load->view('Home/layout/navbar');

$config['base_url']		= base_url()."Chome/articulos/";
$config['total_rows']   = $this->Mlibros->total_libros();
$config['per_page']     = 6;
$config['uri_segment']  = 3;
$config['num_links']    = 5;

$config['full_tag_open'] = '<ul class="pagination">';
$config['full_tag_close'] = '</ul>';
$config['first_link'] = false;
$config['last_link'] = false;
$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
$config['prev_link'] = '&laquo';
$config['prev_tag_open'] = '<li class="prev">';
$config['prev_tag_close'] = '</li>';
$config['next_link'] = '&raquo';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';

$this->pagination->initialize($config);


$resultado = $this->Mlibros->TodosLibros($config['per_page']);
$datos["resultado"]=$resultado;

$datos['consulta']   = $resultado;
$datos['pagination'] = $this->pagination->create_links();

$this->load->view('Home/home_view',$datos);
$this->load->view('Home/layout/footer');

}

public function vista2(){

$this->load->view('Home/home_view2');

}

public function vista3(){
$this->load->view('Home/layout/head');
$this->load->view('Home/layout/navbar');
$this->load->view('Home/layout/footer');

}




}