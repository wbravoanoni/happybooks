
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mupload extends CI_Model {


function __construct()
{
	parent::__construct();
}


public function subir($titulo,$imagen){

$data=array(
	  'titulo'=>$titulo,
	  'ruta'=>$imagen
);

$this->db->insert('imagenes',$data);

//redirect(base_url()."Cupload");

}



}
