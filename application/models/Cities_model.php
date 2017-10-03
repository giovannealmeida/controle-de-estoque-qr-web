<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cities_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {
        $query = $this->db->get('tb_cities');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function get_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tb_cities');
        if ($query->num_rows() > 0) {
            return $query->result()[0];
        }
        return null;
    }

    public function get_by_name($name) {
        $this->db->where('name', $name);
        $query = $this->db->get('tb_cities');
        if ($query->num_rows() > 0) {
            return $query->result()[0];
        }
        return null;
    }

    public function get_by_state_id($state_id) {
        $this->db->where('state_id', $state_id);
        $query = $this->db->get('tb_cities');
        if ($query->num_rows() > 0) {
            $result = array();
            foreach ($query->result() as $value) {
                $result[$value->id] = $value->name;
            }
            return $result;
        }
        return null;
    }

    public function get_by_user_id($user_id) {
        $this->db->select("city_id");
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('tb_user_city');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value){
                $result[] = $value->city_id;
            }
            return $result;
        }
        return array();
    }

}
