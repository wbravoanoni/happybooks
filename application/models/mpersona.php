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
/*
select a.nombrePais,count(b.ciudad) as total
from paises a 
inner join ciudades b on a.idPais=b.idPais
where a.activo=1
group by b.idPais
having total>0;
*/

	{

$this->db->select("a.idPais,a.nombrePais as nombrePais,count(b.ciudad) as total");
$this->db->from("paises a ");
$this->db->join('ciudades b', 'a.idPais=b.idPais');
$this->db->where("a.activo",1);
$this->db->group_by("b.idPais"); 
$this->db->having('total>0'); 
$this->db->order_by('a.nombrePais', 'ASC');


		//$s = $this->db->order_by('nombrePais', 'ASC')->get_where('paises',array('activo'=>1));
		$s=$this->db->get();
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


public function existeCorreoModel($datos){

$correo=$datos['correo'];

$this->db->select('correo');
$this->db->from('usuario');
$this->db->where('correo',$correo);
$query=$this->db->get();

if($query->num_rows()>0){

return $query->result();

}else{
return false;
}


}

public function cargaPerfilModel($datos){

$id=$datos['id'];

$this->db->select('a.nombre,a.appaterno,a.apmaterno,a.idPais,a.idCiudad,a.fecnac,a.foto,b.correo,b.tipo');
$this->db->from('persona a');
$this->db->join('usuario b','b.idPersona=a.idPersona');
$this->db->where('a.idPersona',$id);
$query=$this->db->get();

if($query->num_rows()>0){

return $query->result();

}else{
return false;
}


}


	public function actualizarPersonaView($datos){

 	$idPersona = $datos['idUsuario'];

	date_default_timezone_set ('America/Santiago');
	$fecha 	   = date("Y-m-d H:i:s");


 	if(isset($datos['pass1'])){

 	$usuario=array(
	'correo'    		=> $datos['email'],
	'clave'     		=> $datos['pass1'],
	'tipo'      		=> $datos['tipo'],
	'fechaActualizacion'=> $fecha
	);

 	}else{

 	$usuario=array(
	'correo'    		=> $datos['email'],
	'tipo'      		=> $datos['tipo'],
	'fechaActualizacion'=> $fecha,
	);	

 	}


$persona=array(
	'nombre'    => $datos['nombre'],
	'appaterno' => $datos['appaterno'],
	'apmaterno' => $datos['apmaterno'],
	'idPais'    => $datos['pais'],
	'idCiudad'  => $datos['ciudad'],
	'foto'      => $datos['img_view'],
	'fecnac'    => $datos['nacimiento']
	);


$this->db->where('idPersona', $idPersona);
$this->db->update('persona',$persona);

$this->db->where('idPersona', $idPersona);
$this->db->update('usuario',$usuario);

/* Actualizar Foto en session*/
$s_foto=array(
's_foto'   => $datos['img_view']
);
$this->session->set_userdata($s_foto);
echo "correcto";

redirect(base_url()."Cusuarios/verPerfil");
	}





}