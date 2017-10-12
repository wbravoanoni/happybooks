<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clogin extends CI_Controller {

	function __construct(){

	parent::__construct();
    $this->load->model('Mlogin');
    $this->load->library('user_agent');
	$this->load->library('encrypt');


	}

	public function index(){
		$this->load->view('Vlogin');
	}

public function ingresar()

	{
	$data['user']  = $this->input->post('user');
	$data['pass']  = sha1($this->input->post('pass'));

	$respuesta=$this->Mlogin->ingresar($data);

		if($respuesta==1){


				$this->nuevoHistorial($this->session->userdata('s_idUsuario'));	

				$this->load->view('layout/header');
				$this->load->view('layout/menu');
				$this->load->view('Panel/Vpanel',$data);
				$this->load->view('layout/footer');

				redirect(base_url().'panel');
		

		
		}else{

		//$data['mensaje']="El elemento No Existe";
		//$this->load->view('Vlogin',$data);

		redirect(base_url().'?error=1');
		}
	}


	public function logout()
		{
		$this->session->sess_destroy();
		redirect(base_url());
		}


public function nuevoHistorial($id)

{
	date_default_timezone_set ('America/Santiago');
	$fecha = date("Y-m-d");

	$is_robot  = $this->agent->is_robot()?'1':'0';
	$is_mobile = $this->agent->is_mobile()?'1':'0';
	$platform  = $this->agent->platform();
	$browser   = $this->agent->browser();
	$version   = $this->agent->version();
	$agent_str = $this->agent->agent_string();
	$fecha 	   = date("Y-m-d H:i:s");

	if (isset($_SERVER["HTTP_CLIENT_IP"]))
	{
	$ip= $_SERVER["HTTP_CLIENT_IP"];
	}
	elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
	{
	$ip =  $_SERVER["HTTP_X_FORWARDED_FOR"];
	}
	elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
	{
	$ip =  $_SERVER["HTTP_X_FORWARDED"];
	}
	elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
	{
	$ip=  $_SERVER["HTTP_FORWARDED_FOR"];
	}
	elseif (isset($_SERVER["HTTP_FORWARDED"]))
	{
	$ip =  $_SERVER["HTTP_FORWARDED"];
	}
	else
	{
	$ip=  $_SERVER["REMOTE_ADDR"];
	}

	$data =array(
	"plataforma"=>$platform,
	"navegador"=>$browser,
	"version"=>$version,
	"robot"=>$is_robot,
	"telefono"=>$is_mobile,
	"agente"=>$agent_str,
	"ip"=>$ip,
	"fecha"=>$fecha,
	"id"=>$id);

	if($this->Mlogin->insertarHistorial($data))
	{
	echo "Historia agregada";
	}else
	{
	echo "Error al agregar";
	}

}

public function panel()
{
	$this->load->view('layout/header');
	$this->load->view('layout/menu');
	$this->load->view('Panel/Vpanel');
	$this->load->view('layout/footer');

}


}











