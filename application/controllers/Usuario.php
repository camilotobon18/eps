<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct(){
		// invocar el modelo
		parent:: __construct(); // carga el constructor del controlador principal (asi no inicializa las variables o metodos o funciones en el constructor)
		$this->load->model('Usuario_model');
	}
	
	public function index()
	{
		$vector["titulo"]="Principal usuarios";
		$vector["subtitulo"]="Listado de usuarios";
		$vector["fotousuario"]=$this->session->userdata('foto'); 
		$vector["idusuario"]=$this->session->userdata('pkid');
		// traer los datos de la tabla
		$registros=$this->Usuario_model->listar();
		$vector["listado"]=$registros;
		
		$this->load->view('usuario', $vector);
	}
	// método para ingresar datos de usuarios
	public function ingresar(){

		$vector["titulo"]="Principal usuarios";
		$vector["subtitulo"]="Editando / Ingresando Registro";

		//preguntar si estamos pasando datos de un formulario
		if (count($_POST)>0) {
			// invocar la función de registro del model
			// la vamos a guardar en una variable y de acuerdo a la respuesta mandamos el resultado a la vista.
			$resp=$this->Usuario_model->registro();
			$mensaje="<span class='btn btn-success'>Datos Ingresados.</span>";
			if ($resp==0) $mensaje="<span class='btn btn-warning'>El registro ya existe o no se puede ingresar.</span>";
			
			$vector["mensaje"]=$mensaje;
		}

		$this->load->view('usuario-ingresar',$vector);
	}
	//metodo que permite eliminar
	function eliminar($param) {

	 //modelo 
		$resp=$this->Usuario_model->eliminar($param);

		$vector["mensaje"]="<span class='btn btn-danger' >Datos borrados del sistema</span>";
		$vector["titulo"]="Principal usuarios";
		$vector["subtitulo"]="Listado de usuarios";
		// traer los datos de la tabla
		$registros=$this->Usuario_model->listar();
		$vector["listado"]=$registros;
		
		$this->load->view('usuario', $vector);


		
	}
	//metodo para modificar
	public function modificar($param){

		$vector["titulo"]="Principal usuarios";
		$vector["subtitulo"]="Editando Registro";

		//preguntar si estamos pasando datos de un formulario
		if (count($_POST)>0) {
			// invocar la función de registro del model
			// la vamos a guardar en una variable y de acuerdo a la respuesta mandamos el resultado a la vista.
			$resp=$this->Usuario_model->modificar($param);
			$mensaje="<span class='btn btn-success'>Datos Modificados</span>";
			if ($resp==0) $mensaje="<span class='btn btn-warning'>El registrono se puede modificar.</span>";
			
			//
			$vector["mensaje"]=$mensaje;
		}
		//Funcion que permite cargar los datos del registro o modificar
		$datos=$this->Usuario_model->detalle($param);
		$vector["detalleregistro"]=$datos;


		$this->load->view('usuario-ingresar',$vector);
	}
}