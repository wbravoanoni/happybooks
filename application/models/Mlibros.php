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
		$this->db->like("a.nombre",$buscar);
		if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
			$this->db->limit($cantidadregistro,$inicio);
		}

		$this->db->select('a.idLibros,a.nombre,CONCAT_WS(" ",b.nombre,b.apellido) as "autor",a.resumen,a.puntaje,a.imagen,a.imgExterna');

		$this->db->from('libros a');
		$this->db->join('autores b','a.autor=b.idAutores');
		$this->db->where('a.activo',1);

		$consulta = $this->db->get();
		return $consulta->result();
	}


/*=====  End Busqueda de libros con like    ======*/

/*=============================================
= 		Busca info para libros internos       =
=============================================*/

	public function getLibros($id)
	
	{
		$this->db->select('a.nombre,,CONCAT_WS(" ",c.nombre,c.apellido) as "autor",a.descripcion,a.puntaje,a.imagen,a.fechaCreacion,paginas,CONCAT_WS(" ",b.nombre,b.appaterno) as "usuario"');
		$this->db->from('libros a');
		$this->db->join('persona b','a.usuario=b.idPersona');
		$this->db->join('autores c','a.autor=c.idAutores');
		$this->db->where('idLibros',$id);
		$this->db->where('a.activo',1);
		$this->db->limit(1);

		$r = $this->db->get();
		if($r->num_rows()>0){
			return $r->row_array();
		}else{
			exit;
		}


	}
/*=====  End of Section libros internos   ======*/


/*=============================================
=            INICIO PANEL - LIBROS            =
=============================================*/


	public function listarLibros()
{
	$this->db->select('a.idLibros,a.llave,a.paginas,a.nombre,CONCAT_WS(" ",d.nombre,d.apellido) as autor,a.resumen,a.descripcion,
		a.puntaje,a.imagen,a.fechaCreacion,
		CONCAT_WS(" ",b.nombre,b.appaterno) as "usuario"
		,c.nombre as "genero",a.activo');
	$this->db->from('libros a');
	$this->db->join('persona b','a.usuario=b.idPersona');
	$this->db->join('genero c','a.genero=c.idGenero');
	$this->db->join('autores d','a.autor=d.idAutores');
	$query=$this->db->get();
	return $query->result();
}
/*
select idLibros,a.nombre,autor,resumen,descripcion,puntaje,imagen,fechaCreacion,genero,a.activo,
CONCAT_WS(" ",b.nombre,b.appaterno) as "usuario",c.nombre
from libros a
inner join persona b on a.usuario=b.idPersona
inner join genero c on a.genero=c.idGenero
*/



	public function listarGeneros($activo)
{
	$this->db->select('idGenero,nombre');
	$this->db->from('genero');
	$this->db->where("activo",$activo);
	$query=$this->db->get();
	return $query->result();
}

	public function listarUsuariosLibros($activo)
{
	$this->db->select('idUsuario,CONCAT_WS(" ",nombre,appaterno) as "usuarios"');
	$this->db->from('persona a');
	$this->db->join('usuario b','a.idPersona=b.idPersona');
	$this->db->where("b.activo",$activo);
	$query=$this->db->get();
	return $query->result();
}

	public function mListarAutoresLibros($activo)
{
	$this->db->select('idAutores,CONCAT_WS(" ",nombre,apellido) as "autores"');
	$this->db->from('autores');
	$this->db->where("activo",$activo);
	$query=$this->db->get();
	return $query->result();
}

public function agregarLibros($data){


		$campos=array(
				'nombre'         => $data['nombreLibro'],
				'autor'          => $data['autorLibro'],
				'resumen'        => $data['resumenLibro'],
				'descripcion'    => $data['descripcionLibro'],
				'imagen'	     => $data['imagenLibro'],
				'usuario'	     => $data['cboUsuariosLibro'],
				'genero'	     => $data['cboGenero'],
				'puntaje'	  	 => $data['myRange'],
				'imgExterna'     => $data['imgExterna'],
				'fechaCreacion'  => $data['fechaCreacion'],
				'paginas'        => $data['paginas'],
				'activo'	     => $data['estadoLibro']);

		$this->db->insert('libros',$campos);
		return $this->db->insert_id();
}

	public function actualizarLLave($idLibro){
	//$cadena=base64_encode($idLibro."-"."cinthia");



$cadena=base64_encode($idLibro."-"."cinthia");
$libros=array('llave'=>$cadena);


	$this->db->where('idLibros', $idLibro);
	$this->db->update('libros',$libros);
	}


/*=========================================
=            Actualizar Libros            =
=========================================*/

	public function mListarTodosUsuariosLibros()
{
	$this->db->select('idUsuario,CONCAT_WS(" ", a.nombre, a.appaterno) as "usuarios",activo');
	$this->db->from('persona a');
	$this->db->join('usuario b','a.idPersona=b.idPersona');
	$query=$this->db->get();
	return $query->result();
}


	public function mListarTodosGeneros()
{
	$this->db->select('idGenero,nombre');
	$this->db->from('genero');
	$query=$this->db->get();
	return $query->result();
}


	public function mListarTodosAutores()
{
	$this->db->select('idAutores,CONCAT_WS(" ",nombre,apellido) as "autores" ');
	$this->db->from('autores');
	$query=$this->db->get();
	return $query->result();
}





public function mActualizarLibros($data){

		$idLibros=$data['idLibros'];

		$libros=array(
				'nombre'      => $data['nombreLibro'],
				'autor'       => $data['autorLibro'],
				'resumen'     => $data['resumenLibro'],
				'descripcion' => $data['descripcionLibro'],
				'imagen'	  => $data['imagenLibro'],
				'usuario'	  => $data['cboUsuariosLibro'],
				'genero'	  => $data['cboGenero'],
				'puntaje'	  => $data['myRange'],
				'imgExterna'  => $data['imgExterna'],
				'paginas'     => $data['paginas'],
				'activo'	  => $data['estadoLibro']);


		$this->db->where('idLibros', $idLibros);
		$this->db->update('libros',$libros);
}

/*=====  End of Actualizar Libros  ======*/



/*=====  End of INICIO PANEL - LIBROS  ======*/





}