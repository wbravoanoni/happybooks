<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mconfig extends CI_Model {


function __construct()
{
	parent::__construct();
}

/* ============= PAISES ======================= */
public function getPaisesConfigModel(){

		$this->db->select('idPais,nombrePais,gentilicio,activo');
		$this->db->from('paises');

		$r=$this->db->get();

		return $r->result();
}

public function insertPaisesConfigModel($data){

$data=array(
		'nombrePais' => $data['configPais'],
		'gentilicio' => $data['configGentilicio'],
		'activo'     => $data['activo']
);

if($this->db->insert('paises',$data))
	{
	return true;
	}else{
	return false;
	}
}

public function actualizarPaisesConfigModel($paises){

$idPais = $paises["idPais"];

$paises = array(
	    	'nombrePais' => $paises['uConfigPais'],
	    	'gentilicio' => $paises['uConfigGentilicio'],
		    'activo'     => $paises['uActivo']
);

$this->db->where('idPais', $idPais);



if($this->db->update('paises',$paises))
	{
	return true;
	}else{
	return false;
	}
	
}


public function eliminarPaisesConfigModel($paises){

	$idPais = $paises["flag2"];

	$this->db->where('idPais',$idPais);
	$this->db->delete('paises');

	if(!$this->db->affected_rows()) {
	   return false;
	} else {
	  return true;
	}

}

public function existePais($nombre){
	$this->db->select("nombrePais");
	$this->db->from("paises");
	$this->db->Where("nombrePais",$nombre);

	$resultado = $this->db->get();

	if($resultado->num_rows()>0){
		return true;
	}else{
		return false;
	}
}

/* ============= CIUDAD ======================= */

public function existeCiudad($idPais,$nombre){
	$this->db->select("ciudad");
	$this->db->from("ciudades");
	$this->db->Where("idPais",$idPais);
	$this->db->Where("ciudad",$nombre);

	$resultado = $this->db->get();

	if($resultado->num_rows()>0){
		return true;
	}else{
		return false;
	}
}

public function insertCiudadConfigModel($data){

$data=array(
		'idPais'   => $data['idPais'],
		'ciudad'   => $data['ciudad'],
		'activo'   => $data['activo']
);

if($this->db->insert('ciudades',$data))
	{
	return true;
	}else{
	return false;
	}
}

public function getCiudadesConfigModel($data){

		$idPais = $data["idPais"];


		$this->db->select('idCiudad,idPais,ciudad,activo');
		$this->db->from('ciudades');
		$this->db->where("idPais",$idPais);

		$r=$this->db->get();

		return $r->result();
}

public function actualizarCiudadesConfigModel($paises){
   
$idCiudad = $paises["idCiudad"];

$ciudades = array(
	    	'idPais' => $paises['idPais'],
	    	'ciudad' => $paises['uConfigNomCiudad'],
		    'activo' => $paises['uActivo']
);

$this->db->where('idCiudad', $idCiudad);
if($this->db->update('ciudades',$ciudades))
	{
	return true;
	}else{
	return false;
	}
}

public function eliminarCiudadesConfigModel($ciudad){

	$idCiudad = $ciudad["idCiudad"];

	$this->db->where('idCiudad',$idCiudad);
	$this->db->delete('ciudades');

	if(!$this->db->affected_rows()) {
	   return false;
	} else {
	  return true;
	}

}


/* ======================= AUTORES ======================= */


public function getAutoresConfigModel(){

		$this->db->select('idAutores,nombre,apellido,nacionalidad,activo');
		$this->db->from('autores');

		$r=$this->db->get();

		return $r->result();
}


public function getNacionalidadConfigModel(){

		$this->db->select('idPais,gentilicio');
		$this->db->from('paises');
		$this->db->order_by('gentilicio');

		$r=$this->db->get();

		return $r->result();
}

public function existeAutor($nombre,$apellido){
	$this->db->select("nombre,apellido");
	$this->db->from("autores");
	$this->db->Where("nombre",$nombre);
	$this->db->Where("apellido",$apellido);

	$resultado = $this->db->get();

	if($resultado->num_rows()>0){
		return true;
	}else{
		return false;
	}
}

public function insertAutorConfigModel($data){

$data=array(
		'nombre'       => $data['nombre'],
		'apellido'     => $data['apellido'],
		'nacionalidad' => $data['idPais'],
		'activo'   	   => $data['activo']
);

if($this->db->insert('autores',$data))
	{
	return true;
	}else{
	return false;
	}
}

public function actualizarAutoresConfigModel($autores){

$idAutor = $autores["idAutores"];

$autores = array(
	    	'nombre'       => $autores['nombre'],
	    	'apellido'     => $autores['apellido'],
	    	'nacionalidad' => $autores['nacionalidad'],
		    'activo'       => $autores['estado']
);

$this->db->where('idAutores', $idAutor);
if($this->db->update('autores',$autores))
	{
	return true;
	}else{
	return false;
	}
}

public function eliminarAutoresConfigModel($autores){

	$idAutor = $autores["flagAutores"];

	$this->db->where('idAutores',$idAutor);
	$this->db->delete('autores');

	if(!$this->db->affected_rows()) {
	   return false;
	} else {
	  return true;
	}

}

public function getGeneroConfigModel(){
		$this->db->select('idGenero,nombre,activo');
		$this->db->from('genero');
		$r=$this->db->get();
		return $r->result();
}

public function existeGenero($nombre){
	$this->db->select("nombre");
	$this->db->from("genero");
	$this->db->Where("nombre",$nombre);

	$resultado = $this->db->get();

	if($resultado->num_rows()>0){
		return true;
	}else{
		return false;
	}
}

public function insertGeneroConfigModel($genero){

$genero = array(
		'nombre' => $genero['nombre'],
		'activo' => $genero['activo']
);

if($this->db->insert('genero',$genero))
	{
	return true;
	}else{
	return false;
	}
}

public function actualizarGeneroConfigModel($genero){

$idGenero = $genero["idGenero"];
$genero = array(
	    	'nombre' => $genero['nombre'],
		    'activo' => $genero['activo']
);

$this->db->where('idGenero', $idGenero);

if($this->db->update('genero',$genero))
	{
	return true;
	}else{
	return false;
	}
	
}

public function eliminarGenerosConfigModel($genero){

	$idGenero = $genero["flagGenero"];

	$this->db->where('idGenero',$idGenero);
	$this->db->delete('genero');

	if(!$this->db->affected_rows()) {
	   return false;
	} else {
	  return true;
	}

}


}