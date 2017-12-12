<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Team_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert_store($data) {
        $this->db->insert('tb_stores', $data);
        if ($this->db->affected_rows() == 1) {
            return true;
        }
        return false;
    }

    public function insert_user_store($data) {
        $this->db->insert('tb_user_store', $data);
        if ($this->db->affected_rows() == 1) {
            return true;
        }
        return false;
    }

    public function get_all_store() {
        return $this->db->get('tb_stores')->result();
    }

    public function get_stores_select() {
        $query = $this->db->get('tb_stores');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                $result[$value->id] = $value->cnpj . ' - ' . $value->fantasy_name;
            }
            return $result;
        }
        return NULL;
    }

    public function get_all_type_sale() {
        $query = $this->db->get('tb_type_sales');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                $result[$value->id] = $value->description;
            }
            return $result;
        }
        return NULL;
    }

}
