<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Client_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $this->db->insert('tb_clients', $data);
        if ($this->db->affected_rows() == 1) {
            return $this->db->insert_id();
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

    public function get_by_id($client_id) {
        $this->db->where('id', $client_id);
        $query = $this->db->get('tb_clients c');
        if ($query->num_rows() == 1) {
            return $query->row(0);
        } else {
            return null;
        }
    }

    public function email_exists($email) {
        $response_by_email = $this->db->get_where('tb_clients', array('email' => $email));
        if ($response_by_email->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function cpf_exists($cpf) {
        $response_by_cpf = $this->db->get_where('tb_clients', array('cpf' => $cpf));
        if ($response_by_cpf->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_by_cpf($cpf) {
        $result = $this->db->get_where('tb_clients', array('cpf' => $cpf));
        if ($result->num_rows() == 1) {
            return $result->row(0);
        } else {
            return false;
        }
    }

    public function update($client_id, $data) {
        $this->db->where('id', $client_id);
        $this->db->update('tb_clients', $data);

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

}
