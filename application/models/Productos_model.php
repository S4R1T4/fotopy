<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_model extends CI_Model {
	//estos son metodos q tienen q ver con bd
	
	//este metodo es para mostrar todos los registros de la tabla
	public function getProductos(){
		$this->db->select("p.*, s.descripcion"); //selecc campos
		$this->db->from("producto p"); //desde tabla con alias
		$this->db->join("servicio s", "s.id_serv=p.id_serv");//une los campos por su pk=fk
		//$this->db->where("p.estado", "1");
		$resultados= $this->db->get();
		return $resultados->result();
	}
	
	//esto es una funcion o metodo para mostrar 1 registro de la tabla x su id
	public function getProducto($id){
		$this->db->where("id_prod",$id);
		$resultado= $this->db->get("producto");
		return $resultado->row();
	}
	
	//esta es la parte para guardar en la bd
	public function save($data)
	{
		return $this->db->insert("producto", $data);
	}
	
	
	//esto es para actualizar los datos de la tabla
	public function update($id, $data){
		$this->db->where("id_prod", $id);
		return $this->db->update("producto", $data);
	}
}