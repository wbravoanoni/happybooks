<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cusuarios extends CI_Controller {


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
	$this->load->view('Panel/usuarios/Vusuarios');
	$this->load->view('layout/footer');
	}


	public function guardarUsuarios(){

$param['txtNombre']     = $this->input->post('txtNombre');
$param['txtApPaterno']  = $this->input->post('txtApPaterno');
$param['txtApMaterno']  = $this->input->post('txtApMaterno');
$param['txtNacimiento'] = $this->input->post('txtNacimiento');
$param['cboPaises']     = $this->input->post('cboPaises');
$param['cboCiudades']   = $this->input->post('cboCiudades');


//usuario
$param2['mtxtEmail']    = $this->input->post('mtxtEmail');
$param2['txtpass']      = $this->input->post('txtpass');
$param2['cboTipo']    	= $this->input->post('cboTipo');
$param2['cboEstado']    = $this->input->post('cboEstado');


if($this->existeCorreoController($param2['mtxtEmail'] )!=1){

	$lastId=$this->mpersona->guardarPersonas($param);


if($lastId>0){

	$paramUsu['idPersona'] 	= $lastId;

	$this->mpersona->guardarUsuario($lastId,$param2);
}

}else{

echo 2;

}

	}


public function actualizarUsuarios(){


$correo    = $this->input->post('utxtEmail');
$idUsuario = $this->getIdUsuarios($correo);
$pass      = $this->input->post('utxtpass');


if($pass!="Nada"){
$datos['utxtpass']       = $pass;
}

$datos['idUsuario']      = $idUsuario;
$datos['utxtNombre']     = $this->input->post('utxtNombre');
$datos['utxtApPaterno']  = $this->input->post('utxtApPaterno');
$datos['utxtApMaterno']  = $this->input->post('utxtApMaterno');
$datos['utxtNacimiento'] = $this->input->post('utxtNacimiento');
$datos['cboPaises2']     = $this->input->post('cboPaises2');
$datos['cboCiudades2']   = $this->input->post('cboCiudades2');
$datos['utxtEmail']      = $correo;
$datos['ucboTipo']       = $this->input->post('ucboTipo');
$datos['ucboEstado']     = $this->input->post('ucboEstado');

$this->mpersona->actualizarPersona($datos);
}

public function getUsuariosController(){

echo json_encode($this->mpersona->getPersonasModel());

}


public function getUsuariosPaisesController(){

echo json_encode($this->mpersona->getUsuariosPaisesModel());

}

public function getUsuariosCiudadesController(){

$datos['pais']    = $this->input->post('pais');

echo json_encode($this->mpersona->getUsuariosCiudadesModel($datos));

}

public function getUsuariosTiposController(){

echo json_encode($this->mpersona->getUsuariosTiposModel());

}


public function getIdUsuarios($correo){

$row=$this->mpersona->getIdUsuariosModel($correo);
$row=$row->idUsuario;
return $row;
}

public function getIdPersona($correo){

$row=$this->mpersona->getIdPersonaModel($correo);
$row=$row->idPersona;
return $row;
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

public function eliminarUsuariosController(){

	$email 	   = $this->input->post('emailEliminar');
	$idUsuario = $this->getIdPersona($email);

$datos['email']         = $email;
$datos['idUsuario']     = $idUsuario;

echo json_encode($this->mpersona->eliminarUsuariosModel($datos));

}

public function existeCorreoController($correo){

	$datos['correo']=$correo;

$resultado=$this->mpersona->existeCorreoModel($datos);

return $resultado;

}

}