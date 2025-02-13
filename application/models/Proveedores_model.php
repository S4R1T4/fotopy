<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores_model extends CI_Model {
	//estos son metodos q tienen q ver con bd
	
	//este metodo es para mostrar todos los registros
	public function getproveedores(){
		$this->db->select("p.*, cd.descripcion as ciudad"); //selecc campos
		$this->db->from("proveedor p"); //desde tabla con alias
		$this->db->join("ciudad cd", "cd.id_ciudad=p.id_ciudad");//une los campos por su pk=fk
		//$this->db->where("c.estado", "1");
		$resultados= $this->db->get();
		return $resultados->result();
	}
	//esto es una funcion o metodo para mostrar 1 registro por id
	public function getproveedor($id){
		$this->db->select("p.*, cd.descripcion as ciudad"); //selecc campos
		$this->db->from("proveedor p"); //desde tabla con alias
		$this->db->join("ciudad cd", "cd.id_ciudad=p.id_ciudad");//une los campos por su pk=fk
		$this->db->where("id_proveedor",$id);
		$resultado= $this->db->get();
		return $resultado->row();
	}

	//esta es la parte para guardar en la bd
	public function save($data)
	{
		return $this->db->insert("proveedor", $data);
	}
	
		//esto es para actualizar 
	public function update($id, $data){
		$this->db->where("id_proveedor", $id);
		return $this->db->update("proveedor", $data);

	}
}