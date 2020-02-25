
<?php
/*
controlador para el manejo de productos
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuarios extends CI_Controller {
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

		$vector["titulo"]="Sistema de pedidos";
		$vector["pagina"]="Listado de Usuarios";
		$vector["nombreusuario"]=$this->session->userdata('nombre');
		$vector["fotousuario"]=$this->session->userdata('foto'); 
		$vector["idusuario"]=$this->session->userdata('pkid');

		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('tblusuario');
		$crud->set_subject('Listado de usuarios');
		$crud->display_as("nombre", "Nombre");
		$crud->display_as("correo", "Correo");
		$crud->display_as("telefono", "Telefono");
		$crud->display_as("clave", "Clave de acceso");
		$crud->display_as("fechar", "Registro");
		$crud->display_as("fecham", "Ultimo cambio");
		$crud->required_fields("nombre", "correo", "telefono", "clave");
		$crud->order_by("nombre", "asc");
		$crud->edit_fields("nombre", "correo", "telefono", "foto");
		$crud->add_fields("nombre", "correo", "telefono", "clave", "foto");
		$crud->columns("foto", "nombre", "correo", "telefono", "fechar", "fecham");


		$crud->unique_fields(array("correo"));
		$crud->set_field_upload("foto","assets/uploads/fotoperfil");

//si deseamos que un campo cambie su tipo se usa la funcion change_field_type
		$crud->change_field_type("clave", "password");

// usaremos callbacks para capturar la clave, encriptarla y devolverla al array datos
		$crud->callback_before_insert(array($this,"encriptar"));
		// se puede ocutar campos de acuerdo a los estados del crud 
		// add, edit, delete.list, clone, etc
		// vamos a indicarle que cuando se este editando el campo clave se oculte para que nadie lo modifique
		// para eso se usa getState
		if ($crud->getState()=="edit"){
			$crud->field_type("clave","hidden");
		}

		$output = $crud->render();
		$vector["crud"]=(array)$output;
		$this->load->view('usuarios',$vector);
	}

// crear la funcion que vamos a usar en el callback
// la variable global que usa crud grocery para el manejo de los campos se llama post_array
	function encriptar($post_array){
		$post_array["clave"]=password_hash($post_array["clave"], PASSWORD_DEFAULT);
		return $post_array;
	}
}
 
