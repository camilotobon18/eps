<?php
/*
controlador principal
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Principal extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->model('principal_model');
		/*if (!$this->session->userdata("pkid")) {
			redirect('login');
		}*/
	}

	public function index()
	{

		$vector["titulo"]="Sistema de pedidos";
		$vector["pagina"]="Principal del sistema";
		$vector["nombreusuario"]=$this->session->userdata('nombre');
		$vector["fotousuario"]=$this->session->userdata('foto');
		$vector["idusuario"]=$this->session->userdata('pkid');

		$listadomedicos=$this->principal_model->listarmedicos();
		$totalmedicos = count($listadomedicos);
		$vector["totalmedicos"]=$totalmedicos;

		$listadopacientes=$this->principal_model->listarpacientes();
		$totalpacientes = count($listadopacientes);
		$vector["totalpacientes"]=$totalpacientes;



		$this->load->view('principal',$vector);
	}
}
 