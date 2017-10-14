
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {


function __construct()
{
	parent::__construct();
}

public function ingresar($data){

$usuario    = $data['user'];
$contrasena = $data['pass'];

	$this->db->select('idUsuario,nomUsuario,clave,nombre,appaterno,apmaterno,profesion');
	$this->db->from('usuario a');
	$this->db->join('persona b','a.idPersona=b.idPersona');
	$this->db->where('nomUsuario',$usuario);
	$this->db->where('clave',$contrasena);
	$this->db->limit(1);

$resultado=$this->db->get();


if($resultado->num_rows()==1){

	$r=$resultado->row();

		$s_usuario=array(
		's_idUsuario'   => $r->idUsuario,
		's_usuario'     => $r->nombre." ".$r->appaterno,
		's_profesion'   => $r->profesion
		);

		$this->session->set_userdata($s_usuario);
		$this->reiniciarIntentos($usuario);
	return 1;
}else{

	$this->insertarIntento($usuario);
	return 0;
}

}

public function insertarHistorial($data){

$data=array(
		'id_user'      => $data['id'],
		'platform'     => $data['plataforma'],
		'browser'      => $data['navegador'],
		'version'      => $data['version'],
		'is_robot'     => $data['robot'],
		'is_mobile'    => $data['telefono'],
		'agent_string' => $data['agente'],
		'ip' 		   => $data['ip'],
		'date'	       => $data['fecha']
);

if($this->db->insert('zz_history_login',$data))
	{
	return true;
	}else{
	return false;
	}
}


public function insertarIntento($email){

$this->db->select('intentos');
$this->db->from('usuario');
$this->db->where('nomUsuario',$email);
$this->db->limit(1);

$r=$this->db->get();
//$intentos->result();

foreach ($r->result() as $row) {
$resultado=$row->intentos;
}


if($resultado<3 ){

$resultado=$resultado+1;	

$campos=array('intentos'=>$resultado);

$this->db->where('nomUsuario', $email);
$this->db->update('usuario',$campos);

}else if($resultado==3){

//libera el captcha
}else{

}

}

public function reiniciarIntentos($email){

$campos=array('intentos'=>0);

$this->db->where('nomUsuario', $email);
$this->db->update('usuario',$campos);

}

public function revisarIntentos($email)
{

$this->db->select('intentos');
$this->db->from('usuario');
$this->db->where('nomUsuario',$email);
$this->db->limit(1);

$r=$this->db->get();
$row=$r->row();

$intentos=$row->intentos;
return $intentos;
}




}





