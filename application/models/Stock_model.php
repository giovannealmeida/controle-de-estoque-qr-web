<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Stock_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_category() {
        $this->db->order_by("description", "asc");
        $query = $this->db->get('tb_category');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function insert_product($data) {
        $this->db->insert('tb_products', $data);
        if ($this->db->affected_rows() == 1) {
            return true;
        }
        return false;
    }

    public function get_last_product_record(){
        $this->db->select('p.id, p.product_name, p.description, p.quantity_in_stock, p.wholesale_value, p.retail_value, c.description as category');
        $this->db->order_by("p.id", "desc");
        $this->db->limit(1);
        $this->db->join('tb_category c', 'c.id = p.category');
        $query = $this->db->get('tb_products p');
        if ($query->num_rows() > 0) {
            return $query->row(0);
        } else {
            return null;
        }
    }

}
