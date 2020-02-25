<?php
/*
Modelo para el manejo de pedidos
*/
class Pedidos_model extends CI_model
{
	
	function __construct()
	{
	}
	// funcion que permite listar los productos
	function listarproductos() {
		$query=$this->db->get("tblproductos");
		return $query->result_array();
	}


}

