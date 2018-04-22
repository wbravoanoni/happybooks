<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clogin extends CI_Controller {

	function __construct(){

	parent::__construct();
    $this->load->model('Mlogin');
    $this->load->library('user_agent');
	$this->load->library('encrypt');


	}

	public function index()

	{

		if($this->session->userdata('s_idUsuario')){
			redirect(base_url().'panel');
		}else{
			$this->load->view('Vlogin');
		}
		
	}

public function ingresar()

	{
	$data['user']  = $this->input->post('user');
	$data['pass']  = sha1($this->input->post('pass'));


if($this->session->userdata('s_capcha')==1)

{


	if(isset($_POST["g-recaptcha-response"]) && $_POST["g-recaptcha-response"])

	{
		$secret="6Le47DMUAAAAAIN5q8uEdWEjLHJekBWCB6jNSnQ9";
		$ip=$_SERVER["REMOTE_ADDR"];
		$captcha=$_POST["g-recaptcha-response"];

		$result=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");

		$array=json_decode($result,TRUE);

	if($array["success"])
				{

				//echo "Eres Humano";

				$respuesta=$this->Mlogin->ingresarModel($data);
				if($respuesta==1)
					{
						$this->nuevoHistorial($this->session->userdata('s_idUsuario'));	
						redirect(base_url().'panel');			
					}
				elseif($respuesta==2)
					{
						redirect(base_url().'login?e=cD6r7gZp0XU');
					}
				else
					{
						redirect(base_url().'login?e=cD6r7gZp0XU');
					}

				}
				else
				{
				//echo "Eres spam";
				exit();
				}

	}

}else{


	if($intentos=$this->Mlogin->revisarIntentos($data['user'])>2)

			{
				$s_usuario=array(
				's_capcha'   => 1
				);

				$this->session->set_userdata($s_usuario);
			}


	$respuesta=$this->Mlogin->ingresarModel($data);
	if($respuesta==1)
		{
			$this->nuevoHistorial($this->session->userdata('s_idUsuario'));	
			redirect(base_url().'panel');			
		}
		elseif($respuesta==2)
		{
			redirect(base_url().'login?e=cD6r7gZp0XU');
		}
	    else
		{
			redirect(base_url().'login?e=cD6r7gZp0XU');
		}



}

	}




	public function logout()
		{
			$this->session->sess_destroy();
			redirect(base_url().'login');	
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
#Sirve para recargar la pagina en la seccion del panel
public function panel()

	{
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('Panel/Vpanel');
		$this->load->view('layout/footer');
	}


}











