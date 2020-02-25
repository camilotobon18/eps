<?php
/*
controlador para el manejo de pacientes
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Listahistoriaclinica extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->model('historiaclinica_model');

		if (!$this->session->userdata("pkid")) {
			redirect('login');
		}
	}

	public function index()
	{

		$vector["titulo"]="Control de citas";
		$vector["subtitulo"]="Pacientes";
		$vector["pagina"]="Listado de Historias Clinicas";
		$vector["nombreusuario"]=$this->session->userdata('nombre');
		$vector["fotousuario"]=$this->session->userdata('foto'); 
		$vector["idusuario"]=$this->session->userdata('pkid');

		$registros=$this->historiaclinica_model->listar();
		$vector["listado"]=$registros;

		$this->load->view('listahistoriaclinica',$vector);
	}
}