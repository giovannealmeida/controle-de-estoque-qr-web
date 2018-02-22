<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Store_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $this->db->insert('tb_store_product', $data);
        if ($this->db->affected_rows() == 1) {
            return true;
        }
        return false;
    }
    
    public function update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('tb_store_product', $data);

        if ($this->db->affected_rows() == 1) {
            return true;
        }
        return false;
    }

    public function get_all() {
        $this->db->select('sp.id as id, s.cnpj, s.fantasy_name, p.code, p.product_name, sp.amount, sp.value');
        $this->db->join('tb_stores s', 's.id = sp.store_id', 'inner');
        $this->db->join('tb_products p', 'p.id = sp.product_id', 'inner');
        $query = $this->db->get('tb_store_product sp');
        if ($query->num_rows() > 0) {
            //print_r($query->result());die;
            return $query->result();
        }
        return NULL;
    }
    
    public function check_association($product_id, $store_id = null){
        if($store_id != null){
            $this->db->where('store_id', $store_id);
        }
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('tb_store_product');
        if ($query->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }
    
    public function get_association_by_id($id){
        $this->db->where('id', $id);
        $query = $this->db->get('tb_store_product');
        if ($query->num_rows() > 0) {
            return $query->row(0);
        }else{
            return null;
        }
    }
    
    public function get_association($store_id, $product_id){
        $this->db->where('store_id', $store_id);
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('tb_store_product');
        if ($query->num_rows() > 0) {
            return $query->row(0);
        }else{
            return null;
        }
    }
    
       public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('tb_store_product');

        if ($this->db->affected_rows() == 1) {
            return true;
        }
        return false;
    }

}
