<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpersona extends CI_Model {


function __construct()
{
	parent::__construct();
}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function guardar($parametros)
	{

		$campos=array(
				'dni'       => $parametros['txtDni'],
				'nombre'    => $parametros['txtNombre'],
				'appaterno' => $parametros['txtApPaterno'],
				'apmaterno' => $parametros['txtApMaterno'],
				'email'     => $parametros['txtEmail'],
				'fecnac'    => $parametros['datFecNac']);



$this->db->insert('persona',$campos);

return $this->db->insert_id();

	}

	public function guardarUsuario($lastId,$parametros){


$campos=array(
	'idPersona'  => $lastId,
	'nomUsuario' => $parametros['nomUsuario'],
	'clave' 	 => $parametros['clave']
	);

$this->db->insert('usuario',$campos);
	}


	public function actualizarPersona($datos){


$campos=array(
	'idPersona'    => $datos['idPersona'],
	'nombre'       => $datos['nombre'],
	'appaterno'    => $datos['appaterno'],
	'apmaterno'    => $datos['apmaterno'],
	'email'        => $datos['email']
	);
$this->db->where('idPersona', $datos['idPersona']);
$this->db->update('persona',$campos);

return 1;
	}

	public function getPersonasModel(){

$this->db->select('a.idPersona,a.nombre,a.appaterno,a.apmaterno,b.ciudad,a.email,a.dni,a.fecnac,a.estado');
$this->db->from('persona a');
$this->db->join('ciudades b','a.idCiudad=b.idCiudad');

$r=$this->db->get();

return $r->result();
	}

		public function getPersona(){
		$this->db->select('nombre, appaterno, apmaterno');
		$this->db->from('persona');
		$query = $this->db->get();
					
		return $query;
	}


public function getPersonasEdadModel(){
$this->db->select('nombre,edad');
$this->db->from('persona');
$query=$this->db->get();

return $query->result();
}


}