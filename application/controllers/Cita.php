<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cita extends CI_Controller {

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
		$vector["pagina"]="Cita";
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
		$crud->set_table('tblcita');
		$crud->set_subject('Listado de Citas');

		$crud->fields("paciente", "medico", "fecha", "hora","observacionescita");
		$crud->required_fields("paciente", "medico", "fecha", "hora");

		

		//para traer datos de otra relacionada se usa set_relation y lo compone
		//el nombre del campo en la tabla
		//la tabla asociada
		//que campos desea traer de la tabla asociada
		$crud->set_relation("paciente", "tblpaciente", "nombre");
		$crud->set_relation("medico", "tblmedico", "nombre");
		$crud->set_relation("hora", "tblhora", "hora");

		//para volver un campo tipo file se usa la funcion set_field_upload y lo compone dos datos:
		//el nombre del campo 
		//la ruta donde ubicar el archivo
		$crud->set_field_upload("imagen1","assets/uploads/files");
		$crud->set_field_upload("imagen2","assets/uploads/files");

		$crud->columns("paciente", "medico", "fecha", "hora","observacionescita");


		//para colocarle el nombre de columna que deseemos usamos display_as
		$crud->display_as("paciente", "Paciente");
		$crud->display_as("medico", "Medico");
		$crud->display_as("fecha", "Fecha cita");
		$crud->display_as("hora", "Hora cita");
		$crud->display_as("observacionescita", "Observaciones");
/*
		if( mysql_errno() == 500 ) {
      		echo "El correo electronico ingresado ya esta registrado en nuestra base de datos.";
		} else {
      		echo mysql_error();
		}*/
		/*if($error)
		{
			echo "<textarea>".json_encode(array('success' => false , 'error_message' => 'This participant already exists'))."</textarea>";
			$crud->set_echo_and_die();
		}*/
		
		//$crud->unique_fields(array("medico", "fecha", "hora"));
		//para indicar que campos son obligatorios utilizamos required_fields
		
		//para indicarle ordenar los registros se usa order_by
		$crud->order_by("paciente", "asc");
		
		$output = $crud->render();
		// pasar el output a la vista
		$vector["crud"]=(array)$output;

		$this->load->view('cita',$vector);
	}
}