<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrearPdf extends CI_Controller {

	function __construct(){

	parent::__construct();

	}

public function index(){

$this->load->view('layout/header');
$this->load->view('layout/menu');
$this->load->view('VcrearPDF');
$this->load->view('layout/footer');

}

public function descargar(){

		$data=[];

		$hoy=date("dmyhis");
		$html=$this->input->post('txtPDF');
		$pdfFilePath="cipdf_".$hoy."pdf";


		$this->load->library('M_pdf');
		$this->m_pdf->pdf->writeHTML($html);

		$this->m_pdf->pdf->Output($pdfFilePath,"D");
		}	
	}