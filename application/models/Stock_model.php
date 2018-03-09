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

    public function get_products($code = null, $user_id = null) {
        if ($user_id != null && $code != NULL) {
            $this->db->select('us.store_id');
            $this->db->join('tb_user_store us', 'us.user_id = u.id');
            $this->db->where('u.id', $user_id);
            $store_id = $this->db->get('tb_users u')->row(0);
            if ($store_id != null) {
                $this->db->select('p.id, p.code, p.product_name, p.description, p.weight, p.category, sp.amount as amount, sp.value as value');
                $this->db->join("tb_store_product sp", "sp.store_id={$store_id->store_id}", "left");
            } else {
                $this->db->select('p.id, p.code, p.product_name, p.description, p.weight, p.category, p.quantity_in_stock as amount, p.retail_value as value');
            }
            $this->db->where('code', $code);
        } else {
            $this->db->select('p.id, p.code, p.product_name, p.description, p.quantity_in_stock, p.wholesale_value, p.retail_value');
        }

        $query = $this->db->get('tb_products p');
        if ($query->num_rows() > 0) {
            return $query->row(0);
        } else {
            return null;
        }
    }

    public function get_products_info($code = null) {

        if ($code != null) {
            $this->db->where('code', $code);
        }

        $query = $this->db->get('tb_products p');
        $products = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key => $value) {
                $products[$value->id] = array('quantity' => $value->quantity_in_stock, 'value' => $value->retail_value);
            }
        }
        return $products;
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

    public function delete_product($id) {
        $this->db->where('id', $id);
        $this->db->delete('tb_products');

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

    public function update_amount_product($user_id, $product) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('tb_users');
        $level_id = $query->row(0)->level_id;

        if ($level_id == 1) {
            $this->db->where('id', $product['product_id']);
            $amount = $this->db->get('tb_products')->row(0)->quantity_in_stock - $product['amount'];
            $this->db->where('id', $product['product_id']);
            $this->db->update('tb_products', array('quantity_in_stock' => $amount));
        } else {
            $this->db->where('user_id', $user_id);
            $store_id = $this->db->get('tb_user_store')->row(0)->store_id;
            $this->db->where('store_id', $store_id);
            $amount = $this->db->get('tb_store_product')->row(0)->amount - $product['amount'];
            $this->db->where('store_id', $store_id);
            $this->db->update('tb_store_product', array('amount' => $amount));
        }
        if ($this->db->affected_rows() == 1) {
            return true;
        }
        return false;
    }

    public function get_amount_product($user_id, $product) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('tb_users');
        $level_id = $query->row(0)->level_id;

        if ($level_id == 1) {
            $this->db->where('id', $product['product_id']);
            $amount = $this->db->get('tb_products')->row(0)->quantity_in_stock;
        } else {
            $this->db->where('user_id', $user_id);
            $store_id = $this->db->get('tb_user_store')->row(0)->store_id;
            $this->db->where('store_id', $store_id);
            $amount = $this->db->get('tb_store_product')->row(0)->amount;
        }
        return $amount;
    }

}
