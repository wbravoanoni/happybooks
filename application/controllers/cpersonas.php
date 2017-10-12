<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpersonas extends CI_Controller {


function __construct()
{
	parent::__construct();
	$this->load->model('mpersona');
	$this->load->library('encrypt');
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
	$this->load->view('persona/vpersona');
	$this->load->view('layout/footer');
	}


	public function guardar(){


$param['txtDni']       = $this->input->post('txtDni');
$param['txtNombre']    = $this->input->post('txtNombre');
$param['txtApPaterno'] = $this->input->post('txtApPaterno');
$param['txtApMaterno'] = $this->input->post('txtApMaterno');
$param['txtEmail']     = $this->input->post('txtEmail');
$param['datFecNac']    = $this->input->post('datFecNac');

//usuario
$paramUsu['nomUsuario'] = $this->input->post('txtUsuario');
$paramUsu['clave'] 	= sha1($this->input->post('txtClave'));


$lastId=$this->mpersona->guardar($param);


if($lastId>0){

	$paramUsu['idPersona'] 	= $lastId;

	$this->mpersona->guardarUsuario($lastId,$paramUsu);
}

echo "Entro al metodo guardar";
$this->load->view('persona/vpersona');


	}


public function actualizarUsuarios(){

$datos['idPersona']    = $this->session->userdata('s_idUsuario');
$datos['nombre']       = $this->input->post('nombre');
$datos['appaterno']    = $this->input->post('appaterno');
$datos['apmaterno']    = $this->input->post('apmaterno');
$datos['email']        = $this->input->post('email');

$this->mpersona->actualizarPersona($datos);

echo "Actualizado correctamente <br><br>";
redirect('Clogin/ingresar');
}

public function getPersonas(){

echo json_encode($this->mpersona->getPersonasModel());

}

public function getPersonasEdad(){

echo json_encode($this->mpersona->getPersonasEdadModel());

}
	public function listarUsuarios(){

	$this->load->view('layout/header');
	$this->load->view('layout/menu');
	$this->load->view('persona/VlistarUsuarios');
	$this->load->view('layout/footer');
	}

	public function actualizarUsuarioModal(){

$datos['idPersona']    = $this->input->post('idP1');
$datos['nombre']       = $this->input->post('nom1');
$datos['appaterno']    = $this->input->post('app1');
$datos['apmaterno']    = $this->input->post('apm1');
$datos['email']        = $this->input->post('mail1');

echo json_encode ($this->mpersona->actualizarPersona($datos));
}

}