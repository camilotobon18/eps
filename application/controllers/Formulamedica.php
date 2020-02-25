<?php
/*
controlador para el manejo de formulas medicas 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Formulamedica extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		// libreria para manejo de cruds
		$this->load->library('grocery_CRUD');

		if (!$this->session->userdata("pkid")) {
			redirect('login');
		}
	}

	public function index()
	{

		$vector["titulo"]="Control de citas";
		$vector["pagina"]="Formulas Medicas";
		$vector["nombreusuario"]=$this->session->userdata('nombre');
		$vector["fotousuario"]=$this->session->userdata('foto'); 
		$vector["idusuario"]=$this->session->userdata('pkid');

		$crud = new grocery_CRUD();
		
		$crud->set_theme('flexigrid');
		$crud->set_table('tblformulamedica');
		$crud->set_subject('Formulas Medicas');

		$crud->fields("paciente", "medico", "observaciones", "referencia1", "cantidad1", "referencia2", "cantidad2", "referencia3", "cantidad3");
		$crud->required_fields("paciente", "medico", "observaciones", "referencia1", "cantidad1", "referencia2", "cantidad2", "referencia3", "cantidad3");

		$crud->columns("paciente", "medico", "observaciones", "referencia1", "cantidad1", "referencia2", "cantidad2", "referencia3", "cantidad3");
		
		$crud->set_relation("paciente", "tblpaciente", "nombre");
		$crud->set_relation("medico", "tblmedico", "nombre");
		$crud->set_relation("referencia1", "tblmedicamento", "referencia");
		$crud->set_relation("referencia2", "tblmedicamento", "referencia");
		$crud->set_relation("referencia3", "tblmedicamento", "referencia");


		//para colocarle el nombre de columna que deseemos usamos display_as
		$crud->display_as("paciente", "Nombre del Paciente");
		$crud->display_as("medico", "Nombre del medico");
		$crud->display_as("observaciones", "Observaciones");
		$crud->display_as("referencia1", "Ref 1");
		$crud->display_as("cantidad1", "Cant 1");
		$crud->display_as("referencia2", "Ref 2");
		$crud->display_as("cantidad2", "Cant 2");
		$crud->display_as("referencia3", "Ref 3");
		$crud->display_as("cantidad3", "Cant 3");

		
		$output = $crud->render();
		// pasar el output a la vista
		$vector["crud"]=(array)$output;

		$this->load->view('formulamedica',$vector);
	}
}