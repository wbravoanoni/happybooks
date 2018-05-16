<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cconfig extends CI_Controller {

	function __construct(){

	parent::__construct();
	$this->load->model('Mconfig');
	}


public function pais(){

$this->load->view('layout/header');
$this->load->view('layout/menu');
$this->load->view("Panel/config/Vpais");
$this->load->view('layout/footer');

}

public function ciudades(){

$this->load->view('layout/header');
$this->load->view('layout/menu');
$this->load->view("Panel/config/Vciudades");
$this->load->view('layout/footer');

}

public function autores(){

$this->load->view('layout/header');
$this->load->view('layout/menu');
$this->load->view("Panel/config/Vautores");
$this->load->view('layout/footer');

}

public function genero(){

$this->load->view('layout/header');
$this->load->view('layout/menu');
$this->load->view("Panel/config/Vgeneros");
$this->load->view('layout/footer');

}
/***  --- Panel de configuración --- ***/

/* --- INICIO Paises --- */

public function getPaisesConfigControler(){
	$resultado = $this->Mconfig->getPaisesConfigModel();
	echo json_encode($resultado);
}

public function insertPaisesConfigControler(){

	$data["configPais"]       = ucfirst($this->input->post("configPais"));
	$data["configGentilicio"] = ucfirst($this->input->post("configGentilicio"));
	$data["activo"]           = 1;


	if($this->Mconfig->existePais($data["configPais"])===false){
		$resultado = $this->Mconfig->insertPaisesConfigModel($data);
	}else{
			echo "El registro ya existe";
	}
}

public function actualizarPaisesConfigControler(){


	$data["idPais"]       	   = $this->input->post("flag");
	$data["uConfigPais"]       = ucfirst($this->input->post("configPais"));
	$data["uConfigGentilicio"] = ucfirst($this->input->post("configGentilicio"));
	$data["uActivo"]           = $this->input->post("uConfigEstado");


/*
	if(gettype($data["idPais"]!="integer")){
		exit;
	}
*/
	$resultado = $this->Mconfig->actualizarPaisesConfigModel($data);

	if($resultado){
		echo "correcto";
	}else{
		echo "error";
	}

/*
	if($this->Mconfig->existeKey($data["idPais"]===true){
		$resultado = $this->Mconfig->actualizarPaisesConfigModel($data);
	}else{
			echo "Error en llave";
	}

*/
	
}

public function eliminarPaisesConfigControler(){

	$data["flag2"] = $this->input->post("flag2");

	$resultado = $this->Mconfig->eliminarPaisesConfigModel($data);

	if($resultado){
		echo "correcto";
	}else{
		echo "error";
	}
	
}

/* --- FIN Paises --- */

/* ======  INICIO ciudades ===== */

public function getCiudadesConfigControler(){

	$data["idPais"]=$this->input->post("idPais");

	$resultado = $this->Mconfig->getCiudadesConfigModel($data);
	echo json_encode($resultado);
}


public function insertCiudadesConfigControler(){

	$data["idPais"] = $this->input->post("idPais");
	$data["ciudad"] = ucfirst($this->input->post("nombreConfigCiudad"));
	$data["activo"] = 1;

	if($this->Mconfig->existeCiudad($data["idPais"],$data["ciudad"])===false){
		$resultado = $this->Mconfig->insertCiudadConfigModel($data);
	}else{
			echo "El registro ya existe";
	}
}

public function actualizarCiudadesConfigControler(){

	$data["idPais"]       	   = (integer) $this->input->post("uComboidPaisesConfig");
	$data["idCiudad"]          = $this->input->post("idCiudadConfig");
	$data["uConfigNomCiudad"]  = ucfirst($this->input->post("uConfigNomCiudad"));
	$data["uActivo"]           = $this->input->post("uConfigEstadoCiudad");


	  $resultado = $this->Mconfig->actualizarCiudadesConfigModel($data);

		if($resultado){
			echo "correcto";
		}else{
			echo "error";
		}
	}

	public function eliminarCiudadesConfigControler(){

	$data["idCiudad"] = $this->input->post("flagCiudades");
	$resultado = $this->Mconfig->eliminarCiudadesConfigModel($data);

	if($resultado){
		echo "correcto";
	}else{
		echo "error";
	}
	
}

/* ============= FIN Ciudades =============  */


/* ============= INICIO Autores ============= */

public function getAutoresConfigControler(){
	$resultado = $this->Mconfig->getAutoresConfigModel();
	echo json_encode($resultado);
}

public function getNacionalidadConfigControler(){
	$resultado = $this->Mconfig->getNacionalidadConfigModel();
	echo json_encode($resultado);
}

public function insertAutoresConfigControler(){
	$data["nombre"]   = $this->input->post("configNombreAutor");
	$data["apellido"] = $this->input->post("configApellAutor");
	$data["idPais"]   = $this->input->post("uComboNacionalidadConfig");
	$data["activo"]   = 1;

	if($this->Mconfig->existeAutor($data["nombre"],$data["apellido"])===false){
		$resultado = $this->Mconfig->insertAutorConfigModel($data);
		echo "correcto";
	}else{
			echo "El registro ya existe";
	}
}

public function actualizarAutoresConfigControler(){

	$data["idAutores"]    = $this->input->post("idAutores");
	$data["nombre"]       = $this->input->post("uConfigNombreAutor");
	$data["apellido"]     = $this->input->post("uConfigApellAutor");
	$data["nacionalidad"] = $this->input->post("u2ComboNacionalidadConfig");
	$data["estado"]       = $this->input->post("uConfigEstadoAutor");


	  $resultado = $this->Mconfig->actualizarAutoresConfigModel($data);

		if($resultado){
			echo "correcto";
		}else{
			echo "error";
		}
	}


	public function eliminarAutoresConfigControler(){

	$data["flagAutores"] = $this->input->post("flagAutores");
	$resultado = $this->Mconfig->eliminarAutoresConfigModel($data);

	if($resultado){
		echo "correcto";
	}else{
		echo "error";
	}
	
}

/* ============= FIN Autores ============= */

/* ============= INCIO Genero ============= */

public function getGeneroConfigControler(){
	$resultado = $this->Mconfig->getGeneroConfigModel();
	echo json_encode($resultado);
}


public function insertGeneroConfigControler(){

	$data["nombre"]   = $this->input->post("nombreConfigGenero");
	$data["activo"]   = 1;

	if($this->Mconfig->existeGenero($data["nombre"])===false){
		$resultado = $this->Mconfig->insertGeneroConfigModel($data);
		echo "correcto";
	}else{
			echo "El registro ya existe";
	}
}

public function actualizarGeneroConfigControler(){

$data["idGenero"] = $this->input->post("llaveGenero2");
$data["nombre"]   = $this->input->post("uNombreConfigGenero");
$data["activo"]   = $this->input->post("uConfigEstadoGenero");

	$resultado = $this->Mconfig->actualizarGeneroConfigModel($data);

	if($resultado){
		echo "correcto";
	}else{
		echo "error";
	}
}

	public function eliminarGenerosConfigControler(){
	$data["flagGenero"] = $this->input->post("flagGenero");

	$resultado = $this->Mconfig->eliminarGenerosConfigModel($data);
	if($resultado){
		echo "correcto";
	}else{
		echo "error";
	}
	
}


/* ============= FIN Genero ============= */

}
