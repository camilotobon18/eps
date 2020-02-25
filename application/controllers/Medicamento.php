<?php
/*
controlador para el manejo de medicamentos
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Medicamento extends CI_Controller {

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
		$vector["pagina"]="Medicamentos";
		$vector["nombreusuario"]=$this->session->userdata('nombre');
		$vector["fotousuario"]=$this->session->userdata('foto'); 
		$vector["idusuario"]=$this->session->userdata('pkid');

		// uso del CRUD.
		// invocar la libreria
		$crud = new grocery_CRUD();
		// invocar los parametros base:
		// el titulo, la tabla y el estilo que deseemos. Recomendado el flexigrid
		// pórque datatables puede generar conflicto con otros que esten dentro del
		// template
		$crud->set_theme('flexigrid');
		$crud->set_table('tblmedicamento');
		$crud->set_subject('Listado de Medicamentos');

		$crud->fields("id", "referencia");
		$crud->required_fields("referencia");

		$crud->unique_fields(array("referencia"));

		$crud->columns("id", "referencia");

		$crud->add_fields("referencia");
		$crud->edit_fields("referencia");

		$crud->display_as("id", "Codigo");
		$crud->display_as("referencia", "Referencia");

		$crud->order_by("referencia", "asc");
		
		$output = $crud->render();
		// pasar el output a la vista
		$vector["crud"]=(array)$output;

		$this->load->view('medicamento',$vector);
	}
}