
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {


function __construct()
{
	parent::__construct();
}

public function ingresar($data){

$correo    = $data['user'];
$contrasena = $data['pass'];

if($this->existeCorreo($correo)==1)

  {
	$this->db->select('a.idUsuario,a.correo,a.clave,b.nombre,b.appaterno,b.apmaterno,c.nombreTipo');
	$this->db->from('usuario a');
	$this->db->join('persona b','a.idPersona=b.idPersona');
	$this->db->join('zz_login_tipo c','c.idLogin=a.tipo');
	$this->db->where('correo',$correo);
	$this->db->where('clave',$contrasena);
	$this->db->limit(1);

$resultado=$this->db->get();


if($resultado->num_rows()==1){

	$r=$resultado->row();

		$s_usuario=array(
		's_idUsuario'   => $r->idUsuario,
		's_usuario'     => $r->nombre." ".$r->appaterno,
		's_profesion'   => $r->nombreTipo
		);

		$this->session->set_userdata($s_usuario);
		$this->reiniciarIntentos($correo);
	return 1;
}else{

	$this->insertarIntento($correo);
	return 0;
}

 }else{
 	redirect(base_url().'?error=1');
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


public function insertarIntento($correo){

$this->db->select('intentos');
$this->db->from('usuario');
$this->db->where('correo',$correo);
$this->db->limit(1);

$r=$this->db->get();
//$intentos->result();

foreach ($r->result() as $row) {
$resultado=$row->intentos;
}


if($resultado<3 ){

$resultado=$resultado+1;	

$campos=array('intentos'=>$resultado);

$this->db->where('nomUsuario', $correo);
$this->db->update('usuario',$campos);

}else if($resultado==3){

//libera el captcha
}else{

}

}

public function reiniciarIntentos($correo){

$campos=array('intentos'=>0);

$this->db->where('correo', $correo);
$this->db->update('usuario',$campos);

}

public function revisarIntentos($correo)
{

$this->db->select('intentos');
$this->db->from('usuario');
$this->db->where('correo',$correo);
$this->db->limit(1);

$r=$this->db->get();
$row=$r->row();

$intentos=$row->intentos;
return $intentos;
}


public function existeCorreo($correo)

	{
		$this->db->select('correo');
		$this->db->from('usuario a');
		$this->db->where('correo',$correo);
		$this->db->limit(1);

		$resultado=$this->db->get();

		if($resultado->num_rows()>0)
		{
		return 1;
		}
		else
		{
		return 0;
		}
	}

}





