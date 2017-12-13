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
$query = $this->db->query("SELECT idLibros,nombre,autor,puntaje,resumen,imagen 
						   FROM libros 
						   WHERE activo=1 {$condicion}
						   LIMIT ".$cadena.",".$number_per_page.""
						);

return $query->result();
}

	public function buscar($buscar,$inicio = FALSE, $cantidadregistro = FALSE)
	{
		$this->db->like("nombre",$buscar);
		if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
			$this->db->limit($cantidadregistro,$inicio);
		}
		$consulta = $this->db->get("libros");
		return $consulta->result();
	}


	public function getLibros($id)
	
	{
		$this->db->select('nombre,autor,descripcion,puntaje,imagen,fechaCreacion,usuario');
		$this->db->from('libros');
		$this->db->where('idLibros',$id);
		$this->db->where('activo',1);
		$this->db->limit(1);

		
		$r = $this->db->get();
		if($r->num_rows()>0){
			return $r->row_array();
		}else{
			exit;
		}


	}


}