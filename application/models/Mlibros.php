<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlibros extends CI_Model {


function __construct()
{
	parent::__construct();
}
/*=============================================
=         Busqueda de libros con like         =
=============================================*/

	public function buscar($buscar,$inicio = FALSE, $cantidadregistro = FALSE)
	{
		$this->db->like("nombre",$buscar);
		if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
			$this->db->limit($cantidadregistro,$inicio);
		}
		$consulta = $this->db->get("libros");
		return $consulta->result();
	}


/*=====  End Busqueda de libros con like    ======*/

/*=============================================
= 		Busca info para libros internos       =
=============================================*/

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
/*=====  End of Section libros internos   ======*/




}