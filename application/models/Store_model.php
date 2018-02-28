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

    public function get_by_id($store_id) {
        $this->db->where('id', $store_id);
        $query = $this->db->get('tb_stores');
        if ($query->num_rows() > 0) {
            return $query->row(0);
        }
        return NULL;
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

    public function get_all_stores() {
        $this->db->select('s.*, c.name as city, st.name as state');
        $this->db->join('tb_cities c', 'c.id = s.city_id', 'inner');
        $this->db->join('tb_states st', 'st.id = c.state_id', 'inner');
        $query = $this->db->get('tb_stores s');
        if ($query->num_rows() > 0) {
            //print_r($query->result());die;
            return $query->result();
        }
        return NULL;
    }

    public function check_association($product_id, $store_id = null) {
        if ($store_id != null) {
            $this->db->where('store_id', $store_id);
        }
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('tb_store_product');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_association_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tb_store_product');
        if ($query->num_rows() > 0) {
            return $query->row(0);
        } else {
            return null;
        }
    }

    public function get_association($store_id = null, $product_id = null) {
        if ($store_id != null)
            $this->db->where('store_id', $store_id);
        if ($product_id != null)
            $this->db->where('product_id', $product_id);
        $query = $this->db->get('tb_store_product');
        if ($query->num_rows() > 0) {
            if ($store_id != null && $product_id != null)
                return $query->row(0);
            else
                return $query->result();
        } else {
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

    public function delete_store($id) {
        $this->db->where('id', $id);
        $this->db->delete('tb_stores');

        if ($this->db->affected_rows() == 1) {
            return true;
        }
        return false;
    }

    public function email_exists($email) {
        $response_by_email = $this->db->get_where('tb_stores', array('email' => $email));
        if ($response_by_email->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function cnpj_exists($cnpj) {
        $response_by_cpf = $this->db->get_where('tb_stores', array('cnpj' => $cnpj));
        if ($response_by_cpf->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

}
