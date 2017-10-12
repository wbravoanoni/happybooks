
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MCiudad extends CI_Model {


function __construct()
{
	parent::__construct();
}


public function getCiudades($s){
$s = $this->db->get_where('ciudades',array('activo'=>$s));
return $s->result();

}

public function getCiudadesConLikeModel($text){
	$this->db->from('ciudades');
	$this->db->like('ciudad',$text,'both');
	$r=$this->db->get();
	return $r->result();

}



}





