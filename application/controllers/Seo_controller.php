<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seo_controller extends CI_Controller {


function __construct()
{
	parent::__construct();
	$this->load->model('Seo_model');
	$this->load->helper('libros_helper');
}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

	$this->load->view('layout/header');
	$this->load->view('layout/menu');
	$this->load->view('Panel/seo/seo_view');
	$this->load->view('layout/footer');

	}

	public function getSeoController(){

	$resultado=$this->Seo_model->getSeoModel();
	echo json_encode($resultado);
}

public function actualizarSeoController(){

$copyright     = limpiaTexto($this->input->post('copyright'));
$Author        = limpiaTexto($this->input->post('Author'));
$Publisher     = limpiaTexto($this->input->post('Publisher'));
$rating        = $this->input->post('rating');
$distribution  = $this->input->post('distribution');
$Robots        = $this->input->post('Robots');
$language  	   = limpiaTexto($this->input->post('language'));
$Revisit_after = $this->input->post('Revisit_after');
$analytic      = limpiaTexto($this->input->post('analytic'));
$Keywords      = limpiaTexto($this->input->post('Keywords'));




$array=[
	"copyright"     => $copyright,
	"Author"        => $Author,
	"Publisher"     => $Publisher,
	"rating"        => $rating,
	"distribution"  => $distribution,
	"Robots"        => $Robots,
	"language"      => $language,
	"Revisit after" => $Revisit_after,
	"analytic"      => $analytic,
	"Keywords"      => $Keywords
];

foreach ($array as $nombre => $descripcion) {
$resultado=$this->Seo_model->actualizaSeoModel($nombre,$descripcion);
}





}
}



