<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlibros extends CI_Model {


function __construct()
{
	parent::__construct();
}


public function total_libros(){
$number=$this->db->query("SELECT COUNT(*) AS total FROM libros")->row()->total;
return intval($number);
}

public function TodosLibros($number_per_page){
	$cadena=(int)($this->uri->segment(3,1));

if(gettype($cadena)!="integer"){
	//echo gettype($cadena);
exit;
}

$query = $this->db->query("SELECT nombre,autor,puntaje,resumen,imagen 
						   FROM libros 
						   WHERE activo=1
						   LIMIT ".$cadena.",".$number_per_page.""
						);

return $query->result();
}
}