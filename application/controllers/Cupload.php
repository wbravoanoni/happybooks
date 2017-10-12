<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cupload extends CI_Controller {

	function __construct(){

	parent::__construct();

	$this->load->model('Mupload');
	$this->load->helper('download');
	}

public function index(){

	$data['error']     = "";
	$data['errorArch'] = "";
	$data['estado']    = "";
	$data['archivo']   = "";

	$this->load->view('layout/header');
	$this->load->view('layout/menu');
	$this->load->view('Vupload',$data);
	$this->load->view('layout/footer');

}

public function subirImagen(){

$config['upload_path']   = "./uploads/imagenes/";
$config['allowed_types'] = "gif|jpg|png";
$config['max_size']	     = "2048";
$config['max_width'] 	 = "2024";
$config['max_height']	 = "2008";

$this->load->library('upload',$config);

if(!$this->upload->do_upload("fileImagen")){

$data['error'] = $this->upload->display_errors();

	$this->load->view('layout/header');
	$this->load->view('layout/menu');
	$this->load->view('Vupload',$data);
	$this->load->view('layout/footer');

}else{

	$file_info = $this->upload->data();

	$this->crearMiniatura($file_info['file_name']);
	$titulo = $this->input->post('titImagen');
	$imagen = $file_info['file_name'];
	$subir  = $this->Mupload->subir($titulo,$imagen);
	$data['titulo'] = $titulo;
	$data['imagen'] = $imagen;

	$this->load->view('layout/header');
	$this->load->view('layout/menu');
	$this->load->view('vImagenSubida',$data);
	$this->load->view('layout/footer');

	}
}

function crearMiniatura($filename){

$config['image_library']   = 'gd2';
$config['source_image']    = 'uploads/imagenes/'.$filename;
$config['create_thumb']    = TRUE;
$config['maintrain_ratio'] = TRUE;
$config['new_image'] 	   = 'uploads/imagenes/thumbs/';
$config['thumb_marker']    = '';
$config['width']   		   = 150;
$config['height'] 		   = 150;
$this->load->library('image_lib',$config);
$this->image_lib->resize();

}

public function subirArchivo(){

$config['upload_path']   = './uploads/archivos/';
$config['allowed_types'] = 'pdf|xlsx|docx';
$config['max_size']      = '20048';

$this->load->library('upload',$config);

if(!$this->upload->do_upload("fileImagen")){
	$data['errorArch'] = $this->upload->display_errors();
	$data['estado']    = "Elemento no Subido";
	$this->load->view('layout/header');
	$this->load->view('layout/menu');
	$this->load->view('Vupload',$data);
	$this->load->view('layout/footer');
}else{

	$file_info         = $this->upload->data();

	$titulo			   = $this->input->post('titImagen');
	$archivo 		   = $file_info['file_name'];
	$subir 			   = $this->Mupload->subir($titulo,$archivo);
	$data['estado']    = "Archivo Subido";
	$data['archivo']   = $archivo;
	$data['error']     = "";
	$data['errorArch'] = "";

	$this->load->view('layout/header');
	$this->load->view('layout/menu');
	$this->load->view('Vupload',$data);
	$this->load->view('layout/footer');
	}
}

public function downloads($name){

$data = file_get_contents('./uploads/archivos/'.$name);
force_download($name,$data);

}






}