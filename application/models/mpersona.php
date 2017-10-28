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
	public function guardarPersonas($parametros)
	{
		$campos=array(
				'nombre'    => $parametros['txtNombre'],
				'appaterno' => $parametros['txtApPaterno'],
				'apmaterno' => $parametros['txtApMaterno'],
				'fecnac'    => $parametros['txtNacimiento'],
				'idPais'	=> $parametros['cboPaises'],
				'idciudad'	=> $parametros['cboCiudades']);

		$this->db->insert('persona',$campos);
		return $this->db->insert_id();
	}

	public function guardarUsuario($lastId,$parametros){

		date_default_timezone_set ('America/Santiago');
		$fecha = date("Y-m-d H:i:s");

$campos=array(
		'idPersona'  	=> $lastId,
		'correo' 	 	=> $parametros['mtxtEmail'],
		'clave' 		=> $parametros['txtpass'],
		'tipo' 	  	 	=> $parametros['cboTipo'],
		'fechaIngreso'	=> $fecha,
		'activo' 	  	=> $parametros['cboEstado']
	);

$this->db->insert('usuario',$campos);
	}

	public function actualizarPersona($datos){

 	$idPersona = $datos['idUsuario'];

	date_default_timezone_set ('America/Santiago');
	$fecha = date("Y-m-d");
	$fecha 	   = date("Y-m-d H:i:s");


 	if(isset($datos['utxtpass'])){

 	$usuario=array(
	'correo'    		=> $datos['utxtEmail'],
	'clave'     		=> $datos['utxtpass'],
	'tipo'      		=> $datos['ucboTipo'],
	'fechaActualizacion'=> $fecha
	);

 	}else{

 	$usuario=array(
	'correo'    		=> $datos['utxtEmail'],
	'tipo'      		=> $datos['ucboTipo'],
	'fechaActualizacion'=> $fecha,
	'activo'			=> $datos['ucboEstado']
	);	

 	}


$persona=array(
	'nombre'    => $datos['utxtNombre'],
	'appaterno' => $datos['utxtApPaterno'],
	'apmaterno' => $datos['utxtApMaterno'],
	'idPais'    => $datos['cboPaises2'],
	'idCiudad'  => $datos['cboCiudades2'],
	'fecnac'    => $datos['utxtNacimiento']
	);


$this->db->where('idPersona', $idPersona);
$this->db->update('persona',$persona);

$this->db->where('idPersona', $idPersona);
$this->db->update('usuario',$usuario);

return 1;
	}

	public function getPersonasModel()

	{
		$this->db->select('a.idPersona,a.nombre,a.appaterno,a.apmaterno,b.ciudad,c.correo,a.fecnac,c.activo,d.nombrePais,c.clave,a.idPais,a.idCiudad,c.tipo');
		$this->db->from('persona a');
		$this->db->join('ciudades b','a.idCiudad=b.idCiudad');
		$this->db->join('paises d','a.idPais=d.idPais');
		$this->db->join('usuario c','c.idPersona=a.idPersona');

		$r=$this->db->get();

		return $r->result();
	}

	public function getUsuariosPaisesModel()

	{
		$s = $this->db->order_by('nombrePais', 'ASC')->get_where('paises',array('activo'=>1));
		return $s->result();
	}

	public function getUsuariosCiudadesModel($datos)

	{
		$pais=$datos['pais'];

		$s = $this->db->order_by('ciudad', 'ASC')->get_where('ciudades',array('activo'=>1,'idPais'=>$pais));
		return $s->result();
	}	

	public function getUsuariosTiposModel()

	{
		$s = $this->db->order_by('idLogin', 'ASC')->get_where('zz_login_tipo',array('activo'=>1));
		return $s->result();
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

public function getIdUsuariosModel($correo){
$this->db->select('idUsuario');
$this->db->from('usuario');
$this->db->where('correo',$correo);
$this->db->limit(1);

$query=$this->db->get();
return $query->row();
}

public function getIdPersonaModel($correo){
$this->db->select('idPersona');
$this->db->from('usuario');
$this->db->where('correo',$correo);
$this->db->limit(1);

$query=$this->db->get();
return $query->row();
}

	public function eliminarUsuariosModel($datos)

	{

$correo       = $datos['email'];
$idUsuario    = $datos['idUsuario'];

$this->db->where('correo',$correo);
$this->db->delete('usuario');

if(!$this->db->affected_rows()) {
    $result = 'Correo! ID ['.$correo.'] not found';
} else {
    $result = 'Success';

$this->db->where('idPersona',$idUsuario);
$this->db->delete('persona');

}
return $result;
	}

	public function eliminarPersonasModel($datos)

	{

$idUsuario = $datos['idUsuario'];

$this->db->where('idPersona',$idUsuario);
$this->db->delete('persona');

if(!$this->db->affected_rows()) {
    $result = 'Correo! ID ['.$correo.'] not found';
} else {
    $result = 'Success';
}
return $result;
	}







}