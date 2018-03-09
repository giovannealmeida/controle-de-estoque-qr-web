<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sales_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_last_id() {
        $this->db->order_by("sale_id", "desc");
        $query = $this->db->get('tb_sales');
        if ($query->num_rows() > 0) {
            return $query->row(0)->sale_id;
        } else {
            return 0;
        }
    }

    public function insert($data) {
        $this->db->insert('tb_sales', $data);
        if ($this->db->affected_rows() == 1) {
            return true;
        }
        return false;
    }

}
