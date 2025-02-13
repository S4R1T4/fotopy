<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comprobantes_model extends CI_Model
{

    var $table = 'tipocomprobante';
    var $IdTable = 'IdTipoComprobante';
    var $column = array('IdTipoComprobante', 'Descripcion'); //columnas de busqueda
    var $order = array('IdTipoComprobante' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->search = '';
    }

    private function _get_datatables_query()
    {

        $this->db->from($this->table);
        $this->db->where("EstadoComprobante", "1"); //esto es para que no se vea luego de anular
        $i = 0;

        foreach ($this->column as $item) {
            if ($_POST['search']['value']) ($i === 0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column[$i] = $item;
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        $this->db->where("EstadoComprobante", "1");
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where($this->IdTable, $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getAll()
    {
        $this->db->from($this->table);
        //  $this->db->where($this->IdTable,$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // public function update($where, $data)
    // {
    // $this->db->update($this->table, $data, $where);
    // return $this->db->affected_rows();
    // }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }


    public function delete_by_id($id, $data)
    {
        $this->db->where($this->IdTable, $id);
        $this->db->update($this->table, $data);
        //  $this->db->delete($this->table);
    }

    public function get_by_id_view($id)
    {
        $this->db->from($this->table);
        $this->db->where($this->IdTable, $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $results = $query->result();
        }
        return $results;
    }
}
