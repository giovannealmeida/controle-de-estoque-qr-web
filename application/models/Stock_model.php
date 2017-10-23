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

}
