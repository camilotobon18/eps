<?php
/*
controlador para el manejo de tipos de clientes
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Medico extends CI_Controller {

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
		$vector["pagina"]="Medicos";
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
		$crud->set_table('tblmedico');
		$crud->set_subject('Listado de Medicos');

		$crud->fields("nombre", "apellidos", "telefono", "email","direccion","ciudad","identificacion");
		$crud->required_fields("nombre", "apellidos", "telefono", "email","direccion","ciudad","identificacion");

		$crud->unique_fields(array("email"));

		//para traer datos de otra relacionada se usa set_relation y lo compone
		//el nombre del campo en la tabla
		//la tabla asociada
		//que campos desea traer de la tabla asociada
		$crud->set_relation("ciudad", "tblciudad", "nombre");
		//para volver un campo tipo file se usa la funcion set_field_upload y lo compone dos datos:
		//el nombre del campo 
		//la ruta donde ubicar el archivo
		$crud->set_field_upload("imagen1","assets/uploads/files");
		$crud->set_field_upload("imagen2","assets/uploads/files");

		$crud->columns("nombre", "apellidos", "telefono", "email","direccion","ciudad","identificacion","observaciones");


		//para colocarle el nombre de columna que deseemos usamos display_as
		$crud->display_as("nombre", "Nombre del Medico");
		$crud->display_as("apellidos", "Apellidos del Medico");
		$crud->display_as("telefono", "Telefono");
		$crud->display_as("email", "Correo");
		$crud->display_as("direccion", "Direccion");
		$crud->display_as("identificacion", "Identificación");

		

		//para indicar que campos son obligatorios utilizamos required_fields
		
		//para indicarle ordenar los registros se usa order_by
		$crud->order_by("nombre", "asc");
		
		$output = $crud->render();
		// pasar el output a la vista
		$vector["crud"]=(array)$output;

		$this->load->view('medico',$vector);
	}
}