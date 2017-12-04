<?php

defined('BASEPATH') or exit('No direct script access allowed');

class States_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {
        $query = $this->db->get('tb_states');
        if ($query->num_rows() > 0) {
            $result[NULL] = 'Selecione um estado';
            foreach ($query->result() as $key => $value){
                $result[$value->id] = $value->name;
            }
            return $result;
        } else {
            return null;
        }
    }

    public function get_by_id($state_id) {
        $this->db->where('id', $state_id);
        $query = $this->db->get('tb_states');
        if ($query->num_rows() > 0) {
            return $query->result()[0];
        }
        return null;
    }

    public function get_by_name($string) {
        $this->db->like('name', $string);
        $result = $this->db->get("tb_states");

        if ($result->num_rows()) {
            return $result->result();
        }
        return null;
    }

    public function get_by_uf($string) {
        $this->db->like('uf', $string);
        $result = $this->db->get("tb_states");

        if ($result->num_rows()) {
            return $result->result();
        }
        return null;
    }

    public function get_by_city($city_id) {
        $this->db->select('s.*');
        $this->db->where('c.id', $city_id);
        $this->db->join("tb_states s", "s.id = c.state_id");
        $result = $this->db->get("tb_cities c");

        if ($result->num_rows()) {
            return $result->result();
        }
        return null;
    }

}