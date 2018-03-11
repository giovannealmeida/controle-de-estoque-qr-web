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

    public function all() {
        $this->db->select('s.amount, s.value, s.sale_id, s.date, u.name as salesman, st.fantasy_name as store, p.product_name as product, c.name as client');
        $this->db->join('tb_users u', 'u.id = s.salesman_id', 'inner');
        $this->db->join('tb_user_store us', 'us.user_id = s.salesman_id', 'inner');
        $this->db->join('tb_stores st', 'st.id = us.store_id', 'inner');
        $this->db->join('tb_products p', 'p.id = s.product_id', 'inner');
        $this->db->join('tb_clients c', 'c.id = s.client_id', 'left');
        $query = $this->db->get('tb_sales s');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                $sales[$value->sale_id][] = $value;
            }

            foreach ($sales as $key => $sale) {
                $total = 0;
                foreach ($sale as $key2 => $value) {
                    $total += $value->value * $value->amount;
                }
                $sales[$value->sale_id][0]->total = $total;
            }
            return $sales;
        } else {
            return NULL;
        }
    }

    public function get_total_sales($type_sale_id = null) {
        if($type_sale_id != null){
            $this->db->where('type_sale_id', $type_sale_id);
        }
        $this->db->select('sum(amount * value) as value, sum(amount) as amount');
        $query = $this->db->get('tb_sales s');
        if ($query->num_rows() > 0) {
            return $query->row(0);
        } else {
            return NULL;
        }
    }

    public function get_top_salesman() {
        $this->db->select('u.name as name, sum(s.amount * s.value) as top_value, sum(s.amount) as amount');
        $this->db->order_by('top_value', 'desc');
        $this->db->group_by('salesman_id');
        $this->db->join('tb_users u', 'u.id = s.salesman_id', 'inner');
        $query = $this->db->get('tb_sales s');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function get_top_stores() {
        $this->db->select('st.fantasy_name as name, sum(s.amount * s.value) as top_value, sum(s.amount) as amount');
        $this->db->join('tb_user_store us', 'us.user_id = s.salesman_id', 'inner');
        $this->db->join('tb_stores st', 'st.id = us.store_id', 'inner');
        $this->db->order_by('top_value', 'desc');
        $this->db->group_by('st.id');
        $query = $this->db->get('tb_sales s');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function get_top_sales() {
        $this->db->select('p.product_name as name, sum(s.amount * s.value) as top_value, sum(s.amount) as amount');
        $this->db->join('tb_products p', 'p.id = s.product_id', 'inner');
        $this->db->order_by('top_value', 'desc');
        $this->db->group_by('s.product_id');
        $query = $this->db->get('tb_sales s');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function get_statistics($type_sale_id) {
        $this->db->select('YEAR(date) AS year, MONTH(date) AS month, sum(s.amount * s.value) as top_value, sum(s.amount) as amount');
        $this->db->group_by('YEAR(date), MONTH(date)');
        $this->db->where('type_sale_id', $type_sale_id);
        $query = $this->db->get('tb_sales s');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        };
    }

}
