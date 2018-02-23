<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Client_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $this->db->insert('tb_clients', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }

        return FALSE;
    }

    public function client_exists($cpf) {
        $this->db->where('cpf', $cpf);
        $query = $this->db->get('tb_clients');

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function all() {
        $this->db->select('c.id as id, c.name as name, c.cpf as cpf, c.email as email, c.phone as phone, ci.name as city, s.uf as state');
        $this->db->join('tb_cities ci', 'ci.id = c.city_id', 'inner');
        $this->db->join('tb_states s', 's.id = ci.state_id', 'inner');
        $query = $this->db->get('tb_clients c');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('tb_clients');

        if ($this->db->affected_rows() == 1) {
            return true;
        }
        return false;
    }

}
