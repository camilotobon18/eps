<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Ciudad extends CI_Controller {

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
		$vector["pagina"]="Ciudades";
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
		$crud->set_table('tblciudad');
		$crud->set_subject('Listado de Ciudades');

		$crud->fields("nombre");
		$crud->required_fields("nombre");

		$crud->unique_fields(array("nombre"));

		$crud->columns("id", "nombre");

		$crud->add_fields("nombre");
		$crud->edit_fields("nombre");

		$crud->display_as("id", "Codigo");
		$crud->display_as("nombre", "Ciudad");

		$crud->order_by("nombre", "asc");
		
		$output = $crud->render();
		// pasar el output a la vista
		$vector["crud"]=(array)$output;

		$this->load->view('ciudad',$vector);
	}
}
