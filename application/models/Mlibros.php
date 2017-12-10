<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlibros extends CI_Model {


function __construct()
{
	parent::__construct();
}


public function total_libros($filtro){

if($filtro!=""){
$condicion=" AND autor like '%{$filtro}%' ";
}else{
$condicion="";	
}


$number=$this->db->query("
				SELECT COUNT(*) AS total 
				FROM libros 
				WHERE activo=1 ".$condicion)->row()->total;
return intval($number);
}

public function TodosLibros($number_per_page,$filtro){

if($filtro!=""){
$condicion=" AND autor like '%{$filtro}%' ";
}else{
$condicion="";	
}

$cadena=(int)($this->uri->segment(3,0));

if(gettype($cadena)!="integer"){
	//echo gettype($cadena);
exit;
}
$query = $this->db->query("SELECT nombre,autor,puntaje,resumen,imagen 
						   FROM libros 
						   WHERE activo=1 {$condicion}
						   LIMIT ".$cadena.",".$number_per_page.""
						);

return $query->result();
}

}