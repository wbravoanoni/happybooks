
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mnotas extends CI_Model {


function __construct()
{
	parent::__construct();
}


public function getNotas(){

$this->db->select('a.idPersona,CONCAT(a.nombre," ",a.appaterno," ",a.apmaterno) AS "Alumno",
				   ifnull(b.1B,0) as "N1B",ifnull(b.2B,0) as "N2B",ifnull(b.3B,0) as "N3B",ifnull(b.4B,0) as "N4B" ,ifnull(b.notaFinal,0) as "notaFinal" ',false);
$this->db->join('notas b','a.idPersona=b.idPersona','left');
$this->db->from('persona a');

$r = $this->db->get();
return $r->result();

}


public function saveNotasM($param){

$idPersona=$param['idPersona'];

$this->db->select('idPersona');
$this->db->from('notas');
$this->db->where('idPersona',$idPersona);

$resultado=$this->db->get();

if($resultado->num_rows()==1){



$campos=array(
'1B'=>$param['n1'],
'2B'=>$param['n2'],
'3B'=>$param['n3'],
'4B'=>$param['n4'],
'NotaFinal'=>$param['nf']
);

$this->db->where('idPersona', $idPersona);
$this->db->update('notas',$campos);

}else{


$campos=array(
'idPersona'=>$param['idPersona'],
'1B'=>$param['n1'],
'2B'=>$param['n2'],
'3B'=>$param['n3'],
'4B'=>$param['n4'],
'NotaFinal'=>$param['nf']
);

$this->db->insert('notas',$campos);
}








}



}

?>