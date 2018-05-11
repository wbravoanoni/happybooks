<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mconfig extends CI_Model {


function __construct()
{
	parent::__construct();
}


public function getPaisesConfigModel(){

		$this->db->select('idPais,nombrePais,activo');
		$this->db->from('paises');

		$r=$this->db->get();

		return $r->result();

}

public function getCiudadesConfigModel($data){

		$idPais = $data["idPais"];


		$this->db->select('idCiudad,ciudad,activo');
		$this->db->from('ciudades');
		$this->db->where("idPais",$idPais);

		$r=$this->db->get();

		return $r->result();
}

public function getAutoresConfigModel(){

		$this->db->select('idAutores,nombre,apellido,activo');
		$this->db->from('autores');

		$r=$this->db->get();

		return $r->result();

}

public function getGeneroConfigModel(){

		$this->db->select('idGenero,nombre,activo');
		$this->db->from('genero');

		$r=$this->db->get();

		return $r->result();

}


}