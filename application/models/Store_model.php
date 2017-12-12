<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Store_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $this->db->insert('tb_store_product_send', $data);
        if ($this->db->affected_rows() == 1) {
            return true;
        }
        return false;
    }

    public function get_all_last() {
        $this->db->join('tb_stores s', 's.id = sp.store_id', 'inner');
        $this->db->join('tb_products p', 'p.id = sp.product_id', 'inner');
        $query = $this->db->get('tb_store_product_send sp');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return NULL;
    }

}
