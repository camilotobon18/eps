<?php
/*
controlador para el manejo de pacientes
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Listapaciente extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->model('paciente_model');

		if (!$this->session->userdata("pkid")) {
			redirect('login');
		}
	}

	public function index()
	{

		$vector["titulo"]="Control de citas";
		$vector["subtitulo"]="Reporte lista de pacientes";
		$vector["pagina"]="Reporte lista de Pacientes";
		$vector["nombreusuario"]=$this->session->userdata('nombre');
		$vector["fotousuario"]=$this->session->userdata('foto'); 
		$vector["idusuario"]=$this->session->userdata('pkid');



		$registros=$this->paciente_model->listar();
		$vector["listado"]=$registros;

		$this->load->view('listapaciente',$vector);
	}
}