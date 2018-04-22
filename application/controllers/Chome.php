<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chome extends CI_Controller {

	function __construct(){

	parent::__construct();
	$this->load->helper('libros_helper');
	$this->load->library('pagination');
	$this->load->model("Mlibros");
	$this->load->model("Seo_model");

	}

public function index(){

$data["seo"]=$this->listarSeo();

$this->load->view('Home/layout/head',$data);
$this->load->view('Home/layout/navbar');
$this->load->view('Home/home_view');
$this->load->view('Home/layout/footer');

}

public function vista2(){

$this->load->view('Home/home_view2');

}

public function nosotros(){
$this->load->view('Home/layout/head');
$this->load->view('Home/prueba');
$this->load->view('Home/layout/footer');

}

public function interno(){

if($_GET['id']){
	
$id=$_GET['id'];

$data1["array"]=$this->Mlibros->getLibros($id);
$data2["seo"]=$this->listarSeo();

$this->load->view('Home/layout/head',$data2);
$this->load->view('Home/layout/navbar');
$this->load->view('Home/interno',$data1);
$this->load->view('Home/layout/footer');	

}



}

public function mostrar()
{
	//valor a Buscar
	$buscar = $this->input->post("buscar");
	$numeropagina = $this->input->post("nropagina");
	$cantidad = $this->input->post("cantidad");
	
	$inicio = ($numeropagina -1)*$cantidad;
	$data = array(
		"clientes" => $this->Mlibros->buscar($buscar,$inicio,$cantidad),
		"totalregistros" => count($this->Mlibros->buscar($buscar)),
		"cantidad" =>$cantidad
		
	);
	echo json_encode($data);
}


public function error(){
$this->load->view("error2/index.php");
}

	public function listarSeo(){

	$cadena="";
	$resultado=$this->Seo_model->listarSeoModel();

		foreach ($resultado->result() as $row) {

			if($row->cbo==2){ #para la carga de analytic
	$cadena.="<script>{$row->descripcion}</script> \n";
			}else if($row->cbo==0 || $row->cbo==1){ #con opción de combo o no
	$cadena.="<meta name='{$row->nombre}' content='{$row->descripcion}'/> \n";
			}
		}
			return $cadena;
	}


}