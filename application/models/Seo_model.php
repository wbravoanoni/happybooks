<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seo_model extends CI_Model {


function __construct()
{
	parent::__construct();
}

/*=============================================
=            INICIO PANEL - LIBROS            =
=============================================*/


	public function listarSeoModel()
{
	$this->db->select('idSeo,donde,nombre,descripcion,cbo,estado');
	$this->db->from('zz_seo');
	$this->db->where('donde','Home');
	$this->db->where('estado',1);

	$query=$this->db->get();

		if ($query->num_rows() > 0){
			return $query;
		}else{
			return null;
		}
}


	public function getSeoModel()
{
	$this->db->select('idSeo,donde,nombre,descripcion,cbo,estado');
	$this->db->from('zz_seo');
	$this->db->where('donde','Home');
	$this->db->where('estado',1);
	
	$query=$this->db->get();
	return $query->result();
}


	public function actualizaSeoModel($nombre,$descripcion)
{
	$campos=array('descripcion'=>"{$descripcion}");
	$this->db->where('nombre', $nombre);
	$this->db->update('zz_seo',$campos);
}

}