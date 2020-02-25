<?php

class Principal_model extends CI_model
{
	
	
	public function __construct() {
		
	}
	// funcion que permite listar los datos
	function listarmedicos() {
		// traer los registros de la tabla y pasarlos al controlador
		// recuerden que todos los framewokrs pasan los parametros como arrays
		$query=$this->db->get("tblmedico");
		return $query->result_array();
	}

	function listarpacientes() {
		// traer los registros de la tabla y pasarlos al controlador
		// recuerden que todos los framewokrs pasan los parametros como arrays
		$query=$this->db->get("tblpaciente");
		return $query->result_array();
	}

}