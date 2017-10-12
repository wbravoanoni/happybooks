<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csendmail extends CI_Controller {

	function __construct(){

	parent::__construct();

	}


public function sendMailYahoo{

//configuracion para yahoo

$configYahoo = array(
	'protocol'    =>'smtp',
	'smtp_host'   => 'smtp.mail.yahoo.com',
	'smtp_port'   => 587,
	'smtp_crypto' => 'tls',
	'smtp_user'   => 'emaideyahoo',
	'smtp_pass'   => 'password',
	'mailtype'    => 'html',
	'charset'     => 'utf-8',
	'newline'     => "\r\n"
);
}


public function sendMailGmail(){

$this->load->library("email");

$configGmail =  array(
	'protocol'   => 'smtp',
	'smtp_host'  => 'ssl://smtp.googlemail.com',
	'smtp_port'  => 465,
	'smtp_user'  => 'wbravoanoni@gmail.com',
	'smtp_pass'  => 'solotienesqueseguir',
	'mailtype'   => 'html',
	'charset'    => 'utf-8',
	'newline'    => "\r\n"
);

//cargamos la configuracion para enviar con gmail
$mensaje='<h6>Hola amorcito, te envie un correo con una taza</h6><br><br>
<img src="https://www.promoopcion.com/Images/Items/TAZ-003-V.jpg" width="150" height="150" alt="">';


$this->email->initialize($configGmail);

$this->email->from('wbravoanoni@gmail.com');
$this->email->to('cinthia.roa90@gmail.com');
$this->email->subject('Esto es una prueba');
$this->email->message($mensaje);


if($this->email->send()){

echo "El mensaje fue enviado";

}else{
show_error($this->email->print_debugger());
}

}


}