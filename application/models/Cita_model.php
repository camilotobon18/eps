<?php

class Cita_model extends CI_model
{
	
	
	public function __construct() {
		
	}
	// funcion que permite listar los datos
	function listar() {
		// traer los registros de la tabla y pasarlos al controlador
		// recuerden que todos los framewokrs pasan los parametros como arrays
		$query=$this->db->get("tblcita");
		return $query->result_array();
	}

}
