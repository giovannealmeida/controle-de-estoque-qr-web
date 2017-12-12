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

    public function get_products() {
        $this->db->select('p.id, p.code, p.product_name, p.description, p.quantity_in_stock, p.wholesale_value, p.retail_value, s.status');
        $this->db->join('tb_status s', 'p.status = s.id');
        $query = $this->db->get('tb_products p');
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

    public function get_last_product_record() {
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

    public function verify_code($code) {
        $this->db->where('code', $code);
        $query = $this->db->get('tb_products');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_product_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tb_products p');
        if ($query->num_rows() > 0) {
            return $query->row(0);
        } else {
            return null;
        }
    }

    public function update_product($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('tb_products', $data);

        if ($this->db->affected_rows() == 1) {
            return true;
        }
        return false;
    }

    public function get_products_select() {
        $query = $this->db->get('tb_products');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                $result[$value->id] = $value->code . ' - ' . $value->product_name;
            }
            return $result;
        }
        return NULL;
    }

}
