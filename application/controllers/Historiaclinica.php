<?php
/*
controlador para el manejo de tipos de clientes
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Historiaclinica extends CI_Controller {

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
		$vector["pagina"]="Historia Clinica";
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
		$crud->set_table('tblhistoriaclinica');
		$crud->set_subject('Listado de Citas');

		$crud->fields("paciente", "medico", "lugarnacimiento", "estatura","peso","profesion","motivoconsulta","antecedentes","diagnostico","tratamiento","fechaingreso");
		$crud->required_fields("paciente", "medico", "lugarnacimiento", "estatura","peso","profesion","motivoconsulta","antecedentes","diagnostico","tratamiento","fechaingreso");

		$crud->unique_fields(array("paciente"));

		//para traer datos de otra relacionada se usa set_relation y lo compone
		//el nombre del campo en la tabla
		//la tabla asociada
		//que campos desea traer de la tabla asociada
		$crud->set_relation("paciente", "tblpaciente", "nombre");
		$crud->set_relation("medico", "tblmedico", "nombre");
		$crud->set_relation("lugarnacimiento", "tblciudad", "nombre");

		//para volver un campo tipo file se usa la funcion set_field_upload y lo compone dos datos:
		//el nombre del campo 
		//la ruta donde ubicar el archivo
		$crud->set_field_upload("imagen1","assets/uploads/files");
		$crud->set_field_upload("imagen2","assets/uploads/files");

		$crud->columns("paciente", "medico", "lugarnacimiento", "estatura","peso","profesion","motivoconsulta","antecedentes","diagnostico","tratamiento","fechaingreso");


		//para colocarle el nombre de columna que deseemos usamos display_as
		$crud->display_as("paciente", "Paciente");
		$crud->display_as("medico", "Medico");
		$crud->display_as("lugarnacimiento", "Lugar de nacimiento");
		$crud->display_as("estatura", "Estatura");
		$crud->display_as("peso", "Peso");
		$crud->display_as("profesion", "profesion");
		$crud->display_as("motivoconsulta", "Motivo consulta");
		$crud->display_as("antecedentes", "Antecedentes");
		$crud->display_as("diagnostico", "Diagnostico");
		$crud->display_as("tratamiento", "Tratamiento");
		$crud->display_as("fechaingreso", "Fecha ingreso");

		

		//para indicar que campos son obligatorios utilizamos required_fields
		
		//para indicarle ordenar los registros se usa order_by
		$crud->order_by("paciente", "asc");
		
		$output = $crud->render();
		// pasar el output a la vista
		$vector["crud"]=(array)$output;

		$this->load->view('historiaclinica',$vector);
	}
}